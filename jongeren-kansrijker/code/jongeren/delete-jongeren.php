<?php
require_once 'db.php';

$db = new DB();
$id = $_GET['id'] ?? null;

if ($id) {
    $query = "DELETE FROM institutions WHERE id = ?";
    $db->execute($query, [$id]);

    header('Location: institutions.php');
    exit;
}
?>
