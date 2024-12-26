<?php
session_start();
// Check if the user is logged in
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Visitor';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Catalog</title>
    <link rel="stylesheet" href="css/CustMenu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
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

    <!-- Main Content -->
    <main>
        <h1 class="header1">Our Catalog</h1>
        <p class="texth1">When choosing a laundry catalog, consider the variety of services offered. Reviews and ratings can also help gauge reliability and quality.</p>
        <section class="catalog">
            <div class="catalog-grid">
            <a href="order.php" class="block no-underline text-black hover:text-blue-500">
                <div class="catalog-item">
                    <img src="elements/K1.png" alt="One Day Service">
                    <h3>One Day Service</h3>
                    <p>Ratings</p>
                    <p>⭐⭐⭐⭐⭐</p>
                </div>
            </a>
            <a href="order1.php" class="block no-underline text-black hover:text-blue-500">
                <div class="catalog-item">
                    <img src="elements/K2.png" alt="Regular Package">
                    <h3>Regular Package</h3>
                    <p>Ratings</p>
                    <p>⭐⭐⭐⭐</p>
                </div>
            </a>
            <a href="order2.php" class="block no-underline text-black hover:text-blue-500">
                <div class="catalog-item">
                    <img src="elements/K3.png" alt="Bed Cover Package">
                    <h3>Bed Cover Package</h3>
                    <p>Ratings</p>
                    <p>⭐⭐⭐</p>
                </div>
            </a>
            <a href="order3.php" class="block no-underline text-black hover:text-blue-500">
                <div class="catalog-item">
                    <img src="elements/K4.png" alt="Shoes Package">
                    <h3>Shoes Package</h3>
                    <p>Ratings</p>
                    <p>⭐⭐⭐⭐</p>
                </div>
            </a>


            </div>
        </section>
    </main>
</body>
</html>
