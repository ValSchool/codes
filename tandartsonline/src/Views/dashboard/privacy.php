<?php
session_start();
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Check the selected language from the session or set to default 'nl'
$language = $_SESSION['lang'] ?? 'nl';

// Define translations for the privacy policy
$translations = [
    'title' => [
        'nl' => 'Privacybeleid',
        'en' => 'Privacy Policy',
    ],
    'intro' => [
        'nl' => 'Bij Tandarts Online respecteren we uw privacy en zorgen we ervoor dat uw persoonlijke gegevens veilig worden behandeld. Dit privacybeleid legt uit welke gegevens we verzamelen, hoe we ze gebruiken en welke rechten u heeft met betrekking tot uw gegevens.',
        'en' => 'At Tandarts Online, we respect your privacy and ensure that your personal data is handled securely. This privacy policy explains what data we collect, how we use it, and what rights you have regarding your data.',
    ],
    'data_collection' => [
        'nl' => '1. Gegevensverzameling',
        'en' => '1. Data Collection',
    ],
    'data_collection_description' => [
        'nl' => 'We verzamelen persoonlijke gegevens wanneer u zich registreert, inlogt of ons contactformulier invult. De gegevens die we kunnen verzamelen zijn onder andere:',
        'en' => 'We collect personal data when you register, log in, or fill out our contact form. The data we may collect includes:',
    ],
    'data_usage' => [
        'nl' => '2. Gebruik van gegevens',
        'en' => '2. Use of Data',
    ],
    'data_usage_description' => [
        'nl' => 'We gebruiken uw gegevens voor de volgende doeleinden:',
        'en' => 'We use your data for the following purposes:',
    ],
    'data_security' => [
        'nl' => '3. Gegevensbeveiliging',
        'en' => '3. Data Security',
    ],
    'data_security_description' => [
        'nl' => 'We nemen de beveiliging van uw gegevens serieus en hebben passende technische en organisatorische maatregelen getroffen om uw gegevens te beschermen tegen ongeoorloofde toegang, verlies of schade.',
        'en' => 'We take the security of your data seriously and have taken appropriate technical and organizational measures to protect your data from unauthorized access, loss, or damage.',
    ],
    'your_rights' => [
        'nl' => '4. Uw rechten',
        'en' => '4. Your Rights',
    ],
    'your_rights_description' => [
        'nl' => 'U heeft verschillende rechten met betrekking tot uw persoonlijke gegevens, waaronder:',
        'en' => 'You have various rights regarding your personal data, including:',
    ],
    'contact_info' => [
        'nl' => '5. Contactgegevens',
        'en' => '5. Contact Information',
    ],
    'contact_info_description' => [
        'nl' => 'Als u vragen heeft over ons privacybeleid of als u uw rechten wilt uitoefenen, kunt u contact met ons opnemen via het contactformulier op onze website of via e-mail op <a href="mailto:info@tandartsonline.nl">info@tandartsonline.nl</a>.',
        'en' => 'If you have any questions about our privacy policy or wish to exercise your rights, you can contact us via the contact form on our website or by email at <a href="mailto:info@tandartsonline.nl">info@tandartsonline.nl</a>.',
    ],
    'policy_changes' => [
        'nl' => '6. Wijzigingen in het privacybeleid',
        'en' => '6. Changes to the Privacy Policy',
    ],
    'policy_changes_description' => [
        'nl' => 'We behouden ons het recht voor om dit privacybeleid te wijzigen. We zullen u op de hoogte stellen van eventuele wijzigingen via onze website.',
        'en' => 'We reserve the right to change this privacy policy. We will notify you of any changes through our website.',
    ],
    'data_points' => [
        'nl' => [
            'Naam',
            'E-mailadres',
            'Telefoonnummer',
            'Gegevens over uw afspraken',
        ],
        'en' => [
            'Name',
            'Email Address',
            'Phone Number',
            'Appointment Data',
        ],
    ],
    'usage_points' => [
        'nl' => [
            'Om uw account aan te maken en te beheren.',
            'Om afspraken te plannen en bevestigen.',
            'Om te reageren op uw vragen en opmerkingen.',
            'Om u op de hoogte te houden van onze diensten en aanbiedingen.',
        ],
        'en' => [
            'To create and manage your account.',
            'To schedule and confirm appointments.',
            'To respond to your questions and comments.',
            'To keep you informed about our services and offers.',
        ],
    ],
    'rights_points' => [
        'nl' => [
            'Het recht om toegang te vragen tot uw gegevens.',
            'Het recht om uw gegevens te laten rectificeren of verwijderen.',
            'Het recht om bezwaar te maken tegen de verwerking van uw gegevens.',
            'Het recht op gegevensoverdraagbaarheid.',
        ],
        'en' => [
            'The right to request access to your data.',
            'The right to request correction or deletion of your data.',
            'The right to object to the processing of your data.',
            'The right to data portability.',
        ],
    ],
];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $translations['title'][$language]; ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1><?php echo $translations['title'][$language]; ?></h1>
    <p><?php echo $translations['intro'][$language]; ?></p>

    <h2><?php echo $translations['data_collection'][$language]; ?></h2>
    <p><?php echo $translations['data_collection_description'][$language]; ?></p>
    <ul>
        <?php foreach ($translations['data_points'][$language] as $point): ?>
            <li><?php echo $point; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2><?php echo $translations['data_usage'][$language]; ?></h2>
    <p><?php echo $translations['data_usage_description'][$language]; ?></p>
    <ul>
        <?php foreach ($translations['usage_points'][$language] as $point): ?>
            <li><?php echo $point; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2><?php echo $translations['data_security'][$language]; ?></h2>
    <p><?php echo $translations['data_security_description'][$language]; ?></p>

    <h2><?php echo $translations['your_rights'][$language]; ?></h2>
    <p><?php echo $translations['your_rights_description'][$language]; ?></p>
    <ul>
        <?php foreach ($translations['rights_points'][$language] as $point): ?>
            <li><?php echo $point; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2><?php echo $translations['contact_info'][$language]; ?></h2>
    <p><?php echo $translations['contact_info_description'][$language]; ?></p>

    <h2><?php echo $translations['policy_changes'][$language]; ?></h2>
    <p><?php echo $translations['policy_changes_description'][$language]; ?></p>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
</body>
</html>
