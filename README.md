MySQL databáze krajů, okresů a obcí ČR
======================================

Zdroj
-----

> **Český statistický úřad**<br />
> Struktura území ČR od 1.1.2008 do 1.1.2012 - xls<br />
> http://www.czso.cz/csu/klasifik.nsf/i/ciselnik_obci_(cisob)


Vyhledávání podle GPS (PHP)
---------------------------

V souboru `vyhledavani-podle-gps.php` je ukázka, jak zjistit z GPS kraj, okres i obci - používá Google Geolocation API.

PSČ
---

Protože seznam obcí z Českého statistíckého úřadu nebsahuje všechny obce a ani PSČ, doplnil jsem databázi o další tabulku, které obsahuje všechny PSČ z databáze České pošty. Přidal jsem pouze propojení na okres a kraj.

### Zdroj

> **Česká pošta**<br />
> Seznam PSČ částí obcí a obcí bez částí (XLS)<br />
> http://www.ceskaposta.cz/cz/nastroje/dokumenty-ke-stazeni-id355/#z