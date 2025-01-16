<?php
session_start();

// Ellenőrizd, hogy a felhasználó be van-e jelentkezve, és admin jogosultsággal rendelkezik-e
if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['permission'] !== 'admin') {
    header("Location: index.php?page=1"); // Irányítás a bejelentkezési oldalra
    exit();
}

require_once 'database.php';

$connection = connect();

// Kurzusok lekérése
$sql = "SELECT tananyag.id AS tananyag_id, tananyag.cim, tananyag.kategoria, users.username AS szerzo
        FROM tananyag
        JOIN users ON tananyag.szerzo = users.id";
$result = $connection->query($sql);

// Közlemény hozzáadása
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tananyag_id'], $_POST['kozlemeny'])) {
    $tananyag_id = intval($_POST['tananyag_id']);
    $kozlemeny = $connection->real_escape_string($_POST['kozlemeny']);

    $sql = "INSERT INTO kozlemenyek (tananyag_id, kozlemeny) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("is", $tananyag_id, $kozlemeny);

    if ($stmt->execute()) {
        $message = "Közlemény sikeresen elküldve!";
    } else {
        $message = "Hiba történt a közlemény mentése során: " . $connection->error;
    }
    $stmt->close();
}

// Kurzus törlése
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_tananyag_id'])) {
    $tananyag_id = intval($_POST['delete_tananyag_id']);

    // Kapcsolódó adatok törlése a user_tananyag és kozlemenyek táblákból
    $connection->query("DELETE FROM user_tananyag WHERE tananyag_id = $tananyag_id");
    $connection->query("DELETE FROM kozlemenyek WHERE tananyag_id = $tananyag_id");

    // Kurzus törlése
    $sql = "DELETE FROM tananyag WHERE id = $tananyag_id";

    if ($connection->query($sql) === TRUE) {
        $message = "Kurzus sikeresen törölve!";
    } else {
        $message = "Hiba történt a kurzus törlése során: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurzusok Kezelése</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
        }

        h1 {
            color: #007bff;
        }
    </style>
</head>

