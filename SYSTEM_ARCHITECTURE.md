# SYSTEM_ARCHITECTURE.md — Systemarkitektur

## Översikt

LTH Container Portal byggs som ett separat WordPress-plugin ovanpå befintlig WordPress-webbplats.

WordPress används för:

- användare
- inloggning
- adminmiljö
- publicering på befintlig webbplats
- mediahantering där det är säkert/rimligt

Pluginet ansvarar för:

- publik produktsida/shortcode
- låst kundportal
- kundspecifik behörighet
- presentationsmoduler
- adminfunktioner
- skyddad dokumenthantering
- framtida statistik och konfigurator

## Huvudprincip

Kärnfunktionalitet ska inte ligga i tema eller sidbyggare.

Temat får styra den vanliga webbplatsens utseende, men portalen ska fungera även om temat ändras, så långt det är praktiskt möjligt.

## Föreslagen pluginstruktur

```text
plugin/lth-container-portal/
├── lth-container-portal.php
├── uninstall.php
├── includes/
│   ├── class-plugin.php
│   ├── class-activator.php
│   ├── class-deactivator.php
│   ├── class-capabilities.php
│   ├── class-router.php
│   ├── class-assets.php
│   ├── class-security.php
│   └── helpers.php
├── admin/
│   ├── class-admin-menu.php
│   ├── class-customer-admin.php
│   ├── class-document-admin.php
│   ├── class-presentation-admin.php
│   └── views/
├── public/
│   ├── class-public.php
│   ├── class-product-page.php
│   ├── class-portal.php
│   └── views/
├── templates/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
└── tests/
```

Strukturen ska byggas fram stegvis. Skapa inte tomma system bara för att de finns i målbilden.

## Publik produktsida

Den publika produktsidan ska:

- kunna bäddas in på befintlig WordPress-sida
- visa övergripande information
- rikta sig mot industrikunder
- ha tydlig kontaktväg
- inte visa priser, känsliga tekniska detaljer eller privata dokument

Tekniskt kan den första versionen vara en shortcode, exempelvis:

```text
[lth_container_solution]
```

## Låst portal

Portalen ska:

- kräva inloggning
- kontrollera behörighet server-side
- visa kundspecifik presentation
- visa kundspecifikt material
- kunna stängas av per kund/användare

Teknisk riktning:

- använd WordPress användarsystem
- skapa egna capabilities
- mappa användare till kundrum
- kontrollera behörighet vid varje portalvy och varje dokumenthämtning

## Admin

Admin ska byggas stegvis:

1. Status/diagnostik
2. Portalinställningar
3. Kundkonton/åtkomst
4. Presentationsinnehåll
5. Dokumentbibliotek
6. Statistik

Admin ska inte byggas som en stor allt-i-ett-sida. Dela upp logiskt.

## Dokumenthantering

WordPress media library är publikt i normalfallet. Därför kräver privata dokument särskild hantering.

Rekommenderad riktning:

- lagra privata dokument så att rå URL inte är publik
- använd PHP-endpoint för nedladdning/visning
- kontrollera inloggning och kundbehörighet vid varje request
- använd slumpade interna filnamn
- lagra metadata separat
- logga framtida öppningar/nedladdningar

## Datamodell — framtida riktning

Möjliga egna tabeller:

```text
wp_lthcp_customers
wp_lthcp_customer_users
wp_lthcp_presentations
wp_lthcp_presentation_sections
wp_lthcp_documents
wp_lthcp_document_access
wp_lthcp_access_logs
```

Skapa inte tabeller förrän tasken kräver det.

## Roll- och behörighetsmodell

Föreslagna capabilities:

```text
lthcp_manage_portal
lthcp_manage_customers
lthcp_manage_documents
lthcp_view_portal
```

Kundaccess ska inte styras enbart med rollnamn. Använd capability + kundkoppling.

## Framtida återanvändning

Presentationsinnehåll ska på sikt kunna återanvändas till:

- webbpresentation
- PDF-export
- PowerPoint-export
- kundspecifika offertbilagor

Därför ska presentationen byggas i moduler, inte som en hårdkodad lång textsida.
