<?php
session_start();
require_once 'includes/koneksi.php';
include 'includes/header.php';

$is_pelanggan = isset($_SESSION['id_user']) && $_SESSION['role'] === 'pelanggan';
$link_pesan = $is_pelanggan ? "pelanggan_page/pemesanan.php" : "auth/login.php";
?>

<!-- KONTEN UTAMA DIBUNGKUS GRADASI -->
<main class="main-gradient-bg">

    <!-- HERO SECTION -->
    <section class="container-fluid px-5 py-4" id="home">
        <div class="hero-box position-relative rounded-5 overflow-hidden shadow-lg d-flex align-items-center" style="min-height: 400px; background: url('assets/img/hero_FL.jpg') center/cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(74, 21, 75, 0.8) 0%, rgba(181, 126, 220, 0.4) 100%);"></div>

            <div class="position-relative z-1 text-white p-5 ms-md-4">
                <h1 class="display-4 fw-bold mb-3">AYO LAUNDRY</h1>
                <p class="fs-5 mb-4">Pakaian bersih<br>tanpa harus repot mencuci</p>
                <div class="d-flex gap-3">
                    <a href="#kontak" class="btn btn-outline-light rounded-pill px-4 fw-bold">Temui Kami</a>
                    <a href="<?= $link_pesan ?>" class="btn btn-warning rounded-pill px-4 fw-bold" style="background-color: #FFC107; color: #000;">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section class="container px-5 py-5" id="about">
        <div class="row align-items-center">
            <div class="col-md-7 pe-md-5">
                <h2 class="fw-bold mb-4 text-dark">About Us</h2>
                <p class="text-muted" style="font-size: 14px; line-height: 1.8; text-align: justify;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
                <p class="text-muted" style="font-size: 14px; line-height: 1.8; text-align: justify;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui hendrerit enim, sed efficitur sem est vitae lorem. Integer lobortis turpis quis ante tristique, a condimentum augue congue.
                </p>
            </div>
            <div class="col-md-5 text-center mt-4 mt-md-0">
                <img src="assets/img/mesin-cuci.png" alt="Mesin Cuci" class="img-fluid" style="max-height: 350px;">
            </div>
        </div>
    </section>

    <!-- OUR SERVICES SECTION -->
    <section class="container px-5 py-5 text-center" id="laundry">
        <h2 class="fw-bold mb-5 text-white">Our Services</h2>
        <div class="row g-4 justify-content-center">
            <?php
            $services = ["Wash & Dry", "Full Services", "Wash & Iron", "Wash Only", "Dry Only", "Iron Only"];
            foreach ($services as $svc):
            ?>
                <div class="col-md-4 col-sm-6">
                    <!-- Card Layanan -->
                    <div class="service-card rounded-4 position-relative overflow-hidden shadow-sm" style="aspect-ratio: 1/1; background: url('assets/img/service-dummy.jpg') center/cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.2);"></div>
                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4">
                            <span class="badge rounded-pill text-dark px-4 py-2" style="background-color: #FFC107; font-size: 14px;"><?= $svc ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- OUR EXPERIENCE SECTION -->
    <section class="container px-5 py-5 text-center">
        <h2 class="fw-bold mb-5 text-white" style="opacity: 0.9;">Our Experience</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-3">
                <div class="bg-white rounded-4 shadow py-4 px-3 border border-purple border-3">
                    <h2 class="display-5 fw-bold mb-0 text-dark">300++</h2>
                    <p class="mb-0 text-purple fw-semibold">Orders Completed</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white rounded-4 shadow py-4 px-3 border border-purple border-3">
                    <h2 class="display-5 fw-bold mb-0 text-dark">11</h2>
                    <p class="mb-0 text-purple fw-semibold">Years of Service</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bg-white rounded-4 shadow py-4 px-3 border border-purple border-3">
                    <h2 class="display-5 fw-bold mb-0 text-dark">300++</h2>
                    <p class="mb-0 text-purple fw-semibold">Happy Customers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- OUR MACHINE SECTION -->
    <section class="container px-5 py-5" id="harga">
        <h2 class="fw-bold mb-5 text-center text-purple">Our Machine</h2>
        <div class="d-flex flex-column align-items-center gap-4">

            <div class="machine-box w-75 rounded-4 d-flex justify-content-between align-items-center px-5 py-3 shadow-sm" style="background: linear-gradient(90deg, rgba(206,147,216,1) 0%, rgba(243,229,245,1) 100%);">
                <h3 class="fw-bold text-purple mb-0">Setrika Uap</h3>
                <img src="assets/img/setrika.png" alt="Setrika" style="height: 100px;">
            </div>

            <div class="machine-box w-75 rounded-4 d-flex justify-content-between align-items-center px-5 py-3 shadow-sm" style="background: linear-gradient(90deg, rgba(171,71,188,1) 0%, rgba(243,229,245,1) 100%);">
                <h3 class="fw-bold text-white mb-0">Dry Clean Machine</h3>
                <img src="assets/img/dryclean.png" alt="Dry Clean" style="height: 100px;">
            </div>

            <div class="machine-box w-75 rounded-4 d-flex justify-content-between align-items-center px-5 py-3 shadow-sm" style="background: linear-gradient(90deg, rgba(186,104,200,1) 0%, rgba(243,229,245,1) 100%);">
                <h3 class="fw-bold text-purple mb-0">Vacuum Cleaner</h3>
                <img src="assets/img/vacuum.png" alt="Vacuum" style="height: 100px;">
            </div>

        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>