<?php
session_start();
require_once 'db_connection.php';

// Daftar status proses
$status_mapping = [
    1 => 'Washing',
    2 => 'Ironing',
    3 => 'Drying',
    4 => 'Ready to Pick'
];

// Modified query to get process status from pesanan table
$sql = "SELECT 
            p.id_pesanan AS transaction_id, 
            a.username AS customer_name, 
            k.jenis AS katalog_type, 
            p.proses AS process_status
        FROM pesanan p
        LEFT JOIN akun a ON p.username = a.username
        LEFT JOIN katalog k ON p.id_katalog = k.id_katalog
        ORDER BY p.id_pesanan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer Order</title>
    <link rel="stylesheet" href="css/update_proses.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .edit-btn { text-decoration: none; color: blue; }
        .search-container { margin-bottom: 20px; }
    </style>
</head>
<body>
<nav class="w-full mx-auto p-6 mb-24 bg-[#d5ecfa]">
        <div class="flex items-center justify-between">
      

        <!-- Logo -->
        <img src="image/logo.png" alt="Logo" class="w-1/4 md:w-1/12" />

        <!-- Desktop Menu -->
        <div class="hidden font-bold md:flex space-x-12 text-[#21B7E2]">
            <a href="MenuKaryawan.php" class="hover:text-indigo-500 text-h2Blue">Home</a>
            <a href="daftarNota_Karyawan.php" class="hover:text-indigo-500 text-h2Blue">Receipt</a>
            <a href="update_proses.php" class="hover:text-indigo-500 text-h2Blue">Process</a>
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
            <a href="MenuKaryawan.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Home</a>
            <a href="daftarNota_Karyawan.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Receipt</a>
            <a href="update_proses.php" class="block py-2 text-center text-h2Blue hover:text-indigo-500">Process</a>
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
    
    <div class="container">
        <h1 class="text-2xl flex justify-center font-bold">Update Customer Process Status</h1>
        
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Customer</th>
                    <th>Transaction ID</th>
                    <th>Catalog Type</th>
                    <th>Process Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="orderTable">
                <?php
                if ($result->num_rows > 0) {
                    $counter = 1;
                    while($row = $result->fetch_assoc()) {
                        $process_status = $row['process_status'];
                        $process_status_text = $status_mapping[$process_status] ?? 'Unknown';
                        echo "<tr>";
                        echo "<td>" . $counter . ".</td>";
                        echo "<td>" . htmlspecialchars($row['customer_name'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($row['transaction_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['katalog_type'] ?? 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars("$process_status ($process_status_text)") . "</td>";
                        echo "<td><a href='update_order.php?id=" . $row['transaction_id'] . "' class='edit-btn'>✏️</a></td>";
                        echo "</tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>