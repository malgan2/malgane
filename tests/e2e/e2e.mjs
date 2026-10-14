import crypto from "node:crypto";
import fs from "node:fs";
import { execFileSync } from "node:child_process";
import path from "node:path";

// End-to-end test of the plugin in a real WooCommerce store, with Whop's API mocked by
// mock-whop-api.php. Run through run.sh. Usage: node e2e.mjs <wordpress dir> <product id> <classic|hpos>

const BASE = "http://127.0.0.1:8899";
const [WP, PRODUCT_ARG, STORAGE] = process.argv.slice(2);
const MOCK = `${WP}/wp-content/whop-mock/`;
const HERE = path.dirname(new URL(import.meta.url).pathname);
const SECRET = "ws_testsecret123";
const PRODUCT = Number(PRODUCT_ARG);
let failures = 0;
const check = (name, ok, extra = "") => { console.log(`${ok ? "PASS" : "FAIL"}  ${name}${ok ? "" : "  " + extra}`); if (!ok) failures++; };
const order = (id) => JSON.parse(execFileSync("php", [`${HERE}/order-state.php`, WP, String(id)]).toString());
const setPayments = (p) => { fs.mkdirSync(MOCK, { recursive: true }); fs.writeFileSync(MOCK + "payments.json", JSON.stringify(p)); };
const requests = () => fs.existsSync(MOCK + "requests.jsonl") ? fs.readFileSync(MOCK + "requests.jsonl", "utf8").trim().split("\n").map(JSON.parse) : [];

async function newCart() {
  const r = await fetch(`${BASE}/wp-json/wc/store/v1/cart`);
  return { token: r.headers.get("cart-token"), nonce: r.headers.get("nonce") };
}
async function store(cart, path, body) {
  const r = await fetch(`${BASE}/wp-json/wc/store/v1/${path}`, { method: "POST", headers: { "Content-Type": "application/json", "Cart-Token": cart.token, Nonce: cart.nonce }, body: JSON.stringify(body) });
  return { status: r.status, json: await r.json() };
}
const address = (country) => ({ first_name: "Ada", last_name: "Buyer", address_1: "1 Main St", city: "Springfield", state: country === "US" ? "CA" : "", postcode: country === "US" ? "90210" : "01000-000", country, email: "ada@example.com", phone: "5555555555" });
async function cartWith(qty, country = "US") {
  const cart = await newCart();
  await store(cart, "cart/add-item", { id: PRODUCT, quantity: qty });
  const c = await store(cart, "cart/update-customer", { billing_address: address(country), shipping_address: address(country) });
  return { cart, methods: c.json.payment_methods };
}
async function checkout(cart, country = "US", method = "whop_klarna") {
  return store(cart, "checkout", { billing_address: address(country), shipping_address: address(country), payment_method: method });
}
function signed(body, { secret = SECRET, ts = Math.floor(Date.now() / 1000) } = {}) {
  const id = "msg_" + crypto.randomBytes(6).toString("hex");
  const sig = crypto.createHmac("sha256", Buffer.from(secret, "utf8")).update(`${id}.${ts}.${body}`).digest("base64");
  return { "webhook-id": id, "webhook-timestamp": String(ts), "webhook-signature": `v1,${sig}` };
}
async function webhook(event, opts) {
  const body = JSON.stringify(event);
  const r = await fetch(`${BASE}/wp-json/whop-klarna/v1/webhook`, { method: "POST", headers: { "Content-Type": "application/json", ...signed(body, opts) }, body });
  return { status: r.status, json: await r.json() };
}
const payment = (o, overrides = {}) => ({ id: "pay_x", status: "paid", currency: "usd", total: { amount: "120.00", currency: "usd", decimals: 2, display_decimals: 2 }, subtotal: { amount: "120.00", currency: "usd", decimals: 2, display_decimals: 2 }, metadata: { wc_order_id: String(o.id), wc_order_key: o.key, source: "whop-klarna-for-woocommerce" }, checkout_configuration_id: o.checkout, ...overrides });

// 1. Klarna is offered for US buyers and hidden where it isn't available.
let { cart, methods } = await cartWith(1, "US");
check("Klarna listed for a US billing address", methods.includes("whop_klarna"), JSON.stringify(methods));
check("Klarna hidden for a Brazil billing address", !(await cartWith(1, "BR")).methods.includes("whop_klarna"));
check("Klarna hidden above the $10,000 maximum", !(await cartWith(100, "US")).methods.includes("whop_klarna"));

// 2. Placing the order creates a Klarna-only Whop checkout and redirects there.
const before = requests().length;
const res = await checkout(cart);
const redirect = res.json.payment_result?.redirect_url;
check("checkout succeeds and redirects to Whop", res.status === 200 && /^https:\/\/whop\.com\/checkout\/ch_test\d+$/.test(redirect || ""), JSON.stringify(res.json).slice(0, 400));
const req = requests()[before];
const sent = req && JSON.parse(req.body);
check("request goes to POST /checkout_configurations", req?.method === "POST" && req.url === "https://api.whop.com/api/v1/checkout_configurations", JSON.stringify(req));
check("request is authenticated and version-pinned", req?.headers.Authorization === "Bearer apik_test" && req.headers["Api-Version-Date"] === "2026-10-09-2");
check("only Klarna is enabled", JSON.stringify(sent?.payment_method_configuration) === JSON.stringify({ enabled: ["klarna"], disabled: [], include_platform_defaults: false }), JSON.stringify(sent?.payment_method_configuration));
check("plan is a one-time $120 USD charge", sent?.plan.plan_type === "one_time" && sent.plan.initial_price === 120 && sent.plan.currency === "usd", JSON.stringify(sent?.plan));
check("company ID and order metadata are sent", sent?.account_id === "biz_test" && sent.metadata.wc_order_id === String(res.json.order_id) && sent.metadata.wc_order_key);
check("buyer returns to the order-received page", (sent?.redirect_url || "").includes("/checkout/order-received/" + res.json.order_id));
let o = { id: res.json.order_id, ...order(res.json.order_id) };
check(`orders are stored in ${STORAGE} storage`, (o.hpos === "yes") === (STORAGE === "hpos"), o.hpos);
check("order waits as pending with the checkout ID stored", o.status === "pending" && o.checkout === redirect.split("/").pop() && o.method === "whop_klarna", JSON.stringify(o));

// 3. Webhooks.
setPayments({ pay_good: payment(o, { id: "pay_good" }) });
let w = await webhook({ type: "payment.succeeded", data: { id: "pay_good" } }, { secret: "ws_wrong" });
check("webhook with a wrong secret is rejected (401)", w.status === 401);
w = await webhook({ type: "payment.succeeded", data: { id: "pay_good" } }, { ts: Math.floor(Date.now() / 1000) - 3600 });
check("webhook older than 5 minutes is rejected (401)", w.status === 401);
check("order is untouched by rejected webhooks", order(o.id).status === "pending");
w = await webhook({ type: "payment.succeeded", data: { id: "pay_good" } });
o = { ...o, ...order(o.id) };
check("valid payment.succeeded marks the order paid", w.status === 200 && w.json.result === "paid" && o.paid && o.status === "processing" && o.txn === "pay_good", JSON.stringify({ w, o }));
w = await webhook({ type: "payment.succeeded", data: { id: "pay_good" } });
check("repeat delivery is a no-op", w.status === 200 && w.json.result === "order already paid", JSON.stringify(w));

// 4. A payment for less than the order total puts the order on hold.
({ cart } = await cartWith(1));
let r2 = await checkout(cart);
let o2 = { id: r2.json.order_id, ...order(r2.json.order_id) };
setPayments({ pay_short: payment(o2, { id: "pay_short", total: { amount: "100.00", currency: "usd", decimals: 2, display_decimals: 2 } }) });
w = await webhook({ type: "payment.succeeded", data: { id: "pay_short" } });
o2 = { ...o2, ...order(o2.id) };
check("underpaid order goes on hold, not paid", w.json.result === "paid, amount mismatch" && o2.status === "on-hold" && !o2.paid, JSON.stringify({ w, s: o2.status }));

// 5. pending -> on-hold, then void -> failed.
({ cart } = await cartWith(1));
let r3 = await checkout(cart);
let o3 = { id: r3.json.order_id, ...order(r3.json.order_id) };
setPayments({ pay_slow: payment(o3, { id: "pay_slow", status: "pending" }) });
await webhook({ type: "payment.pending", data: { id: "pay_slow" } });
check("processing payment puts the order on hold", order(o3.id).status === "on-hold");
setPayments({ pay_slow: payment(o3, { id: "pay_slow", status: "void" }) });
await webhook({ type: "payment.failed", data: { id: "pay_slow" } });
check("void payment marks the order failed", order(o3.id).status === "failed");

// 6. Payments that don't belong to this store are ignored.
setPayments({ pay_other: payment(o3, { id: "pay_other", metadata: { wc_order_id: String(o3.id), wc_order_key: "wc_order_forged" } }), pay_plain: { id: "pay_plain", status: "paid", currency: "usd", metadata: null, checkout_configuration_id: "ch_unrelated" } });
w = await webhook({ type: "payment.succeeded", data: { id: "pay_other" } });
check("payment with a wrong order key is ignored", w.json.result === "no matching order" && order(o3.id).status === "failed", JSON.stringify(w));
w = await webhook({ type: "payment.succeeded", data: { id: "pay_plain" } });
check("unrelated Whop payment is ignored", w.json.result === "no matching order", JSON.stringify(w));
w = await webhook({ type: "membership.activated", data: { id: "mem_1" } });
check("non-payment events are acknowledged and ignored", w.status === 200 && w.json.ignored === "membership.activated");

// 6b. If Whop doesn't copy metadata onto the payment, the checkout ID still finds the order.
({ cart } = await cartWith(1));
let r6 = await checkout(cart);
let o6 = { id: r6.json.order_id, ...order(r6.json.order_id) };
setPayments({ pay_nometa: payment(o6, { id: "pay_nometa", metadata: null }) });
w = await webhook({ type: "payment.succeeded", data: { id: "pay_nometa" } });
check("payment without metadata is matched by its checkout ID", w.json.result === "paid" && order(o6.id).status === "processing", JSON.stringify(w));

// 7. Failures.
({ cart } = await cartWith(1, "US"));
let r4 = await checkout(cart, "BR");
check("forcing Klarna with a Brazil address is refused", r4.status >= 400 && r4.json.payment_result?.payment_status !== "success", JSON.stringify(r4.json).slice(0, 300));
fs.writeFileSync(MOCK + "fail", "");
({ cart } = await cartWith(1));
let r5 = await checkout(cart);
check("Whop outage shows an error instead of redirecting", r5.status >= 400 && /could not start the Klarna checkout/.test(JSON.stringify(r5.json)), JSON.stringify(r5.json).slice(0, 300));
w = await webhook({ type: "payment.succeeded", data: { id: "pay_good" } });
check("webhook asks Whop to retry when the API is down (502)", w.status === 502);
fs.unlinkSync(MOCK + "fail");

console.log(failures ? `\n${failures} FAILED` : "\nALL PASSED");
process.exit(failures ? 1 : 0);
