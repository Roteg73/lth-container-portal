# LTH Container Portal

Detta repository innehåller egen kod, dokumentation och arbetsinstruktioner för **LTH Container Portal**.

Målet är att bygga en professionell, låst digital presentations- och säljportal för LTH:s containerlösning ovanpå befintlig WordPress-webbplats.

## Grundprincip

- Befintlig WordPress-webbplats behålls som bas.
- Portalen byggs som ett separat WordPress-plugin.
- Egen kod versionshanteras i GitHub.
- WordPress core, databas, uppladdade filer, lösenord och kunddata ska inte versionshanteras.
- Utveckling sker lokalt först.
- Deployment sker till staging först, därefter live.

## Första tekniska mål

1. Skapa stabil pluginstruktur.
2. Säkerställ att pluginet kan aktiveras/deaktiveras utan fel.
3. Lägg grunden för roller, behörigheter och låst portal.
4. Bygg publik produktsida utan känsligt innehåll.
5. Bygg låst kundportal stegvis.

## Rekommenderad repo-struktur

```text
.
├── README.md
├── AGENTS.md
├── CURRENT_TASK.md
├── TASK_LOG.md
├── TASK_TEMPLATE.md
├── ROADMAP.md
├── SYSTEM_ARCHITECTURE.md
├── SECURITY.md
├── DEPLOYMENT.md
├── DESIGN_GUIDE.md
├── .gitignore
├── .codex/
│   └── skills/
│       └── lth-container-portal/
│           └── SKILL.md
├── docs/
│   ├── PROJECT_BRIEF.md
│   ├── LOCAL_DEVELOPMENT.md
│   ├── CODEX_WORKFLOW.md
│   └── DEFINITION_OF_DONE.md
└── plugin/
    └── lth-container-portal/
```

## Arbetsflöde

1. Läs `AGENTS.md`.
2. Läs `CURRENT_TASK.md`.
3. Utför endast aktuell task.
4. Kör tester enligt tasken.
5. Rapportera exakt vad som ändrats.
6. Vänta på granskning innan nästa task.

## Viktigt

Detta projekt ska byggas stegvis. Codex ska inte bygga hela portalen på en gång.
