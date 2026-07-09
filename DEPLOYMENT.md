# DEPLOYMENT.md — Deployment och miljö

## Mål

Utveckling ska ske lokalt. Kod ska versionshanteras i GitHub. Deployment ska först ske till staging och därefter till live efter granskning.

## Miljöer

### Lokal miljö

Rekommenderat:

1. LocalWP
2. Docker
3. Laragon
4. XAMPP

LocalWP är förstahandsval eftersom det är enkelt, stabilt och WordPress-anpassat.

### Staging

Staging ska vara en kopia av live så långt det är praktiskt möjligt, men utan att riskera riktig kunddata.

Staging används för:

- pluginaktivering
- adminflöden
- portaltest
- behörighetstest
- dokumenttest
- responsiv design
- regressionstest före live

### Live

Live uppdateras endast efter att staging är godkänd.

## GitHub

Repository ska innehålla:

- plugin-kod
- dokumentation
- taskfiler
- konfigurationsmallar

Repository ska inte innehålla:

- WordPress core
- databas
- `wp-config.php`
- uppladdningar
- privata dokument
- kunddata
- hemligheter
- loggar/cache

## Föreslaget deploymentflöde i början

1. Utveckla lokalt.
2. Commit till GitHub.
3. Pull/deploy till staging.
4. Testa på staging.
5. Godkänn.
6. Manuell deploy till live.
7. Kontrollera live.
8. Dokumentera i `TASK_LOG.md`.

## Undvik i början

- automatisk deploy direkt till live
- deploy utan backup
- deploy av databas från lokal till live
- deploy av uppladdade privata dokument via Git
- ändringar direkt i live via WordPress editor

## Backup

Innan liveuppdatering:

- backup av filer
- backup av databas
- notera pluginversion
- notera rollbackmetod

## Rollback

Minsta rollbackrutin:

1. Avaktivera plugin om fel påverkar site.
2. Återställ föregående pluginversion.
3. Återställ databas endast om tasken gjort schema-/dataändringar.
4. Dokumentera avvikelsen.

## Framtida förbättring

När stagingflödet är stabilt kan man införa:

- GitHub Actions för paketbygge
- automatisk deployment till staging
- manuell approval för live
- release-taggar
- versionsnummer
- changelog
