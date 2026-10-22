# Moroccan Regulatory and Compliance Changes That Force Software Demand (status as of 22 October 2026)

> **Research method and limits (read first).** Notes compiled 22 Oct 2026. WebFetch could not reach any site from this environment: every page fetch failed with DNS errors, including tax.gov.ma, medias24.com, vatupdate.com and lembra-conseil.com. The shared web-search budget also ran out after about 25 queries. So most findings below come from search-engine summaries of the cited pages, not full reads. Where sources conflict, both versions are shown. Status labels: **[IN FORCE]**, **[ENACTED – NOT YET APPLICABLE]**, **[LEGAL BASIS EXISTS – IMPLEMENTING DECREE PENDING]**, **[PROPOSED / DRAFT]**, **[UNVERIFIED CLAIM]**.

---

## 1. Electronic invoicing (facturation électronique) – legal basis, timeline, technical model, providers, status

### Takeaway
As of the latest dated sources (July–August 2026), e-invoicing is **not yet mandatory in practice**. The legal basis exists (Art. 145-IX of the CGI, first introduced in 2018 according to most sources). The DGI's clearance platform is built and was accepted in early 2026. But the implementing decree that sets the dates, thresholds, format and penalties was still at the Secrétariat Général du Gouvernement (SGG) and had not been published in the Bulletin Officiel. The phase dates by company size that vendors publish ("large companies from Jan 2026, mid-size from July 2026, SMEs from 2027") are **unofficial**. Auto-entrepreneurs and CPU taxpayers appear to be excluded.

### Cited Findings
**Legal basis and status**
- E-invoicing is anchored in **Article 145-IX of the CGI since 2018**. Full rollout depends on an implementing decree that had been sent to the SGG but was **not yet published as of July 2026**. The decree is expected to set the technical format, mandatory data, signature standards, phase timetable, turnover thresholds, exemptions and sanctions. The timeline "has slipped from the initial October 2024/2025/2026 roadmap", and further delay is possible until publication. **[LEGAL BASIS EXISTS – DECREE PENDING]** — [VATupdate briefing, 2 Jul 2026](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/)
- Conflict on the founding law: most sources date Art. 145-IX to the **Finance Law 2018** — [Forum for the Future](https://blog.forumforthefuture.be/fr/article/maroc-la-facturation-electronique-obligatoire-des-2026-ce-que-les-entreprises-doivent-savoir/26288); [Upsilon Consulting](https://upsilon-consulting.com/facturation-electronique-maroc-2026/). Others say it was **introduced by LF 2024** — [Inyad](https://inyad.com/blog/facture-electronique-maroc-2026). The research question's premise that it was "decided in LF 2024" is therefore contested. LF 2024 at most reaffirmed the framework.
- The CGI text requires taxpayers to have an invoicing IT system that meets technical criteria set by the administration, with real-time validation by the DGI platform before the invoice is sent to the client — [Inyad](https://inyad.com/blog/facture-electronique-maroc-2026); [Challenge](https://www.challenge.ma/facturation-electronique-les-entreprises-face-a-la-grande-bascule-320792/)
- **Exclusion:** Art. 145-XI CGI reportedly excludes **auto-entrepreneurs and taxpayers under the Contribution Professionnelle Unique (CPU)**. This was reported in search-result coverage of the [VATupdate July 2026 briefing](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/) and [Legal Plus, Art. 145 CGI](https://legalplus.ma/article-145-du-cgi-facturation-electronique/) and was not independently verified against the CGI text.
- **DGI Director General Younès Idrissi Kaitouni** spoke at the 4th "Grands Rendez-vous de Médias24" on **16 April 2026**. He confirmed a rollout planned **during 2026**. He said the platform had been "developed, tested and accepted (réceptionnée)" and that the **draft implementing decree had been sent to the SGG**. Only the decree was missing to fix the precise calendar — [Médias24, 16 Apr 2026](https://medias24.com/2026/04/16/dgi-facturation-electronique-lancement-en-preparation-les-details-avec-younes-idrissi-kaitouni-1660967/); [Médias24 (EN), 17 Apr 2026](https://medias24.com/2026/04/17/dgi-electronic-invoicing-rollout-in-preparation-details-from-younes-idrissi-kaitouni-1661609/); [Médias24, 18 Apr 2026](https://medias24.com/2026/04/18/la-facturation-electronique-expliquee-par-younes-idrissi-kaitouni-directeur-des-impots-1661379/); [Comarch](https://www.comarch.com/trade-and-services/data-management/legal-regulation-changes/morocco-confirms-2026-mandate-for-electronic-invoicing/)
- The decree had been "awaited for several years". It must pass through the Bulletin Officiel after SGG validation — [Challenge](https://www.challenge.ma/facturation-electronique-les-entreprises-face-a-la-grande-bascule-320792/)
- A consultancy analysis updated **24 August 2026** states the decree fixing the calendar and thresholds was **still not published** — [Lembra Conseil](https://lembra-conseil.com/facturation-electronique-au-maroc-guide-complet-2026/)
- I found **no source reporting publication of the decree between late August and 22 October 2026**. See Gaps.

**Technical model**
- **Clearance (CTC) model.** Each B2B invoice must be sent to the DGI platform and validated before it is sent to the client. Without validation it is not legally valid — [Médias24](https://medias24.com/2026/04/18/la-facturation-electronique-expliquee-par-younes-idrissi-kaitouni-directeur-des-impots-1661379/); [VATupdate, 2 Jul 2026](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/)
- **Format:** an electronic file in **UBL** format with a **qualified electronic signature** — [Médias24](https://medias24.com/2026/04/18/la-facturation-electronique-expliquee-par-younes-idrissi-kaitouni-directeur-des-impots-1661379/). VATupdate cites **UBL 2.1 or UN/CEFACT CII**, a qualified e-signature, and the buyer's ICE (identifiant commun de l'entreprise) — [VATupdate](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/). EDICOM headline: "une obligation dès 2026 et le format UBL retenu" — [EDICOM](https://edicomgroup.com/fr/blog/maroc-obligation-facturation-electronique)
- Conflict on signature level: Experio says qualified **or advanced** (QES/AES) and names Barid eSign as the main provider. This contradicts the Médias24/Challenge "qualified" wording and could not be confirmed — [Experio](https://experio.ma/facturation-electronique-maroc-2026-guide-conformite/)
- **Certified Service Providers (CSPs):** the DGI runs the platform first. CSPs are introduced in later phases as delegated clearing agents — [VATupdate](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/). Real-time validation "may not necessarily run through the DGI's own system", since certified partners would play this role — summarised from [Sage Maroc blog](https://www.sage.com/fr-ma/blog/facturation-electronique-maroc-2026/) / [Experio](https://experio.ma/facturation-electronique-maroc-2026-guide-conformite/). I found **no published list of accredited CSPs** as of Oct 2026.
- **Platform builder:** the DGI reportedly gave platform development to Moroccan firm **xHub** under a **MAD 6.3 million** contract awarded in **July 2024** (attributed to Médias24). A **pilot with volunteer companies** reportedly ran in **2025**. This is reported by secondary guides — [Sage Maroc](https://www.sage.com/fr-ma/blog/facturation-electronique-maroc-2026/); [Experio](https://experio.ma/facturation-electronique-maroc-2026-guide-conformite/). The original Médias24 2024 article was not seen.
- **SIMPL-TVA** is cited as the validation channel — [einvoicestudio compliance map, verified 19 May 2026](https://www.einvoicestudio.com/compliance-map/ma) (secondary).

**Timelines in circulation – all UNOFFICIAL until the decree is published**
- Phase 1, large companies: turnover **> MAD 200m** and public-sector suppliers from **1 Jan 2026**. One guide cites **1,655 large companies** — [Experio](https://experio.ma/facturation-electronique-maroc-2026-guide-conformite/); [Oasis Technocloud](https://oasistechnocloud.com/blog/facturation-electronique-maroc-2026/); [einvoice.ma](https://www.einvoice.ma/en/e-invoicing-morocco-2026-complete-guide/) **[UNVERIFIED]**
- Phase 2, mid-size: **1 July 2026**. Thresholds conflict: **MAD 10–200m** in one source, **MAD 50–200m** in another — [Crystal IT](https://crystalit.ma/en/blog/calendrier-facturation-electronique-maroc-dgi); [Lembra Conseil](https://lembra-conseil.com/facturation-electronique-au-maroc-guide-complet-2026/) **[UNVERIFIED]**
- Phase 3, SMEs/TPE (< MAD 10m), and in one source auto-entrepreneurs with turnover > MAD 500k: **Jan 2027**. Others say **2027–2028**, and very small firms after 2028 "via simplified solutions". A B2C phase after 2027 has no date — [Forum for the Future](https://blog.forumforthefuture.be/fr/article/maroc-la-facturation-electronique-obligatoire-des-2026-ce-que-les-entreprises-doivent-savoir/26288); [iHub](https://ihub.ma/en/blog/facturation-electronique-maroc-2026-guide-complet-pour-startups-entreprises/); [Orchida Tax](https://orchidatax.com/countries-compliance/morocco-e-invoicing-compliance/) **[UNVERIFIED]**. Including auto-entrepreneurs contradicts the reported Art. 145-XI exclusion.
- Upsilon puts the large-company threshold at **> MAD 50m** (early 2026) and mid-size at late 2026 to early 2027 — [Upsilon Consulting](https://upsilon-consulting.com/en/electronic-invoicing-morocco-2026/) **[UNVERIFIED; conflicts with the MAD 200m figure]**
- LaFacture.ma claims SME obligations "from September 2026", citing "décret n° 2-22-123" and "instruction n° 5678". These references could not be verified and look unreliable — [LaFacture.ma](https://lafacture.ma/blog/les-nouvelles-obligations-de-facturation-electronique-imposees-aux-pme-a-partir-de-septembre-2026)
- More cautious guides say the precise timeline "must be set by a decree that has not been published" — [Crystal IT](https://crystalit.ma/en/blog/facturation-electronique-maroc-2026); [Manageo, "ce qui est vraiment acté"](https://www.manageo.io/blog/facture-electronique-maroc-ce-qui-est-vraiment-acte/)

**Penalties (unofficial)**
- **MAD 500 per non-compliant invoice, capped at MAD 50,000/year**, plus a risk of **losing VAT deduction from 2027**. These come from secondary guides — [einvoice.ma](https://www.einvoice.ma/en/e-invoicing-morocco-2026-complete-guide/); [Experio](https://experio.ma/facturation-electronique-maroc-2026-guide-conformite/). VATupdate says sanctions are to be set in the pending decree — [VATupdate](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/). **[UNVERIFIED]**

**Cost to SMEs and readiness**
- Challenge headline: "Facturation électronique : une transition **sans coût** pour les TPME". This suggests the DGI or government is positioning a no-cost path for very small and small firms. Only the headline was seen — [Challenge](https://www.challenge.ma/facturation-electronique-une-transition-sans-cout-pour-les-tpme-319928/)
- Le360 headline: "Facturation électronique en 2026 : « La majorité des entreprises n'est pas encore prête », alerte Imad Moumin" — [Le360](https://fr.le360.ma/economie/facturation-electronique-en-2026-la-majorite-des-entreprises-nest-pas-encore-prete-alerte-imad_UZDFV7LVJFEX5BQ5HDNZEHQPJA/)

**Signature and trust-service providers (Law 43-20), relevant because invoices need qualified signatures**
- Decree **n° 2-22-687 of 16 Nov 2022**, implementing **Law 43-20** on trust services, names the **DGSSI** as national trust-services authority. Only accredited providers may issue qualified certificates — [Adala/Justice, decree text](https://adala.justice.gov.ma/api/uploads/2025/02/24/D%C3%A9cret%20%20confiance%20pour%20les%20transactions%20%C3%A9lectroniques-1740412902700.pdf)
- **AfricTrust** (Eurafric Information) says it was the first accredited PSCo issuing qualified signature and seal certificates — [Infomédiaire](https://www.infomediaire.net/?p=173680). **Damanesign** announced its accreditation in **March 2025**, saying "three now offer this service in Morocco" — [Boursenews, 12 Mar 2025](https://boursenews.ma/article/venture-capital/Damanesign-agrement-prestataire-services-confiance-qualifie). **Damane Cash** (Bank of Africa group) distributes AfricTrust qualified certificates on USB tokens — [Challenge](https://www.challenge.ma/damane-cash-et-africtrust-habilitees-a-delivrer-des-certificats-electroniques-qualifies-321626/)

**Vendors already positioned (evidence of a crowded field)**
- International: **Sage** — [Sage Maroc](https://www.sage.com/fr-ma/blog/facturation-electronique-maroc-2026/); **EDICOM** — [EDICOM](https://edicomgroup.com/fr/blog/maroc-obligation-facturation-electronique); **Comarch** — [Comarch](https://www.comarch.com/trade-and-services/data-management/legal-regulation-changes/morocco-confirms-2026-mandate-for-electronic-invoicing/); **Banqup / Unifiedpost** — [Banqup](https://www.banqup.com/fr-fr/resources/blog/e-invoicing-in-morocco-a-digital-leap-towards-tax-compliance)
- Odoo integrators: [Oasis Technocloud](https://oasistechnocloud.com/blog/facturation-electronique-b2b-maroc/); [Nelozia](https://www.nelozia.com/blog/notre-blog-3/e-facture-au-maroc-en-2026-obligations-dgi-et-comment-votre-erp-odoo-assure-votre-conformite-33)
- Local SaaS and content marketers targeting the mandate: [hisab.ma](https://hisab.ma/fr/docs/mandate-2026), [einvoice.ma](https://www.einvoice.ma/en/e-invoicing-morocco-2026-complete-guide/), [LaFacture.ma](https://lafacture.ma/blog/les-nouvelles-obligations-de-facturation-electronique-imposees-aux-pme-a-partir-de-septembre-2026), [Inyad](https://inyad.com/blog/facture-electronique-maroc-2026), [Manageo](https://www.manageo.io/blog/facture-electronique-maroc-ce-qui-est-vraiment-acte/), [Crystal IT (Crystal ERP)](https://crystalit.ma/en/blog/facturation-electronique-maroc-2026), [iHub](https://ihub.ma/en/blog/facturation-electronique-maroc-2026-guide-complet-pour-startups-entreprises/), [Factura-ma](https://factura-ma.com/blog/auto-entrepreneur-maroc-guide), [Fatoura Plus](https://fatouraplus.com/guide-auto-entrepreneur/auto-entrepreneur-maroc-guide-complet/)

### Inferences
- E-invoicing is the single largest forced-demand driver, but its **timing risk is high**. Four years of slippage (2024 → 2025 → 2026 → decree still pending) mean any business plan must survive further delay. Demand is likely to spike sharply once the decree is published in the Bulletin Officiel.
- **Micro-segment demand is weaker than vendors claim.** Auto-entrepreneurs and CPU merchants appear excluded. The DGI is also signalling a "no-cost" route for TPME, probably a free portal or entry tool. Willingness to pay will be concentrated in **mid-size and large firms** and their **ERP integrations**.
- The field is **already crowded** with dozens of Moroccan invoicing SaaS players and ERP integrators producing SEO content. Differentiation probably lies in:
  - ERP/accounting connectors: Sage, Odoo and local accounting packages.
  - UBL conversion and clearance-API middleware.
  - Qualified-signature orchestration with the few accredited PSCos.
  - **Multi-client tools for accounting firms (fiduciaires)**, which handle most SME bookkeeping.
  - Becoming an accredited CSP once accreditation opens.
- Qualified signatures come from only about three accredited PSCos (AfricTrust, Damanesign, likely Barid eSign). This could be a **bottleneck** at go-live.

### Gaps
- Whether the implementing decree was published in the Bulletin Officiel between late Aug and 22 Oct 2026. No source found, and the search budget ran out before a targeted BO search.
- The official phase thresholds and dates, the official penalty regime, and the CSP accreditation criteria and list. No primary DGI text was accessible because fetches were blocked.
- Whether the DGI will offer a free web portal for small taxpayers. Only the Challenge headline was seen.
- Whether the **PLF 2027** (draft finance law n° 60.26, adopted by the Government Council around 20–21 Oct 2026) contains e-invoicing provisions. Its fiscal detail was not yet public in the sources found.
- The number of companies in each phase. The 1,655 figure is unverified.

---

## 2. Other tax changes: LF 2026, withholding taxes, cash limits, auto-entrepreneurs, CPU, online income, SIMPL, PLF 2027

### Takeaway
The most concrete *new* compliance burden in force in 2026 is the **extension of withholding taxes (5% IS and VAT withholding) on services and rents**. It started **1 July 2026** for companies with turnover ≥ MAD 500m, banks and insurers, and widens to ≥ MAD 350m (2027) and ≥ MAD 200m (2028). Large payers need accounts-payable automation, and their SME suppliers need reconciliation. Other drivers:
- A **2% additional registration duty on untraceable cash** in real-estate and goodwill sales (from 1 July 2026).
- The tightening tax stance on **influencers and online sellers** (annual e-declaration).
- The SIMPL e-service for **VAT on digital services** by non-residents (mandatory from 11 June 2026).
- The auto-entrepreneur **MAD 80,000 single-client rule**, which has been in force since 2023.

### Cited Findings
**Finance Law 2026 (Law n° 50-25) [IN FORCE]**
- LF 2026 is Law **n° 50-25**, published 16 Dec 2025 according to one site — [Legal Plus](https://legalplus.ma/loi-de-finances-2026-maroc/). The DGI commented its tax measures in **Note circulaire n° 737 of 27 Feb 2026** — [EcoActu](https://ecoactu.ma/la-dgi-publie-une-note-circulaire-relative-aux-mesures-fiscales-de-la-lf-2026/); [PDF via L'Economiste](https://www.leconomiste.com/wp-content/uploads/2026/02/NOTE-CIRCULAIRE-DGI-LF-2026.pdf); [Le Desk](https://ledesk.ma/enclair/loi-de-finances-2026-toutes-les-mesures-fiscales-decryptees-par-la-dgi/); [Tax-news.ma synthesis note](https://tax-news.ma/note-synthetique-des-mesures-fiscales-de-la-loi-de-finances-n-50-25-pour-lannee-budgetaire-2026/)
- Legal Plus states that very small companies with profit < MAD 300,000, previously taxed at 10%, move to **20%** — [Legal Plus](https://legalplus.ma/loi-de-finances-2026-maroc/). The first search summary said no other result confirmed this. See the Inferences below for an explanation.

**Withholding at source (retenue à la source, RAS) – LF 2026 extension [IN FORCE from 1 Jul 2026 for the first tier]**
- **5% IS withholding** on service fees paid to legal entities, and **5% withholding on rents** paid to legal entities or to individuals under real/simplified net-income regimes. Both are calculated on the amount excluding VAT, credited against IS/IR, and paid within the month after payment — [Médias24, 28 Feb 2026](https://medias24.com/2026/02/28/les-explications-de-la-circulaire-de-la-dgi-sur-lextension-de-la-retenue-a-la-source-a-lis-et-a-la-tva-1635375/); [Aafir](https://www.aafir.ma/retenue-source-loyers-prestations-loi-finances-2026-maroc/); [Quantis Partners](https://quantispartners.ma/en/retenue-source-tva-is-2026/)
- **VAT withholding** has existed since LF 2024: **75%** of VAT with a valid tax-compliance certificate (attestation fiscale), **100%** without. LF 2026 extends it to certain services rendered by legal entities to banks, insurers and large companies — [Quantis Partners](https://quantispartners.ma/en/retenue-source-tva-is-2026/); [Verion](https://verion.ma/actualites/retenues-a-la-source-is-et-tva-sur-les-prestations-de-services-nouvelles-obligations-calendrier-d-application-et-mise-en-conformite)
- **Phased scope**, by turnover excluding VAT in the last closed financial year:
  - **≥ MAD 500m from 1 Jul 2026**, plus credit institutions, similar bodies and insurers/reinsurers.
  - **≥ MAD 350m from 1 Jan 2027**.
  - **≥ MAD 200m from 1 Jan 2028**.
  - Sources: [AuditCloud, 6 Jul 2026](https://auditcloud.ma/2026/07/06/retenues-source-is-ir-tva-maroc-juillet-2026/); [Quantis Partners](https://quantispartners.ma/en/retenue-source-tva-is-2026/); [Clicpaie](https://clicpaie.ma/blogs/retenue-a-la-source-tva-maroc/). One isolated source cites a MAD 50m threshold, which conflicts with the others.
- Exclusion for small operations: **≤ MAD 5,000 incl. VAT, within MAD 50,000 incl. VAT per month per supplier** — [Quantis Partners](https://quantispartners.ma/en/retenue-source-tva-is-2026/)

**Cash payments and traceability**
- **2% additional registration duty** applies **from 1 July 2026** (per a DGI communiqué relayed by consultants). It covers real-estate transfers **> MAD 300,000** and goodwill (fonds de commerce) transfers where payment is not traceable. For mixed payments, only the cash portion is taxed — [Lembra Conseil](https://lembra-conseil.com/droit-denregistrement-supplementaire-de-2/); [ImmobilierMaroc](https://immobiliermaroc.com/penalite-cash-immobilier-maroc-300000/) **[IN FORCE]**. One site says January 2026 instead, which the DGI communiqué contradicts.
- A DGI note states that cash payments **≥ MAD 20,000** are not tolerated. It applies a **6% fine** on the seller or provider under **Art. 193 CGI** and accepts transfers, card/electronic means, cheques and similar — [Finances News Hebdo](https://fnh.ma/article/actualite-economique/fisc-au-dela-de-20-000-dh-le-paiement-par-cash-n-est-plus-tolere). The date of the note was not confirmed.
- One law-firm blog claims LF 2026 requires **electronic payment for B2B transactions > MAD 20,000 from 1 Jul 2026** — [Lafrouji Avocats](https://lafroujiavocats.com/blog/loi-de-finances-2026). **[UNVERIFIED – likely conflates the existing Art. 193 cash rule; not corroborated]**
- In Feb 2025 Médias24 reported *options* under study to reduce cash: changing banknotes, and a cash ceiling of MAD 50,000 in 2026 falling to MAD 20,000 in 2028. These were **proposals**, not adopted law — [Médias24, 3 Feb 2025](https://medias24.com/2025/02/03/changement-des-billets-de-banque-plafonnement-des-paiements-en-especes-les-options-pour-eponger-davantage-le-cash/)
- Historical (2019): cheque payment was required from MAD 10,000 incl. VAT, with a 6% fine under Art. 193 — [UFE Casablanca, 2019](https://www.ufecasablanca.com/single-post/2019/02/23/entreprise-maroc-r%C3%A8glement-en-esp%C3%A8ces-le-plafonnement-risque-de-multiplier-les-impay%C3%A9s) (dated; may be superseded)

**Auto-entrepreneur regime [IN FORCE]**
- Rates: **0.5%** of turnover for commerce, industry and crafts; **1%** for services. Legal Plus says LF 2026 kept these rates but "reinforced" the single-client rule — [Legal Plus](https://legalplus.ma/loi-de-finances-2026-maroc/)
- Turnover caps are **MAD 500,000** (commerce/industry/crafts) and **MAD 200,000** (services). One source says they are unchanged since 2015 despite proposals to raise them; another presents them as LF 2026 figures (conflict) — [Chy.ma](https://chy.ma/auto-entrepreneur-maroc-guide-complet/); [Sahl Compta](https://sahlcompta.ma/blog/auto-entrepreneur-maroc-2026)
- **MAD 80,000 single-client rule (since LF 2023).** When annual service revenue from one client exceeds MAD 80,000, the excess is taxed by **30% final withholding** made by the client. The legal basis is Art. 73-II-G-8° CGI — [Lembra Conseil](https://lembra-conseil.com/auto-entrepreneur-maroc-obligations/); [hisab.ma](https://hisab.ma/fr/auto-entrepreneur-maroc)
- A zero declaration is still required when turnover is nil. Not declaring risks deregistration (radiation) — [Lembra Conseil](https://lembra-conseil.com/auto-entrepreneur-maroc-obligations/)

**Contribution Professionnelle Unique (CPU) [IN FORCE]**
- Created by LF 2021. It replaces flat-rate IR, the taxe professionnelle and the taxe de services communaux, and adds a complementary duty for health coverage (AMO) — [CNSS](https://www.cnss.ma/fr/content/c%E2%80%99est-quoi-la-contribution-professionnelle-unique-cpu). A practical CPU guide was published in Feb 2026 — [Guide pratique de la CPU (PDF via EcoActu)](https://ecoactu.ma/wp-content/uploads/2026/02/Guide-pratique-de-la-CPU.pdf)
- Eligibility caps in practitioner guides: **MAD 2m** (commerce/industry/crafts), **MAD 500k** (services) — [Création Entreprises Tanger](https://creation-entreprises.ma/blog/contribution-professionnelle-unique-cpu-maroc-guide). The IR rate is cited as 10% by one guide and 20% by CDAC (conflict) — [CDAC](https://cdac.ma/contribution-professionnelle-unique-le-dispositif-operationnel/)
- LF 2026 adds a **50% allowance** on gains from intangible goodwill elements for CPU taxpayers with no pension who permanently stop activity, **capped at MAD 1m** — [Le Desk](https://ledesk.ma/enclair/loi-de-finances-2026-toutes-les-mesures-fiscales-decryptees-par-la-dgi/)

**Influencers, e-commerce sellers and online income [IN FORCE – enforcement tightening]**
- In Parliament (coverage dated **May 2026**), Finance Minister **Nadia Fettah** said influencers, resident or not, owe income tax on all revenue. They must **declare their tax identity to the DGI and file an annual electronic declaration**. No specific social-media tax will be created — [Le360](https://fr.le360.ma/economie/le-fisc-resserre-letau-sur-les-influenceurs-et-le-commerce-en-ligne_FPNXVQV3UZGTZCGZDLPMUN54ZE/); [H24info](https://h24info.ma/economie/le-fisc-marocain-siffle-la-fin-de-la-recre-pour-les-influenceurs/)
- Sponsorship, sponsored content and affiliate income count as professional income — [Consonews](https://consonews.ma/65968.html)
- VAT thresholds conflict. Bladi cites **MAD 500,000** for advertising and e-commerce income; H24info cites MAD 500,000 for content creators and **MAD 2m for e-commerce** — [Bladi](https://www.bladi.net/maroc-influenceurs-rattrapes-impots,121294.html); [H24info](https://h24info.ma/economie/le-fisc-marocain-siffle-la-fin-de-la-recre-pour-les-influenceurs/)
- Reported enforcement: DGI units monitor social media and compare displayed lifestyles with declared income. A 2023 audit reportedly covered about 120 creators over three years — [Bladi](https://www.bladi.net/fisc-marocain-traque-influenceurs-fraudeurs,112395.html); [FNH](https://fnh.ma/article/actualite-economique/influenceurs-maroc-fin-far-west-numerique). A 30% flat tax on income from digital services rendered from abroad was reported for Jan 2025 — [FNH](https://fnh.ma/article/actualite-economique/influenceurs-maroc-fin-far-west-numerique)
- There is still no legal framework for influencer **advertising** — [Médias24, 19 Feb 2026](https://medias24.com/2026/02/19/publicite-des-influenceurs-au-maroc-un-vide-juridique-a-combler-1630524)

**SIMPL e-services**
- The DGI launched the SIMPL e-service "**Taxation on digital services**" for **non-resident providers**. Its use was **required from 11 June 2026** — [VATupdate, 29 May 2026](https://www.vatupdate.com/2026/05/29/dgi-launches-simpl-teleservice-for-vat-on-digital-services/) **[IN FORCE]**
- SIMPL-TVA is the reported e-invoice validation channel — [einvoicestudio](https://www.einvoicestudio.com/compliance-map/ma)

**PLF 2027 (draft finance law n° 60.26) [PROPOSED]**
- The Government Council adopted PLF **n° 60.26** around **20–21 October 2026**, under the head of government named in coverage as **Fatima Ezzahra El Mansouri** — [Mafrique, 21 Oct 2026](https://mafrique.ma/2026/10/21/maroc-le-projet-de-loi-de-finances-2027-adopte-par-le-conseil-de-gouvernement/); [InfoMaroc](https://www.infomaroc.net/maroc-le-projet-de-loi-de-finances-2027-recoit-laval-du-gouvernement/). The official communiqué did not detail fiscal measures — [InfoMaroc](https://www.infomaroc.net/maroc-le-projet-de-loi-de-finances-2027-recoit-laval-du-gouvernement/)
- Macro assumptions: growth **4.7%**, inflation 0.7%, deficit **3% of GDP** — [Renseignement Économique](https://renseignementeconomique.fr/projet-de-loi-de-finances-2027-le-maroc-anticipe-4-7-de-croissance-et-vise-un-deficit-reduit-a-3)
- Announced themes: FIFA World Cup 2030 tax guarantees (IS, IR, VAT), ecological transition, **modernisation of control tools**, ports (Nador West Med; continued digitisation of Tanger Med processes), and four customs axes — [Le360](https://fr.le360.ma/economie/plf-2027-les-principales-mesures-fiscales-et-douanieres-a-letude_V6MAOEE5PBGZ3F26VA76N6JNNA/); [Le Matin](https://lematin.ma/economie/plf-2027cap-sur-la-consolidation-sociale-et-rigueur-des-finances-publiques/359811)

### Inferences
- The RAS extension creates real, current demand in two places:
  - **Large payers** (banks, insurers, companies ≥ MAD 500m) must compute 5% IS and 75%/100% VAT withholding per invoice, check suppliers' tax certificates, apply the MAD 5k/50k exclusions, and remit monthly. This fits AP-automation and ERP add-ons.
  - **Their suppliers**, often SMEs, must reconcile withheld amounts against IS returns and VAT credits.

  The base widens every January through 2028, so this demand grows mechanically.
- The SME tax rate rising to 20% is most likely the end point of the multi-year IS convergence schedule launched in LF 2023. It is not a new LF 2026 measure, and no source in this pass confirmed that. It raises the value of tax-optimisation and bookkeeping tools for small companies.
- The 80k single-client rule pushes auto-entrepreneur freelancers, and the companies that hire them, to **track revenue per client** and manage the 30% withholding. Self-employed people also need quarterly declarations even at zero turnover. This suits lightweight invoicing and declaration apps for the self-employed and payer-side withholding modules. These users are reportedly *excluded* from e-invoicing.
- The 2% duty on cash in real estate pushes notaries, developers and agencies toward **payment traceability evidence**: bank-transfer proof and escrow or payment-tracking tools.
- Influencer and e-commerce enforcement creates a newly "visible" population that needs simple bookkeeping, annual e-declaration help and VAT-threshold monitoring. This is an under-served micro-segment, but the thresholds are disputed.

### Gaps
- The full list of LF 2026 measures. The VAT reform phases from LF 2024 (rate convergence to 10%/20% by 2026) could not be verified because the search budget ran out. A summary claim that LF 2026 extends **VAT reverse-charge to industrial companies** could not be tied to a specific source.
- The exact text and date of the Art. 193 cash-payment rules in 2026, and whether any new statutory cash ceiling exists. Only unverified claims were found.
- The number of registered auto-entrepreneurs and the number deregistered in 2026. No data found.
- The fiscal detail of PLF 2027 (n° 60.26), which was not yet public in the sources found. It goes to Parliament next and becomes law by 31 Dec 2026 if voted.
- Whether SIMPL e-filing and e-payment is mandatory for every taxpayer category in 2026. Not verified in this pass.

---

## 3. Social security, payroll and labour: AMO generalisation, CNSS obligations, SMIG

### Takeaway
Payroll compliance keeps changing. The minimum wage rose **+5% on 1 Jan 2026** to **MAD 17.92/hour (≈ MAD 3,422.72/month gross)**, and SMAG rose on 1 Apr 2026. AMO for non-salaried workers (TNS) covered **1.69 million principal insured** at end-2025. That scheme has a **structural deficit and a large collection gap**: CNSS is pushing for better membership and recovery, and benefits absorbed 87% of contributions due. Payroll and HR software and TNS contribution-management tools have ongoing demand. Primary CNSS/Damancom data could not be retrieved.

### Cited Findings
- **SMIG** (non-agricultural): **MAD 17.92/hour from 1 Jan 2026** (+5%, up from 17.10). That is ≈ **MAD 3,422.72 gross/month** on 191 hours, or about MAD 3,191–3,192 net. Draft decree **n° 2.25.983** was adopted on **18 Dec 2025** as the second tranche of the **29 April 2024 social-dialogue agreement**. **SMAG** is **MAD 97.44/day from 1 Apr 2026** — [Médias24, 18 Dec 2025](https://medias24.com/2025/12/18/smig-et-smag-feu-vert-du-gouvernement-pour-la-seconde-tranche-de-la-revalorisation-prevue-en-2026-1598927/); [Lembra Conseil](https://lembra-conseil.com/hausse-du-smig-et-du-smag-au-maroc/); [Aafir](https://www.aafir.ma/smig-maroc-2026-nouveau-montant-calcul-impact-paie/); [Le360](https://fr.le360.ma/economie/voici-de-combien-vont-augmenter-le-smig-et-le-smag-au-maroc-en-2026_SHYRCHOG2NET3N524YQCDMNIQE/) **[IN FORCE]**
- **AMO for non-salaried workers (TNS), CNSS:**
  - **1.69 million principal insured at end-2025** (+4% y/y). **Contributions due: MAD 36.46bn** (+9%). Benefits paid rose from MAD 29.7bn (2024) to **MAD 31.5bn (2025)**. The ratio of benefits to contributions actually **collected** is **157%**, which CNSS calls a "**déficit structurel**". **Recovery operations collected MAD 5.25bn** (vs 4.79bn a year earlier) — [Le Nouvelliste](https://www.lenouvelliste.ma/cnss-lamo-des-non-salaries-face-a-un-deficit-structurel/); [Innovant Magazine](https://www.innovantmagazine.ma/cnss-lactivite-progresse-mais-lamo-des-non-salaries-reste-sous-tension/)
  - TelQuel, 15 Oct 2026: "CNSS : les prestations AMO absorbent **87 % des cotisations dues**" — [TelQuel](https://telquel.ma/2026/10/15/cnss-les-prestations-amo-absorbent-87-des-cotisations-dues_2013254)
  - TNS were granted an amnesty on debts owed to CNSS (date not confirmed in snippet). Current contributions are paid through a **dedicated online TNS link or proximity points** — [Yabiladi](https://www.yabiladi.com/articles/details/145506/travailleurs-salaries-exemptes-creances-dues.html)
  - The CPU includes a complementary duty that funds AMO for CPU merchants — [CNSS](https://www.cnss.ma/fr/content/c%E2%80%99est-quoi-la-contribution-professionnelle-unique-cpu)
  - TNS contribution rates: guides cite 6.37% of a SMIG-indexed flat income; another cites 4.11%/2.26% (employer/employee) for salaried AMO. These are blog sources and conflict — [Humantal](https://humantal.ma/ressources/amo-assurance-maladie-obligatoire-maroc); [Clicpaie](https://clicpaie.ma/blogs/amo-maroc/)
- Payroll and HR SaaS players publishing SMIG/AMO/CNSS compliance content (competitive evidence): [Clicpaie](https://clicpaie.ma/blogs/smig-maroc/), [Humantal](https://humantal.ma/blog/smig-2026-maroc), [Aafir](https://www.aafir.ma/smig-maroc-2026-nouveau-montant-calcul-impact-paie/), [DRH.ma](https://drh.ma/smig-et-smag-2026-une-hausse-maitrisable-a-condition-de-lanticiper/)

### Inferences
- Benefits are 87% of contributions *due* but 157% of contributions *collected*. That means only about 55% of what TNS owe is actually collected, a large collection gap. CNSS's push for recovery may produce stronger enforcement or easier digital payment channels, which is an opening for **contribution-payment, reminder and wallet integrations** aimed at merchants and independents.
- SMIG increases by decree, with a 2-tranche schedule in 2025–2026, force annual payroll updates. Combined with CNSS declarations and the new withholding rules, this sustains demand for **SME payroll SaaS**. Several local players already compete, so the market is not empty.

### Gaps
- Damancom (CNSS e-declaration) rules, penalties for late or absent declarations, and any 2026 changes. Not found within the search budget.
- Number of employers declaring to CNSS. Labour-code changes in 2025–2026 that need HR software (for example, the strike law or new HR obligations). Not researched due to the budget limit.
- Whether a third SMIG tranche is planned for 2027. Not found; PLF 2027 detail is not yet public.
- Official TNS AMO contribution rates by category.

---

## 4. Data protection (Law 09-08, CNDP, reform)

### Takeaway
**Law 09-08 is still the law in force.** No replacement, GDPR-style law had been adopted as of April 2026, and none was found afterwards. Reform has been discussed for years, with the CNDP calling for stronger sanctions. Compliance-driven software demand from data protection is **moderate and enforcement-dependent**, not a hard deadline.

### Cited Findings
- No definitive text replacing 09-08 had been adopted as of **April 2026**. Law 09-08 remains in force and the CNDP actively applies it. A reform toward GDPR alignment (legal bases, accountability, sanctions) has been discussed for years — [Agilion Quality](https://agilionquality.com/loi-09-08-maroc-guide-conformite-entreprises/); [RMG Solutions](https://rmgsolutions.ma/fr/ressources/loi-09-08-protection-donnees-maroc-guide-2026); [DataSouv](https://datasouv.ma/en/guides/conformite-cndp-maroc-2026) **[PROPOSED / under discussion]**
- Commentary on the CNDP's role and on adapting rather than copying the GDPR — [Village de la Justice](https://www.village-justice.com/articles/cadre-leadership-africain-cndp-comme-architecte-modele-marocain-gouvernance-des,55421.html); [TelQuel (sponsored), "Faire évoluer la loi 09-08"](https://telquel.ma/sponsors/legislation-faire-evoluer-la-loi-09-08-pour-mieux-nous-proteger_1904757)
- Draft law 09.26, approved Feb 2026, concerns the **press council (CNP)**, not data protection. Do not confuse the two — [Le Reporter](https://www.lereporter.ma/le-conseil-de-gouvernement-approuve-un-projet-de-loi-relatif-a-la-reorganisation-du-cnp/)
- Compliance-consultancy and tool vendors are active, for example [DataSouv](https://datasouv.ma/en/guides/conformite-cndp-maroc-2026) and [Void.ma](https://void.ma/en/guides/conformite-cndp-donnees-personnelles/)

### Inferences
- Under 09-08, businesses must declare or seek authorisation for processing with the CNDP. Practices such as CRM marketing and WhatsApp marketing need consent management. Without a new law and stronger fines, this is a **"nice-to-have" compliance feature** to bundle into CRM, marketing and e-commerce tools, not a standalone forced purchase. If a GDPR-style law passes, demand would jump: registers of processing, DPO tooling, consent and cookie management, breach notification.

### Gaps
- Bill number, parliamentary status and timetable for a 09-08 replacement. None found.
- CNDP enforcement statistics, fines, and rules specific to WhatsApp or direct marketing. Not found within budget.

---

## 5. E-commerce, consumer law and electronic signature (Law 31-08, Law 43-20)

### Takeaway
Online sellers are bound by **Law 31-08**: pre-contractual information and a 7-day withdrawal right for distance sales. An **amendment bill** adding explicit e-commerce and delivery rules is at the draft stage and was deposited at the SGG (date unclear). A parliamentary group has also proposed rules for digital commercial practices. **Law 43-20** created a trust-services regime with qualified e-signatures, which matters for e-invoicing. There is no confirmed new obligation for online sellers to register specifically as e-commerce operators. Their tax registration and declaration obligations are being enforced (see section 2).

### Cited Findings
- Law 31-08 requires full pre-contractual information (product, price, delivery costs, return conditions) and a **7-day withdrawal right** for distance purchases (Art. 36) — [Cabinet AOS](https://cabinet-aos.com/blog/business/lancer-e-commerce-maroc-obligations/); [Adala.ai](https://adala.ai/blog/protection-consommateur-maroc-loi-31-08/) **[IN FORCE]**. Law 31-08 was amended by **Law 78-20** on jurisdiction in consumer disputes — [Deryany Law Office](https://www.deryany-avocat.com/protection-consommateur-maroc_31-08_consommateur-credits-vente-retractation-demarchage-fournisseur/)
- **Draft amendment to 31-08**, prepared by the Ministry of Commerce and Industry and deposited at the SGG, would create a Higher Consultative Council for Consumption, extend delivery rules, regulate e-commerce and target dubious commercial practices — [La Vie Éco](https://www.lavieeco.com/au-royaume/les-10-changements-qui-seront-apportes-a-la-loi-sur-la-protection-du-consommateur/) **[PROPOSED; date of article unclear]**
- The **Mouvement Populaire** group filed a bill in the House of Representatives to amend 31-08 to cover digital commercial practices — [Le Matin](https://lematin.ma/nation/le-mp-veut-encadrer-le-commerce-electronique/280553) **[PROPOSED]**
- E-commerce is growing fast while legal protection remains limited — [SNRT News](https://snrtnews.com/fr/article/e-commerce-au-maroc-une-croissance-rapide-face-a-une-protection-juridique-encore-limitee); [FNH](https://fnh.ma/article/actualite-economique/protection-consommateur-maroc-cadre-juridique)
- **Law 43-20 (trust services):** implementing decree 2-22-687 of 16 Nov 2022, with the DGSSI as authority. Accredited providers include **AfricTrust**, **Damanesign** (accredited Mar 2025) and a third provider; Damane Cash distributes certificates — [Decree text](https://adala.justice.gov.ma/api/uploads/2025/02/24/D%C3%A9cret%20%20confiance%20pour%20les%20transactions%20%C3%A9lectroniques-1740412902700.pdf); [Boursenews](https://boursenews.ma/article/venture-capital/Damanesign-agrement-prestataire-services-confiance-qualifie); [Infomédiaire](https://www.infomediaire.net/?p=173680); [Challenge](https://www.challenge.ma/damane-cash-et-africtrust-habilitees-a-delivrer-des-certificats-electroniques-qualifies-321626/) **[IN FORCE]**

### Inferences
- If the 31-08 amendment passes, online sellers, including Instagram, Facebook and WhatsApp sellers, would need compliant checkout pages, terms of sale, withdrawal and return workflows and delivery tracking. This would favour **"compliance-in-a-box" storefront and COD/order-management tools**. Today the main forcing function for social sellers is **tax** (section 2), not consumer law.
- Qualified-signature demand will grow with e-invoicing. With only about three accredited PSCos, **signature-as-a-service integration** inside invoicing apps is a likely value-add.

### Gaps
- Current parliamentary status of the 31-08 amendment and the MP proposal. No 2026-dated confirmation found.
- Whether online sellers face any registration obligation beyond the RC/ICE/tax identity, such as an e-commerce registry. None found.
- The current official DGSSI list of accredited trust-service providers, and whether **Barid eSign** is accredited under 43-20. Not confirmed.

---

## 6. Sector-specific mandates (healthcare, real estate, others)

### Takeaway
The clearest sector mandate is the **CNSS electronic care sheet (feuille de soins électronique, FSE)**. Doctors' and pharmacies' software must generate and scan QR-coded e-care-sheets that integrate with CNSS. The legal basis is reported to be Law 54.23 (published 29 Jan 2026, amending AMO Law 65.00). A pilot in Kénitra was planned for late March 2026 and a national rollout for April–June 2026. As of May 2026 the system was still in final homologation, with paper and digital to run in parallel. In real estate, the **2% duty on untraceable cash** (from 1 Jul 2026) forces traceable payment documentation. I found no sourced mandates for restaurants, hospitality, transport, schools or cooperatives within the search budget.

### Cited Findings
- **FSE timeline:** pilot planned for **late March 2026 in Kénitra**, then **gradual national rollout April–June 2026**, subject to technical and regulatory validation — [Le Matin, "AMO : la Feuille de soins électronique pour mars 2026"](https://lematin.ma/nation/amo-la-feuille-de-soins-electronique-pour-mars-2026/329430). By **20 May 2026** the project was in an "advanced homologation phase" with one final technical step left — [212Assurances, 20 May 2026](https://www.212assurances.com/2026/05/20/feuille-de-soins-electronique-la-cnss-accelere-sa-transformation-digitale-et-promet-des-remboursements-plus-rapides/)
- Earlier promises slipped. One said "operational from June", another "generalisation not before 2026" — [Le Matin](https://lematin.ma/nation/cnss-la-feuille-de-soins-electronique-operationnelle-des-juin/269441); [Le Matin](https://lematin.ma/societe/la-generalisation-de-la-feuille-de-soins-electronique-pas-avant-2026/270242); [La Vérité, "Le Jour 1 de la dématérialisation approche"](https://www.laverite.ma/amo-le-jour-1-de-la-dematerialisation-approche/); [Hespress FR](https://fr.hespress.com/416605-cnss-la-feuille-de-soins-bientot-dematerialisee.html)
- **Workflow:** the doctor creates the FSE in their system, which generates a unique QR code. The pharmacist scans it and the prescribed drugs appear in the pharmacy management software. It is integrated directly with pharmacy software, without a new tool, and covers consultations and medicine purchases. Paper and digital coexist during the transition — [Le Matin, "comment fonctionne la nouvelle FSE"](https://lematin.ma/societe/cnss-comment-fonctionne-la-nouvelle-feuille-de-soins-electronique/336558)
- **Legal basis:** Law **54.23**, published **29 Jan 2026**, amends AMO Law 65.00 and explicitly governs the dematerialisation of care sheets. This comes from search-result coverage of the FSE articles above; the specific article was not isolated. **[ENACTED; rollout status unconfirmed as of Oct 2026]**
- Practitioners raised concerns about the financial impact on care providers — [Le Matin](https://lematin.ma/societe/cnss-comment-fonctionne-la-nouvelle-feuille-de-soins-electronique/336558)
- Vendors are positioning around electronic medical records (DME) for 2026 — [Sanistas](https://sanistas.com/dme-maroc-dossier-medical-electronique-2026/)
- **Real estate and goodwill:** 2% additional registration duty on untraceable cash from **1 Jul 2026** for transfers > MAD 300,000 — [Lembra Conseil](https://lembra-conseil.com/droit-denregistrement-supplementaire-de-2/)
- **Ports and customs (PLF 2027 themes):** continued digitisation of Tanger Med processes and support for Nador West Med — [Le360](https://fr.le360.ma/economie/plf-2027-les-principales-mesures-fiscales-et-douanieres-a-letude_V6MAOEE5PBGZ3F26VA76N6JNNA/)

### Inferences
- The FSE is a **hard integration mandate for clinic and pharmacy software vendors**. Every private doctor and pharmacy serving CNSS-AMO patients will need software that can issue or scan FSE QR codes and talk to CNSS. Practices still on paper or Excel would be pushed to adopt **practice-management / pharmacy-management SaaS with CNSS homologation**. The scope is large: CNSS is the main AMO manager, and the AMO generalisation and the reported CNOPS→CNSS integration under Law 54.23 widen it further. Being among the homologated vendors early is the moat.
- The 2% cash duty may raise demand from notaries, real-estate agents and developers for payment-traceability and escrow tools.

### Gaps
- Whether FSE went live nationally after May 2026, and how CNSS homologates or certifies vendor software (list of accredited software). Not found.
- How CNOPS e-claims and tiers payant work under the FSE. No source found.
- Counts of private doctors, pharmacies and clinics affected. Not retrieved.
- Mandates for restaurants and hospitality (tourist tax, classification under tourism law), transport, schools and cooperatives. **Not researched**: the search budget was exhausted before these queries.

---

## 7. Payment-related rules (Bank Al-Maghrib, card/QR acceptance, cash reduction)

### Takeaway
I found **no sourced evidence of a legal obligation for Moroccan merchants to accept card or QR payments** as of Oct 2026. The pressure toward electronic payments comes indirectly from tax rules:
- the Art. 193 CGI 6% fine on large cash payments (≥ MAD 20,000 per a DGI note);
- the 2% registration duty on untraceable cash in real estate and goodwill sales (from 1 Jul 2026);
- government options to cap cash further (MAD 50k → 20k proposed in Feb 2025, **not enacted** in the sources found).

Bank Al-Maghrib's 2026 strategy and merchant-acceptance incentives could not be researched within the search budget.

### Cited Findings
- DGI position: cash payments **≥ MAD 20,000** are not tolerated, with a **6% fine** on the seller under Art. 193 CGI. Accepted alternatives include transfers, electronic/magnetic means and cheques — [Finances News Hebdo](https://fnh.ma/article/actualite-economique/fisc-au-dela-de-20-000-dh-le-paiement-par-cash-n-est-plus-tolere)
- Options studied in Feb 2025: banknote change and cash-payment ceilings (MAD 50,000 in 2026, MAD 20,000 in 2028) — [Médias24, 3 Feb 2025](https://medias24.com/2025/02/03/changement-des-billets-de-banque-plafonnement-des-paiements-en-especes-les-options-pour-eponger-davantage-le-cash/) **[PROPOSAL, not confirmed as enacted]**
- 2% additional registration duty on cash in real estate and goodwill transfers, from 1 Jul 2026 — [Lembra Conseil](https://lembra-conseil.com/droit-denregistrement-supplementaire-de-2/) **[IN FORCE]**
- Unverified claim of mandatory electronic payment for B2B > MAD 20,000 from 1 Jul 2026 — [Lafrouji Avocats](https://lafroujiavocats.com/blog/loi-de-finances-2026) **[UNVERIFIED]**

### Inferences
- Without a merchant-acceptance mandate, payments software demand is **incentive- and tax-driven, not forced**, for small retail. For B2B, cash ceilings combined with RAS and e-invoicing push toward **traceable payments matched to invoices**: payment-reconciliation features inside invoicing and accounting tools.

### Gaps
- Bank Al-Maghrib national electronic-payment strategy (2024–2026+), merchant-acceptance incentives, interchange or MDR caps, mobile payment and QR interoperability, and any acceptance obligation. **Not researched**: search budget exhausted.
- Card/QR acceptance statistics (number of accepting merchants). Not retrieved.

---

## 8. Cross-cutting synthesis: which obligations most strongly "force" software purchases (ranking for the report writer)

### Takeaway
Ranked by strength and certainty of forced demand as of Oct 2026:
1. **Withholding-tax extension (RAS IS/VAT)**: in force since 1 Jul 2026 for large payers, widening in 2027 and 2028.
2. **E-invoicing clearance**: the largest potential demand, but still pending the decree, and micro-firms are excluded.
3. **CNSS electronic care sheet** for doctors and pharmacies: enacted, rollout in progress or slipping.
4. **Payroll changes** (SMIG +5% in 2026, CNSS/AMO).
5. **Auto-entrepreneur 80k single-client withholding** and **influencer/e-commerce tax enforcement**.
6. **2% cash-traceability duty** in real estate.
7. **Data protection and consumer law**: weak forcing until reforms pass.

### Cited Findings
Summary matrix. Every row is sourced in the sections above.

| Obligation | Status (Oct 2026) | Who is affected | Deadline | Penalty | Software gap / competition |
|---|---|---|---|---|---|
| E-invoicing clearance (Art. 145-IX CGI) | Legal basis exists; decree at SGG, unpublished as of Jul–Aug 2026 ([VATupdate](https://www.vatupdate.com/2026/07/02/briefing-document-podcast-e-invoicing-e-reporting-in-morocco/); [Lembra](https://lembra-conseil.com/facturation-electronique-au-maroc-guide-complet-2026/)) | B2B issuers, phased by size; AE and CPU reportedly excluded | "During 2026" per DGI DG ([Médias24](https://medias24.com/2026/04/16/dgi-facturation-electronique-lancement-en-preparation-les-details-avec-younes-idrissi-kaitouni-1660967/)); dates unofficial | Unofficial: MAD 500/invoice, cap MAD 50k/yr ([einvoice.ma](https://www.einvoice.ma/en/e-invoicing-morocco-2026-complete-guide/)) | Crowded: Sage, EDICOM, Comarch, Banqup, Odoo partners, many local SaaS; "no-cost" TPME path signalled ([Challenge](https://www.challenge.ma/facturation-electronique-une-transition-sans-cout-pour-les-tpme-319928/)) |
| RAS 5% IS + VAT withholding on services/rents | In force from 1 Jul 2026 (tier 1) | Payers with CA ≥ MAD 500m, banks, insurers → ≥350m (2027) → ≥200m (2028); their suppliers | 1 Jul 2026 / 1 Jan 2027 / 1 Jan 2028 ([AuditCloud](https://auditcloud.ma/2026/07/06/retenues-source-is-ir-tva-maroc-juillet-2026/)) | Standard CGI late-payment penalties (not detailed in sources) | AP automation and ERP modules; supplier-side reconciliation |
| CNSS feuille de soins électronique | Enacted (Law 54.23, reported); homologation as of May 2026 | Private doctors, pharmacies | Pilot Mar 2026, national Apr–Jun 2026 (slipping) ([Le Matin](https://lematin.ma/nation/amo-la-feuille-de-soins-electronique-pour-mars-2026/329430); [212Assurances](https://www.212assurances.com/2026/05/20/feuille-de-soins-electronique-la-cnss-accelere-sa-transformation-digitale-et-promet-des-remboursements-plus-rapides/)) | Not found | Integration with pharmacy and clinic software; homologation list unknown |
| SMIG/SMAG increase | In force | All employers | 1 Jan 2026 (SMIG); 1 Apr 2026 (SMAG) ([Médias24](https://medias24.com/2025/12/18/smig-et-smag-feu-vert-du-gouvernement-pour-la-seconde-tranche-de-la-revalorisation-prevue-en-2026-1598927/)) | Labour-code sanctions (not detailed) | Payroll SaaS (Clicpaie, Humantal, Aafir, etc.) |
| AMO TNS contributions | In force | 1.69m principal insured TNS ([Le Nouvelliste](https://www.lenouvelliste.ma/cnss-lamo-des-non-salaries-face-a-un-deficit-structurel/)) | Ongoing | Recovery actions (MAD 5.25bn recovered in 2025) | Payment/reminder tools; collection gap |
| AE 80k single-client rule | In force since LF 2023 | Service auto-entrepreneurs and their clients | Ongoing | 30% final withholding on excess ([Lembra](https://lembra-conseil.com/auto-entrepreneur-maroc-obligations/)) | Lightweight invoicing and tracking apps for the self-employed (Factura-ma, Fatoura Plus, hisab, etc.) |
| Influencer / e-commerce income declaration | In force; enforcement tightening (May 2026) | Influencers, online sellers | Annual e-declaration | IR/VAT reassessment | Simple bookkeeping and declaration tools; thresholds disputed |
| VAT on digital services (non-residents) via SIMPL | In force | Non-resident digital providers | 11 Jun 2026 ([VATupdate](https://www.vatupdate.com/2026/05/29/dgi-launches-simpl-teleservice-for-vat-on-digital-services/)) | Not found | Niche (foreign platforms) |
| 2% duty on untraceable cash (real estate/goodwill) | In force | Buyers and sellers of property > MAD 300k; goodwill transfers | 1 Jul 2026 ([Lembra](https://lembra-conseil.com/droit-denregistrement-supplementaire-de-2/)) | 2% duty on the cash portion | Payment-traceability and escrow tooling |
| Data protection 09-08 | In force; reform under discussion | All processors of personal data | No new deadline | Existing 09-08 sanctions | Low forced demand until a new law |
| Consumer law 31-08 amendment (e-commerce) | Draft / proposal | Online sellers | Unknown | Unknown | Storefront compliance features |

### Inferences
- **Best "markets itself" bets right now:**
  - **(a)** Withholding-tax computation and reconciliation modules. Already in force, with the scope widening each January to 2028.
  - **(b)** E-invoicing middleware and accountant-firm tooling, ready the day the decree is published. Expect a rush like other CTC countries, but with a crowded vendor field and a probable free DGI entry-level option.
  - **(c)** FSE-compatible clinic and pharmacy software. This is a sector where homologation creates a moat.
- **Micro-businesses** (AE, CPU merchants) are largely **outside** the strongest mandates, with e-invoicing reportedly excluding them. Demand there comes from softer drivers: the 80k-client rule, zero declarations, AMO payments and influencer tax enforcement. These buyers have low willingness to pay.
- The mandates feed into each other. E-invoicing clearance, RAS withholding, and cash ceilings with traceability duties together create demand for an **integrated invoice → payment → withholding → declaration** workflow for SMEs and their accountants. This is a better wedge than a stand-alone e-invoice generator.

### Gaps
- **Research limitations:**
  - WebFetch failed (DNS) for every site, and the shared web-search budget was exhausted after about 25 searches. Findings rely on search-engine summaries. The following were not reached: primary DGI pages, the Bulletin Officiel, CNSS/Damancom documentation, Bank Al-Maghrib publications, and Big 4 alerts (PwC/Deloitte/KPMG/EY).
  - Several secondary sources are vendor or consultancy blogs with commercial interests and inconsistent update dates.
- **Not covered:**
  - The VAT reform phases from LF 2024.
  - SIMPL mandatory e-filing and e-payment scope.
  - Tax amnesty or formalisation measures in 2024–2026.
  - Bank Al-Maghrib payments policy.
  - Tourism, restaurant, transport, school and cooperative mandates.
  - Labour-code HR obligations.
  - CNDP enforcement data.
  - The number of businesses affected in most categories (number of companies by size, auto-entrepreneur count, CPU taxpayer count).
- Follow-up research should run targeted searches on these items and, above all, check the **Bulletin Officiel for the e-invoicing decree** and the **PLF 2027 (n° 60.26) note de présentation** once it is published.
