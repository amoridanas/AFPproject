<?php
session_start();

// Ellenőrizd, hogy a felhasználó be van-e jelentkezve, és admin jogosultsággal rendelkezik-e
if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['permission'] !== 'admin') {
    header("Location: index.php?page=1"); // Irányítás a bejelentkezési oldalra
    exit();
}

require_once 'database.php';

$connection = connect();

// Kurzusok lekérése
$sql = "SELECT tananyag.id AS tananyag_id, tananyag.cim, tananyag.kategoria, users.username AS szerzo
        FROM tananyag
        JOIN users ON tananyag.szerzo = users.id";
$result = $connection->query($sql);

// Közlemény hozzáadása
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tananyag_id'], $_POST['kozlemeny'])) {
    $tananyag_id = intval($_POST['tananyag_id']);
    $kozlemeny = $connection->real_escape_string($_POST['kozlemeny']);

    $sql = "INSERT INTO kozlemenyek (tananyag_id, kozlemeny) VALUES (?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("is", $tananyag_id, $kozlemeny);

    if ($stmt->execute()) {
        $message = "Közlemény sikeresen elküldve!";
    } else {
        $message = "Hiba történt a közlemény mentése során: " . $connection->error;
    }
    $stmt->close();
}

// Kurzus törlése
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_tananyag_id'])) {
    $tananyag_id = intval($_POST['delete_tananyag_id']);

    // Kapcsolódó adatok törlése a user_tananyag és kozlemenyek táblákból
    $connection->query("DELETE FROM user_tananyag WHERE tananyag_id = $tananyag_id");
    $connection->query("DELETE FROM kozlemenyek WHERE tananyag_id = $tananyag_id");

    // Kurzus törlése
    $sql = "DELETE FROM tananyag WHERE id = $tananyag_id";

    if ($connection->query($sql) === TRUE) {
        $message = "Kurzus sikeresen törölve!";
    } else {
        $message = "Hiba történt a kurzus törlése során: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurzusok Kezelése</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
        }

        h1 {
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container my-5">
        <h1 class="text-center">Kurzusok Kezelése</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-info text-center"> <?php echo htmlspecialchars($message); ?> </div>
        <?php endif; ?>

        <?php if ($result && $result->num_rows > 0): ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['cim']); ?></h5>
                                <p class="card-text">Kategória: <?php echo htmlspecialchars($row['kategoria']); ?></p>
                                <p class="card-text">Szerző: <?php echo htmlspecialchars($row['szerzo']); ?></p>

                                <h6 class="mt-3">Jelentkezett felhasználók:</h6>
                                <ul>
                                    <?php
                                    $tananyag_id = $row['tananyag_id'];
                                    $users_sql = "SELECT users.username, users.email FROM user_tananyag
                                                  JOIN users ON user_tananyag.user_id = users.id
                                                  WHERE user_tananyag.tananyag_id = $tananyag_id";
                                    $users_result = $connection->query($users_sql);

                                    if ($users_result && $users_result->num_rows > 0):
                                        while ($user = $users_result->fetch_assoc()): ?>
                                            <li><?php echo htmlspecialchars($user['username']) . " (" . htmlspecialchars($user['email']) . ")"; ?>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <li>Nincs jelentkező.</li>
                                    <?php endif; ?>
                                </ul>

                                <form method="POST" class="mt-3">
                                    <input type="hidden" name="tananyag_id" value="<?php echo $tananyag_id; ?>">
                                    <div class="mb-3">
                                        <label for="kozlemeny" class="form-label">Közlemény küldése:</label>
                                        <textarea class="form-control" id="kozlemeny" name="kozlemeny" rows="3"
                                            required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Közlemény Küldése</button>
                                </form>

                                <form method="POST" class="mt-3">
                                    <input type="hidden" name="delete_tananyag_id" value="<?php echo $tananyag_id; ?>">
                                    <button type="submit" class="btn btn-danger">Kurzus Törlése</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Nincs elérhető kurzus.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$connection->close();
?>