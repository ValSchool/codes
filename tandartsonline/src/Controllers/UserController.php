<?php
class UserController {
    private $db;

    // Constructor to initialize the database connection using PDO
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Function to get a single patient by user_id
    public function getPatientById($user_id) 
    {
        // SQL query to get a single patient by user_id
        $sql = "SELECT * FROM users WHERE role IN ('patient', 'dentist', 'admin') AND user_id = $user_id"; 
        return $this->db->exec($sql)->fetch(PDO::FETCH_ASSOC); // Execute and fetch a single result
    }
    
    // Function to get all patients
    public function getAllPatients() 
    {
        // SQL query to get all patients
        $sql = "SELECT * FROM users WHERE role = 'patient'"; 
        return $this->db->exec($sql)->fetchAll(PDO::FETCH_ASSOC); // Execute and fetch all results
    }

    // Function to search for patients by keyword
    public function searchPatients($keyword) 
    {
        // SQL query to search for patients by first name, last name, or email
        $sql = "SELECT * FROM users WHERE role = 'patient' AND (first_name LIKE '%$keyword%' OR last_name LIKE '%$keyword%' OR email LIKE '%$keyword%')";
        return $this->db->exec($sql)->fetchAll(PDO::FETCH_ASSOC); // Execute and fetch all results
    }

    public function updateUserInfo($user_id, $first_name, $last_name, $email, $phone_number) 
{
    $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number WHERE user_id = :user_id";
    $placeholders = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone_number' => $phone_number,
        'user_id' => $user_id,
    ];

    $stmt = $this->db->exec($sql, $placeholders);
    return $stmt->rowCount() > 0; // Return true if the update was successful
}
}
