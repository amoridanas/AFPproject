<?php
session_start();


require_once 'database.php';

$connection = connect();
$sql = "SELECT tananyag.id, tananyag.cim, tananyag.tartalom, tananyag.kategoria, users.username AS szerzo 
        FROM tananyag
        JOIN users ON tananyag.szerzo = users.id";
$result = $connection->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tananyag_id'], $_SESSION['id'])) {
    $tananyagId = intval($_POST['tananyag_id']);
    $userId = intval($_SESSION['id']);

    $checkSql = "SELECT * FROM user_tananyag WHERE user_id = ? AND tananyag_id = ?";
    $stmt = $connection->prepare($checkSql);
    $stmt->bind_param("ii", $userId, $tananyagId);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows === 0) {
        $insertSql = "INSERT INTO user_tananyag (user_id, tananyag_id) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ii", $userId, $tananyagId);
        if ($insertStmt->execute()) {
            $message = "Sikeresen jelentkeztél a tananyagra!";
        } else {
            $message = "Hiba történt a jelentkezés során.";
        }
        $insertStmt->close();
    } else {
        $message = "Már jelentkeztél erre a tananyagra.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Összes Tananyag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container my-5">
        <h1 class="text-center mb-4">Összes Tananyag</h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-info text-center"> <?php echo htmlspecialchars($message); ?> </div>
        <?php endif; ?>
        <?php if ($result && $result->num_rows > 0): ?>
            <div class="row g-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary fw-bold"><?php echo htmlspecialchars($row['cim']); ?></h5>
                                <p class="card-text text-muted">Kategória: <?php echo htmlspecialchars($row['kategoria']); ?>
                                </p>
                                <p class="card-text text-muted">Szerző: <?php echo htmlspecialchars($row['szerzo']); ?></p>
                                <p class="card-text">Tartalom:
                                    <?php echo nl2br(htmlspecialchars(mb_strimwidth($row['tartalom'], 0, 100, '...'))); ?></p>
                                <div class="mt-auto">
                                    <?php if (isset($_SESSION['id'])): ?>
                                        <form method="post">
                                            <input type="hidden" name="tananyag_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-primary w-100">Jelentkezés</button>
                                        </form>
                                    <?php else: ?>
                                        <p class="text-muted text-center">Jelentkezéshez jelentkezz be.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Nincs elérhető tananyag.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$connection->close();
?>
