<?php
session_start();
// Database connection (assumed)
$servername = "localhost";
$username_db = "root";
$password_db = "ibrahim30";
$dbname = "laundry";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in and fetch user data
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Visitor';

// If logged in, fetch additional user details (e.g., profile picture)
if ($username !== 'Guest') {
    $sql = "SELECT profile_picture FROM akun WHERE username = '$username'";
    $profile_picture = 'default-profile.png';
} else {
    $profile_picture = 'default-profile.png'; // default for guests
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash & Wear Laundry</title>
    <script src="Main.js" defer></script>
    <link rel="stylesheet" href="css/KarMenu.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<nav class="w-full mx-auto p-6 mb-24 bg-[#d5ecfa]">
        <div class="flex items-center justify-between">
      

        <!-- Logo -->
        <img src="image/logo.png" alt="Logo" class="w-1/4 md:w-1/12" />

        <!-- Desktop Menu -->
        <div class="hidden font-bold md:flex space-x-12 text-[#21B7E2]">
            <a href="MenuCustomer.php" class="hover:text-indigo-500 text-h2Blue">Home</a>
            <a href="Receipt.html" class="hover:text-indigo-500 text-h2Blue">Receipt</a>
            <a href="Process.html" class="hover:text-indigo-500 text-h2Blue">Process</a>
            <a href="katalog.php" class="hover:text-indigo-500 text-h2Blue">Catalog</a>
        </div>

        <div class="flex items-center space-x-4">
            
            <div class="profile-info hidden sm:block">
                <span class="font-bold"><?php echo htmlspecialchars($username); ?></span><br>
                <span class="seller-role"><?php echo htmlspecialchars($role); ?></span>
            </div>
            <img src="image/profilelogo.png" alt="Profile" class="w-12 h-12 rounded-full">
        </div>


        <!-- Hamburger Icon (Mobile) -->
        <div class="md:hidden">
            <button id="menuToggle" class="focus:outline-none">
                <span id="menuIcon" class="text-2xl">☰</span>
            </button>
        </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden mt-4 font-bold bg-[#d5ecfa] text-[#21B7E2]">
            <a href="MenuCustomer.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Home</a>
            <a href="Receipt.html" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Receipt</a>
            <a href="Process.html" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Process</a>
            <a href="katalog.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Catalog</a>
        </div>
    </nav>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu'); // Fixed reference

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu'); // Fixed reference

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

    <main>
        <section class="grid-section">
            <div class="card">
                <img src="image/Catalog1.PNG" alt="Catalog" class="card-icon">
                <p>Catalog</p>
            </div>
            <div class="card">
                <img src="image/proses.PNG" alt="Review" class="card-icon">
                <p>Proses</p>
            </div>
            <div class="card">
                <img src="image/Review2.PNG" alt="Review" class="card-icon">
                <p>Daftar Nota</p>
            </div>
        </section>
    </main>
</body>
</html>
