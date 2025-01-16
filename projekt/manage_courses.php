<?php
session_start();

if (!isset($_SESSION['id']) || empty($_SESSION['id']) || $_SESSION['permission'] !== 'admin') {
    header("Location: index.php?page=1");
    exit();
}

require_once 'database.php';

$connection = connect();

$sql = "SELECT tananyag.id AS tananyag_id, tananyag.cim, tananyag.kategoria, users.username AS szerzo
        FROM tananyag
        JOIN users ON tananyag.szerzo = users.id";
$result = $connection->query($sql);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_tananyag_id'])) {
    $tananyag_id = intval($_POST['delete_tananyag_id']);

    $connection->query("DELETE FROM user_tananyag WHERE tananyag_id = $tananyag_id");
    $connection->query("DELETE FROM kozlemenyek WHERE tananyag_id = $tananyag_id");

    $sql = "DELETE FROM tananyag WHERE id = $tananyag_id";

    if ($connection->query($sql) === TRUE) {
        $message = "Kurzus sikeresen törölve!";
    } else {
        $message = "Hiba történt a kurzus törlése során: " . $connection->error;
    }
}
?>