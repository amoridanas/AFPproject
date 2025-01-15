<?php
session_start();

require_once 'database.php';

$connection = connect();

if (isset($_SESSION['id'])) {
    $userId = intval($_SESSION['id']);
    $sql = "SELECT tananyag.id, tananyag.cim, tananyag.tartalom, tananyag.kategoria, users.username AS szerzo, 
                   kozlemenyek.kozlemeny, kozlemenyek.created_at 
            FROM user_tananyag
            JOIN tananyag ON user_tananyag.tananyag_id = tananyag.id
            JOIN users ON tananyag.szerzo = users.id
            LEFT JOIN kozlemenyek ON tananyag.id = kozlemenyek.tananyag_id
            WHERE user_tananyag.user_id = ?
            ORDER BY kozlemenyek.created_at DESC";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    header("Location: index.php?page=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurzusaim</title>
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
        <h1 class="text-center mb-4">Kurzusaim</h1>
        <?php if (isset($result) && $result->num_rows > 0): ?>
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

                                <?php if (!empty($row['kozlemeny'])): ?>
                                    <div class="mt-3 p-3 bg-light border rounded">
                                        <h6 class="text-secondary">Közlemény:</h6>
                                        <p><?php echo nl2br(htmlspecialchars($row['kozlemeny'])); ?></p>
                                        <small class="text-muted">Közzétéve:
                                            <?php echo htmlspecialchars($row['created_at']); ?></small>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Nincsenek megtekinthető kurzusok.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$connection->close();
?>