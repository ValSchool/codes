<?php
// Include the database connection file
include('hotel-app/includes/db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form input
    $room_id = $_POST['room_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $customer_name = $_POST['customer_name'];

    // Set a default employee_id (you may replace this with logic to get the logged-in employee)
    $employee_id = 1; // assuming employee ID 1 for now

    // Check if check-in date is before check-out date
    if (strtotime($check_in) >= strtotime($check_out)) {
        echo "Check-out date must be after check-in date.";
        exit;
    }

    // Prepare the SQL statement to insert the reservation into the database
    $stmt = $conn->prepare("INSERT INTO reservations (employee_id, room_id, check_in_date, check_out_date, guest_name, guest_email, guest_phone) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssss", $employee_id, $room_id, $check_in, $check_out, $customer_name, $email, $phone);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If insertion is successful, display a success message
        echo "Your reservation has been made successfully!";
        // Button to return to homepage
        echo '<br><a href="index.php"><button>Return to Homepage</button></a>';
    } else {
        // If there's an error, show an error message
        echo "Error: Unable to process your reservation. Please try again.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>