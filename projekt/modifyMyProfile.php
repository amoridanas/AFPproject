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

function doesUsernameExist($username, $userId) {
    $connection = connect();
    $query = "SELECT id FROM users WHERE username = ? AND id != ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("si", $username, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $exists = $result->num_rows > 0;
    $stmt->close();
    $connection->close();
    return $exists;
}

function doesEmailExist($email, $userId) {
    $connection = connect();
    $query = "SELECT id FROM users WHERE email = ? AND id != ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("si", $email, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $exists = $result->num_rows > 0;
    $stmt->close();
    $connection->close();
    return $exists;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = connect();

    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];

    // Felhasználónév és email létezésének ellenőrzése
if (doesUsernameExist($newUsername, $userId)) {
    $_SESSION['message'] = "A felhasználónév már létezik!";
    header("Location: modifyMyProfile.php");
    exit;
} 

if (doesEmailExist($newEmail, $userId)) {
    $_SESSION['message'] = "Az email cím már létezik!";
    header("Location: modifyMyProfile.php");
    exit;
}