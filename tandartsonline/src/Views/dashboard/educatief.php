<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Educatie over Mondgezondheid</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Externe CSS -->
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

    
    <?php include 'Header.php'; ?>

    <section class="container my-5">
        <h2>Informatieve Video's</h2>

        <div class="row">
            <div class="col-md-4">
                <h3>Hoe poets je je tanden goed?</h3>
                <div class="video-container">
                    <iframe width="100%" height="315" 
                            src="https://www.youtube.com/embed/3oG_JLuQ8T8" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="col-md-4">
                <h3>De juiste flos techniek</h3>
                <div class="video-container">
                    <iframe width="100%" height="315" 
                            src="https://www.youtube.com/embed/HmnjzhqA-GU" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="col-md-4">
                <h3>Tanden bleken: wat je moet weten</h3>
                <div class="video-container">
                    <iframe width="100%" height="315" 
                            src="https://www.youtube.com/embed/M_e2xDcR0yY" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <h2>Informatieve Artikelen</h2>

        <div class="article my-3">
            <h3><a href="artikel1.html">Waarom mondhygiëne belangrijk is voor je algehele gezondheid</a></h3>
            <p>Ontdek hoe een goede mondgezondheid verband houdt met de gezondheid van de rest van je lichaam.</p>
        </div>

        <div class="article my-3">
            <h3><a href="artikel2.html">Voorkomen van gaatjes: tips voor dagelijks onderhoud</a></h3>
            <p>Leer eenvoudige stappen om gaatjes en andere tandproblemen te voorkomen.</p>
        </div>

        <div class="article my-3">
            <h3><a href="artikel3.html">Alles over tandvleesontsteking (gingivitis)</a></h3>
            <p>Wat is gingivitis en hoe kun je het voorkomen en behandelen?</p>
        </div>

        <div class="article my-3">
            <h3><a href="artikel4.html">Kinder tandverzorging: Tips voor ouders</a></h3>
            <p>Ontdek hoe je de mondgezondheid van je kinderen vanaf jonge leeftijd kunt bevorderen.</p>
        </div>
    </section>

    <section class="container my-5">
        <h2>Veelgestelde Vragen (FAQ)</h2>

        <div class="faq my-3">
            <h3>Hoe vaak moet ik mijn tanden laten controleren?</h3>
            <p>Het wordt aanbevolen om minstens twee keer per jaar een tandartsbezoek te plannen.</p>
        </div>

        <div class="faq my-3">
            <h3>Wat moet ik doen bij bloedend tandvlees?</h3>
            <p>Lees meer over de mogelijke oorzaken en wat u kunt doen om het te behandelen.</p>
        </div>
    </section>


    <?php include 'Footer.php'; ?>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
