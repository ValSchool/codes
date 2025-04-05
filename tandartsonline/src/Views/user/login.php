<?php
session_start();
include '../../../config/database.php';  
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Set translations based on selected language
if ($_SESSION['lang'] == 'en') {
    $title = "Login";
    $email_label = "Email Address:";
    $password_label = "Password:";
    $login_button = "Login";
    $no_account = "Don't have an account? Click here to register";
    $admin_login = "Admin? Click here";
    $error_message = "";
} else {
    $title = "Inloggen";
    $email_label = "E-mailadres:";
    $password_label = "Wachtwoord:";
    $login_button = "Inloggen";
    $no_account = "Geen account? Klik hier om te registreren";
    $admin_login = "Admin? Klik hier";
    $error_message = "";
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        $error_message = ($title == "Login") ? "Please fill in both email and password." : "Vul alstublieft zowel een e-mailadres als een wachtwoord in.";
    } else {
        // Create a database connection
        $myDb = new DB('tandartsonline');

        // Search for the user in the database
        try {
            // Fetch user by email
            $user = $myDb->read('*', 'users', 'email = ?', [$email]);

            // Check if a user was found
            if (!empty($user)) {
                // Check if the password is correct
                if (password_verify($password, $user['password'])) {
                    // Store user info in the session
                    $_SESSION['user_id'] = $user['user_id']; // Correct column name used
                    $_SESSION['email'] = $user['email'];

                    // Redirect to index.php after successful login
                    header('Location: ../../../index.php');
                    exit;
                } else {
                    $error_message = ($title == "Login") ? "Incorrect password." : "Onjuist wachtwoord.";
                }
            } else {
                $error_message = ($title == "Login") ? "No user found with this email." : "Geen gebruiker gevonden met dit e-mailadres.";
            }
        } catch (Exception $e) {
            $error_message = ($title == "Login") ? "An error occurred: " . $e->getMessage() : "Er is een fout opgetreden: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2><?php echo $title; ?></h2>

        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <form method="post" action="login.php" class="form-group">
            <div class="mb-3">
                <label for="email" class="form-label"><?php echo $email_label; ?></label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><?php echo $password_label; ?></label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <input type="submit" value="<?php echo $login_button; ?>" class="btn btn-primary">
        </form>

        <p><?php echo $no_account; ?></p>
        <p><?php echo $admin_login; ?></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
