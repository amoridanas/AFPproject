<?php
define('dbHOST', 'localhost');
define('dbUSERNAME', 'root');
define('dbPASSWORD', '');
define('dbDATABASE', 'oktatasi_portal');
define('dbPORT', '3306');

function connect()
{
    $connection = mysqli_connect(dbHOST, dbUSERNAME, dbPASSWORD, dbDATABASE, dbPORT);
    if (!$connection) {
        die("Hiba a kapcsolat kiépítés során: " . mysqli_connect_error());
    }
    return $connection;
}
function add_user($username, $vezeteknev, $keresztnev, $szuletesi_datum, $email, $password, $permission)
{
    $connection = connect();
    $query = "INSERT INTO users (username,vezeteknev,keresztnev,szuletesi_datum,email,password,permission)
                  VALUES ('$username','$vezeteknev','$keresztnev','$szuletesi_datum','$email','$password','$permission')";
    mysqli_query($connection, $query) or die("Hiba a lekérdezésben: $query");
    mysqli_close($connection);
    header("Location: index.php?page=1&msg=Sikeres regisztráció!");
}
function login($username, $password)
{
    $connection = connect();
    $query = "SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'";
    $result = mysqli_query($connection, $query) or die("Hiba a lekérdezésben: $query");
    $users = mysqli_fetch_row($result);
    if (!$users) {
        header("Location: login.php?page=1&error=Hibás+adatok");
    } else {
        session_start();
        $_SESSION['id'] = $users[0];
        $_SESSION['username'] = $users[1];
        $_SESSION['permission'] = $users[7];
        header("Location: index2.php");
    }
    mysqli_close($connection);
}

?>