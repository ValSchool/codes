<?php
include '../../../config/database.php';  // Ensure the path is correct
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : '';
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : '';
    $role = isset($_POST["role"]) ? $_POST["role"] : '';

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($phone_number) || empty($role)) {
        echo "All fields are required.";  // For English
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set current date and time for created_at and updated_at
    $created_at = date('Y-m-d H:i:s'); 
    $updated_at = $created_at;

    // Connect to the database and execute the INSERT query
    try {
        $myDb = new DB('tandartsonline'); // Ensure you use the correct database instance
        $pdo = $myDb->getPDO(); // Use the `getPDO` method of the DB instance to get the connection

        $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number, role, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$first_name, $last_name, $email, $hashed_password, $phone_number, $role, $created_at, $updated_at]);

        if ($result) {
            // Redirect to login.php after successful insertion
            header('Location: login.php');  
            exit;
        } else {
            echo "Something went wrong while inserting the data.";
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script>
    function validateForm() {
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var phone_number = document.getElementById("phone_number").value;

        if (first_name == "") {
            alert("Please fill in your first name.");  // For English
            return false;
        }

        if (last_name == "") {
            alert("Please fill in your last name.");  // For English
            return false;
        }

        if (email == "") {
            alert("Please fill in your email.");  // For English
            return false;
        }

        if (password == "") {
            alert("Please fill in your password.");  // For English
            return false;
        }

        if (phone_number == "") {
            alert("Please fill in your phone number.");  // For English
            return false;
        }

        return true;
    }

    function translate() {
        var lang = '<?php echo $_SESSION["lang"] ?? "nl"; ?>';  // Get the current language from the session
        
        // Translate content based on language
        if (lang === 'en') {
            document.getElementById("register-title").innerText = "Create an Account";
            document.getElementById("first_name").placeholder = "First Name";
            document.getElementById("last_name").placeholder = "Last Name";
            document.getElementById("email").placeholder = "Email";
            document.getElementById("phone_number").placeholder = "Phone Number";
            document.getElementById("password").placeholder = "Password";
            document.querySelector("input[type='submit']").value = "Register";
        } else {
            document.getElementById("register-title").innerText = "Maak een account";
            document.getElementById("first_name").placeholder = "Voornaam";
            document.getElementById("last_name").placeholder = "Achternaam";
            document.getElementById("email").placeholder = "E-mail";
            document.getElementById("phone_number").placeholder = "Telefoonnummer";
            document.getElementById("password").placeholder = "Wachtwoord";
            document.querySelector("input[type='submit']").value = "Toevoegen";
        }
    }

    window.onload = translate;  // Call the translate function on page load
    </script>

</head>
<body>
<div class="container mt-5">
    <h1 id="register-title">Maak een account</h1>
    <form action="register.php" method="POST" onsubmit="return validateForm()">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name">

        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name">

        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">

        <label for="phone_number">Phone Number:</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number">

        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">

        <input type="hidden" name="role" value="patient"/>
        <label for="patient"></label>
        <input type="submit" class="btn btn-primary" value="Toevoegen">
    </form>
</div>
</body>
</html>
<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
