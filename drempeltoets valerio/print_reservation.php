<?php
if (isset($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];
    // Fetch the reservation details from the database
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = ?");
    $stmt->execute([$reservation_id]);
    $reservation = $stmt->fetch();

    // Fetch the room details
    $stmt = $pdo->prepare("SELECT * FROM rooms WHERE id = ?");
    $stmt->execute([$reservation['room_id']]);
    $room = $stmt->fetch();

    echo "<h1>Your Reservation</h1>";
    echo "<p>Reservation ID: {$reservation['id']}</p>";
    echo "<p>Room: {$room['room_number']} - {$room['room_type']}</p>";
    echo "<p>Check-in: {$reservation['check_in_date']}</p>";
    echo "<p>Check-out: {$reservation['check_out_date']}</p>";
    echo "<p>Name: {$reservation['guest_name']}</p>";
    echo "<p>Email: {$reservation['guest_email']}</p>";
}
?>
<button onclick="window.print()">Print this Reservation</button>