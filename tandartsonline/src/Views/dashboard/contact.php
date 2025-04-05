<?php
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Set translations directly in the page
if ($_SESSION['lang'] == 'en') {
    $title = "Contact Us";
    $intro = "Do you have questions or comments? Fill out the form below, and we will get back to you as soon as possible.";
    $name_label = "Name";
    $email_label = "Email";
    $message_label = "Message";
    $submit_button = "Send";
} else {
    $title = "Contacteer Ons";
    $intro = "Heeft u vragen of opmerkingen? Vul het onderstaande formulier in en wij nemen zo snel mogelijk contact met u op.";
    $name_label = "Naam";
    $email_label = "E-mail";
    $message_label = "Bericht";
    $submit_button = "Verstuur";
}
?>
<div class="container mt-5">
    <h1><?php echo $title; ?></h1>
    <p><?php echo $intro; ?></p>
    
    <!-- Contact Form -->
    <form action="/public/src/Views/contact_process.php" method="post">
        <div class="form-group">
            <label for="name"><?php echo $name_label; ?></label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email"><?php echo $email_label; ?></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message"><?php echo $message_label; ?></label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $submit_button; ?></button>
    </form>
</div>

<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
