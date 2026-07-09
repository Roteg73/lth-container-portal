# CODEX_START_PROMPT.md

Kopiera detta till Codex när repositoryt är skapat.

```text
Du arbetar i repositoryt LTH Container Portal.

Läs först:
1. AGENTS.md
2. .codex/skills/lth-container-portal/SKILL.md
3. CURRENT_TASK.md
4. SYSTEM_ARCHITECTURE.md
5. SECURITY.md
6. DESIGN_GUIDE.md

Utför endast aktuell task i CURRENT_TASK.md.

Bygg inte hela portalen. Börja med en stabil WordPress-pluginstruktur enligt Task 001.

Följ säkerhetskraven strikt:
- ingen kunddata i Git
- inga lösenord/hemligheter
- inga ändringar i WordPress core eller tema
- ingen publik exponering av skyddade dokument
- server-side behörighetskontroll när åtkomstskydd byggs

När du är klar ska du rapportera enligt rapportmallen i CURRENT_TASK.md.
```
