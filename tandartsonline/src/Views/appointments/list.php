<?php
// Start session and include necessary files
session_start();
require '../../../config/database.php';  
require '../../Controllers/AppointmentController.php';  
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';
// Ensure user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

// Fetch user_id securely
$user_id = (int)$_SESSION['user_id'];

// Create a database connection using the DB class
$myDb = new DB('tandartsonline');

// Fetch user role from the database
try {
    $user = $myDb->read('role', 'users', 'user_id = ?', [$user_id]);
    if (!$user) {
        die("User not found.");
    }
    $role = $user['role']; // Assuming `role` is either 'dentist' or 'patient'
} catch (Exception $e) {
    die("Error fetching user data: " . $e->getMessage());
}

// Instantiate the appointment manager with the connection
$appointmentController = new AppointmentController($myDb);

// Display content based on role
if ($role == 'dentist') {
    // Show appointments for the dentist
    $appointments = $appointmentController->getAllAppointments($user_id);
    ?>

    <!DOCTYPE html>
    <html lang="<?php echo $_SESSION['lang'] ?? 'nl'; ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $texts['appointments']['dentist_title'] ?? 'Your Appointments (Dentist)'; ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1><?php echo $texts['appointments']['dentist_header'] ?? 'Your Appointments (Dentist)'; ?></h1>

            <?php if (count($appointments) > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $texts['appointments']['id'] ?? 'Appointment ID'; ?></th>
                            <th><?php echo $texts['appointments']['patient_id'] ?? 'Patient ID'; ?></th>
                            <th><?php echo $texts['appointments']['date'] ?? 'Appointment Date'; ?></th>
                            <th><?php echo $texts['appointments']['status'] ?? 'Status'; ?></th>
                            <th><?php echo $texts['appointments']['notes'] ?? 'Notes'; ?></th>
                            <th><?php echo $texts['appointments']['actions'] ?? 'Actions'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($appointment['appointment_id']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['patient_id']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['appointment_status']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['notes']); ?></td>
                                <td>
                                    <a href="confirm_appointment.php?id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-primary btn-sm"><?php echo $texts['appointments']['confirm'] ?? 'Confirm'; ?></a>
                                    <a href="cancel_appointment.php?id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-danger btn-sm"><?php echo $texts['appointments']['cancel'] ?? 'Cancel'; ?></a>
                                    <a href="complete_appointment.php?id=<?php echo $appointment['appointment_id']; ?>" class="btn btn-success btn-sm"><?php echo $texts['appointments']['complete'] ?? 'Complete'; ?></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p><?php echo $texts['appointments']['no_appointments'] ?? 'No appointments found.'; ?></p>
            <?php endif; ?>
        </div>
    </body>
    </html>

    <?php
} elseif ($role == 'patient') {
    // Show appointments for the patient
    $appointments = $appointmentController->getAppointmentsForPatient($user_id);  // Assuming this function is defined to fetch patient appointments
    ?>

    <!DOCTYPE html>
    <html lang="<?php echo $_SESSION['lang'] ?? 'nl'; ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $texts['appointments']['patient_title'] ?? 'Your Appointments (Patient)'; ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1><?php echo $texts['appointments']['patient_header'] ?? 'Your Appointments (Patient)'; ?></h1>

            <?php if (count($appointments) > 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo $texts['appointments']['id'] ?? 'Appointment ID'; ?></th>
                            <th><?php echo $texts['appointments']['dentist_id'] ?? 'Dentist ID'; ?></th>
                            <th><?php echo $texts['appointments']['date'] ?? 'Appointment Date'; ?></th>
                            <th><?php echo $texts['appointments']['status'] ?? 'Status'; ?></th>
                            <th><?php echo $texts['appointments']['notes'] ?? 'Notes'; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($appointment['appointment_id']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['dentist_id']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['appointment_status']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['notes']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p><?php echo $texts['appointments']['no_appointments'] ?? 'No appointments found.'; ?></p>
            <?php endif; ?>
        </div>
    </body>
    </html>

    <?php
} else {
    // If the role is invalid, display an error message
    die("Invalid role.");
}
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php';
?>
