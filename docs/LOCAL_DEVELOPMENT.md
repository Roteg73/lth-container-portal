# LOCAL_DEVELOPMENT.md — Lokal utveckling

## Rekommenderat upplägg

Använd LocalWP om möjligt.

## Grundsteg

1. Skapa lokal WordPress-site.
2. Installera samma eller liknande tema som live om möjligt.
3. Klona detta repo lokalt.
4. Koppla pluginmappen till WordPress:

Exempel med manuell kopiering:

```text
repo/plugin/lth-container-portal/
→
local-site/wp-content/plugins/lth-container-portal/
```

Alternativt använd symlink om miljön stödjer det.

## Git

Jobba i feature branches vid större ändringar.

Exempel:

```bash
git checkout -b task-001-plugin-foundation
```

Commit efter fungerande test:

```bash
git add .
git commit -m "Task 001 plugin foundation"
```

## Tester lokalt

Minimikontroll:

```bash
php -l plugin/lth-container-portal/lth-container-portal.php
```

Kör även syntax check på övriga ändrade PHP-filer.

Kontrollera i WordPress:

- plugin syns i admin
- plugin kan aktiveras
- adminmeny laddar
- inga fatal errors
- plugin kan deaktiveras

## Viktigt

Lokal databas ska inte pushas till GitHub.
