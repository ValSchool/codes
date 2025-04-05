<?php
// Start session and handle language toggle
session_start();

// Check if the language switch is triggered
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];  // Save the language choice in session
}

// Default to Dutch ('nl') if no language is set
$language = $_SESSION['lang'] ?? 'nl';

// Translations array
$translations = [
    'nl' => [
        'home' => 'Home',
        'make_appointments' => 'Maak Afspraken',
        'manage_appointments' => 'Beheer Afspraken',
        'about_us' => 'Over Ons',
        'contact' => 'Contact',
        'login' => 'Login',
        'signup' => 'Sign Up',
        'logout' => 'Logout',
        'phone_prompt' => 'Maak snel een afspraak of bel ons direct:',
        'language_button' => 'Vertaal naar Engels',
    ],
    'en' => [
        'home' => 'Home',
        'make_appointments' => 'Make Appointments',
        'manage_appointments' => 'Manage Appointments',
        'about_us' => 'About Us',
        'contact' => 'Contact',
        'login' => 'Login',
        'signup' => 'Sign Up',
        'logout' => 'Logout',
        'phone_prompt' => 'Make an appointment quickly or call us directly:',
        'language_button' => 'Translate to Dutch',
    ]
];

// Set the translations for the current language
$texts = $translations[$language];
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandarts Online - <?php echo ($language === 'nl') ? 'Uw Online Platform voor Tandartsafspraken' : 'Your Online Platform for Dental Appointments'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS (Make sure this path is correct) -->
    <link rel="stylesheet" href="/public/assets/css/styles.css?v=1.1"> <!-- Add versioning to avoid caching -->
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
                            <a class="nav-link" href="/"><?php echo $texts['home']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tandartsonline/src/Views/appointments/create.php"><?php echo $texts['make_appointments']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tandartsonline/src/Views/appointments/list.php"><?php echo $texts['manage_appointments']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tandartsonline/src/Views/dashboard/aboutme.php"><?php echo $texts['about_us']; ?></a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- Contact Button -->
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="button"><?php echo $texts['contact']; ?></button>
                        <!-- Login, Sign Up, and Logout Buttons -->
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                            <a class="btn btn-danger my-2 my-sm-0 ml-2" href="/logout.php"><?php echo $texts['logout']; ?></a>
                        <?php else: ?>
                            <a class="btn btn-primary my-2 my-sm-0 ml-2" href="/tandartsonline/src/Views/user/login.php"><?php echo $texts['login']; ?></a>
                            <a class="btn btn-secondary my-2 my-sm-0 ml-2" href="/tandartsonline/src/Views/user/register.php"><?php echo $texts['signup']; ?></a>
                        <?php endif; ?>
                        <!-- Language Toggle Button -->
                        <a href="?lang=<?php echo $language === 'nl' ? 'en' : 'nl'; ?>" class="btn btn-secondary ml-3">
                            <?php echo $texts['language_button']; ?>
                        </a>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Secondary Header -->
        <div class="bg-primary text-white py-2">
            <div class="container text-center">
                <p class="mb-0"><?php echo $texts['phone_prompt']; ?> <a href="tel:+31012345678" class="text-white">+31 012 345 678</a></p>
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
