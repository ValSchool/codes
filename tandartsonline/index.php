<?php
include 'config/database.php';  
include 'public/assets/Header/Header.php';

// Set translations directly in the page
if ($_SESSION['lang'] == 'en') {
    $welcome_message = "Welcome to the Online Dentist Platform";
    $mission_statement = "Our mission is to simplify the appointment process...";
} else {
    $welcome_message = "Welkom bij het Online Tandarts Platform";
    $mission_statement = "Onze missie is om het afspraakproces te vereenvoudigen...";
}
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Tandarts Platform</title>
</head>
<body>
    <main>
        <section class="hero">
            <h2><?php echo $welcome_message; ?></h2>
            <p><?php echo $mission_statement; ?></p>
        </section>
    </main>

    <?php include 'public/assets/Header/Footer.php'; ?>
</body>
</html>
