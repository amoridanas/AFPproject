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

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Profil módosítása</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="shadow w-450 p-3" action="modifyMyProfile.php"  method="post">
        <h2>Profil módosítása</h2>
        <div class="mb-3">
		    <label class="form-label">Felhasznalónév</label>
		    <input type="text" class="form-control" name="username" name="username" required value="<?php echo $user['username']; ?>">
		</div>
        <div class="mb-3">
		    <label class="form-label">E-mail</label>
		    <input type="text" class="form-control" name="username" required value="<?php echo $user['email']; ?>">
		</div>
        <div class="mb-3">
		    <label class="form-label">Jelszó</label>
		    <input type="text" class="form-control" name="username" required name="password">
		</div>
        
        <input type="submit" value="Módosítás">
        <a href="index2.php">Vissza a főoldalra</a>
</form>

</div>
    
    
</body>
</html>