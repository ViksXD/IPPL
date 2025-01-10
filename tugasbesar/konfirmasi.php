<?php
$total = $_GET['total'] ?? 0;
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
  <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center items-center">
    <h1 class="text-xl font-bold text-[#00a9ff] mb-4">Bayar Pesanan</h1>
    <img src="elements/qr.png" alt="">
    <p class="mb-4">Total Pembayaran:</p>
    <p class="text-2xl font-bold text-[#00a9ff]">Rp <?php echo number_format($total, 0, ',', '.'); ?></p>
    <a href="MenuCustomer.php" class="block bg-[#00a9ff] text-white py-2 mt-4 rounded-lg hover:bg-blue-600">
      Kembali ke Halaman Utama
    </a>
  </div>
</body>
</html>