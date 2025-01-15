<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];

    if (strlen($password) < 8) {
        $error = "A jelszónak legalább 8 karakter hosszúnák kell lennie!";
        header("Location: register.php?error=" . urlencode($error));
        exit();
    }

    if (!preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $error = "A jelszónak tartalmaznia kell legalább egy nagybetűt és egy számot!";
        header("Location: register.php?error=" . urlencode($error));
        exit();
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $vezeteknev = $_POST['vezeteknev'];
    $keresztnev = $_POST['keresztnev'];
    $szuletesi_datum = $_POST['szuletesi_datum'];
    $password = md5($_POST['password']);
    $permission = $_POST['permission'];

    require_once("database.php");
    add_user($username, $vezeteknev, $keresztnev, $szuletesi_datum, $email, $password, $permission);
    header("Location: register.php?msg=Sikeres+regisztr%C3%A1ci%C3%B3!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Regisztráció</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form class="shadow w-450 p-3" method="post" enctype="multipart/form-data">

            <h4 class="display-4 fs-1">Regisztráció</h4><br>

            <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_GET['msg']; ?>
                </div>
            <?php } ?>

            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label">Felhasználónév</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Vezetéknév</label>
                <input type="text" class="form-control" name="vezeteknev" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keresztnév</label>
                <input type="text" class="form-control" name="keresztnev" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Születési dátum</label>
                <input type="date" class="form-control" name="szuletesi_datum" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jelszó</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jogosultsági körök</label>
                <select class="form-select" name="permission" required>
                    <option disabled hidden selected>Válasszon jogosultágot...</option>
                    <option value="admin">Adminisztrátor</option>
                    <option value="user">Felhasználó</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Regisztráció</button>
            <button type="reset" class="btn btn-secondary">Alaphelyzet</button><br>
            <span>Már van fiókod?</span><a href="login.php">Jelentkezz be!</a>
        </form>

    </div>
</body>

</html>