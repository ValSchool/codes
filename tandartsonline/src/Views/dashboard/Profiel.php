<?php
session_start();
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';
include 'C:/xampp/htdocs/tandartsonline/src/Controllers/UserController.php';
include 'C:/xampp/htdocs/tandartsonline/config/database.php';

// Assuming the logged-in user's ID is stored in the session
$user_id = $_SESSION['user_id'] ?? null; 

if ($user_id) {
    $myDb = new DB('tandartsonline');
    $userController = new UserController($myDb);
    // Fetch the user's data using their user_id
    $user = $userController->getPatientById($user_id);
} else {
    // Redirect to login page if the user is not logged in
    header("Location: /login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar-sticky {
            position: sticky;
            top: 0;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar ul li a {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-dark bg-dark col-md-3 col-lg-2 d-md-block d-lg-none">
                <button class="navbar-toggler w-100" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> Menu
                </button>
            </nav>

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h4 class="text-light">Settings</h4>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#account-info">Account Info</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h2>Profile</h2>
                </div>

               <!-- Account Info Section -->
<div id="account-info" class="card mb-4">
    <div class="card-header">
        <h4>Account Info</h4>
    </div>
    <div class="card-body">
        <!-- Display user information -->
        <?php if ($user): ?>
            <form method="POST" action="edit_profiel.php">
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($user['phone_number']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Info</button>
            </form>
        <?php else: ?>
            <p>No user information found.</p>
        <?php endif; ?>
    </div>
</div>

               
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
