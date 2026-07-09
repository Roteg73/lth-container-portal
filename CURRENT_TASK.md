# CURRENT_TASK.md

## Task 002 — Publik produktsida via shortcode

### Status

Utförd och manuellt WordPress-verifierad via XAMPP 2026-07-09.

### Syfte

Bygg en enkel, professionell publik produktsida för LTH:s containerlösning som kan visas på befintlig WordPress-webbplats via shortcode.

Sidan ska vara publik och säljande, men får inte visa känslig information, priser, tekniska ritningar, kundmaterial eller skyddade dokument.

### Shortcode

```text
[lth_container_product]
```

### Skapade filer

- `plugin/lth-container-portal/includes/class-shortcodes.php`
- `plugin/lth-container-portal/public/class-public-product.php`
- `plugin/lth-container-portal/templates/public-product.php`

### Ändrade filer

- `plugin/lth-container-portal/lth-container-portal.php`
- `plugin/lth-container-portal/includes/class-plugin.php`
- `plugin/lth-container-portal/includes/class-assets.php`
- `plugin/lth-container-portal/includes/helpers.php`
- `plugin/lth-container-portal/assets/css/public.css`
- `plugin/lth-container-portal/README.md`
- `README.md`
- `TASK_LOG.md`
- `CURRENT_TASK.md`

### Genomförande

- Shortcode-klassen registrerar `[lth_container_product]` via pluginets befintliga init-flöde.
- Renderingen sker via `templates/public-product.php`.
- Publik produktdata byggs i `public/class-public-product.php`.
- Public CSS/JS registreras av asset-klassen och laddas bara när shortcoden används eller när aktuell singular post innehåller shortcoden.
- Innehållet är publikt, övergripande och utan priser, ritningar, kunddata eller privata dokument.

### Säkerhet

- Ingen kunddata.
- Inga lösenord.
- Inga API-nycklar.
- Inga privata dokument.
- Inga uppladdade filer.
- Inga tekniska ritningar.
- Inga priser.
- Ingen databaslogik.
- Ingen admininställning.
- Ingen custom post type.
- Ingen REST API.
- Inga ändringar i WordPress core.
- Inga ändringar i tema.
- Shortcode-output escapenas i templatefilen.
- Alla nya PHP-filer har `ABSPATH`-skydd.

### Tester

- [x] PHP syntax check på alla pluginets PHP-filer
- [x] Begränsat PHP-smoke med WordPress-stubbar
- [x] Plugin aktiverat i lokal WordPress
- [x] Vanlig WordPress-sida skapad lokalt
- [x] Shortcode `[lth_container_product]` inlagd på sidan
- [x] Frontend renderar korrekt
- [x] CSS laddas på sidan med shortcode
- [ ] CSS laddas inte på vanlig sida utan shortcode
- [x] Desktop-bredd kontrollerad
- [x] Mobilvy kontrollerad
- [x] Adminstatussidan från Task 001 fungerar
- [x] Pluginet kan avaktiveras och aktiveras igen
- [x] Git-/hemlighetskontroll

### Utföranderapport

#### Sammanfattning

Task 002 är implementerad i koden. Pluginet har nu shortcoden `[lth_container_product]` som renderar en publik, responsiv produktsida för LTH:s containerlösning via templatefil.

#### Skapade filer

- `plugin/lth-container-portal/includes/class-shortcodes.php`
- `plugin/lth-container-portal/public/class-public-product.php`
- `plugin/lth-container-portal/templates/public-product.php`

#### Ändrade filer

- `plugin/lth-container-portal/lth-container-portal.php`
- `plugin/lth-container-portal/includes/class-plugin.php`
- `plugin/lth-container-portal/includes/class-assets.php`
- `plugin/lth-container-portal/includes/helpers.php`
- `plugin/lth-container-portal/assets/css/public.css`
- `plugin/lth-container-portal/README.md`
- `README.md`
- `TASK_LOG.md`
- `CURRENT_TASK.md`

#### Shortcode-namn

```text
[lth_container_product]
```

#### Hur test gjordes i lokal WordPress

Manuellt verifierat via XAMPP. Senaste pluginversionen kopierades till `C:\xampp\htdocs\lthwp\wp-content\plugins\lth-container-portal`, pluginet aktiverades och en vanlig WordPress-sida skapades med shortcoden `[lth_container_product]`.

#### Resultat frontend

Godkänd. Frontend renderade produktsidan korrekt och inga PHP-fel syntes i WordPress.

#### Resultat responsive/mobil

Godkänd. Desktopvy fungerade och mobil/responsive-läge fungerade.

#### Resultat CSS-laddning

Shortcode-sidan renderade korrekt med styling. Separat kontroll av att CSS inte laddas på vanlig sida utan shortcode är inte rapporterad som manuellt testad. Koden är byggd för att ladda `lthcp-public` endast när shortcoden används eller när aktuell singular post innehåller shortcoden.

#### PHP syntax check-resultat

Godkänd. Alla PHP-filer i `plugin/lth-container-portal` passerade `php -l`.

#### Git-/hemlighetskontroll

Godkänd. Inga nya hemligheter, uploads, databaser eller lokala miljöfiler hittades i Git-kontrollen.

#### Vad som inte gjorts

- Ingen låst portal.
- Ingen inloggning.
- Inga kundkonton.
- Ingen kundadmin.
- Ingen dokumenthantering.
- Inget filskydd.
- Ingen statistik.
- Ingen konfigurator.
- Inga databastabeller.
- Inga externa dependencies.
- Ingen deploy.
- Inga ändringar i WordPress-tema.
- Ingen programatisk sidgenerering i WordPress-databasen.

#### Risker/observationer

- Kontakt-CTA använder placeholder `#` eftersom ingen publik e-postadress finns i projektet.
- CSS-laddning på vanlig sida utan shortcode är inte rapporterad som separat manuellt testad.

#### Rekommenderad nästa task

- Task 003: baslayout och designkomponenter, om frontendresultatet godkänns.
