<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base_url = "http://localhost/Laundry_Bersama_Kelompok_3/";
$is_logged_in = isset($_SESSION['id_user']);

if ($is_logged_in) {
    $nama_lengkap = $_SESSION['nama'];
    $nama_pecah = explode(" ", $nama_lengkap);
    $nama_panggilan = strtolower($nama_pecah[0]); 
    $role_user = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a4ab271e04.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand me-auto" href="../index.php">
                <img src="assets/img/logo.png" alt="Four U Laundry">
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link mx-lg-2" href="#">LAUNDRY</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link mx-lg-2" href="#">LIST HARGA</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link mx-lg-2" href="#">LOKASI</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link mx-lg-2" href="#">HUBUNGI KAMI</a>
                        </li>
                    </ul>
                </div>
            </div>
           <div class="d-flex align-items-center gap-3">
    <?php if ($is_logged_in): ?>

        <div class="dropdown">
            <button class="btn rounded-pill px-4 py-2 d-flex align-items-center gap-2 shadow-none" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" 
                    style="background-color: #ffffff; border: 1px solid #d1d5db; color: #4b5563; font-size: 14px; font-weight: 500;">
                <span class="fw-bold">Hai, <?= htmlspecialchars($nama_panggilan) ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" aria-labelledby="userMenu" style="border-radius: 12px; font-size: 14px; min-width: 200px;">
                
                <?php if ($role_user === 'pelanggan'): ?>
                    <li><a class="dropdown-item py-2 px-3" href="<?= $base_url ?>pelanggan_page/dashboard.php">Dashboard Saya</a></li>
                    <li><a class="dropdown-item py-2 px-3" href="<?= $base_url ?>pelanggan_page/pemesanan.php">Buat Pesanan Baru</a></li>
                <?php elseif ($role_user === 'kasir'): ?>
                    <li><a class="dropdown-item py-2 px-3" href="<?= $base_url ?>kasir_page/dashboard.php">Dashboard Kasir</a></li>
                <?php elseif ($role_user === 'superadmin'): ?>
                    <li><a class="dropdown-item py-2 px-3" href="<?= $base_url ?>superadmin/dashboard.php">Dashboard Admin</a></li>
                <?php endif; ?>
                
                <li><hr class="dropdown-divider my-1"></li>
                <li><a class="dropdown-item text-danger py-2 px-3 fw-bold" href="<?= $base_url ?>auth/logout.php">Keluar</a></li>
            </ul>
        </div>

    <?php else: ?>

        <div class="d-flex align-items-center gap-3">
            <a href="<?= $base_url ?>auth/login.php" class="btn rounded-pill px-4 py-2 shadow-none" 
               style="border: 1px solid #d1d5db; color: #4b5563; font-size: 14px; font-weight: 500; background-color: transparent; transition: all 0.2s ease;">
               Masuk
            </a>
            <a href="<?= $base_url ?>auth/register.php" class="btn rounded-pill px-4 py-2 shadow-none" 
               style="background-color: #FFC107; color: #000; font-size: 14px; font-weight: 600; border: none; transition: all 0.2s ease;">
               Daftar
            </a>
        </div>
        
    <?php endif; ?>
</div>
        </div>
    </nav>