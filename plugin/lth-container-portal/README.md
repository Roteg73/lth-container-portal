# LTH Container Portal Plugin

WordPress-plugin för LTH Container Portal.

## Aktuell omfattning

Task 001 ger endast en stabil plugingrund:

- WordPress plugin header
- säkra konstanter med `LTHCP_`-prefix
- aktiverings- och deaktiveringshooks
- adminmeny
- statussida
- admin-assets som bara laddas på pluginets adminsidor
- public-assets som registreras utan att laddas globalt

Pluginet innehåller ännu inte inloggning, kundportal, dokumenthantering, kundadmin, databastabeller eller publik produktsida.

## Lokal placering

I detta repository ligger pluginet här:

```text
plugin/lth-container-portal/
```

För test i en WordPress-installation ska mappen kopieras eller länkas till:

```text
wp-content/plugins/lth-container-portal/
```
