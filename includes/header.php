<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sudah_login = isset($_SESSION['id_user']);
$nama_user   = $sudah_login ? $_SESSION['nama'] : '';
$role        = $sudah_login ? $_SESSION['role'] : '';

$base_url = "http://localhost/Laundry_Bersama_Kelompok_3/";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Four "U" Laundry</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>assets/css/style.css">
</head>
<body>

    <!-- NAVBAR (Header) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container-fluid px-5">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="<?= $base_url ?>index.php">
                <img src="<?= $base_url ?>assets/img/logo.png" alt="Four U Laundry" height="40" class="me-2">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-4 text-uppercase fw-semibold" style="font-size: 14px;">
                    <li class="nav-item"><a class="nav-link text-dark" href="<?= $base_url ?>index.php#home">HOME</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="<?= $base_url ?>index.php#laundry">LAUNDRY</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="<?= $base_url ?>index.php#harga">LIST HARGA</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="<?= $base_url ?>index.php#lokasi">LOKASI</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="<?= $base_url ?>index.php#kontak">HUBUNGI KAMI</a></li>
                </ul>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <a href="<?= $base_url ?>auth/login.php" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm" style="background-color: #FFC107; color: #000;">
                    Pesan Sekarang
                </a>
                
                <?php if ($sudah_login): ?>
                    <a href="<?= $base_url ?>auth/logout.php" class="text-decoration-none fw-bold" style="color: #9C27B0;">Logout</a>
                <?php else: ?>
                    <a href="<?= $base_url ?>auth/login.php" class="text-decoration-none fw-bold text-dark">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>