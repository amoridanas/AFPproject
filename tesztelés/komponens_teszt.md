# Kijelentkezés tesztelése

**Tesztelő:** Teleki Áron  
**Tesztelés dátuma:** 2025.01.15  

| Demonstráció azonosító | Szimulációs példa                                                                                                          | Referenciaeredmény                                                                                                                                      | Valós eredmény                                                                                                                       | Visszajelzések                                           |
|------------------------|--------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------|
| JN_t001               | Kijelentkezési gombra való kattintással:                                                                                  | Az oldal sikeresen kijelentkezteti a felhasználót, közben egy üzenet jelenik meg, amely értesíti a felhasználót a sikeres kijelentkezésről.               | Az elvárásoknak megfelelően zajlott le.                                                                                             | Nem észleltem olyan jeleket, amelyek hibára utalnának.   |
| JN_t002               | Kijelentkezés után újra bejelentkezés:                                                                                    | A felhasználó újra be tud lépni, és újra eléri az oldal funkcióit.                                                                                       | Az elvárásoknak megfelelően zajlott le.                                                                                             | Nem észleltem olyan jeleket, amelyek hibára utalnának.   |
| JN_t003               | Kijelentkezés után:                                                                                                      | Bármilyen URL-t beírva, a felhasználó kijelentkezés után csak a bejelentkezési oldalt fogja látni, mivel sikeresen kijelentkezett.                        | Az elvárásoknak megfelelően zajlott le.                                                                                             | Nem észleltem olyan jeleket, amelyek hibára utalnának.   |

---

# Profilok szerkesztésének tesztelése

**Tesztelő:** Teleki Áron  
**Tesztelés dátuma:** 2025.01.15  

| Demonstráció azonosító | Szimulációs példa                                                                                          | Referenciaeredmény                                                                                     | Valós eredmény                                                   | Visszajelzések                     |
|------------------------|----------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------|------------------------------------------------------------------|------------------------------------|
| JN_t004               | A "profilom kezelése" funkció:                                                                            | A "profilom kezelése" gombra kattintva a felhasználó az adatainak megjelenítésére és módosítására szolgáló oldalra kerül. | Az elvárásoknak megfelelően zajlott le.                         | Nincs észrevétel.                  |
| JN_t005               | Létező email cím és felhasználónév ellenőrzése:                                                           | Ha a felhasználó által megadott név vagy e-mail már szerepel az adatbázisban, értesítést kap a hibáról. | Az elvárásoknak megfelelően zajlott le.                         | Nincs észrevétel.                  |
| JN_t006               | Jelszó hitelesítés:                                                                                       | A jelszónak legalább 8 karakter hosszúnak kell lennie, számot, kis- és nagybetűt tartalmaznia.         | Az elvárásoknak megfelelően zajlott le.                         | Nincs észrevétel.                  |
| JN_t007               | Sikeres módosítás:                                                                                       | Ha nincs probléma, a módosítás sikeresen el lesz mentve, és a felhasználó értesítést kap.              | Az elvárásoknak megfelelően zajlott le.                         | Nincs észrevétel.                  |

---

# Bejelentkezés és regisztráció tesztelése

**Tesztelő:** Teleki Áron  
**Tesztelés dátuma:** 2025.01.15  

| Demonstráció azonosító | Szimulációs példa                                                                                | Referenciaeredmény                                                                              | Valós eredmény                                                   | Visszajelzések                     |
|------------------------|------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------|------------------------------------------------------------------|------------------------------------|
| JN_t008               | Bejelentkezés mezők kitöltése nélkül:                                                           | Az oldal jelzi, hogy nem kapott bemenetet.                                                    | Az elvárásoknak megfelelően zajlott le.                         | Szükséges javítás.                 |
| JN_t009               | Regisztráció adatok megadása nélkül:                                                            | A rendszer figyelmeztet, hogy minden adat megadása kötelező.                                   | Az elvárásoknak megfelelően zajlott le.                         | Javítani szükséges.                |
| JN_t010               | Bejelentkezés hibás adatokkal:                                                                 | Hibás adatok esetén a rendszer nem engedi a belépést, és hibaüzenetet ad.                     | Az elvárásoknak megfelelően zajlott le.                         | Nem észleltem hibára utaló jeleket. |
| JN_t011               | Regisztráció jelszó erősségének ellenőrzése:                                                   | 8 karakternél kisebb jelszót vagy nagybetűt/számot nem tartalmazó jelszót a rendszer nem fogad. | Az elvárásoknak megfelelően zajlott le.                         | Nem észleltem hibára utaló jeleket. |
| JN_t012               | Sikeres bejelentkezés:                                                                         | Sikeres bejelentkezés után a felhasználó a főoldalra kerül, ahol elérheti a tananyagokat.      | Az elvárásoknak megfelelően zajlott le.                         | Nem észleltem hibára utaló jeleket. |



