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
        $stmt = $connection->prepare($sql);
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

    <?php include('navbar.php'); ?>
      <section class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Üdvözlünk az Oktatási Portálon!</h2>
                <p class="lead">Fedezd fel a tananyagokat, regisztrálj kurzusokra, és fejlődj folyamatosan!</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tananyagok</h5>
                        <p class="card-text">Böngészd az elérhető tananyagokat!</p>
                        <a href="all_courses.php" class="btn btn-primary">Megtekintés</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kurzusaim</h5>
                        <p class="card-text">Kövesd nyomon jelenlegi tanulmányaidat!</p>
                        <a href="my_courses.php" class="btn btn-primary">Megnézem</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Tippek</h5>
                        <p class="card-text">Hogyan tanulj hatékonyabban?</p>
                        <a href="tipps.php" class="btn btn-primary">Itt a válasz</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Oktatási Portál. Minden jog fenntartva.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>