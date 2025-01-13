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

    // Jelszóvalidáció
    if (!isValidPassword($newPassword)) {
        $_SESSION['message'] = "A jelszónak legalább 8 karakter hosszúnak kell lennie, tartalmaznia kell kis- és nagybetűt, valamint számot!";
        header("Location: modifyMyProfile.php"); // visszairányítás ugyanerre az oldalra, hogy a hibaüzenetet lássa
        exit;
        }else {
            $hashedPassword = md5($newPassword);  // Javasolt: password_hash() használata
    
            $query = "UPDATE users SET username = '$newUsername', email = '$newEmail', password = '$hashedPassword' WHERE id = $userId";
            mysqli_query($connection, $query) or die("Hiba a lekérdezésben: $query");
    
            $_SESSION['message'] = "A profil sikeresen módosítva!";
            header("Location: modifyMyProfile.php");
        }
    
        mysqli_close($connection);
    }
    
    // Felhasználó adatainak lekérése az adatbázisból
    $connection = connect();
    $query = "SELECT username, email FROM users WHERE id = $userId";
    $result = mysqli_query($connection, $query) or die("Hiba a lekérdezésben: $query");
    $user = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    ?>

    