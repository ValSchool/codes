<?php
class AppointmentController
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Function to create an appointment
    public function createAppointment($dentist_id, $patient_id, $appointment_date, $notes = null): bool
    {
        $sql = "INSERT INTO appointments (patient_id, dentist_id, appointment_date, appointment_status, notes) VALUES (?, ?, ?, 'scheduled', ?)";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        return $stmt->execute([$patient_id, $dentist_id, $appointment_date, $notes]);  // Execute with parameters
    }

    // Function to retrieve a random dentist
    public function getRandomDentistId(): ?int
    {
        $sql = "SELECT user_id FROM users WHERE role = 'dentist' ORDER BY RAND() LIMIT 1";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        $stmt->execute();  // Execute the prepared statement
        $result = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the result
    
        return $result ? (int)$result['user_id'] : null;
    }

    // Function to view all appointments for the dentist
    public function getAllAppointments($dentist_id) {
        $sql = "SELECT * FROM appointments WHERE dentist_id = ? ORDER BY appointment_date DESC";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        $stmt->execute([$dentist_id]);  // Execute with the parameter
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all results
    }

    // Function to get details of a specific appointment by appointment_id
    public function getAppointmentDetails($appointment_id, $dentist_id)
    {
        $sql = "SELECT * FROM appointments WHERE appointment_id = ? AND dentist_id = ?";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        $stmt->execute([$appointment_id, $dentist_id]);  // Execute with parameters
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the result
    }

    // Function to confirm an appointment
    public function confirmAppointment($appointment_id, $dentist_id)
    {
        $sql = "UPDATE appointments SET appointment_status = 'confirmed' WHERE appointment_id = ? AND dentist_id = ?";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        return $stmt->execute([$appointment_id, $dentist_id]);  // Execute with parameters
    }

    // Function to cancel an appointment
    public function cancelAppointment($appointment_id, $dentist_id)
    {
        $sql = "UPDATE appointments SET appointment_status = 'canceled' WHERE appointment_id = ? AND dentist_id = ?";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        return $stmt->execute([$appointment_id, $dentist_id]);  // Execute with parameters
    }

    // Function to complete an appointment
    public function completeAppointment($appointment_id, $dentist_id)
    {
        $sql = "UPDATE appointments SET appointment_status = 'completed' WHERE appointment_id = ? AND dentist_id = ?";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        return $stmt->execute([$appointment_id, $dentist_id]);  // Execute with parameters
    }

    // Function to update appointment notes
    public function updateAppointmentNotes($appointment_id, $notes, $dentist_id)
    {
        $sql = "UPDATE appointments SET notes = ? WHERE appointment_id = ? AND dentist_id = ?";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        return $stmt->execute([$notes, $appointment_id, $dentist_id]);  // Execute with parameters
    }

    // Function to get appointments for a patient
    public function getAppointmentsForPatient($patient_id) {
        $sql = "SELECT * FROM appointments WHERE patient_id = ? ORDER BY appointment_date DESC";
        $stmt = $this->db->prepare($sql);  // Prepare the SQL statement
        $stmt->execute([$patient_id]);  // Execute with the parameter
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all results
    }

}
