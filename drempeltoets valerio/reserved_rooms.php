<?php
$stmt = $pdo->prepare("SELECT rooms.room_number, rooms.room_type, reservations.check_in_date, reservations.check_out_date FROM reservations JOIN rooms ON reservations.room_id = rooms.id");
$stmt->execute();
$reserved_rooms = $stmt->fetchAll();

echo "<h1>Reserved Rooms</h1>";
echo "<table><tr><th>Room Number</th><th>Room Type</th><th>Check-in</th><th>Check-out</th></tr>";
foreach ($reserved_rooms as $room) {
    echo "<tr><td>{$room['room_number']}</td><td>{$room['room_type']}</td><td>{$room['check_in_date']}</td><td>{$room['check_out_date']}</td></tr>";
}
echo "</table>";
?>
<button onclick="window.print()">Print Reserved Rooms</button>