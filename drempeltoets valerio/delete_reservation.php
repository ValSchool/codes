<?php
if (isset($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];

    // Delete the reservation from the database
    $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ?");
    $stmt->execute([$reservation_id]);

    echo "Reservation deleted successfully.";
}
?>