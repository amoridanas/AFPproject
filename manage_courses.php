<?php
session_start();

if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['permission'] !== 'admin') {
    header("Location: index.php?page=1"); // Irányítás a bejelentkezési oldalra
    exit();
}

require_once 'database.php';

$connection = connect();

$sql = "SELECT tananyag.id AS tananyag_id, tananyag.cim, tananyag.kategoria, users.username AS szerzo
        FROM tananyag
        JOIN users ON tananyag.szerzo = users.id";
$result = $connection->query($sql);