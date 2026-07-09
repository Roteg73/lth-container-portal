# CURRENT_TASK.md

## Task 001 — Skapa stabil repo- och plugin-grund

### Status

Utförd och lokalt WordPress-verifierad 2026-07-09.

### Syfte

Skapa en minimal men professionell grund för WordPress-pluginet **LTH Container Portal** så att projektet kan utvecklas lokalt, versionshanteras och granskas stegvis.

Detta är en grundtask. Den ska inte bygga färdig kundportal.

### Bakgrund

LTH har en befintlig WordPress-webbplats. Containerportalen ska byggas ovanpå denna som ett separat plugin. Första steget är att få en säker, aktiverbar pluginstruktur på plats med tydliga filer, prefix, bas-hooks och enkel intern hälsokontroll.

### Filer som ska skapas

Skapa följande filer om de inte redan finns:

```text
plugin/lth-container-portal/lth-container-portal.php
plugin/lth-container-portal/includes/class-plugin.php
plugin/lth-container-portal/includes/class-activator.php
plugin/lth-container-portal/includes/class-deactivator.php
plugin/lth-container-portal/includes/class-assets.php
plugin/lth-container-portal/includes/helpers.php
plugin/lth-container-portal/admin/class-admin-menu.php
plugin/lth-container-portal/admin/views/status-page.php
plugin/lth-container-portal/assets/css/admin.css
plugin/lth-container-portal/assets/css/public.css
plugin/lth-container-portal/assets/js/admin.js
plugin/lth-container-portal/assets/js/public.js
plugin/lth-container-portal/README.md
```

Skapa mappar vid behov.

### Filer som får ändras

```text
README.md
TASK_LOG.md
CURRENT_TASK.md
```

Ändra inga andra filer utan tydlig anledning.

### Tekniska krav

1. Pluginets huvudfil ska innehålla korrekt WordPress plugin header.
2. Pluginet ska använda prefix `lthcp_`.
3. Pluginet ska definiera säkra konstanter, minst:
   - `LTHCP_VERSION`
   - `LTHCP_PLUGIN_FILE`
   - `LTHCP_PLUGIN_DIR`
   - `LTHCP_PLUGIN_URL`
4. Alla PHP-filer ska ha skydd mot direkt åtkomst:
   - `if (!defined('ABSPATH')) { exit; }`
5. Pluginet ska kunna aktiveras och deaktiveras utan fatal error.
6. Pluginet ska registrera en enkel adminmeny under WordPress admin, exempelvis:
   - Menynamn: `LTH Container Portal`
   - Undersida/statussida: `Status`
7. Statussidan ska visa:
   - pluginversion
   - aktiv WordPress-version
   - PHP-version
   - enkel text: “LTH Container Portal är aktivt”
8. Admin-CSS/JS ska laddas endast på pluginets admin-sida där det är rimligt.
9. Public-CSS/JS ska inte laddas globalt i onödan ännu. Om de registreras ska de inte ge fel.
10. Ingen databasstruktur ska skapas i denna task om det inte behövs för aktivering.
11. Ingen kundportal, inloggning, dokumenthantering eller kundadmin ska byggas i denna task.

### Säkerhetskrav

- Ingen kunddata.
- Inga lösenord.
- Inga API-nycklar.
- Ingen publik dokumentexponering.
- All output på adminstatussidan ska escapenas.
- Inga externa CDN-beroenden.
- Inga ändringar i WordPress core eller tema.

### Testkrav

Kör och rapportera:

1. PHP syntax check på alla skapade PHP-filer.
2. Aktivera pluginet lokalt i WordPress.
3. Kontrollera att adminmenyn visas.
4. Öppna statussidan och kontrollera att den laddar utan fatal error.
5. Deaktivera pluginet och kontrollera att WordPress inte ger fel.
6. Kontrollera att inga hemligheter eller uppladdade filer lagts i Git.

### Vad som inte ska göras

- Bygg inte låst portal.
- Bygg inte kundkonton.
- Bygg inte dokumentuppladdning.
- Bygg inte statistik.
- Bygg inte publik produktsida.
- Bygg inte konfigurator.
- Bygg inte deploy.
- Lägg inte till tunga externa paket.
- Ändra inte temat.

### Förväntad rapport efter utförd task

```markdown
## Rapport — Task 001

### Sammanfattning
...

### Skapade filer
- ...

### Ändrade filer
- ...

### Säkerhet
- ...

### Tester
- [ ] PHP syntax check
- [ ] Plugin aktiverat
- [ ] Adminmeny visas
- [ ] Statussida laddar
- [ ] Plugin deaktiverat
- [ ] Git-kontroll

### Risker/observationer
- ...

### Nästa rekommenderade steg
- ...
```

## Utföranderapport

### Sammanfattning

Task 001 är utförd. Projektet har nu en minimal WordPress-pluginstruktur för LTH Container Portal med huvudfil, bootstrap, aktivering/deaktivering, adminmeny, statusvy och grundläggande assetfiler.

### Skapade filer

- `plugin/lth-container-portal/lth-container-portal.php`
- `plugin/lth-container-portal/includes/class-plugin.php`
- `plugin/lth-container-portal/includes/class-activator.php`
- `plugin/lth-container-portal/includes/class-deactivator.php`
- `plugin/lth-container-portal/includes/class-assets.php`
- `plugin/lth-container-portal/includes/helpers.php`
- `plugin/lth-container-portal/admin/class-admin-menu.php`
- `plugin/lth-container-portal/admin/views/status-page.php`
- `plugin/lth-container-portal/assets/css/admin.css`
- `plugin/lth-container-portal/assets/css/public.css`
- `plugin/lth-container-portal/assets/js/admin.js`
- `plugin/lth-container-portal/assets/js/public.js`

### Ändrade filer

- `plugin/lth-container-portal/README.md`
- `README.md`
- `TASK_LOG.md`
- `CURRENT_TASK.md`

### Säkerhet

- Ingen kunddata, inga lösenord, inga API-nycklar och inga privata dokument har lagts till.
- Ingen databasstruktur skapas vid aktivering.
- Adminstatussidans dynamiska output escapenas.
- Public CSS/JS registreras men laddas inte globalt.

### Tester

- [x] PHP syntax check
- [x] Plugin aktiverat i riktig WordPress-installation
- [x] Adminmeny visas i riktig WordPress-installation
- [x] Statussida laddar i riktig WordPress-installation
- [x] Plugin deaktiverat i riktig WordPress-installation
- [x] Git-kontroll

Resultat:

- PHP syntax check på alla skapade PHP-filer: godkänd.
- Begränsat PHP-smoke med WordPress-stubbar för pluginladdning, hooks, aktivering, deaktivering och statusvy: godkänt.
- Git-kontroll för hemligheter/uppladdade filer: inga nya hemligheter eller uppladdade kundfiler hittade.
- Manuell lokal WordPress-verifiering via XAMPP: godkänd.
- WordPress kördes lokalt på `http://localhost/lthwp/`.
- Pluginet kopierades till `C:\xampp\htdocs\lthwp\wp-content\plugins\lth-container-portal`.
- Pluginet syntes under Tillägg, kunde aktiveras, avaktiveras och aktiveras igen.
- Adminmenyn syntes och statussidan laddade utan fel.
- Inga PHP-fel syntes i WordPress.

### Risker/observationer

- Inga kända avvikelser från Task 001 efter lokal WordPress-verifiering.

### Nästa rekommenderade steg

- Task 002: bygg en enkel publik produktsida/shortcode utan känslig information.
