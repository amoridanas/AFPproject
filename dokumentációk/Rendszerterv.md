# Rendszerterv

---

## 1. A rendszer célja

Az oktatási platform célja, hogy egy könnyen használható, webalapú környezetet biztosítson oktatók és tanulók számára a tanulási folyamat támogatására.  
Az oktatók lehetőséget kapnak kurzusok létrehozására és tananyagok feltöltésére, míg a tanulók egyszerűen feliratkozhatnak ezekre a kurzusokra, és hozzáférhetnek az anyagokhoz.  
A rendszer támogatja a hatékony kommunikációt is, mivel az oktatók közleményeket küldhetnek, amelyek közvetlenül elérhetők a tanulók számára.  
Az alkalmazás továbbá információs oldalakat tartalmaz, amelyek segítik a felhasználókat az oldal használatában, valamint biztosítja az egyszerű és biztonságos belépést és kijelentkezést.

---

## 2. Projektterv

- **Scrum masters**: Teleki Áron  
- **Product owner**: Tajti Tibor  
- **Üzleti szereplő**: Tajti Tibor  

### 2.1 Projekt-szerepkörök, felelősségek

- **Frontend**: Teleki Áron, Szobonya Norbert  
- **Backend**: Teleki Áron, Szobonya Norbert  
- **Tesztelés**: Teleki Áron, Szobonya Norbert  

### 2.3 Ütemterv

| Funkciók                    | Feladat                     | Prioritás | Becslés (nap) | Aktuális becslés (nap) | Eltelt idő (nap) | Becsült idő (nap) |
|-----------------------------|-----------------------------|-----------|----------------|-------------------------|------------------|-------------------|
| Követelmény specifikáció    | Megírás                    | 1         | 1              | 1                       | 1                | 1                 |
| Funkcionális specifikáció   | Megírás                    | 1         | 1              | 1                       | 1                | 1                 |
| Rendszerterv                | Megírás                    | 1         | 1              | 1                       | 1                | 1                 |
| Program                     | Képernyőtervek előkészítése | 2         | 1              | 1                       | 1                | 1                 |
| Program                     | Prototípus elkészítése      | 3         | 8              | 8                       | 8                | 8                 |
| Program                     | Alapfunkciók elkészítése    | 3         | 8              | 8                       | 8                | 8                 |
| Program                     | Tesztelés                  | 4         | 2              | 2                       | 2                | 2                 |

### 2.4 Mérföldkövek

- Projekt megtervezése  
- Prototípus átadása  
- Kész projekt átadása  

---

## 3. Üzleti folyamatok modellje

(Tartalom itt opcionálisan hozzáadható)

---

## 4. Követelmények

### Funkcionális követelmények

| ID  | Megnevezés          | Leírás                                                                     |
|-----|---------------------|---------------------------------------------------------------------------|
| K1  | Regisztráció        | Felhasználói fiók létrehozására való opció.                              |
| K2  | Bejelentkezés       | A korábban már regisztrált felhasználók be tudjanak jelentkezni az oldalra. |
| K3  | Szerepkörök         | Felhasználók elkülönülnek jogosultságaik szerint.                        |
| K4  | Feliratkozás        | Felhasználó feliratkozhat kurzusokra.                                    |
| K5  | CRUD műveletek      | Tananyag létrehozása, törlése, szerkesztése.                             |

### Nem funkcionális követelmények

| ID  | Megnevezés         | Leírás                                                                     |
|-----|--------------------|---------------------------------------------------------------------------|
| K1  | Jogok              | Elkülönüljön az admin a felhasználótól, az elsőnek több hozzáférése legyen. |
| K2  | Átlátható felület  | Könnyen kezelhető webes felület.                                          |
| K3  | Adatbázis          | Adatbázis alkalmazása az oldal fontosabb adatainak tárolására.           |

### Támogatott eszközök

- Windows  
- Linux  
- MacOS  

---

## 5. Funkcionális terv

### 5.1 Rendszer-szereplők

- **Admin**  
  - Teljes hozzáférés a rendszerhez  
  - Felhasználó tevékenységek felügyelése  
  - Felhasználók törlése  
  - Tananyagok létrehozása, törlése  

- **Felhasználó**  
  - Tananyagok megtekintése  
  - Kurzusokra való feliratkozás  
  - Visszajelzések küldése  

### 5.2 Menü-hierarchia

- Bejelentkezés  
  - Bejelentkezés  
  - Regisztráció  
- Főoldal  
- Kapcsolat  
- Tananyag létrehozása  
- Tananyag kezelése  
- Profilom kezelése  
- Kijelentkezés  

---

## 6. Fizikai környezet

### Fejlesztő eszközök

- Xampp  
- Visual Studio Code  
- Trello  
- GitHub  
- Discord  

---

## 8. Architektúrális terv

A szerveroldali funkciókat PHP-ban (Visual Studio Code) írjuk meg.  
A Backend kommunikál a MySQL adatbázissal.  
A Frontend részén űrlaposan kezeltük az adatbázis műveleteit.  
A Webalkalmazást böngészőn keresztül lehet elérni.

- **Webszerver**: Apache (Xampp-on keresztül)  
- **Adatbázis rendszer**: MySQL (phpMyAdmin)  
- **A program elérése, kezelése**: Webszerveren (Apache)  

---

## 9. Adatbázis terv

(Tartalom itt opcionálisan hozzáadható)

---

## 10. Implementációs terv

A projektünket a következő programozási nyelveken fejlesszük: HTML, CSS, JS és PHP.  
A weboldal információinak jelentős részét MySQL adatbázisban tároljuk el.  
A könnyebb átláthatóság és kezelhetőség érdekében magyar változóneveket, mappaneveket, könyvtárneveket részesítjük előnyben.

---

## 11. Tesztterv

(Tesztesetek részletezése itt szerepel)

---

## 12. Telepítési terv

### Windows rendszeren

1. Másolja az alkalmazás fájljait a `xampp\htdocs` könyvtárba.  
2. Nyissa meg a Xampp vezérlőpultját, és indítsa el az Apache és MySQL szolgáltatásokat.  
3. Nyisson meg egy böngészőt, és írja be a címsorba: `localhost`.

### Linux rendszeren

1. Az alkalmazás fájljait a `/opt/lampp/htdocs` könyvtárba helyezze.  
2. A terminálban adja ki a következő parancsot:  
   ```bash
   sudo /opt/lampp/lampp start

### 12.3 Telepítési lépések böngészőből

1. **Weboldal tesztelése**:
   - Miután az Apache és MySQL szolgáltatások elindultak, nyisson meg egy böngészőt.
   - Írja be a `localhost` címet a böngésző címsorába.
   - Ellenőrizze, hogy az alkalmazás megfelelően működik.

2. **Adatbázis konfigurálása**:
   - Lépjen be a `phpMyAdmin` felületre a böngészőből (`localhost/phpmyadmin`).
   - Hozzon létre egy új adatbázist a projekthez (például `oktatasi_portal` néven).
   - Importálja az adatbázis struktúráját a projekt mappájában található `.sql` fájl segítségével.

3. **Felhasználói tesztelés**:
   - Hozzon létre egy tesztfelhasználót az adatbázisban.
   - Próbálja ki a regisztráció, bejelentkezés, tananyag megtekintés és egyéb funkciók működését.

4. **Hibaelhárítás**:
   - Ha a weboldal nem jelenik meg, ellenőrizze az Apache és MySQL szolgáltatásokat.
   - Nézze át az `error.log` fájlt az Apache mappájában a részletes hibainformációkért.

---

## 13. Karbantartási terv

### 13.1 Visszajelzések kezelése

1. **Visszajelzési rendszer létrehozása**:
   - Hozzon létre egy dedikált email címet a visszajelzések fogadására (például `visszajelzes@oktatportal.hu`).
   - Az email cím legyen könnyen elérhető a weboldalról.

2. **Visszajelzések kategorizálása**:
   - **Működéssel kapcsolatos visszajelzések**:
     - Hibajegyek létrehozása a hibakövető rendszerben.
     - Prioritás meghatározása a hiba súlyossága alapján.
   - **Dizájnnal kapcsolatos visszajelzések**:
     - Minden javaslatot jegyezzen fel egy külön listában.
     - Hetente értékelje a tervező csapat a javaslatokat.

3. **Kommunikáció a felhasználókkal**:
   - Automatikus visszaigazolás minden visszajelzésre.
   - Személyes válasz küldése, ha a visszajelzést feldolgozták.

### 13.2 Karbantartási ütemterv

1. **Havi rendszeres ellenőrzések**:
   - Ellenőrizze a rendszer teljesítményét és biztonságát.
   - Frissítse a szoftverkomponenseket, ha szükséges.

2. **Felhasználói visszajelzések feldolgozása**:
   - Minden hónapban értékelje a beérkezett visszajelzéseket.
   - Prioritást adjon a kritikus hibák javításának.

3. **További fejlesztések**:
   - A visszajelzések alapján tervezzen új funkciókat.
   - Tesztelje és vezesse be az új funkciókat a rendszerbe.

---

## 14. Továbbfejlesztési terv

1. **Új funkciók bevezetése**:
   - Felhasználói élmény javítása érdekében új funkciók fejlesztése (például mobilalkalmazás támogatás).
   - Oktatók és tanulók közötti kommunikáció fejlesztése.

2. **Skálázhatóság növelése**:
   - A szerverkapacitás bővítése a növekvő felhasználói bázis kiszolgálására.
   - Felhőalapú infrastruktúra bevezetése.

3. **Adatbiztonság**:
   - SSL tanúsítványok használata a biztonságos adatátvitel érdekében.
   - Rendszeres adatmentések végrehajtása.

4. **Automatizált tesztelés**:
   - Automata tesztelési rendszerek bevezetése a rendszer stabilitásának biztosítására.