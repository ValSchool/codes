<?php
// footer.php

session_start();
$language = $_SESSION['lang'] ?? 'nl';

$translations = [
    'footer' => [
        'home' => [
            'nl' => 'Home',
            'en' => 'Home',
        ],
        'education' => [
            'nl' => 'Onderwijs',
            'en' => 'Education',
        ],
        'about_us' => [
            'nl' => 'Over Ons',
            'en' => 'About Us',
        ],
        'contact' => [
            'nl' => 'Contact',
            'en' => 'Contact',
        ],
        'privacy' => [ // Added translation for privacy
            'nl' => 'Privacy',
            'en' => 'Privacy',
        ],
        'copyright' => [
            'nl' => '&copy; Tandarts Online. Alle rechten voorbehouden.',
            'en' => '&copy; Tandarts Online. All rights reserved.',
        ],
    ],
];
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="/public/assets/css/styles.css">

<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <!-- Section: Links -->
        <section class="mb-4">
            <a class="btn btn-primary btn-lg m-2" href="/" role="button"><?php echo $translations['footer']['home'][$language]; ?></a>
            <a class="btn btn-primary btn-lg m-2" href="/tandartsonline/src/Views/dashboard/educatief.php" role="button"><?php echo $translations['footer']['education'][$language]; ?></a>
            <a class="btn btn-primary btn-lg m-2" href="/tandartsonline/src/Views/dashboard/aboutme.php" role="button"><?php echo $translations['footer']['about_us'][$language]; ?></a>
            <a class="btn btn-primary btn-lg m-2" href="/tandartsonline/src/Views/dashboard/contact.php" role="button"><?php echo $translations['footer']['contact'][$language]; ?></a>
            <a class="btn btn-primary btn-lg m-2" href="/tandartsonline/src/Views/dashboard/privacy.php" role="button"><?php echo $translations['footer']['privacy'][$language]; ?></a> <!-- New Privacy Button -->
        </section>

        <!-- Section: Social Media -->
        <section class="mb-4">
            <a class="btn btn-outline-primary btn-floating m-1" href="#" role="button">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-outline-primary btn-floating m-1" href="#" role="button">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="btn btn-outline-primary btn-floating m-1" href="#" role="button">
                <i class="fab fa-google"></i>
            </a>
            <a class="btn btn-outline-primary btn-floating m-1" href="#" role="button">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="btn btn-outline-primary btn-floating m-1" href="#" role="button">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="btn btn-outline-primary btn-floating m-1" href="#" role="button">
                <i class="fab fa-github"></i>
            </a>
        </section>

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                <?php echo $translations['footer']['copyright'][$language]; ?>
            </p>
        </section>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</footer>

</body>
</html>
