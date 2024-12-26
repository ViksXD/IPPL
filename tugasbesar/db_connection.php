<?php
$host = 'localhost';     // Your database host
$dbname = 'laundry'; // Your database name
$username = 'root';      // Your database username
$password = 'ibrahim30';          // Your database password (empty if using XAMPP default)

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
