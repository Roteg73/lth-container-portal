# Skill: LTH Container Portal

## Syfte

Använd denna skill när du arbetar i repositoryt för **LTH Container Portal**.

Projektet är en WordPress-baserad, låst presentations- och säljportal för LTH:s containerlösning, riktad mot industrikunder.

## När skillen ska användas

Använd denna skill för alla tasks som rör:

- WordPress-pluginet `lth-container-portal`
- publik produktsida för containerlösningen
- låst kundportal
- kundspecifik inloggning/behörighet
- skyddade dokument
- adminfunktioner för kundkonton och presentationsmaterial
- deployment/staging-flöde
- design/UX för presentationsportalen

## Primär dokumentordning

Läs i denna ordning:

1. `AGENTS.md`
2. `CURRENT_TASK.md`
3. `SYSTEM_ARCHITECTURE.md`
4. `SECURITY.md`
5. `DESIGN_GUIDE.md`
6. `ROADMAP.md`
7. relevant befintlig kod

## Projektprincip

Bygg stegvis och driftsäkert.

Varje task ska vara liten nog att granska. Du ska inte bygga kommande roadmap-funktioner om det inte uttryckligen står i aktuell task.

## Teknisk riktning

- WordPress är basplattform.
- All egen funktionalitet byggs som plugin.
- Pluginmapp: `plugin/lth-container-portal/`
- Prefix: `lthcp_`
- Säker behörighetskontroll sker server-side.
- Ingen känslig data i GitHub.
- Privata filer får inte vara nåbara via direkt publik URL.

## Rekommenderad implementation

### PHP

- Använd WordPress hooks/actions/filters.
- Använd `ABSPATH`-skydd i alla PHP-filer.
- Sanera input med WordPress-funktioner.
- Escapa output med WordPress-funktioner.
- Använd nonces i formulär.
- Använd capabilities, inte bara rollnamn.
- Använd `$wpdb->prepare()` vid databasfrågor.

### CSS/JS

- Ladda assets via `wp_enqueue_style()` och `wp_enqueue_script()`.
- Begränsa laddning till pluginets sidor där möjligt.
- JS får aldrig vara enda åtkomstkontroll.
- CSS ska stödja desktop, tablet och mobil.

### Databas

- Skapa egna tabeller först när behovet finns i task.
- Tabellnamn ska använda WordPress prefix och `lthcp_`.
- Migrationer ska vara idempotenta.
- Spara inte lösenord manuellt; använd WordPress användarsystem.
- Spara inte privata dokument i Git.

## Säkerhetscheck

Innan du rapporterar klar task, kontrollera:

- Kan en icke-inloggad användare nå låst portal?
- Kan en fel kund nå annan kunds material?
- Finns nonce på adminformulär?
- Saneras input?
- Escapas output?
- Finns direktlänk till skyddat dokument?
- Har filuppladdning typ-/storlekskontroll?
- Ligger någon hemlighet i repo?

Alla punkter är inte relevanta för varje task, men du ska aktivt bedöma dem.

## Designcheck

Kontrollera att UI-riktningen är:

- industriell
- premium
- modern
- tydlig
- responsiv
- säljbar i kundmöte
- inte texttung

## Testcheck

Minimikontroller vid kodändring:

- PHP syntax check på ändrade PHP-filer där möjligt.
- Plugin kan aktiveras utan fatal error.
- Adminsida laddar utan fatal error om den ingår.
- Publik shortcode/sida laddar utan fatal error om den ingår.
- Behörighetskontroll testad om den ingår.
- Inga uppenbara warnings/notices.

## Slutrapport

Rapporten ska vara konkret och verifierbar:

```markdown
## Rapport — Task XXX

### Sammanfattning
...

### Filer
Skapade:
- ...

Ändrade:
- ...

### Säkerhet
- ...

### Tester
- ...

### Avvikelser
- ...

### Rekommenderat nästa steg
- ...
```

## Absoluta stopp

Stoppa och rapportera om tasken kräver något av följande utan tydligt beslut:

- ändring i WordPress core
- incheckning av riktiga kunddokument
- incheckning av lösenord/hemligheter
- direkt deploy till live
- publika direktlänkar till skyddat material
- gemensamt lösenord som enda säkerhet
- större arkitekturbyte
