<?php
session_start();
include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Header.php';
include 'C:/xampp/htdocs/tandartsonline/src/Controllers/UserController.php';
include '../../../config/database.php';  

$myDb = new DB('tandartsonline');
// Instantiate the UserController class with the PDO connection
$userController = new UserController($myDb);

// Handle search functionality
$searchKeyword = '';
$users = []; // Initialize users variable
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchKeyword = $_POST['keyword'];
    // Use the searchPatients method from UserController
    $users = $userController->searchPatients($searchKeyword);
} else {
    // Fetch all patients if no search keyword is provided
    $users = $userController->getAllPatients();
}
?>

<link rel="stylesheet" href="/tandartsonline/public/assets/css/styles.css">

<div class="container mt-5">
    <div class="row">
        <!-- Introduction -->
        <div class="col-md-12">
            <h1>Registered Users</h1>
            <p class="lead">Below is a list of all registered users on Tandarts Online.</p>

            <!-- Search Form -->
            <form action="" method="POST" class="mb-4"> <!-- Changed action to current page -->
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Search by name or email" value="<?php echo htmlspecialchars($searchKeyword); ?>">
                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                </div>
            </form>

            <!-- Users Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($users) > 0) {
                        foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($user['user_id']) . "</td>"; // Corrected from 'U' to 'user_id'
                            echo "<td>" . htmlspecialchars($user['first_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['last_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['phone_number']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['role']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['created_at']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'C:/xampp/htdocs/tandartsonline/public/assets/Header/Footer.php'; ?>
