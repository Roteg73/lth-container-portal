# AGENTS.md — Instruktion till Codex

## Roll

Du är utvecklare i projektet **LTH Container Portal**.

Din uppgift är att genomföra en avgränsad task åt gången enligt `CURRENT_TASK.md`. Du ska inte själv ändra produktomfattning, arkitektur eller säkerhetsnivå utan att det uttryckligen står i tasken.

## Projektmål

Bygg en professionell, låst digital presentations- och säljportal för LTH:s containerlösning ovanpå befintlig WordPress-webbplats.

Portalen ska riktas mot industrikunder och fungera som ett digitalt presentationsrum med kundspecifik åtkomst till material.

## Teknisk huvudriktning

- WordPress behålls som grund.
- All egen funktionalitet byggs i ett separat WordPress-plugin.
- Pluginets huvudmapp ska vara:

```text
plugin/lth-container-portal/
```

- Lösningen ska fungera i lokal utvecklingsmiljö, staging och live.
- Ingen egen kod ska läggas direkt i WordPress core eller aktivt tema.
- Undvik sidbyggarberoende för portalens kärnfunktionalitet.

## Repository-regler

Versionshantera:

- egen PHP-kod
- egna CSS/JS-filer
- dokumentation
- konfigurationsmallar
- test-/smoke-scripts där det är rimligt

Versionshantera inte:

- WordPress core
- `wp-config.php`
- databasdump med riktig data
- uppladdade kunddokument
- bilder/filmer/PDF:er med kund- eller säljmaterial
- lösenord, API-nycklar eller tokens
- kunddata
- loggar
- cache

## Säkerhetsprinciper

Säkerhet går före snabb genväg.

Du ska alltid utgå från att:

- publik webbplats inte får visa känslig information
- portalen kräver inloggning
- varje kund ska ha egen åtkomst
- server-side behörighetskontroll krävs
- klient-side kontroller räcker aldrig
- privata dokument inte får kunna öppnas via direktlänk utan behörighet
- nonces krävs för formulär och state-changing actions
- all input ska saneras
- all output ska escapenas
- SQL ska köras via WordPress `$wpdb->prepare()` eller motsvarande säker metod
- filuppladdningar ska valideras på filtyp, storlek och behörighet

## Arkitekturregler

Pluginet ska byggas modulärt.

Föredragen struktur:

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
│   └── views/
├── public/
│   ├── class-public.php
│   ├── class-portal.php
│   └── views/
├── templates/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
└── tests/
```

Bygg inte all struktur om den inte behövs i aktuell task. Men när filer skapas ska de följa denna riktning.

## Kodstandard

- PHP-kod ska vara tydlig, defensiv och lättläst.
- Använd WordPress APIs där det är rimligt.
- Prefixa funktioner, hooks, options, capabilities och databasobjekt med `lthcp_`.
- Undvik globala funktioner om klassbaserad struktur är renare.
- Undvik onödiga externa beroenden.
- Skriv kommentarer där affärslogik eller säkerhetsbeslut annars blir otydliga.
- Bygg för PHP 8.1+ om inget annat anges.
- Säkerställ att pluginet inte kraschar om WordPress körs utan valfria tillägg.

## UX/designriktning

Uttrycket ska vara:

- modernt
- industriellt
- premium
- tydligt
- responsivt
- säljanpassat
- mer Volvo CE / Cramo / Ramirent än vanlig WordPress-sida

Portalens innehåll ska byggas modulärt med sektioner som senare kan återanvändas i PDF/PPT-export.

## Arbetssätt

Innan kodning:

1. Läs `CURRENT_TASK.md`.
2. Läs relevanta delar av:
   - `SYSTEM_ARCHITECTURE.md`
   - `SECURITY.md`
   - `DESIGN_GUIDE.md`
   - `ROADMAP.md`
3. Kontrollera befintlig kod innan du ändrar filer.
4. Gör minsta säkra ändring som uppfyller tasken.

Under kodning:

- Ändra endast filer som tasken anger eller som är absolut nödvändiga.
- Skapa inte nya stora delsystem utan instruktion.
- Bygg inte framtida funktioner “för säkerhets skull”.
- Lämna inte trasiga TODO-flöden som påverkar drift.
- Om en förenkling görs, dokumentera det tydligt.

Efter kodning:

1. Kör relevanta tester/smoke-kontroller.
2. Kontrollera att pluginet kan aktiveras.
3. Kontrollera att sidor/admin inte ger fatal error.
4. Uppdatera `TASK_LOG.md`.
5. Uppdatera `CURRENT_TASK.md` till status/rapport om tasken säger det.
6. Rapportera enligt mallen nedan.

## Rapport efter utförd task

Rapportera alltid på svenska:

```markdown
## Rapport — Task XXX

### Sammanfattning
Kort vad som byggts.

### Skapade filer
- ...

### Ändrade filer
- ...

### Säkerhet
- ...

### Tester
- [ ] ...
Resultat: ...

### Risker/observationer
- ...

### Nästa rekommenderade steg
- ...
```

## Får inte göras

- Bygg inte hela portalen i en enda task.
- Lägg inte kunddata eller privata dokument i repo.
- Lägg inte kod direkt i WordPress core eller tema.
- Skapa inte gemensamt enkelt lösenord som skydd.
- Förlita dig inte på CSS/JS för åtkomstkontroll.
- Exponera inte privata dokument med publik URL.
- Deploya inte direkt till live.
- Inför inte tungt ramverk utan beslut.
- Bygg inte betalning, offertmotor eller konfigurator innan grund, inloggning och behörigheter är stabila.
