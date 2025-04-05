<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Send the email (this is just an example using PHP mail function)
    $to = "info@hoteldterduin.nl"; // The email address to receive the contact messages
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Create email body
    $email_content = "<html><body>";
    $email_content .= "<h2>Contact Message</h2>";
    $email_content .= "<strong>Name:</strong> $name<br>";
    $email_content .= "<strong>Email:</strong> $email<br>";
    $email_content .= "<strong>Subject:</strong> $subject<br>";
    $email_content .= "<strong>Message:</strong><br>$message";
    $email_content .= "</body></html>";

    // Mail function
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Sorry, there was an error sending your message. Please try again.";
    }
}
?>