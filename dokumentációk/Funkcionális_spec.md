Funkcionális specifikáció
1. Jelenlegi helyzet leírása
Jelenleg nincs olyan integrált oktatási platform, amely egyszerre tenné lehetővé a kurzusok kezelését, tananyagok megosztását, valamint az oktatók és tanulók közötti hatékony kommunikációt. Az oktatási folyamatokat jelenleg különböző, nem integrált eszközökkel végzik, amelyek idő- és erőforrásigényesek.
2. Vágyálomrendszer leírása
A rendszer egy összehangolt webalapú platform, amely középpontba helyezi az oktatók és tanulók közötti interakciót. Az oktatók egyszerűen hozhatnak létre kurzusokat, feltölthetik a tananyagokat, és közleményeket oszthatnak meg. A tanulók pedig feliratkozhatnak a kurzusokra, és egy helyen elérhetik az összes kapcsolódó információt. A rendszer továbbá információs oldalakat is tartalmaz, amelyek tájékoztatják a felhasználókat az oldal használatáról.

3. Jelenlegi üzleti folyamatok modellje
A jelenlegi folyamatok manuálisak, az oktatók és tanulók különböző platformokat használnak a kommunikációra, tananyagok megosztására és a kurzusok kezelésére. Ez gyakran redundáns adatbevitelhez, információvesztéshez és hatékonyságvesztéshez vezet.
4. Igényelt üzleti folyamatok modellje
Az igényelt rendszer egyetlen platformon biztosítja a kurzusok létrehozását, tananyagok megosztását és a kommunikációt. A tanulók és oktatók egyszerűen kezelhetik a kurzusokkal kapcsolatos teendőiket, így a folyamatok gyorsabbá és hatékonyabbá válnak.


5. Követelménylista
ID
Követelmény
Prioritás
K1
Felhasználói regisztráció és bejelentkezés
Magas
K2
Kurzusok létrehozása oktatók által
Magas
K3
Tananyagok feltöltése oktatók által
Magas
K4
Tanulók kurzusokra való feliratkozása
Magas
K5
Közlemények megjelenítése kurzusokhoz
Közepes
K6
Információs oldalak elérhetővé tétele
Alacsony
K7
Felhasználói adatok kezelése
Közepes
K8
Kijelentkezés funkció
Magas

---

## 6. Használati esetek

### 6.1 Felhasználó
- Regisztráció
- Bejelentkezés
- Kurzusokra való feliratkozás
- Tananyagok megtekintése
- Közlemények olvasása
- Kijelentkezés

### 6.2 Admin (oktató)
- Kurzusok létrehozása
- Tananyagok feltöltése
- Közlemények közzététele
- Kurzusok és tananyagok kezelése

---

## 7. Megfeleltetés

| Lefedett használati eset | Követelmény                  | Követelmény azonosító(k) |
|--------------------------|-----------------------------|--------------------------|
| Regisztráció             | Felhasználói regisztráció   | K1                       |
| Bejelentkezés            | Bejelentkezés funkció       | K1                       |
| Kurzusok kezelése        | Kurzusok létrehozása        | K2                       |
| Tananyagok feltöltése    | Tananyagok kezelése         | K3                       |
| Kijelentkezés            | Kijelentkezés funkció       | K8                       |

---

## 8. Forgatókönyvek

### Bejelentkezés
A felhasználó megadja az email címét és jelszavát, majd a "Bejelentkezés" gombra kattint. Ha az adatok helyesek, a rendszer belépteti őt a főoldalra.

### Regisztráció
A felhasználó kitölti a regisztrációs űrlapot, megadja az email címét, jelszavát és kiválasztja a szerepkört (oktató vagy tanuló). Sikeres regisztráció után a rendszer visszairányítja a bejelentkezési oldalra.

### Kezdőlap
Bejelentkezés után a felhasználó a főoldalon éri el a menüsort, ahol a funkciók elérhetők (kurzusok, tananyagok, információs oldalak).

### Felhasználói adatok kezelése
A felhasználó megtekintheti és frissítheti a saját profilját.

---

## 9. Funkciók követelmény megfeleltetése

| ID  | Követelmény                              | Funkció                          |
|-----|------------------------------------------|-----------------------------------|
| K1  | Felhasználói regisztráció és bejelentkezés | Regisztráció és bejelentkezés    |
| K2  | Kurzusok létrehozása oktatók által       | Kurzusok kezelése                |
| K3  | Tananyagok feltöltése oktatók által      | Tananyagok feltöltése            |
| K4  | Tanulók kurzusokra való feliratkozása    | Kurzusokra való feliratkozás     |
| K5  | Közlemények megjelenítése kurzusokhoz    | Közlemények kezelése             |
| K6  | Információs oldalak elérhetővé tétele    | Információs oldalak              |
| K8  | Kijelentkezés funkció                   | Kijelentkezés                    |

---

## 10. Fogalomszótár

- **Kurzus**: Az oktató által létrehozott oktatási egység, amelyhez tananyagok és közlemények tartoznak.
- **Tananyag**: Az oktatás során felhasznált dokumentumok, prezentációk vagy egyéb anyagok, amelyeket az oktató oszt meg a tanulókkal.