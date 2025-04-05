-- Create the database
CREATE DATABASE IF NOT EXISTS hotelterduin;

-- Use the database
USE hotelterduin;

-- Create the employees table
CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'employee',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create a sample employee with a hashed password
-- Run this insert query only once to add a default user
INSERT INTO employees (username, password, role) VALUES
('admin', '$2y$10$eT7OZkU0CUpPdrpqlp.CzS34J3ji0ExbZqQ4JomHO49wZT1Zq4Oei', 'admin');

-- Create rooms table
CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(10) NOT NULL UNIQUE,
    room_type VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status ENUM('available', 'reserved', 'occupied') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert some sample rooms
INSERT INTO rooms (room_number, room_type, price, status) VALUES
('101', 'Single', 100.00, 'available'),
('102', 'Double', 150.00, 'available'),
('103', 'Suite', 250.00, 'available'),
('104', 'Double', 150.00, 'available'),
('105', 'Single', 100.00, 'available');

-- Create reservations table
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    room_id INT NOT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    guest_name VARCHAR(255) NOT NULL,
    guest_email VARCHAR(255),
    guest_phone VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- Create sample reservations
INSERT INTO reservations (employee_id, room_id, check_in_date, check_out_date, guest_name, guest_email, guest_phone) VALUES
(1, 1, '2025-05-01', '2025-05-07', 'John Doe', 'johndoe@example.com', '1234567890'),
(1, 2, '2025-05-02', '2025-05-05', 'Jane Smith', 'janesmith@example.com', '0987654321');

-- Create a table for hotel staff members to track work hours or any other data
CREATE TABLE IF NOT EXISTS staff_hours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    date DATE NOT NULL,
    hours_worked DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);

-- Create a table for feedback (customer reviews)
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

-- Create a table to log the system's activities (optional for admin use)
CREATE TABLE IF NOT EXISTS activity_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT NOT NULL,
    activity_description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);

-- Create an alert table to handle alerts for rooms availability (optional)
CREATE TABLE IF NOT EXISTS room_alerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    alert_message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a sample alert (for rooms availability)
INSERT INTO room_alerts (alert_message) VALUES
('Only 2 rooms left for the day. Act quickly!');

-- Create a table to track payments
CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

-- Create a table for room cleaning schedules
CREATE TABLE IF NOT EXISTS cleaning_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    clean_date DATE NOT NULL,
    cleaned_by INT NOT NULL,
    FOREIGN KEY (room_id) REFERENCES rooms(id),
    FOREIGN KEY (cleaned_by) REFERENCES employees(id)
);
