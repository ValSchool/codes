<?php
session_start();
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';
include 'C:/xampp/htdocs/tandartsonline/src/Controllers/UserController.php';
include 'C:/xampp/htdocs/tandartsonline/config/database.php';

$user_id = $_POST['user_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && $user_id) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $myDb = new DB('tandartsonline');
    $userController = new UserController($myDb);

    // Update user info
    if ($userController->updateUserInfo($user_id, $first_name, $last_name, $email, $phone_number)) {
        // Redirect back to profile page
        header("Location: Profiel.php"); // Adjust the redirect based on your file structure
        exit();
    } else {
        echo "Error updating user information.";
    }
}
?>
