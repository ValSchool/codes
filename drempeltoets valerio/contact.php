<?php
// Include the header of the website (assuming it is in 'includes' folder)
include('hotel-app/includes/header.php');
?>

<main>
    <section class="contact-header">
        <h1>Contact Us</h1>
        <p>We would love to hear from you! Whether you have a question, a suggestion, or you'd like to make a
            reservation, we're here to help.</p>
    </section>

    <section class="hotel-details">
        <h2>Hotel Information</h2>
        <p><strong>Hotel Ter Duin</strong><br>
            Duinweg 45, 1234 AB, Zeeland, The Netherlands</p>

        <h3>Phone Numbers</h3>
        <ul>
            <li><strong>Reservations:</strong> <a href="tel:+31123456789">+31 123 456 789</a></li>
            <li><strong>General Inquiries:</strong> <a href="tel:+31987654321">+31 987 654 321</a></li>
            <li><strong>Fax:</strong> <a href="fax:+31555123456">+31 555 123 456</a></li>
        </ul>

        <h3>Email</h3>
        <p>For general inquiries, email us at: <a href="mailto:info@hoteldterduin.nl">info@hoteldterduin.nl</a><br>
            For reservations: <a href="mailto:reservations@hoteldterduin.nl">reservations@hoteldterduin.nl</a></p>

        <h3>Our Location</h3>
        <div id="map-container">
            <!-- Embed Google Map for the location -->
            <iframe width="600" height="450"
                src="https://www.google.com/maps/embed/v1/place?key=YOUR_GOOGLE_MAPS_API_KEY&q=Hotel+Ter+Duin,+Zeeland,+The+Netherlands"
                frameborder="0" style="border:0" allowfullscreen>
            </iframe>
        </div>
    </section>

    <section class="contact-form">
        <h2>Send Us a Message</h2>
        <p>Have a question or a special request? Feel free to send us a message, and we'll get back to you as soon as
            possible!</p>

        <!-- Contact form -->
        <form action="send_contact_message.php" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="6" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </section>

    <section class="social-media">
        <h2>Follow Us</h2>
        <p>Stay updated with our latest news, offers, and events on social media!</p>
        <ul>
            <li><a href="https://www.facebook.com/HotelTerDuin" target="_blank">Facebook</a></li>
            <li><a href="https://www.instagram.com/HotelTerDuin" target="_blank">Instagram</a></li>
            <li><a href="https://www.twitter.com/HotelTerDuin" target="_blank">Twitter</a></li>
            <li><a href="https://www.linkedin.com/company/HotelTerDuin" target="_blank">LinkedIn</a></li>
        </ul>
    </section>
</main>

<?php
// Include the footer of the website (assuming it is in 'includes' folder)
include('hotel-app/includes/footer.php');
?>