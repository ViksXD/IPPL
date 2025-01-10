<?php
session_start(); // Start the session

// Connect to the database
require_once 'db_connection.php';

// Retrieve form data
$user = $_POST['username'];
$pass = $_POST['password'];

// Query to check user credentials
$sql = "SELECT username, password, role FROM akun WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->store_result();

// Check if user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($username, $hashedPassword, $role);
    $stmt->fetch();

    // Verify password
    if (password_verify($pass, $hashedPassword)) {
        // Store user info in session variables
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role === "customer") {
            header("Location: MenuCustomer.php");
            exit();
        } elseif ($role === "karyawan") {
            header("Location: MenuKaryawan.php");
            exit();
        }
    } else {
        // Invalid password
        echo "<script>
            alert('Invalid username or password. Please try again.');
            window.location.href = 'Login.html';
        </script>";
        exit();
    }
} else {
    // Invalid username
    echo "<script>
        alert('Invalid username or password. Please try again.');
        window.location.href = 'Login.html';
    </script>";
    exit();
}

$stmt->close();
$conn->close();
?>
