<?php
require_once 'db.php';

$db = new DB();
$id = $_GET['id'] ?? null;

if ($id) {
    $query = "SELECT * FROM institutions WHERE id = ?";
    $institution = $db->fetch($query, [$id]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $description = $_POST['description'];

    $query = "UPDATE institutions SET name = ?, address = ?, description = ? WHERE id = ?";
    $db->execute($query, [$name, $address, $description, $id]);

    header('Location: institutions.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituut Bewerken</title>
</head>
<body>
    <h1>Instituut Bewerken</h1>
    <form method="post">
        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($institution['name']) ?>" required><br>

        <label for="address">Adres:</label>
        <input type="text" id="address" name="address" value="<?= htmlspecialchars($institution['address']) ?>"><br>

        <label for="description">Beschrijving:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($institution['description']) ?></textarea><br>

        <button type="submit">Opslaan</button>
    </form>
</body>
</html>
