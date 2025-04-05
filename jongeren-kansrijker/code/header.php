<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Dental Practice'; ?></title>
    <link rel="stylesheet" href="styles/header-footer.css"> <!-- Link your CSS file -->
</head>

<body>
    <header>
        <div class="container">
            <!-- Logo Section -->

            <a href="index.php">
                <img src="images/logo2.png" alt="Logo" class="logo">
            </a>

            <!-- Navigation Section -->
            <h1>Jongeren Kansrijker</h1>
            <nav>
                <ul>
                    <?php if ($isLoggedIn): ?>
                        <li><a href="homepage.php">home</a></li>
                        <li><a href="activities.php">activiteiten</a></li>
                        <li><a href="co-workers/co-workers.php">medewerkers</a></li>
                        <li><a href="./instituut/institutions.php">instituiten</a></li>
                        <li><a href="youth.php">jongeren</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <main>