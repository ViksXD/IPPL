<?php
session_start();
require_once 'db_connection.php';

// Harga layanan
$harga = [
    'reguler' => 30000,
    'premium' => 50000,
    'treatment' => 60000
];

// Ambil data pesanan
$reguler = isset($_POST['reguler']) ? intval($_POST['reguler']) : 0;
$premium = isset($_POST['premium']) ? intval($_POST['premium']) : 0;
$treatment = isset($_POST['treatment']) ? intval($_POST['treatment']) : 0;

// Hitung total harga
$total_reguler = $reguler * $harga['reguler'];
$total_premium = $premium * $harga['premium'];
$total_treatment = $treatment * $harga['treatment'];
$total_harga = $total_reguler + $total_premium + $total_treatment;

// Simpan pesanan ke database
$username = $_SESSION['username'] ?? 'Guest';

$sql = "INSERT INTO pesanan (username, total_harga, tanggal) VALUES (?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $username, $total_harga);
$stmt->execute();

// Redirect ke halaman konfirmasi
header("Location: konfirmasi.php?total=" . $total_harga);
exit();