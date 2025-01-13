<?php
session_start();
include 'database.php';

if(isset($_SESSION['message']) && !empty($_SESSION['message'])):
    ?>
        <div class="message">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?> 
        </div>
    <?php
    endif;


// Ellenőrizzük, hogy be van-e jelentkezve a felhasználó
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['id'];

function isValidPassword($password) {
    // Hossz ellenőrzése
    if (strlen($password) < 8) {
        return false;
    }

    // Kisbetű ellenőrzése
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }

    // Nagybetű ellenőrzése
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Szám ellenőrzése
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }

    return true;
}
