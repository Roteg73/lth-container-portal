# ROADMAP.md — LTH Container Portal

## Målbild

Bygga en professionell, låst digital presentations- och säljportal för LTH:s containerlösning, riktad mot industrikunder.

## Fas 1 — Grund

Mål: stabil repo- och pluginstruktur.

- Task 001: Pluginstruktur och aktivering
- Task 002: Grundläggande publik produktsida/shortcode utan känslig information
- Task 003: Baslayout och designkomponenter
- Task 004: Lokal utvecklingsrutin och smoke-check

Klart när:

- pluginet kan aktiveras/deaktiveras
- adminstatus finns
- publik enkel vy kan visas
- ingen säkerhetsrisk introducerad

## Fas 2 — Inloggning och behörighet

Mål: säker låst portal.

- Kundroll/capability
- Portalåtkomst per WordPress-användare
- Server-side skydd av portalsidor
- Enkel kundportal-startsida
- Avstängning av åtkomst

Klart när:

- oinloggad användare stoppas
- fel kund stoppas
- admin kan tilldela portalåtkomst
- inga dokument exponeras publikt

## Fas 3 — Presentationsportal

Mål: säljbar låst presentation.

- Modulära presentationssektioner
- Hero, nytta, process, tekniköversikt, bilder/video
- Kundspecifik vy
- Responsiv layout
- Premium industriell design

Klart när:

- portalen fungerar i kundmöte på dator/surfplatta/mobil
- innehållet är redigerbart eller strukturerat
- känsliga detaljer är låsta

## Fas 4 — Admin och dokument

Mål: hantera kundrum och material.

- Kundkonton
- Materialbibliotek
- Dokumentuppladdning
- Behörighet per kund/material
- Säker filhämtning via PHP-endpoint
- Avstängning och borttagning

Klart när:

- admin kan styra åtkomst
- privata filer saknar publik direktlänk
- kund ser endast sitt material

## Fas 5 — Deployment

Mål: säkert flöde från lokal utveckling till staging och live.

- GitHub som kodkälla
- Stagingmiljö
- Manuell deployment till staging
- Manuell deployment till live efter godkännande
- Rollback-rutin

Klart när:

- staging kan uppdateras från GitHub
- live uppdateras kontrollerat
- ingen kunddata deployas

## Fas 6 — Säljfunktioner

Mål: mer avancerad kunddialog.

- Öppningsstatistik
- Unika kundlänkar
- Kundrum per industrikund
- Konfigurator för containerstorlek och tillval
- Offertförfrågan
- PDF/PPT-export från samma innehåll

Klart när:

- grundportalen är stabil
- säkerheten är verifierad
- adminflödet fungerar
