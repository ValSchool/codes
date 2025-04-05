<?php
// header.php

// Start the HTML output
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandarts Online - Uw Online Platform voor Tandartsafspraken</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/assets/css/styles.css">
</head>
<body>
    <!-- Primary Header -->
    <header>
        <div class="bg-light border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="/">Tandarts Online</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tandartsonline/src/Views/appointments/create.php">Maak Afspraken</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tandartsonline/src/Views/appointments/list.php">Beheer Afspraken</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tandartsonline/src/Views/dashboard/aboutme.php">Over Ons</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- Contact Button -->
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="button">Contact</button>
                        <!-- Login, Sign Up, and Logout Buttons -->
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                            <a class="btn btn-danger my-2 my-sm-0 ml-2" href="/logout.php">Logout</a>
                        <?php else: ?>
                            <a class="btn btn-primary my-2 my-sm-0 ml-2" href="/tandartsonline/src/Views/user/login.php">Login</a>
                            <a class="btn btn-secondary my-2 my-sm-0 ml-2" href="/tandartsonline/src/Views/user/register.php">Sign Up</a>
                        <?php endif; ?>
                    </form>
                </div>
            </nav>
        </div>
        
        <!-- Secondary Header -->
        <div class="bg-primary text-white py-2">
            <div class="container text-center">
                <p class="mb-0">Maak snel een afspraak of bel ons direct: <a href="tel:+31012345678" class="text-white">+31 012 345 678</a></p>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Main content goes here -->
    </main>

    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
