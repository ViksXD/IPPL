<?php
// Pastikan total harga diterima
$total = isset($_GET['total']) ? intval($_GET['total']) : 0;

// Generate QR Code sederhana (menggunakan google chart API)
$qr_url = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" . urlencode("Total Pembayaran: Rp " . number_format($total, 0, ',', '.'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col justify-center items-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-96 text-center">
        <h1 class="text-2xl font-bold text-[#00a9ff] mb-4">Konfirmasi Pesanan</h1>
        
        <div class="mb-6">
            <p class="mb-2">Total Pembayaran:</p>
            <p class="text-2xl font-bold text-[#00a9ff]">Rp <?php echo number_format($total, 0, ',', '.'); ?></p>
        </div>
        
        <!-- QR Code -->
        <div class="flex justify-center mb-6">
            <img src="<?php echo $qr_url; ?>" alt="QR Code Pembayaran" class="w-48 h-48">
        </div>
        
        <!-- Tombol Submit Ulang -->
        <div class="space-y-4">
            <a href="MenuCustomer.php" class="block bg-[#00a9ff] text-white py-2 rounded-lg hover:bg-blue-600">
                Kembali ke Order
            </a>
            
            <form action="proses_pesanan.php" method="POST" class="mt-2">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <script>
        // Optional: Tambahkan timer untuk redirect
        setTimeout(() => {
            window.location.href = 'MenuCustomer.php';
        }, 60000); // Redirect setelah 1 menit
    </script>
</body>
</html>