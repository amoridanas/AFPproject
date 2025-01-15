<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oktatási Portál</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
   require_once 'database.php';

   $connection = connect();

    session_start();
    $isAdmin = false;

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $sql = "SELECT permission FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $isAdmin = ($row['permission'] === 'admin');
        }

        $stmt->close();
    }
    ?>

    <header class="bg-primary text-white text-center py-4">
        <h1>Oktatási Portál</h1>
    </header>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>