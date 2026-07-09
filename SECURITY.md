# SECURITY.md — Säkerhetskrav

## Grundregel

Portalen får inte läcka känsligt säljmaterial, tekniska dokument eller kundspecifik information.

Säkerhet ska kontrolleras i PHP/WordPress på servern. CSS, JavaScript och dolda länkar är aldrig tillräckligt.

## Inloggning

- Använd WordPress användarsystem.
- Varje kund ska ha egen användare eller egen kopplad användargrupp.
- Använd inte ett gemensamt lösenord.
- Lösenord ska aldrig hanteras eller lagras av pluginet direkt.
- Stöd för avstängd åtkomst ska finnas.

## Behörighet

Varje skyddad vy ska kontrollera:

1. Är användaren inloggad?
2. Har användaren rätt capability?
3. Har användaren åtkomst till aktuellt kundrum?
4. Har användaren åtkomst till aktuellt dokument/innehåll?

Kontrollerna ska ske innan innehåll renderas.

## Privata dokument

WordPress uploads är normalt publikt. Privata dokument får därför inte exponeras med vanlig publik URL.

Krav:

- Direktlänkar till skyddade dokument ska inte fungera utan behörighet.
- Filhämtning ska gå via PHP-endpoint/controller.
- Endpoint ska kontrollera inloggning och kundaccess.
- Fil-ID ska inte räcka för att komma åt fel kunds material.
- Dokument bör lagras med internt slumpat filnamn.
- Originalfilnamn kan lagras som metadata och visas efter kontroll.
- Filtyper ska begränsas.
- Filstorlek ska begränsas.
- MIME-typ ska verifieras.
- Körbara filer ska nekas.

Rekommenderade filtyper i första version:

```text
pdf
ppt
pptx
doc
docx
xls
xlsx
jpg
jpeg
png
mp4
```

CAD/DWG kan läggas till senare efter separat riskbedömning.

## Adminformulär

Alla formulär som ändrar data ska ha:

- nonce
- capability check
- sanering av input
- tydlig redirect eller feedback
- skydd mot obehörig direktpostning

## Output escaping

Använd lämpliga WordPress-funktioner:

- `esc_html()`
- `esc_attr()`
- `esc_url()`
- `wp_kses_post()` endast när begränsad HTML ska tillåtas

## Databas

- Använd `$wpdb->prepare()` vid queries med variabler.
- Skapa tabeller idempotent.
- Separera kunddata per kund-ID.
- Spara inte hemligheter i options utan skydd.
- Radera inte data vid deaktivering.
- Permanent radering ska endast ske via uninstall och efter tydligt beslut.

## REST/AJAX

Om REST API eller AJAX används:

- kontrollera nonce eller autentisering
- kontrollera capability
- kontrollera kundaccess
- returnera inte mer data än nödvändigt
- undvik att avslöja om andra kunders dokument finns

## Loggning

Loggar får inte innehålla:

- lösenord
- tokens
- privata filvägar i onödan
- personuppgifter mer än nödvändigt

Framtida åtkomststatistik ska byggas med dataminimering.

## Deployment

- Ingen automatisk deploy direkt till live i början.
- Staging ska användas före live.
- Hemligheter ska ligga i miljö/server, inte GitHub.
- Backup ska tas innan liveuppdatering.

## Säkerhetscheck inför varje task

Bedöm:

- Kan oinloggad nå detta?
- Kan fel kund nå detta?
- Finns direkt URL till privat fil?
- Finns nonce?
- Saneras input?
- Escapas output?
- Finns hemligheter i repo?
- Påverkas befintlig WordPress-site negativt?
