<?php
session_start();
include '../../../config/database.php';  
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Valideer invoer
    if (empty($email) || empty($password)) {
        echo "Vul alstublieft zowel een e-mailadres als een wachtwoord in.";
    } else {
        // Maak verbinding met de database
        $myDb = new DB('tandartsonline');

        // Zoek naar de gebruiker in de database
        try {
            // Haal de gebruiker op basis van e-mailadres op
            $user = $myDb->read('*', 'users', 'email = ?', [$email]);

            // Controleer of er een gebruiker is gevonden
            if (!empty($user)) {
                // Controleer of het wachtwoord klopt
                if (password_verify($password, $user['password'])) {
                    // Controleer of de gebruiker de rol 'dentist' heeft
                    if ($user['role'] === 'dentist') {
                        // Sla gebruikersinformatie op in de sessie
                        $_SESSION['user_id'] = $user['user_id']; 
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['role'] = $user['role'];

                        // Redirect de gebruiker naar index.php na succesvolle login
                        header('Location: ../../../index.php');
                        exit;
                    } else {
                        // Als de gebruiker niet de rol 'dentist' heeft
                        echo "Toegang geweigerd. Alleen tandartsen hebben toegang.";
                    }
                } else {
                    echo "Onjuist wachtwoord.";
                }
            } else {
                echo "Geen gebruiker gevonden met dit e-mailadres.";
            }
        } catch (Exception $e) {
            echo "Er is een fout opgetreden: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <!-- Voeg hier Bootstrap toe -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Inloggen</h2>
        <form method="post" action="login.php" class="form-group">
            <div class="mb-3">
                <label for="email" class="form-label">E-mailadres:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Wachtwoord:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <input type="submit" value="Inloggen" class="btn btn-primary">
        </form>
    </div>
    <!-- Voeg hier Bootstrap JS en Popper.js toe -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
