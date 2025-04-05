<?php
session_start();
include('db.php');  // Make sure your database connection is included here.

if (isset($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];

    // Fetch the existing reservation data from the database
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = ?");
    $stmt->execute([$reservation_id]);
    $reservation = $stmt->fetch();

    if ($reservation) {
        // Fetch available rooms to populate the select dropdown
        $stmt = $pdo->prepare("SELECT * FROM rooms WHERE status = 'available'");
        $stmt->execute();
        $rooms = $stmt->fetchAll();

        // Handle the form submission to update the reservation
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $room_id = $_POST['room_id'];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out'];
            $guest_name = $_POST['guest_name'];
            $guest_email = $_POST['guest_email'];

            // Update the reservation in the database
            $stmt = $pdo->prepare("UPDATE reservations SET room_id = ?, check_in_date = ?, check_out_date = ?, guest_name = ?, guest_email = ? WHERE id = ?");
            $stmt->execute([$room_id, $check_in, $check_out, $guest_name, $guest_email, $reservation_id]);

            echo "Reservation updated successfully.";
        }
    } else {
        echo "Reservation not found.";
    }
} else {
    echo "No reservation ID provided.";
}
?>

<!-- HTML Form to edit the reservation -->
<form action="" method="POST">
    <h2>Edit Reservation</h2>

    <!-- Select Room -->
    <label for="room_id">Choose a Room:</label>
    <select name="room_id" id="room_id" required>
        <?php
        // Pre-populate the room dropdown with available rooms
        foreach ($rooms as $room) {
            // If the room ID is the one currently selected, add the "selected" attribute
            $selected = $room['id'] == $reservation['room_id'] ? 'selected' : '';
            echo "<option value='{$room['id']}' {$selected}>{$room['room_number']} - {$room['room_type']} - €{$room['price']}</option>";
        }
        ?>
    </select><br>

    <!-- Check-in Date -->
    <label for="check_in">Check-in Date:</label>
    <input type="date" name="check_in" id="check_in" value="<?php echo $reservation['check_in_date']; ?>" required><br>

    <!-- Check-out Date -->
    <label for="check_out">Check-out Date:</label>
    <input type="date" name="check_out" id="check_out" value="<?php echo $reservation['check_out_date']; ?>"
        required><br>

    <!-- Guest Name -->
    <label for="guest_name">Guest Name:</label>
    <input type="text" name="guest_name" id="guest_name" value="<?php echo $reservation['guest_name']; ?>" required><br>

    <!-- Guest Email -->
    <label for="guest_email">Guest Email:</label>
    <input type="email" name="guest_email" id="guest_email" value="<?php echo $reservation['guest_email']; ?>"
        required><br>

    <input type="submit" value="Update Reservation">
</form>