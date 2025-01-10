<?php
session_start();
// Database connection (assumed)
require_once 'db_connection.php';


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
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="w-full mx-auto p-6 mb-24 bg-[#d5ecfa]">
        <div class="flex items-center justify-between">
      

        <!-- Logo -->
        <img src="logo.png" alt="Logo" class="w-1/4 md:w-1/12" />

        <!-- Desktop Menu -->
        <div class="hidden font-bold md:flex space-x-12 text-[#21B7E2]">
            <a href="MenuCustomer.php" class="hover:text-indigo-500 text-h2Blue">Home</a>
            <a href="daftarPesanan_Nota.php" class="hover:text-indigo-500 text-h2Blue">Receipt</a>
            <a href="daftarPesanan.php" class="hover:text-indigo-500 text-h2Blue">Process</a>
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
            <a href="daftarPesanan_Nota.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Receipt</a>
            <a href="daftarPesanan.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Process</a>
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
    <div class="flex justify-center gap-32 mt-10">
        <!-- Catalog -->
         <a href="Katalog.php" class="block no-underline">
            <div class="bg-white shadow-md rounded-lg p-20 text-center hover:shadow-lg transition">
                <img src="image/Catalog1.png" alt="Catalog Icon" class="w-16 mx-auto mb-4">
                <h3 class="text-blue-500 font-bold text-lg">Catalog</h3>
            </div>
         </a>

        <!-- Receipt -->
         <a href="daftarPesanan_Nota.php">
            <div class="bg-white shadow-md rounded-lg p-20 text-center hover:shadow-lg transition">
                <img src="image/Review2.png" alt="Receipt Icon" class="w-16 mx-auto mb-4">
                <h3 class="text-blue-500 font-bold text-lg">Receipt</h3>
            </div>
         </a>

        <!-- proses_2 -->
         <a href="daftarPesanan.php">
            <div class="bg-white shadow-md rounded-lg p-20 text-center hover:shadow-lg transition">
                <img src="image/proses.png" alt="proses_2 Icon" class="w-16 mx-auto mb-4">
                <h3 class="text-blue-500 font-bold text-lg">Process</h3>
            </div>            
         </a>
    </div>

</body>
</html>