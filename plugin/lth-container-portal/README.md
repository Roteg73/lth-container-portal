# LTH Container Portal Plugin

WordPress-plugin för LTH Container Portal.

## Aktuell omfattning

Task 002 ger en stabil plugingrund och en första publik produktsida via shortcode:

- WordPress plugin header
- säkra konstanter med `LTHCP_`-prefix
- aktiverings- och deaktiveringshooks
- adminmeny
- statussida
- admin-assets som bara laddas på pluginets adminsidor
- shortcode `[lth_container_product]`
- public-assets som bara laddas på sidor där shortcoden används

Pluginet innehåller ännu inte inloggning, kundportal, dokumenthantering, kundadmin, databastabeller eller skyddade dokument.

## Shortcode

Lägg följande shortcode på en vanlig WordPress-sida:

```text
[lth_container_product]
```

Shortcoden renderar en publik, säljande produktyta för LTH:s containerlösning. Den visar bara övergripande information och innehåller inga priser, kunduppgifter, tekniska ritningar eller privata dokument.

Kontaktknappen använder just nu en placeholder eftersom ingen publik e-postadress finns i projektet.

## Lokal placering

I detta repository ligger pluginet här:

```text
plugin/lth-container-portal/
```

För test i en WordPress-installation ska mappen kopieras eller länkas till:

```text
wp-content/plugins/lth-container-portal/
```
