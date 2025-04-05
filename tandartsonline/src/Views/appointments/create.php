<?php
// Start session and include necessary files
session_start();
require '../../../config/database.php';  
require '../../Controllers/AppointmentController.php';
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Initialize variables
$success_message = '';
$error_message = '';

// Assuming the logged-in user's ID is stored in the session
$patient_id = $_SESSION['user_id'] ?? null; // Adjust the session key based on your login system

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $appointment_date = $_POST['appointment_date'];
    $notes = $_POST['notes'] ?? null;

    // Validate inputs
    if (empty($patient_id) || empty($appointment_date)) {
        $error_message = ($texts['error']['empty_fields'] ?? 'Please fill in all required fields.');
    } else {
        try {
            // Create a database connection
            $db = new DB('tandartsonline'); // Replace with actual database name
            $appointmentController = new AppointmentController($db->getPDO());

            // Select a random dentist from the database
            $dentist_id = $appointmentController->getRandomDentistId();

            if ($dentist_id === null) {
                $error_message = ($texts['error']['no_dentist'] ?? 'No available dentist found.');
            } else {
                // Create the appointment
                if ($appointmentController->createAppointment($dentist_id, $patient_id, $appointment_date, $notes)) {
                    $success_message = ($texts['success']['appointment_created'] ?? "Appointment created successfully with Dentist ID: $dentist_id.");
                } else {
                    $error_message = ($texts['error']['appointment_failed'] ?? 'Failed to create appointment.');
                }
            }
        } catch (Exception $e) {
            $error_message = ($texts['error']['generic_error'] ?? 'An error occurred: ') . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?? 'nl'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $texts['create_appointment']['title'] ?? 'Create Appointment'; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo $texts['create_appointment']['header'] ?? 'Create New Appointment'; ?></h1>

        <?php if ($success_message): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success_message); ?></div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="appointment_date"><?php echo $texts['create_appointment']['date_label'] ?? 'Appointment Date:'; ?></label>
                <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>
            <div class="form-group">
                <label for="notes"><?php echo $texts['create_appointment']['notes_label'] ?? 'Notes:'; ?></label>
                <textarea class="form-control" id="notes" name="notes"></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $texts['create_appointment']['submit_button'] ?? 'Create Appointment'; ?></button>
        </form>
    </div>
</body>
</html>

<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
