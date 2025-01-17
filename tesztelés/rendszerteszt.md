# Tesztelés

**Tesztelő**: Szobonya Norbert  
**Tesztelés dátuma**: 2025.01.16.

---

## Bejelentkezés / kijelentkezés tesztelése

| Teszt kód | Teszteset                                   | Elvárás                                                                                     | Eredmény                                                             | Konklúzió           |
|-----------|--------------------------------------------|--------------------------------------------------------------------------------------------|----------------------------------------------------------------------|---------------------|
| KA_01     | Bejelentkezés kitöltés nélkül              | Az oldal figyelmeztet, hogy nem töltöttük ki a mezőket                                     | A figyelmeztetés csak a hibás adatokat írja ki.                     | Javítás szükséges   |
| KA_02     | Regisztráció adatok megadása nélkül        | A rendszer felhívja a figyelmet, hogy minden adat megadása kötelező.                       | Az oldal csak arra figyelmeztet, hogy a jelszónak legalább 8 karakternek kell lennie. | Javítás szükséges   |
| KA_03     | Sikertelen regisztráció                   | Sikertelen regisztrációnál az adatbázisba nem kerül fel semmi                              | Ha nem töltöttem ki semmit, csak a jelszót, akkor fel tudtam vinni hibás adatokat is az adatbázisba. | Javítani szükséges  |
| KA_04     | Bejelentkezés hibás adatokkal             | Hibás adatok megadása esetén a belépést a rendszer megtagadja, a hibás adatok hibaüzenet megjelenítésével | Ugyanaz, mint az Elvárt eredmény szekcióban.                        | Nem találtam hibát  |
| KA_05     | Regisztrációnál használt jelszó erőssége ellenőrzése | 8 karakternél kisebb jelszó használatakor a rendszer a regisztrációt megtagadja, vagy ha nem tartalmaz nagybetűt illetve számot. | Ugyanaz, mint az Elvárt eredmény szekcióban.                        | Nem találtam hibát  |
| KA_06     | Sikeres bejelentkezés                     | Sikeres bejelentkezést követően a rendszer a főoldalra navigálja a felhasználót, és már képes lesz belépni az oldalra, megtekinteni a tananyagokat. | Ugyanaz, mint az Elvárt eredmény szekcióban.                        | Nem találtam hibát  |
| KA_07     | Bejelentkezés nélküli belépés az oldalra  | Ha nincs a felhasználó bejelentkezve, a rendszer a bejelentkezési oldalra navigálja a felhasználót, bármilyen URL-t beírva mindig a bejelentkezési oldal jelenik meg addig, amíg be nem jelentkezik. | Ugyanaz, mint az Elvárt eredmény szekcióban.                        | Nem találtam hibát  |
| KA_08     | Az admin és a sima user szétválasztása    | A rendszer megkülönbözteti a két jogosultságot                                             | Ugyanaz, mint az Elvárt eredmény szekcióban.                        | Nem találtam hibát  |

---

## Profilok szerkesztésének tesztelése

**Tesztelő**: Szobonya Norbert  
**Tesztelés dátuma**: 2025.01.16.

| Teszt kód | Teszteset                               | Elvárás                                                                                  | Eredmény                               | Konklúzió           |
|-----------|----------------------------------------|-----------------------------------------------------------------------------------------|----------------------------------------|---------------------|
| KA_09     | A profilom kezelése funkció            | A "profilom kezelése" gombra kattintva a felhasználó az adatainak (a jelszó kivételével) megjelenítésére és módosítására szolgáló oldalra lesz átirányítva. | Az elvárásoknak megfelelően zajlott le. | Nincs észrevétel    |
| KA_10     | Létező email cím és felhasználónév ellenőrzése | Ha a felhasználó által megadott felhasználónév és/vagy e-mail cím már szerepel az adatbázisban, akkor a rendszer visszautasítja a módosítást, és értesítést küld a felhasználónak. | Az elvárásoknak megfelelően zajlott le. | Nincs észrevétel    |
| KA_11     | Jelszó hitelesítés                     | A módosított jelszónak el kell érnie legalább nyolc karakter hosszúságot, és tartalmaznia kell legalább egy számot, valamint legalább egy kis- és egy nagybetűt. Ha ezek a feltételek nem teljesülnek, a módosítás nem lesz elfogadva, és az adatok nem kerülnek módosításra. | Az elvárásoknak megfelelően zajlott le. | Nincs észrevétel    |
| KA_12     | Sikeres módosítás                      | Ha nem találunk semmilyen problémát, akkor a módosítás sikeresen el lesz mentve az adatbázisban, és az új adatok azonnal érvénybe lépnek. Ezenkívül itt is értesítés történik a sikeres módosításról. | Az elvárásoknak megfelelően zajlott le. | Nincs észrevétel    |

---

## Navigálás tesztelése

**Tesztelő**: Szobonya Norbert  
**Tesztelés dátuma**: 2025.01.16.

| Teszt kód | Teszteset                | Elvárás                                                                                  | Eredmény                               | Konklúzió           |
|-----------|--------------------------|-----------------------------------------------------------------------------------------|----------------------------------------|---------------------|
| KA_13     | "Vissza" gombok kezelése | A tananyag módosításakor vagy kezelésekor lehetőség van visszalépni egy lépéssel.        | Az elvárásoknak megfelelően zajlott le. | Nem találtam hibát  |
---

## Tananyagok megjelenítése, létrehozása, módosítása és törlése

**Tesztelő**: Szobonya Norbert  
**Tesztelés dátuma**: 2025.01.16.

| Teszt kód | Teszteset                                     | Elvárás                                                                                     | Eredmény                               | Konklúzió           |
|-----------|----------------------------------------------|--------------------------------------------------------------------------------------------|----------------------------------------|---------------------|
| KA_14     | A megfelelő tananyagok megjelenítése         | A főoldalon a különböző kategóriákra való kattintáskor a megfelelő kategóriába tartozó tananyagok jelennek meg. | Elvárásoknak megfelel                  | Nincs hiba          |
| KA_15     | Az összes tananyag megjelenítése             | Az "összes tananyag" pontra kattintva megjelenik az összes tananyag kategóriától függetlenül. | Elvárásoknak megfelel                  | Nincs hiba          |
| KA_16     | Tananyag létrehozása                         | A bejelentkezett felhasználó jogosultságtól függetlenül tud tananyagot létrehozni.          | Nem felel meg az elvárásoknak          | Javítás szükséges   |
| KA_17     | Üres inputtal való tananyag létrehozás       | A rendszer kötelezi a felhasználót, hogy írjon adatokat az input mezőkbe, ennek hiányában tananyagot létrehozni nem tud. | Elvárásnak megfelel                    | Nincs hiba          |
| KA_18     | Tananyag mentése                             | Létrehozás után eltárolódik a tananyag az adatbázisban.                                     | Elvárásnak megfelel                    | Nincs hiba          |
| KA_19     | Törlés és módosítás jogosultságtól függően   | Csak admin felhasználói jogosultsággal rendelkező felhasználók tudnak törölni vagy módosítani. | Elvárásnak megfelel                    | Nincs hiba          |
| KA_20     | Tananyag törlése az oldalról és adatbázisból | Törlés esetén az adatbázisból és az oldalról is törlődik a tananyag.                        | Elvárásoknak megfelel                  | Nincs hiba          |
| KA_21     | Üzenetek megjelenítése a változásokról       | A törléssel és módosítással kapcsolatos üzenetek jelezve vannak a felhasználó számára.      | Elvárásoknak megfelel                  | Nincs hiba          |
| KA_22     | Tananyag módosítása az oldalon és adatbázisban | Módosításkor az adatbázisban és a kliens oldalon is frissülnek az adatok.                  | Elvárásoknak megfelel                  | Nincs hiba          |
| KA_23     | Módosítás hibakezelése                       | Módosításkor az adatbázisban és a kliens oldalon is frissülnek az adatok.                  | Elvárásoknak megfelel                  | Nincs hiba          |