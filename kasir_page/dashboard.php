<?php 
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'pelanggan') {
    header("Location: ../auth/login.php");
    exit;
}
require_once '../includes/koneksi.php';
include '../includes/header.php'; 
?>

<main class="container-fluid my-4 px-5" style="min-height: 60vh;">
    <div class="row">
        <div class="col-md-2 border-end">
            <h5 class="fw-bold mb-4">Menu Kasir</h5>
        </div>

        <div class="col-md-10">
            <h2>Selamat Datang, Kasir!</h2>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>