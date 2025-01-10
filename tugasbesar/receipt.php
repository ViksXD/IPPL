<?php
session_start();
require_once 'db_connection.php';

// Get transaction ID from URL
$transaction_id = isset($_GET['id']) ? $_GET['id'] : '';

$status_mapping = [
    0 => 'Payment Pending',
    1 => 'Payment Confirmed'
];

// Fetch transaction details
$sql = "SELECT 
    p.id_pesanan,
    p.username,
    p.tanggal,
    p.total_harga,
    p.stat_pembayaran,
    k.jenis as katalog_type
    FROM pesanan p
    LEFT JOIN katalog k ON p.id_katalog = k.id_katalog
    WHERE p.id_pesanan = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $transaction_id);
$stmt->execute();
$result = $stmt->get_result();
$transaction = $result->fetch_assoc();

// Get current user's details
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Customer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Receipt Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="isinota.css">
</head>
<body>
    
    <div class="payment-container">
        <div class="payment-header">
            Payment Details
        </div>
        <div class="payment-details">
            <p>Payment Method
                <span><img src="qris.png" alt="QRIS"></span>
            </p>
            <p>Status <span><strong>
                <?php
                echo $status_mapping[$transaction['stat_pembayaran']] ?? 'Unknown';
                ?>
            </strong></span></p>
            <p>Date <span><?php echo htmlspecialchars($transaction['tanggal']); ?></span></p>
            <p>Transaction Id <span><?php echo htmlspecialchars($transaction['id_pesanan']); ?></span></p>
            <p>Service Type <span><?php echo htmlspecialchars($transaction['katalog_type']); ?></span></p>
        </div>
        <div class="total-price">
            <span>Total Price</span>
            <span>Rp <?php echo number_format($transaction['total_harga'], 0, ',', '.'); ?></span>
        </div>
    </div>
    <a href="daftarPesanan_Nota.php" class="block text-center text-blue-500 mt-4 hover:underline">Back to Orders</a>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
