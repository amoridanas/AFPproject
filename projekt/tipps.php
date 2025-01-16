<?php
session_start();

// Ellenőrizd, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: index.php?page=1"); // Irányítás a bejelentkezési oldalra
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tippek és Trükkök</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .tips-section {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }

        .tip {
            margin-bottom: 20px;
        }

        .tip-icon {
            font-size: 40px;
            color: #007bff;
            margin-right: 15px;
        }
    </style>
</head>