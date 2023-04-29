	### Hortoványi Ottó INFO2 HF --- 2022/2023 Tavasz ###

Házi feladat funkcionális elvárásai
A megvalósítandó feladat egy webes alkalmazás PHP nyelven írva, a HTML, CSS technológiákat használva. Az alkalmazásnak relációs adatbázist kell használnia. A házi feladatot mindenki maga választja. Ez bármilyen téma lehet, amely megfelel a fenti követelményeknek. Például: könyvnyilvántartás, zenetár, munkaidőnyilvántartó, tanulmányi rendszer stb.


További követelmények:

•   Az adatbázis séma legalább 2 adatbázistáblából kell álljon. Mindegyik táblában legalább 3 oszlop szerepeljen, az adatbázis táblák között legalább 1 külső kulcs hivatkozás kell legyen. IGEN
•   Készüljön stíluslap az egyes oldalak egységes megjelenítésének támogatására. IGEN
•   Az alkalmazásnak legyen egységes fejléce, lábléce és menüje, amelyek minden oldalon megjelennek. A menüből legyenek elérhetők a főbb funkciók.  IGEN
•   Az alkalmazásban kell legyen mód minden adatbázisban tárolt adat kiolvasására az adatbázisból, azok megjelenítésére, új adatok bevitelére és a meglévő adatok módosítására. (Tehát nem elegendő, ha csak írni, vagy csak olvasni tudjuk az adatot, szerkeszteni is tudni kell azokat.) IGEN
•   Legyen lehetőség az adatbázistáblák közötti külső kulcs kapcsolatok megjelenítésére, szerkesztésére és törlésére. Ha például egy könyv adatbázisban könyvek és szerzők adatait tároljuk, akkor legyen lehetőség szerkeszteni, hogy melyik könyv melyik szerzőhöz tartozik és ezt a kapcsolatot tudjuk változtatni is. A szerkesztés nem azt jelenti, hogy kitöröljük a kapcsolatot, majd egy újat létrehozunk, hanem a meglévőt szerkesztjük.   IN PROGRESS
•   Fontos, hogy a felületen az adatok elérése a felhasználó számára kényelmes módon történjen. IGEN
•   A felhasználó által beírt bemenetet ellenőrizni kell mielőtt adatbázisba írjuk. SQL injection elleni védelmet biztosítani kell. Az adatmódosításkor, felvitelnél figyelni kell a hibás értékek kiszűrésére, például üresen hagyott mezők, értelmetlen értékek (szöveg beírása szám helyett stb.). Ezeket jelezni kell a felhasználónak.     IGEN
•   Legyen lehetőség az adatbázis legalább egyik táblájában keresni (pl. könyveket kilistázni címeik alapján).  IN PROGRESS


További követelmények:

•   Nem elfogadható megoldás, ha az adatokat nem lehet módosítani, csak törölni és újakat beszúrni. Az adatok módosítása azt jelenti, hogy ha például egy könyv címét meg akarjuk változtatni, akkor nem kell kitörölni a könyvet és egy újat létrehozni, hanem tudjuk módosítani a meglévő adatbázis bejegyzésben az adott oszlopot.
•   A kényelmes felhasználói felület azt jelenti, hogy ha például szerzőket és könyveket kell összerendeljünk, akkor nem egy szövegdobozban kell megadnunk a szerző és a könyv azonosítóját, hanem a megfelelő szerzőt és könyvet legördülő menüből ki tudjuk választani.


Pontozási szempontok:

Maximális pontszám: 30 pont a vizsgára, 25 pont iMSc pontként
Megajánlott 5-ös: 35 pont elérésével

A minimális funkcionális elvárásoknak megfelelő megoldás github pull requestként, videóval, időben leadva: 15 pont

Pontot érő részletek (ahol részleges megoldásért részpontszámok is adhatóak):
•   Az adatbázisban összetett kulcs használata: 5p  IGEN
•   Az adatbázisban NOT NULL constraint használata (indokolható helyen): 3p IGEN
•   Az adatbázisban auto_increment használata: 2p   IGEN
•   CSS váltás (skin cserélése) az alkalmazásból: 10p   IGEN
•   Kiválasztott CSS (vagy egyéb, megjelenésre vonatkozó beállítás) felhasználónkénti tárolása: 5p  IGEN
•   Legalább két, nem triviális reguláris kifejezés használata: 5p  ???
•   Felhasználó kezelés jelszóval (nem plain textben tárolva): 10p  IGEN
•   Kettőnél több jogosultsági kör támogatása: 5p   IGEN?
•   Esztétikus megjelenés: max. 10p IGEN?

Hibapontok:
•   Videó vagy pull request nem készült el 24 órával a leadás előtt: -5p
•   Videó hossza több, mint 5 perc: -3p
•   Videóban nincs se felirat, se hangalámondás: -3p
•   A végleges verzió nem a master (vagy main) ágon van: -3p
•   Rendezetlen forráskód: -5p