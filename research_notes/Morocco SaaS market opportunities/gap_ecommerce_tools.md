# Moroccan COD Seller Toolchain Gaps: Adversarial Check of Four "Unsolved" Problems

> Method note (October 2026): this note builds on `ecommerce_segment.md` and does not repeat its findings, except where a finding needs updating. Page fetches are blocked in this environment, so every finding comes from web-search snippets and search-engine summaries, not opened pages. I used the full budget of 25 searches. Many results came from one vendor's blog (eGrow), so most Moroccan COD claims below are **vendor self-reported** and labelled as such. Treat prices and feature claims as unverified until someone checks them on the live sites.

## 1. What existing COD tools and courier dashboards offer for reconciliation, profit analytics and multi-courier shipping (pricing in MAD)

### Takeaway
The earlier note said "I found no dedicated player" for multi-courier reconciliation. That claim is **too strong**. At least four kinds of product now cover parts of this problem:
1. **YouCan Ship.** It aggregates couriers, collects COD cash itself and pays out within 24 hours. For YouCan merchants this removes most of the multi-courier reconciliation problem.
2. **eGrow.** It claims integrations with 60–80+ carriers, including most Moroccan COD couriers, and positions itself on remittance matching and profit.
3. **Profit dashboards.** EcomTracker is MENA-COD-specific. Financify, TrackProfit and Kaarobar are generic COD Shopify apps.
4. **Fintech rails.** Damane Cash with Express Relais, and ORA Cash, speed up remittances themselves.

What I could **not** find is a product that ingests each courier's remittance statement and proves line by line, for a seller with direct contracts with several couriers, that every delivered parcel was paid at the right amount net of fees. Only a Pakistani app (Kaarobar) clearly advertises that matching. Pricing in MAD is still mostly undisclosed.

### Cited Findings
**YouCan (incumbent suite)**
- YouCan Ship advertises rates "starting from 18 DHs for same city and starting from 30 DHs nationwide", no extra charges and zero return fees — [YouCan Ship](https://ship.youcan.shop/); [YouCan Ship FAQ](https://ship.youcan.shop/en/faq)
- YouCan describes Ship as a platform that "aggregates in one place many shipping companies so you can pick the one that suits you best" — [YouCan Ship about](https://ship.youcan.shop/en/about-us); [YouCan blog (AR)](https://youcan.shop/ar/help/blog/youcan-ship)
- YouCan Ship handles COD cash collection and fund transfers. A help page says merchants "receive your money in the next 24 hours after customers pay" — [YouCan Ship app help](https://youcan.shop/en/help/application/YouCanShip-app)
- I found no published price for **YouCan Confirm**. A YouCan blog post argues the case for confirmation calls to filter "ghost customers" — [YouCan blog](https://youcan.shop/en/help/blog/oder-confirmation)
- YouCan store counts are falling. StoreLeads counted 43,866 live YouCan stores worldwide (updated Mar 2026), down from a peak of 70,089 in Q2 2025, which it reports as −22% year-on-year in Q4 2025 — [StoreLeads YouCan](https://storeleads.app/reports/youcan)

**eGrow (vendor self-reported; its blog dominates search results)**
- eGrow's COD page says it connects to about 60 carriers, including Ozon Express, Cathedis, Sendit, Digylog, Speedaf, Ameex and Oscario. It offers a "done-for-you setup" worth USD 149 for free, and most stores are said to go live the same day. No subscription price appeared in the results — [eGrow COD management tool](https://www.egrow.com/en/cod-management-tool)
- Other eGrow pages claim 80+ carriers, including Ameex, Coliix, Ozon Express and Sendit, and integration with Lightfunnels — [eGrow Lightfunnels vs Storeino](https://www.egrow.com/en/blog/lightfunnels-vs-storeino-2026); [eGrow integrations category](https://www.egrow.com/en/blog/category/integrations?page=3)
- eGrow's own comparison pages claim it offers the official WhatsApp Business API as a Meta Business Partner, a 14-language LLM agent grounded on the store's catalog, a combined Instagram, Facebook and TikTok inbox, bulk WhatsApp campaigns and 70+ integrations — [eGrow vs Yanmo](https://www.egrow.com/en/egrow-vs-yanmo); [eGrow vs Cashod (AR)](https://www.egrow.com/ar/egrow-vs-cashod)
- eGrow says each carrier "operates on its own remittance schedule, fee structure, and reporting format", and that this fragmentation causes delayed remittances and reconciliation problems — [eGrow all-in-one COD software](https://www.egrow.com/en/blog/best-all-in-one-cod-software-morocco-2026)
- An eGrow article on YouCan COD stores says matching carrier-collected cash to specific orders is "manual and error-prone without specialized tools", and calls RTO (return-to-origin) losses the biggest profit drain. The search summary did not say which of two YouCan articles this came from — [eGrow YouCan app essentials](https://www.egrow.com/en/blog/youcan-app-essentials-cod-2026); [eGrow YouCan Flow vs third-party](https://www.egrow.com/en/blog/youcan-flow-vs-third-party-automation-2026)
- eGrow claims a healthy net margin on delivered orders for D2C COD in MENA is 8–18% — [eGrow COD profit margin calculator](https://www.egrow.com/en/blog/cod-profit-margin-calculator-2026)
- eGrow describes routing rules by destination country, city or postal code, which amounts to multi-courier allocation — [eGrow YouCan multi-currency guide](https://www.egrow.com/en/blog/youcan-cod-currency-multi-country-2026)

**Other Moroccan COD order-management players**
- **Yanmo** is described as a Moroccan COD platform built around a WhatsApp inbox, chatbot flows, status-triggered auto-messages, voice notes and order management, with granular pricing per overage. This description comes from competitor eGrow — [eGrow vs Yanmo](https://www.egrow.com/en/egrow-vs-yanmo)
- **Cashod** is a competitor named by eGrow. I found no independent information on it — [eGrow vs Cashod (AR)](https://www.egrow.com/ar/egrow-vs-cashod)
- **CodSolver**: the only price found is still "from MAD 49/month" (earlier note). A new search returned nothing about it — [CodSolver](https://codsolver.com/)
- **CodFlow**: I found no MAD price list. Two products with similar names cause confusion:
  - an open-source, serverless COD and delivery platform built for **Algeria** — [MCP Market](https://mcpmarket.com/server/codflow); [Khamsat setup gig](https://khamsat.com/programming/custom-website-development/4461614-%D8%AA%D8%B1%D9%83%D9%8A%D8%A8-%D9%88%D8%AA%D9%87%D9%8A%D8%A6%D8%A9-%D9%85%D9%86%D8%B5%D8%A9-codflow-%D9%84%D9%85%D8%AA%D8%AC%D8%B1%D9%83-%D8%A7%D9%84%D8%A5%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A)
  - a free Shopify app, "CODFlow" by Mahedi Tarek (see section 3) — [Shopify](https://apps.shopify.com/codflow-2)
  - The "200+ Moroccan stores" claim for codflow.ma (earlier note) is unverified.
- **Tifawt, MarocFlow, Micro COD Manager**: searches returned nothing new on features or prices. Tifawt's profit calculator is documented only in the earlier note — [Tifawt](https://tifawt.ma/en/)
- **Lightfunnels**: no COD or carrier pricing found. Its documentation covers shipping rates by region and product, and "Advanced Shipping Regions" by city and area, but no courier remittance features — [Lightfunnels shipping docs](https://docs.lightfunnels.com/shipping/)

**Multi-courier shipping apps**
- **Awsel** (Shopify app) presents itself as built for Moroccan e-commerce. It pulls Shopify orders, compares rates across several carriers, generates labels, schedules pickups, and routes by destination, weight or value — [Awsel on Shopify](https://apps.shopify.com/awsel)
- International analog (Algeria): FlashDelivery COD Manager connects to multiple couriers (Aramex, ZR Express, Yalidine). Its Starter plan costs USD 1/month (60 orders/month) — [Shopify](https://apps.shopify.com/flashdelivery-orders-manager?locale=fr)

**Profit-per-delivered-order dashboards**
- **EcomTracker** calls itself a profit dashboard "built specifically for cash-on-delivery e-commerce in the MENA region". It unifies ad spend from Meta, Snapchat, Google and TikTok with real delivery rates, confirmation rates and COD fees to show net profit per product, market and platform. This is self-description; I found no pricing or Moroccan courier list — [Product Hunt](https://www.producthunt.com/products/ecomtracker/makers)
- **Financify** (Shopify, "COD Profit Analytics") tracks delivery fees, RTO charges, cash-handling costs and ad spend per order. It is free up to 200 orders/month, with a Starter plan at USD 9.99/month. Morocco is not mentioned — [Shopify](https://apps.shopify.com/financify)
- **Kaarobar** ("COD Profit & Ops", built for **Pakistan**) deducts product cost, courier charges, RTO losses and packaging, and **matches courier COD remittances to orders**. It is free up to 500 orders/month — [Shopify](https://apps.shopify.com/kaarobar?locale=ja)
- **TrackProfit** (Shopify) combines ad campaigns with store data for true cost per order and ROAS. It is generic, not COD-specific — [Shopify](https://apps.shopify.com/trackprofit-1)

**Courier dashboards and remittance**
- No carrier-published documentation was retrieved for Sendit, Ameex or Speedaf seller portals or APIs.
- eGrow says Speedaf's COD remittance cycle is "typically weekly" (vendor, unverified) — [eGrow delivery companies](https://www.egrow.com/en/blog/best-delivery-companies-morocco-2026)
- eGrow has an Ameex guide covering "setup, rates, payouts", but the snippet had no figures — [eGrow Ameex guide](https://www.egrow.com/en/blog/ameex-cod-morocco-guide-2026)
- Earlier note, carried forward: Sendit remits within 24 hours; Cathedis remits weekly or twice weekly at MAD 35–40 — [Swiftlog comparison](https://www.swiftlog.ma/blog/sendit-ma-vs-cathedis-comparatif-livraison-maroc-2026); [Cathedis](https://cathedis.ma/nos-tarifs/)

**Fintech and remittance-rail entrants (bank or wallet side)**
- **Damane Cash and Express Relais** (May 2025) partnered to optimize COD financial flows. Damane Cash's transfer platform makes remittance of cash collected at delivery "quasi-instant". Express Relais runs 148+ automatic parcel lockers — [FNH](https://www.fnh.ma/article/actualites-marocaines/damane-cash-express-relais); [AllAfrica](https://fr.allafrica.com/stories/202505290479.html)
- **ORA Technologies** raised a **USD 7.5M Series A** led by Azur Innovation Fund (July 2025). Its **ORA Cash** mobile wallet is pitched as becoming "the reference solution for cash collect in e-commerce transactions" — [Boursenews](https://boursenews.ma/article/marches/ora-technologies-levee-de-fonds-serie-a)
- Akwa invested MAD 25M in VotreChauffeur.ma and VotreColis.ma (headline only; date not shown in the result) — [Le Desk](https://ledesk.ma/encontinu/akwa-investit-25-mdh-dans-votrechauffeur-ma-et-votrecolis-ma/)
- Le Matin (May 2026) says COD now generates significant costs and permanent operational risks for platforms, merchants and couriers — [Le Matin](https://lematin.ma/societe/e-commerce-le-maroc-peut-il-creer-son-propre-paypal/346218)

### Inferences
- **Reconciliation is partly served, not unserved.** For merchants on YouCan Ship, YouCan is the single payer with 24-hour payouts, so cross-courier reconciliation largely disappears. The remaining target is sellers on Shopify, WooCommerce or Lightfunnels, and affiliate networks, who hold **direct contracts with 2–4 couriers**. eGrow claims to serve this group. The real question is whether anyone performs **statement-level matching**: detecting missing, short or late payouts and wrong fees. I found evidence of that only in Pakistan (Kaarobar).
- **Profit analytics is partly served.** EcomTracker's pitch matches "true profit per delivered order" almost exactly. Financify and TrackProfit cover it generically. eGrow and Tifawt offer calculators. Moroccan courier-status ingestion is the likely differentiator, and none of these tools proves it publicly.
- **Funded fintechs are attacking the root cause, slow cash.** ORA Cash (USD 7.5M Series A) and Damane Cash work on remittance speed, and BAM's instant-transfer merchant payments (earlier note) could do the same. If remittance becomes near-instant everywhere, a reconciliation-only tool loses urgency, though fee and shortfall auditing would remain.
- **eGrow looks like the most aggressive incumbent.** It filled the results of roughly two-thirds of my Morocco COD queries with 2026 blog posts, a sign of heavy SEO investment. Its actual traction (stores, revenue, funding) is unknown.

### Gaps
- No MAD subscription prices for eGrow, Yanmo, Cashod, CodFlow.ma, Tifawt, MarocFlow, Micro COD Manager, EcomTracker or YouCan Confirm. Only CodSolver (MAD 49/month, earlier note) and YouCan Ship's shipping rates have figures.
- I could not verify whether eGrow or any Moroccan tool imports courier remittance statements (CSV or PDF) and flags discrepancies, or only syncs order statuses.
- No carrier documentation was retrieved on seller-portal APIs or remittance-report formats for Sendit, Ozon Express, Cathedis, Ameex or Speedaf.
- No traction figures (customers, revenue, funding) for eGrow, Yanmo, Cashod, EcomTracker or Awsel.
- No documented case of a courier withholding or losing COD funds, which would quantify the reconciliation pain.

## 2. AI and automated order confirmation in Darija (WhatsApp bots, voice bots): names, pricing, traction

### Takeaway
This is the **most crowded** of the four gaps. On WhatsApp, at least four products claim Darija AI or automated COD confirmation: Babliy, eGrow, Yanmo and CodVerify. On voice, the players are CallSphere, AtlasAI, Sawt IA (Sensei Prod) and Confirmation-Maroc (MAD 5 per confirmation, earlier note). Darija language models (Atlas-Chat) and Darija speech-recognition work are public. Prices are mostly undisclosed, and no independent data exists on traction or on Darija accuracy.

### Cited Findings
**WhatsApp text/voice-note agents**
- **Babliy**: "AI sales agent on your WhatsApp number" that answers in Darija, French and Arabic, recommends from the catalog, confirms orders and keeps everything in one dashboard. It offers free setup in under 5 minutes. The builder mentions a "Growth" tier, so paid plans exist, but no prices were found. The builder also claims it handles Darija voice notes and mixed French/Arabic messages (self-reported) — [Product Hunt](https://www.producthunt.com/p/babliy); [hunted.space](https://hunted.space/product/babliy)
- **eGrow** describes a WhatsApp AI agent that handles confirmations, FAQs and address changes and answers Darija queries. It connects to Shopify, WooCommerce and YouCan for order status (vendor) — [eGrow AI replies](https://www.egrow.com/en/blog/ai-replies-arabic-french-english-cod-2026); [eGrow multilingual agent](https://www.egrow.com/en/blog/ai-agent-multilingual-arabic-french-2026); [eGrow AI agent (AR)](https://www.egrow.com/ar/business-ai-agent)
- eGrow claims automation lifts confirmation rates "from a typical 50–60% to over 85–90%", and that OTP verification by WhatsApp or SMS reduces returns "often by 15–25%". Both are vendor claims with no methodology — [eGrow confirmation rate](https://www.egrow.com/en/blog/how-to-increase-cod-confirmation-rate-morocco-2026); [eGrow confirmation scripts](https://www.egrow.com/en/blog/cod-confirmation-call-scripts-automation-2026); [eGrow WhatsApp API](https://www.egrow.com/en/blog/whatsapp-business-api-boost-cod-sales-morocco-2026)
- **Yanmo**: WhatsApp inbox, chatbot flows, status-triggered messages and voice notes for Moroccan COD (described by competitor eGrow) — [eGrow vs Yanmo](https://www.egrow.com/en/egrow-vs-yanmo)
- **CodVerify** (Shopify): confirms COD orders by WhatsApp, SMS or automated call before shipping, scores risk by purchase frequency and address quality, and exempts trusted customers. It is not Morocco-specific — [Shopify](https://apps.shopify.com/codverify-1?locale=fr)
- Generic WhatsApp AI sales tools start at USD 27/month (DM Champ) and USD 79/month (Respond.io) — [DMChamp review 2026](https://dmchamp.com/best/best-whatsapp-ai-chatbots-2026/)

**Voice bots**
- **CallSphere** markets a voice and chat agent that calls each new COD order to confirm the item, address and delivery window in Darija, French or English. It claims an unconfirmed COD order can cost about 3x its value. The company is US/international, and these are vendor claims — [CallSphere](https://callsphere.ai/blog/smb-morocco-retail-ecommerce-ai-agent)
- **AtlasAI** (atlasai.ma) markets voice agents for Darija, French and Modern Standard Arabic. It claims ">95% accuracy" and a 40% average reduction in telephony costs (self-reported) — [AtlasAI blog](https://atlasai.ma/en/blog/ia-vocale-darija-francais-avenir-telephonie/)
- **Sawt IA** (by Moroccan startup Sensei Prod) is a voice assistant for businesses handling Darija and French, launched at the startup's 10th anniversary in Casablanca. No pricing found — [Le Matin](https://lematin.ma/economie/sawt-ia-lassistant-vocal-marocain-en-darija-et-ia/316133)
- **Confirmation-Maroc** (automated voice, MAD 5 per confirmed call) and **MyLeadDone** (human calls, MAD 10 per delivered order), from the earlier note — [Confirmation-Maroc](https://confirmation-maroc.com/); [MyLeadDone](https://www.myleaddone.com/blog/how-to-confirm-cod-orders-morocco/)
- "DarijaBot" is only a startup-idea write-up, not a product — [TurboStarter](https://www.turbostarter.dev/ideas/ai/darijabot)

**Enabling technology (lowers barriers to entry)**
- **Atlas-Chat** is a Darija-speaking LLM, presented by its creators in Oct 2024 — [TelQuel, 2024](https://telquel.ma/2024/10/15/atlas-chat-lia-qui-parle-darija-racontee-par-ses-createurs_1898969)
- FNH reports on Darija AI work involving Mistral. A search summary says the ministry in charge of AI announced a Darija speech-recognition model (Voxtral) that handles Arabic/French/English code-switching. I could not open the article, so treat this as unverified — [FNH](https://fnh.ma/articles/ia-darija-maroc-mistral)

### Inferences
- **Not underserved.** Unlike in 2024, a seller in 2026 can buy Darija WhatsApp confirmation from several vendors (Babliy, eGrow, Yanmo), automated voice from at least one at a published price (Confirmation-Maroc, MAD 5), and Darija voice agents from AtlasAI, Sawt IA or CallSphere. Open Darija models and Darija speech recognition keep lowering the build cost, so new entrants will keep arriving and prices will be competed down.
- What remains open is **proof of performance**: an independent benchmark of AI vs human confirmation rates and delivered-order rates in Darija. Voice-first confirmation (outbound calls) also looks thinner than WhatsApp chat. A newcomer would compete on measured delivered-order lift and per-delivered-order pricing, not on "AI in Darija" itself.
- The main cost driver of AI confirmation is not WhatsApp fees, which are cents (section 5). It is LLM, voice-minute and telephony costs, plus the human fallback for customers who do not reply.

### Gaps
- No public prices for Babliy, Yanmo, eGrow's AI agent, AtlasAI, Sawt IA or CallSphere.
- No traction data (number of merchants, orders confirmed) for any Darija confirmation vendor.
- No independent measurement of Darija speech-recognition or chat accuracy, or of AI vs human confirmation and delivery rates.
- YouCan Confirm's pricing and whether it uses AI were not found.

## 3. Shared customer blacklist or reputation network across Moroccan sellers or couriers, and constraints under Law 09-08 / CNDP

### Takeaway
I found **no shared, cross-merchant or cross-courier reputation product in Morocco**. Everything visible is internal: per-store blacklists (Shopify apps, eGrow pre-validation lists) and, per the earlier note, some couriers' internal lists. A Shopify app (CODFlow by Mahedi Tarek) shows the model exists elsewhere: it scores phone numbers against delivery and cancellation history from major couriers. Under Law 09-08, a shared file of "bad customers" would need CNDP declaration or authorization. Interconnecting files that serve different purposes needs its own authorization (Article 12). Running an undeclared file risks a fine of MAD 10,000–100,000. This remains the **most genuinely unserved** of the four gaps, but it carries the highest legal risk.

### Cited Findings
- No source described a blacklist shared between Moroccan e-merchants. The search found only per-store tools and generic advice — [YouCan blog on ghost customers](https://youcan.shop/en/help/blog/oder-confirmation); [eGrow logistics](https://www.egrow.com/en/blog/ecommerce-logistics-morocco-optimize-cod-2026)
- **COD Blacklist** (Shopify app) blocks customers by phone or email and hides COD for them. The list is internal to each store — [Shopify](https://apps.shopify.com/cod-blacklist?locale=fr)
- eGrow's pre-validation flow includes detecting multiple orders from the same IP, a stock check and a **customer blacklist**, with flagged orders routed to an agent. The list is per merchant (vendor) — [eGrow confirmation scripts](https://www.egrow.com/en/blog/cod-confirmation-call-scripts-automation-2026)
- **International analog:** the free Shopify app "CODFlow" (developer Mahedi Tarek) checks a customer's phone number against real delivery and cancellation history from major couriers and assigns a risk level. The snippet did not name the target country or couriers — [Shopify](https://apps.shopify.com/codflow-2)
- Earlier note: one guide says some Moroccan delivery agencies offer blacklists shared between their own merchants. No neutral network exists — [Swiftlog](https://www.swiftlog.ma/blog/cod-maroc-reduire-taux-refus-livraison-2026)
- Search found no Moroccan tool for looking up a phone number's refusal history. The suggested workaround is to ask your courier or keep an internal list — [eGrow COD fraud](https://www.egrow.com/en/blog/how-to-handle-cod-fraud-2026)

**Legal constraints (Law 09-08 / CNDP)**
- Creating a personal-data file without the required declaration or authorization, or continuing processing after authorization is withdrawn, is reportedly punishable by a fine of **MAD 10,000–100,000**. Any change of purpose requires prior CNDP authorization — [Médias24, 2023](https://medias24.com/2023/07/01/donnees-personnelles-ce-que-prevoit-la-loi-en-cas-de-violations/)
- A CNDP deliberation states that **interconnecting files whose main purposes differ** requires a separate authorization request under **Article 12 of Law 09-08** — [CNDP deliberation 32-2015](https://www.cndp.ma/wp-content/uploads/2023/01/deliberation-n-32-2015-13-02-2015.pdf)
- The CNDP is stepping up inspections and reminding companies of their notification and authorization duties — [Hespress FR](https://fr.hespress.com/425645-protection-des-donnees-personnelles-la-cndp-intensifie-son-programme-de-controle.html)
- The CNDP published a model authorization-request template in Nov 2025 for a specific "control" context. It shows the CNDP is actively formalizing authorization regimes, though not specifically for blacklists — [CNDP deliberation D-943-2025](https://www.cndp.ma/wp-content/uploads/2025/12/Deliberation-N%C2%B0D-943-2025-du-28112025-relative-au-modele-type-de-demande-dautorisation-pour-le-traitement-des-donnees-a-caractere-personnel-recueillis-dans-le-cadre-du-controle.pdf)

### Inferences
- **Strongly underserved, but for a reason.** No neutral network exists, and the likely blockers are legal and coordination problems, not technology:
  - **Legal:** a shared "refuser" list pools data across controllers for a new purpose, which is the case that needs CNDP authorization.
  - **Coordination:** couriers, who hold the best refusal data, have little incentive to share it with rivals.
- A defensible design would probably need:
  - CNDP authorization obtained up front;
  - hashed phone numbers, with only a risk score or bucket returned, not raw history;
  - notice to customers in seller terms;
  - a dispute and correction process.
  Partnering with one or two couriers, or with YouCan (which sees cross-merchant delivery outcomes through YouCan Ship), would solve the data cold start. YouCan is also the player best placed to launch this itself, which is a competitive threat.
- The legal points above are not legal advice. A Moroccan data-protection lawyer would need to confirm whether a risk score counts as a "blacklist" under CNDP practice.

### Gaps
- I did not find CNDP doctrine on "listes noires" or on fraud-prevention files specifically, in commercial or e-commerce settings. A CNDP position on bank-incident or telecom-fraud files would be the closest precedent but was not retrieved.
- I could not verify which Moroccan couriers keep internal refusal lists, or whether they expose them to merchants.
- I could not check whether YouCan or a courier uses cross-merchant delivery history in risk scoring.
- The target market of the "CODFlow" Shopify app is unconfirmed.

## 4. Meta and TikTok ad costs for Moroccan COD sellers, and the number of active COD sellers

### Takeaway
Morocco is a cheap ad market. Vendor and editorial estimates put Meta CPM at USD 2–5 and CPC at USD 0.15–0.40 (USD 0.23 in an April 2026 vendor article), and TikTok CPM at USD 1.5–4. No source gives a Moroccan cost per purchase or cost per delivered order. Active COD sellers can be counted only indirectly: about 4,500–5,200 live YouCan stores in Morocco through 2025 (StoreLeads), against Shopify's 3,900–5,600 and WooCommerce's larger base (earlier note). Social-only sellers are uncounted. I found no estimates from couriers or trainers.

### Cited Findings
**Ad costs**
- Meta in Morocco: average CPM "USD 2–5", CPC "USD 0.15–0.40" (eGrow, vendor, unsourced) — [eGrow Facebook ads COD Morocco](https://www.egrow.com/en/blog/facebook-ads-cod-business-morocco-2026)
- "Morocco: USD 0.23 CPC — one of the cheapest markets globally" (eGrow, April 2026, unsourced) — [eGrow Facebook ads MENA](https://www.egrow.com/en/blog/facebook-ads-cod-products-mena)
- Global benchmark for comparison: average Facebook CPM USD 16.06 and CPC USD 0.87 in Nov 2025 — [Shopify](https://shopify.com/blog/facebook-ads-cost). Average cost per action of USD 18.68 (range 7.85–55.21) — [Neal Schaffer](https://nealschaffer.com/facebook-ads-cost/). Statista has country-level CPM data (Feb 2025), but it is paywalled — [Statista](https://statista.com/statistics/829495/cpm-facebook-countries)
- TikTok CPM for "Morocco / Tunisia: USD 1.5–4" (editorial estimate). The same source says TikTok CPM is 30–50% cheaper than Meta in most markets. The search summary did not say which of two Kolonell guides contained it — [Kolonell TikTok SME guide](https://kolonell.com/fr/blog/tiktok-ads-pme-guide-roi-2026); [Kolonell TikTok Senegal](https://kolonell.com/fr/blog/tiktok-ads-senegal-creator-marketplace-2026)
- Global TikTok benchmarks for 2025: CPM USD 4.20–9.00, CPC USD 0.17–1.00, campaign minimums of USD 500 total and USD 50/day — [Darkroom](https://www.darkroomagency.com/obs-new/how-much-does-tiktok-advertising-cost-in-2025)
- A headline reports 20% VAT applied to Moroccan TikTok Ads advertisers. The article body was not retrieved — [Hespress FR](https://fr.hespress.com/485171-tiktok-ads-une-tva-de-20-appliquee-aux-annonceurs-marocains.html)
- Connect Ads signed an exclusive TikTok partnership in Morocco (headline; date unknown) — [Hespress FR](https://fr.hespress.com/165472-connect-ads-signe-un-accord-de-partenariat-exclusif-avec-tiktok-au-maroc.html)
- eGrow's MENA report gives Morocco's COD share as 85% (vendor) — [eGrow State of COD MENA 2026](https://www.egrow.com/en/blog/state-of-cod-in-mena-2026)

**Seller counts**
- StoreLeads counted **5,089 live YouCan stores in Morocco** (updated 19 Dec 2025). Its quarterly series for 2025 reads 4,509 (Q1), 5,163 (Q2), 4,723 (Q3) and 5,089 (Q4) — [StoreLeads YouCan MA](https://storeleads.app/reports/youcan/MA/top-stores)
- AfterShip counts 4.85K YouCan stores, about 19% of Moroccan platform stores — [AfterShip](https://www.aftership.com/ecommerce/statistics/regions/ma)
- YouCan's January 2024 event drew 4,500+ participants, and the company honored 120+ top sellers. These are participation figures, not merchant counts — [YouCan event](https://youcan.shop/en/help/blog/youcan-event)
- Earlier note: Storeino claims 70,000+ merchants but has about 270 tracked live stores; Jumia Morocco has 5,000+ sellers — see `ecommerce_segment.md`.

### Inferences
- At USD 0.15–0.40 per click, ad cost per lead is low by global standards. Funnel losses (35–50 delivered orders per 100 leads, earlier note) roughly double or triple the effective ad cost per *delivered* order. That makes delivered-order attribution (section 1) more valuable than raw ad metrics.
- A rough addressable base for a paid COD SaaS: about 5,000 YouCan stores, about 4,000–5,600 Shopify stores, plus a share of WooCommerce stores, Lightfunnels/Storeino users and affiliate-network sellers. That suggests **low tens of thousands** of storefront sellers, not hundreds of thousands. This is an inference from tracker data; social-only sellers are additional and uncounted.
- YouCan's global live-store count fell about 22% year-on-year by Q4 2025, which may indicate churn or consolidation among small COD sellers. A small, shrinking base limits subscription-SaaS revenue unless pricing is per order.

### Gaps
- No Moroccan cost per purchase, cost per lead or cost per delivered order from a non-vendor source.
- No Morocco-specific Meta CPM from Meta or Statista (paywalled).
- No seller-count estimates from couriers (e.g., Sendit or Ozon merchant counts) or COD trainers or communities.
- No count of social-only (Instagram, TikTok, WhatsApp) sellers.

## 5. WhatsApp Business API pricing for Morocco after Meta's 2025 pricing change

### Takeaway
Since 1 July 2025, Meta charges **per delivered template message**. The rate depends on the template category (marketing, utility, authentication) and the recipient's country code. Free-form (service) messages are free inside an open 24-hour customer-service window, and so are utility templates sent inside that window. Third-party rate cards put Morocco near the "Rest of Africa" tier: about **USD 0.023–0.028 per marketing message** and about **USD 0.005 per utility or authentication message**. Meta has flagged Morocco for **higher utility and authentication rates**, with the new rates announced by 1 September 2026. A COD confirmation therefore costs well under MAD 0.1 in Meta fees, and nothing if the customer messaged first.

### Cited Findings
- From 1 July 2025, Meta charges per message, only for delivered template messages. Rates vary by template category and the recipient's country calling code. Non-template messages are free but can only be sent inside an open customer-service window. Utility templates delivered inside that window are free. Volume-tier discounts apply to utility and authentication — [Meta pricing docs](https://developers.facebook.com/docs/whatsapp/pricing); [Meta pricing (new docs)](https://developers.facebook.com/documentation/business-messaging/whatsapp/pricing)
- Meta's pricing page says Morocco is slated for **higher utility and authentication rates** and a new "authentication-international" rate. The new rates are to be announced "no later than September 1, 2026". The snippet gave no figures — [Meta pricing (new docs)](https://developers.facebook.com/documentation/business-messaging/whatsapp/pricing)
- A Salesforce rate card (MM Lite, effective 1 May 2026) lists **MA Morocco: Marketing 27.78, Utility 4.94, Authentication 4.94, Service 0**. The unit was not visible in the snippet — [Salesforce rate card May 2026](https://www.salesforce.com/en-us/wp-content/uploads/sites/4/WhatsApp-Business-Messaging-Rate-Card-MM-Lite-May-1-2026.pdf). An earlier card, Aug 2025, also exists — [Salesforce rate card Aug 2025](https://www.salesforce.com/en-us/wp-content/uploads/sites/4/assets/pdf/WhatsApp_Business-Messaging-Rate-Card-Aug-1-2025.pdf)
- "Rest of Africa" tier per Gallabox: marketing USD 0.0259, utility USD 0.0046, authentication USD 0.0046 — [Gallabox rate card](https://docs.gallabox.com/pricing-and-billing/whatsapp-pricing/rate-card.md). A third-party 2026 guide puts Rest of Africa marketing at about USD 0.0225, the "lowest-cost African tier" — [BSG 2026 guide](https://bsg.world/blog/guides/whatsapp-api-pricing-in-2026-what-it-costs-how-to-optimize). An older Edna table (before Oct 2025) lists marketing at 0.03 and utility/authentication at 0.01 (outdated) — [Edna](https://edna.io/?p=16752)
- Marketing messages range from about USD 0.013 (Turkey, India) to over USD 0.18 (Netherlands) — [Whautomate](https://whautomate.com/whatsapp-business-api-pricing)

### Inferences
- The Salesforce Morocco figures (27.78 / 4.94) are most plausibly **USD per 1,000 messages**. That would be about USD 0.028 per marketing message and USD 0.0049 per utility message, consistent with the Rest of Africa figures (0.0259 / 0.0046) plus a small markup. This is my interpretation; the unit is unconfirmed.
- At about USD 0.005 per utility template, and roughly MAD 9–10 per USD (approximate rate, not sourced here), a WhatsApp confirmation costs **about MAD 0.05 in Meta fees**. That is roughly 100–200x cheaper than human confirmation at MAD 5–10 per order (earlier note). When the customer starts the chat, for example through click-to-WhatsApp ads, it is free inside the 24-hour window. Messaging cost is therefore not a barrier to entry, and it does not protect incumbents either.
- The planned increase in Morocco's utility and authentication rates (announced by Sept 2026) could change unit economics at the margin, mainly for OTP-heavy flows. The new figures were not retrieved.

### Gaps
- Meta's own Morocco line items, current and post-Sept-2026, were not visible in snippets, and the Salesforce card's unit is unconfirmed.
- Meta's country-to-tier mapping for Morocco (Rest of Africa vs Morocco's own line) is not confirmed.
- BSP markups charged by Moroccan resellers (e.g., eGrow as a Meta Business Partner) were not found.

## 6. Adversarial verdict: which of the four COD problems are truly unsolved?

### Takeaway
Overall verdict: **partly served.** The earlier note ranked reconciliation and profit analytics as gaps with "no dedicated player". The evidence now shows active, if mostly small and unproven, competition on three of the four problems. The table summarizes the verdict for each.

| Problem | Status | Evidence of incumbents | What remains open |
|---|---|---|---|
| Multi-courier COD payout reconciliation | **Partly served** | YouCan Ship (aggregator, 24-hour payout); eGrow (60–80+ carriers, remittance positioning); Awsel (multi-carrier Shopify); Damane Cash and ORA Cash (fast remittance rails, ORA funded with USD 7.5M) | Statement-level payout auditing for sellers with direct multi-courier contracts; no Moroccan proof found |
| True profit per delivered order | **Partly served** | EcomTracker (MENA COD profit dashboard); eGrow and Tifawt calculators; Financify, TrackProfit, Kaarobar (generic COD) | Deep Moroccan courier-status and remittance ingestion combined with ad spend; none proven publicly |
| Shared bad-customer reputation network | **Strongly underserved** | None found in Morocco; only per-store and per-courier lists | Neutral cross-merchant scoring, blocked by CNDP authorization and data cold start; YouCan and couriers best placed to do it |
| AI order confirmation in Darija (WhatsApp/voice) | **Well served / crowded** | Babliy, eGrow, Yanmo, CodVerify (WhatsApp); Confirmation-Maroc (MAD 5), AtlasAI, Sawt IA, CallSphere (voice); open Darija models | Independently proven delivered-order lift; voice-first outbound at scale |

### Cited Findings
- Reconciliation and aggregation incumbents — [YouCan Ship](https://ship.youcan.shop/); [eGrow COD management tool](https://www.egrow.com/en/cod-management-tool); [Awsel](https://apps.shopify.com/awsel); [FNH on Damane Cash](https://www.fnh.ma/article/actualites-marocaines/damane-cash-express-relais); [Boursenews on ORA](https://boursenews.ma/article/marches/ora-technologies-levee-de-fonds-serie-a)
- Profit-analytics incumbents — [EcomTracker](https://www.producthunt.com/products/ecomtracker/makers); [Financify](https://apps.shopify.com/financify); [Kaarobar](https://apps.shopify.com/kaarobar?locale=ja)
- No shared reputation network found — [COD Blacklist (per-store)](https://apps.shopify.com/cod-blacklist?locale=fr); [CNDP deliberation 32-2015](https://www.cndp.ma/wp-content/uploads/2023/01/deliberation-n-32-2015-13-02-2015.pdf)
- Darija confirmation incumbents — [Babliy](https://www.producthunt.com/p/babliy); [AtlasAI](https://atlasai.ma/en/blog/ia-vocale-darija-francais-avenir-telephonie/); [Sawt IA](https://lematin.ma/economie/sawt-ia-lassistant-vocal-marocain-en-darija-et-ia/316133); [CallSphere](https://callsphere.ai/blog/smb-morocco-retail-ecommerce-ai-agent)

### Inferences
- **No strong, funded incumbent dominates any single gap.** The visible players are small SaaS companies and Shopify apps with undisclosed traction. eGrow is the most visible and is bundling all four (inbox, AI, carriers, profit). YouCan is the structural incumbent: it owns the store, Confirm, Ship and Pay, and could add profit analytics or reputation scoring at any time.
- The **defensible** opportunity has narrowed to data network effects: a CNDP-compliant cross-merchant refusal score, and possibly courier performance and payout benchmarks. Standalone features (Darija AI confirmation, profit dashboards, multi-courier booking) are being commoditized.
- **Biggest risk:** YouCan or a large courier launches a native reputation score using its own cross-merchant delivery data. That would beat a third-party network on data and distribution from day one.

### Gaps
- Traction and funding are unknown for every named SaaS (eGrow, Yanmo, Cashod, Babliy, EcomTracker, Awsel, CodSolver, CodFlow.ma, Tifawt).
- No seller interviews or surveys confirm willingness to pay for reconciliation or reputation tools.
- No search was spent on large international players' presence in Morocco (e.g., Taager, Bosta, COD Network, Shiprocket-like aggregators). Their absence is **not confirmed**.
- Vendor claims could not be checked on live pages because fetches were blocked.
