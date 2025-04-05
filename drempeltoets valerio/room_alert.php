<?php
$stmt = $pdo->prepare("SELECT COUNT(*) FROM rooms WHERE status = 'available'");
$stmt->execute();
$available_rooms = $stmt->fetchColumn();

if ($available_rooms <= 2) {
    echo "<div class='alert'>Only 2 rooms left for the day!</div>";
}
?>