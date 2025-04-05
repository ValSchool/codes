<?php include('hotel-app/includes/header.php'); ?>

<main>
    <h2>Reserve a Room</h2>
    <form action="reserve_action.php" method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="customer_name" required>

        <label for="room">Room Type:</label>
        <select id="room" name="room_id" required>
            <option value="1">Single Room</option>
            <option value="2">Double Room</option>
            <option value="3">Suite</option>
        </select>

        <label for="check_in">Check-in Date:</label>
        <input type="date" id="check_in" name="check_in" required>

        <label for="check_out">Check-out Date:</label>
        <input type="date" id="check_out" name="check_out" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Your Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <button type="submit">Reserve</button>
    </form>
</main>

<?php include('hotel-app/includes/footer.php'); ?>