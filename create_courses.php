<?php
session_start();

// Ellenőrizd, hogy a felhasználó be van-e jelentkezve, és admin jogosultsággal rendelkezik-e
if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['permission'] !== 'admin') {
    header("Location: index.php?page=1"); // Irányítás a bejelentkezési oldalra
    exit();
}

require_once 'database.php';
$connection = connect();

// Kurzus létrehozás kezelése
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cim = $connection->real_escape_string($_POST['cim']);
    $tartalom = $connection->real_escape_string($_POST['tartalom']);
    $kategoria = $connection->real_escape_string($_POST['kategoria']);
    $vezeteknev = $connection->real_escape_string($_POST['vezeteknev']);
    $keresztnev = $connection->real_escape_string($_POST['keresztnev']);
    $szerzo = $_SESSION['id']; // Az aktuális felhasználó azonosítója

    $sql = "INSERT INTO tananyag (cim, tartalom, kategoria, szerzo) VALUES ('$cim', '$tartalom', '$kategoria', $szerzo)";

    if ($connection->query($sql) === TRUE) {
        $message = "A kurzus sikeresen létrehozva!";
    } else {
        $message = "Hiba történt a kurzus létrehozása során: " . $connection->error;
    }
}
?>
