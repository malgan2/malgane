// Checks the plugin's PHP webhook signatures against Whop's official SDK, both ways.
// Usage: node signature.mjs <plugin dir> <dir with node_modules/@whop/sdk>
import { createRequire } from "node:module";
import { execFileSync } from "node:child_process";

const [pluginDir, workDir] = process.argv.slice(2);
const require = createRequire(workDir + "/");
const { unwrapWebhook } = require("@whop/sdk/helpers");
const { Webhook } = require("standardwebhooks");

const secret = "ws_9f8e7d6c5b4a3210fedcba";
const php = (code, input = "") =>
  execFileSync("php", ["-r", `define('ABSPATH', '/'); require '${pluginDir}/includes/class-whop-klarna-signature.php'; ${code}`], { input }).toString();
let failed = 0;
const check = (name, ok) => { console.log(`${ok ? "PASS" : "FAIL"}  ${name}`); if (!ok) failed++; };

// PHP signs, the SDK verifies.
const ts = String(Math.floor(Date.now() / 1000));
const body = '{"type":"payment.succeeded","data":{"id":"pay_abc"}}';
const sig = php(`echo Whop_Klarna_Signature::sign(${JSON.stringify(body).replace(/\$/g, "\\$")}, 'msg_1', '${ts}', '${secret}');`);
let event = null;
try { event = unwrapWebhook(body, { headers: { "webhook-id": "msg_1", "webhook-timestamp": ts, "webhook-signature": `v1,${sig}` }, key: secret }); } catch {}
check("Whop SDK accepts a signature made by the plugin", event?.type === "payment.succeeded");

// The SDK's library signs (with the key derivation the SDK uses), PHP verifies.
const sdkSig = new Webhook(Buffer.from(secret, "utf8").toString("base64")).sign("msg_2", new Date(Number(ts) * 1000), body);
const verify = (key) => php(`$i = json_decode(stream_get_contents(STDIN), true); var_export(Whop_Klarna_Signature::verify($i['body'], 'msg_2', $i['ts'], $i['sig'], '${key}'));`, JSON.stringify({ body, ts, sig: `v2,other ${sdkSig}` }));
check("plugin accepts a signature made the way Whop signs", verify(secret) === "true");
check("plugin rejects it with the wrong secret", verify("ws_wrong") === "false");

process.exit(failed ? 1 : 0);
