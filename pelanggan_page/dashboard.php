<?php 
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'pelanggan') {
    header("Location: ../auth/login.php");
    exit;
}
require_once '../includes/koneksi.php';
include '../includes/header.php'; 
?>

<main class="container my-5" style="min-height: 50vh;">
    <h2>Dashboard Pelanggan (Riwayat Pesanan)</h2>
</main>

<?php include '../includes/footer.php'; ?>