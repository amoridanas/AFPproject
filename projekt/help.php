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
    <title>Kapcsolat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .contact-section {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container my-5">
        <div class="contact-section">
            <h1 class="text-center">Kapcsolat</h1>
            <p class="mt-4 text-center">Lépj kapcsolatba velünk, ha bármilyen kérdésed vagy problémád lenne az Oktatási
                Portállal kapcsolatban.</p>

            <div class="contact-info">
                <ul class="list-unstyled text-center">
                    <li><strong>Email:</strong> info@oktatasportal.hu</li>
                    <li><strong>Telefon:</strong> +36 1 234 5678</li>
                    <li><strong>Cím:</strong>Eger, Leányka u. 4, 3300</li>
                </ul>
            </div>

            <div class="mt-5 text-center">
                <h5>Munkaidő:</h5>
                <p>Hétfőtől péntekig: 9:00 - 17:00</p>
                <p>Szombat és vasárnap: Zárva</p>
            </div>

            <div class="mt-5 text-center">
                <h5>Social Media:</h5>
                <p>
                    <a href="https://www.facebook.com/eszterhazyuniversity" class="btn btn-outline-primary">Facebook</a>
                    <a href="https://uni-eszterhazy.hu" class="btn btn-outline-info">Twitter</a>
                    <a href="https://www.instagram.com/unieszterhazy" class="btn btn-outline-danger">Instagram</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>