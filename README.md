# Klarna via Whop for WooCommerce

A WordPress plugin that adds **Klarna** as a payment option at your WooCommerce checkout.
Whop processes the payment, so the money lands in your Whop balance.

When a customer picks Klarna and places the order, they go to a secure Whop checkout page
that offers **only Klarna**, for exactly the order total. Once Klarna approves the payment,
Whop notifies your store and the order turns to **Processing**, ready to ship.

It works with both the newer block-based checkout and the classic checkout.

## Before you start

Klarna through Whop has a few conditions. Check these first:

- **Whop financing must be approved.** Klarna counts as financing on Whop, so you need to
  apply for financing in your Whop business and be approved. Until then, Klarna won't appear
  on the Whop checkout page.
- **Payouts must be set up** in Whop (Balances → set up payouts, including identity
  verification), so you can withdraw the money.
- **One-time purchases only.** Klarna doesn't work for subscriptions.
- **Customers must be in a country Klarna supports**: the US, Canada, Australia and Klarna's
  EU countries. Klarna is hidden at checkout for other countries.
- **Up to $10,000 per order** in the US.
- **Keep disputes under 1%.** Whop removes Klarna automatically above that.

## 1. Install the plugin

1. Download [`dist/whop-klarna-for-woocommerce.zip`](dist/whop-klarna-for-woocommerce.zip).
2. In WordPress, go to **Plugins → Add New Plugin → Upload Plugin**, choose the zip, then
   click **Install Now** and **Activate**.

## 2. Get your Whop details

In Whop, switch from your personal account to your **business** (the square with your
business's letter at the top left), then open its developer settings:

1. **API key:** create one that can *create checkout configurations* and *read payments*.
   Copy it.
2. **Company ID:** starts with `biz_`.
3. **Webhook:** create a webhook with
   - **URL:** `https://YOUR-STORE.com/wp-json/whop-klarna/v1/webhook`. The exact URL is also
     shown in the plugin settings, under *Webhook secret*.
   - **Events:** `payment.succeeded`, `payment.pending` and `payment.failed`.
   - **API version:** `v1`, if Whop asks.

   Copy the webhook's secret (starts with `ws_`).

## 3. Turn it on in WooCommerce

Go to **WooCommerce → Settings → Payments → Klarna (via Whop)** and:

1. Tick **Offer Klarna at checkout**.
2. Paste the **API key**, **Company ID** and **Webhook secret**.
3. Click **Save changes**.

**Test first:** tick **Test mode** and use a key, company ID and webhook from
sandbox.whop.com. Place a test order, check that it turns to *Processing*, then untick
**Test mode** and switch to your live details.

## What the order statuses mean

| Status | Meaning |
| --- | --- |
| Pending payment | The customer went to Klarna but hasn't paid yet. WooCommerce cancels it automatically after the *Hold stock* time (WooCommerce → Settings → Products → Inventory). |
| On hold | Klarna is still processing, **or** Whop reported a payment that doesn't match the order (the order note explains which). Don't ship until it's resolved. |
| Processing | Paid. Ship it. |
| Failed | Klarna declined the payment or the customer gave up. |

## Good to know

- **Refunds** are done in Whop. The plugin doesn't sync them back, so update the WooCommerce
  order yourself after refunding.
- **If an order stays "Pending payment" after a customer paid,** the webhook isn't reaching
  your store. Check that the webhook URL and secret match, and look at
  **WooCommerce → Status → Logs** (source `whop-klarna`). Tick **Debug log** in the plugin
  settings for more detail.
- **Settings you can change:** which billing countries see Klarna, and a minimum and maximum
  order total.
- **Security:** webhooks must carry a valid Whop signature, and the plugin re-reads every
  payment from Whop's API before changing an order. A payment only marks an order paid if it
  belongs to that exact order and covers its full total in the right currency.

## For developers

- Plugin source: [`whop-klarna-for-woocommerce/`](whop-klarna-for-woocommerce/)
- Rebuild the zip: `bin/build-zip.sh`
- End-to-end tests: `tests/e2e/run.sh`. This builds a real WordPress + WooCommerce store on
  SQLite with Whop's API mocked, then runs checkout and webhook scenarios against both
  WooCommerce order storage modes. It also checks the webhook signatures against Whop's
  official SDK. It needs php (with pdo_sqlite), composer, node and git.
- Whop API calls are pinned to `Api-Version-Date: 2026-10-09-2`.
