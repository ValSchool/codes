<?php
session_start();
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Set translations directly in the page
if ($_SESSION['lang'] == 'en') {
    $title = "About Us";
    $introduction = "Welcome to Tandarts Online. We are here to help you with all your dental needs.";
    $who_we_are = "Who We Are";
    $who_we_are_description = "At Tandarts Online, we strive for the best care for your oral health. Our team of experienced dentists and specialists offers a wide range of services, from routine check-ups to advanced treatments.";
    $mission = "Our mission is to provide a comfortable and friendly environment where patients feel at ease. We utilize the latest technologies and techniques to ensure the highest standard of dental care.";
    $team = "Our Team";
} else {
    $title = "Over Ons";
    $introduction = "Welkom bij Tandarts Online. Wij zijn hier om u te helpen met al uw tandheelkundige behoeften.";
    $who_we_are = "Wie Wij Zijn";
    $who_we_are_description = "Bij Tandarts Online streven wij naar de beste zorg voor uw mondgezondheid. Ons team van ervaren tandartsen en specialisten biedt een breed scala aan diensten, van routinecontroles tot geavanceerde behandelingen.";
    $mission = "Onze missie is om een comfortabele en vriendelijke omgeving te bieden waar patiënten zich op hun gemak voelen. Wij maken gebruik van de nieuwste technologieën en technieken om de hoogste standaard van tandheelkundige zorg te garanderen.";
    $team = "Ons Team";
}
?>

<link rel="stylesheet" href="/tandartsonline/public/assets/css/styles.css">

<div class="container mt-5">
    <div class="row">
        <!-- Profile Image and Introduction -->
        <div class="col-md-4 text-center">
            <img src="/tandartsonline/public/assets/Images/Dentist1.jpg" alt="Profile Picture" class="img-fluid rounded-circle mb-4" style="max-width: 200px;">
            <h1><?php echo $title; ?></h1>
            <p class="lead"><?php echo $introduction; ?></p>
        </div>

        <!-- About Section -->
        <div class="col-md-8">
            <h2><?php echo $who_we_are; ?></h2>
            <p><?php echo $who_we_are_description; ?></p>
            <p><?php echo $mission; ?></p>
            <h2><?php echo $team; ?></h2>
            <div class="scroll-container">
                <div class="d-flex">
                    <div class="card mb-4 mx-2" style="min-width: 300px;">
                        <img src="/tandartsonline/public/assets/Images/Dentist2.jpg" class="card-img-top img-fluid" alt="Dentist 1">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Samantha Pantoffel</h5>
                            <p class="card-text">Specialist in Algemene Tandheelkunde met meer dan 10 jaar ervaring.</p>
                            <div class="star-rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mx-2" style="min-width: 300px;">
                        <img src="/tandartsonline/public/assets/Images/dentist3.jpg" class="card-img-top img-fluid" alt="Dentist 2">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Lee Marin nade</h5>
                            <p class="card-text">Expert in Orthodontie en Cosmetische Tandheelkunde.</p>
                            <div class="star-rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mx-2" style="min-width: 300px;">
                        <img src="/tandartsonline/public/assets/Images/Dentist4.jpg" class="card-img-top img-fluid" alt="Dentist 3">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Emma Smith</h5>
                            <p class="card-text">Specialist in Parodontologie met uitgebreide ervaring.</p>
                            <div class="star-rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mx-2" style="min-width: 300px;">
                        <img src="/tandartsonline/public/assets/Images/Dentist5.jpg" class="card-img-top img-fluid" alt="Dentist 4">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Michael Johnson</h5>
                            <p class="card-text">Expert in Implantologie en Mondchirurgie.</p>
                            <div class="star-rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
