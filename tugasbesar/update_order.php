<?php
session_start();
require_once 'db_connection.php';

// Ambil ID Pesanan dari URL
$id_pesanan = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Redirect jika tidak ada ID
if ($id_pesanan <= 0) {
    header('Location: update_proses.php');
    exit;
}

// Query untuk mengambil data pesanan
$sql = "SELECT 
            p.id_pesanan, 
            a.username AS customer_name, 
            k.jenis AS katalog_type, 
            p.proses AS process_status
        FROM pesanan p
        LEFT JOIN akun a ON p.username = a.username
        LEFT JOIN katalog k ON p.id_katalog = k.id_katalog
        WHERE p.id_pesanan = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pesanan);
$stmt->execute();
$result = $stmt->get_result();

// Jika pesanan tidak ditemukan, redirect
if ($result->num_rows == 0) {
    echo "<script>alert('Pesanan tidak ditemukan!'); window.history.back();</script>";
    exit;
}

$order = $result->fetch_assoc();

// Proses update data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_status = isset($_POST['process_status']) ? intval($_POST['process_status']) : 0;

    // Validasi input
    if ($new_status < 1 || $new_status > 4) {
        echo "Status tidak valid.";
    } else {
        // Update proses langsung di tabel pesanan
        $update_sql = "UPDATE pesanan SET proses = ? WHERE id_pesanan = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $new_status, $id_pesanan);
        if ($update_stmt->execute()) {
            echo "Proses berhasil diperbarui!";
            header("Location: update_proses.php"); // Redirect ke daftar pesanan
            exit;
        } else {
            echo "Gagal memperbarui proses.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order Process</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 max-w-lg w-full">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Update Order Process</h1>
        <p class="text-gray-600 mb-2"><strong>Customer:</strong> <?= htmlspecialchars($order['customer_name']); ?></p>
        <p class="text-gray-600 mb-4"><strong>Catalog Type:</strong> <?= htmlspecialchars($order['katalog_type']); ?></p>

        <form method="POST" class="space-y-4">
            <div>
                <label for="process_status" class="block text-gray-700 font-medium">Process Status</label>
                <select name="process_status" id="process_status" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="1" <?= $order['process_status'] == 1 ? 'selected' : ''; ?>>Washing</option>
                    <option value="2" <?= $order['process_status'] == 2 ? 'selected' : ''; ?>>Ironing</option>
                    <option value="3" <?= $order['process_status'] == 3 ? 'selected' : ''; ?>>Drying</option>
                    <option value="4" <?= $order['process_status'] == 4 ? 'selected' : ''; ?>>Ready to Pick</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">Update</button>
        </form>

        <a href="update_proses.php" class="block text-center text-blue-500 mt-4 hover:underline">Back to Orders</a>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>