<?php 
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'pelanggan') {
    header("Location: ../auth/login.php");
    exit;
}
require_once '../includes/koneksi.php';
?>

<main class="container my-5" style="min-height: 50vh;">
    <h2>Dashboard Pelanggan (Riwayat Pesanan)</h2>
</main>