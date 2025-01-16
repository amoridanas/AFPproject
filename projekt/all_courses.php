<?php
session_start();


require_once 'database.php';

$connection = connect();
$sql = "SELECT tananyag.id, tananyag.cim, tananyag.tartalom, tananyag.kategoria, users.username AS szerzo 
        FROM tananyag
        JOIN users ON tananyag.szerzo = users.id";
$result = $connection->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tananyag_id'], $_SESSION['id'])) {
    $tananyagId = intval($_POST['tananyag_id']);
    $userId = intval($_SESSION['id']);

    $checkSql = "SELECT * FROM user_tananyag WHERE user_id = ? AND tananyag_id = ?";
    $stmt = $connection->prepare($checkSql);
    $stmt->bind_param("ii", $userId, $tananyagId);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows === 0) {
        $insertSql = "INSERT INTO user_tananyag (user_id, tananyag_id) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ii", $userId, $tananyagId);
        if ($insertStmt->execute()) {
            $message = "Sikeresen jelentkeztél a tananyagra!";
        } else {
            $message = "Hiba történt a jelentkezés során.";
        }
        $insertStmt->close();
    } else {
        $message = "Már jelentkeztél erre a tananyagra.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Összes Tananyag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    
