MySQL databáze krajů, okresů a obcí ČR
======================================

Zdroj
-----

> Český statistický úřad<br />
> Struktura území ČR od 1.1.2008 do 1.1.2012 - xls<br />
> http://www.czso.cz/csu/klasifik.nsf/i/ciselnik_obci_(cisob)


Vyhledávání podle GPS (PHP)
---------------------------

V souboru `vyhledavani-podle-gps.php` je ukázka, jak zjistit z GPS kraj, okres i obci - používá Google Geolocation API.

PSČ
---

V databázi **nejsou uvedena PSČ**. Bohužel jsme nezjistil, jak 100&nbsp;% zjistit PSČ, protože některé obce jej nemají uvedeno a patří např. pod jinou obec (poštu), takže kdyby někdo věděl jak na to a doplnil PSČ, tak by to bylo super :-)