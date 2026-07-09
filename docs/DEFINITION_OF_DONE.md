# DEFINITION_OF_DONE.md — Definition of Done

En task är klar först när följande är sant.

## Funktion

- Kraven i `CURRENT_TASK.md` är uppfyllda.
- Inget utanför taskens omfattning har byggts utan anledning.
- Kod är tydlig och går att granska.

## Säkerhet

- Behörigheter kontrolleras server-side där relevant.
- Input saneras.
- Output escapenas.
- Nonces används för ändrande adminactions.
- Inga hemligheter i repo.
- Inga privata dokument i repo.
- Inga publika direktlänkar till skyddat material.

## WordPress

- Pluginet ger inte fatal error.
- Aktivering fungerar.
- Deaktivering fungerar.
- Adminsidor laddar.
- Assets laddas inte i onödan.
- Inga ändringar i core eller tema.

## Test

- Relevanta tester är körda.
- Testresultat rapporteras.
- Kända avvikelser dokumenteras.

## Dokumentation

- `TASK_LOG.md` uppdateras om tasken säger det.
- Viktiga beslut dokumenteras.
- Nästa steg föreslås men byggs inte.
