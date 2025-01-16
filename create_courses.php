<?php
session_start();

if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['permission'] !== 'admin') {
    header("Location: index.php?page=1");
    exit();
}

require_once 'database.php';
$connection = connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cim = $connection->real_escape_string($_POST['cim']);
    $tartalom = $connection->real_escape_string($_POST['tartalom']);
    $kategoria = $connection->real_escape_string($_POST['kategoria']);
    $vezeteknev = $connection->real_escape_string($_POST['vezeteknev']);
    $keresztnev = $connection->real_escape_string($_POST['keresztnev']);
    $szerzo = $_SESSION['id']; 

    $sql = "INSERT INTO tananyag (cim, tartalom, kategoria, szerzo) VALUES ('$cim', '$tartalom', '$kategoria', $szerzo)";

    if ($connection->query($sql) === TRUE) {
        $message = "A kurzus sikeresen létrehozva!";
    } else {
        $message = "Hiba történt a kurzus létrehozása során: " . $connection->error;
    }
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurzus Létrehozása</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-section {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>