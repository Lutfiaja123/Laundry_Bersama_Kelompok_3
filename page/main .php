<?php
// page/main.php - Halaman utama Four "U" Laundry
session_start();

// Halaman ini boleh dilihat siapa saja. Login hanya wajib untuk memesan.
$sudah_login = isset($_SESSION['user']);
$nama_user   = $sudah_login ? $_SESSION['user'] : '';

$nomor_wa   = "6281931131031";
// Sudah login -> ke WhatsApp. Belum login -> diarahkan ke halaman login dulu.
if ($sudah_login) {
    $link_pesan   = "https://wa.me/" . $nomor_wa . "?text=" . urlencode("Halo Four U Laundry, saya " . $nama_user . " mau pesan laundry.");
    $target_pesan = "_blank";
} else {
    $link_pesan   = "login.php?pesan=1";
    $target_pesan = "_self";
}

$services = [
    ["Wash & Dry",    "../assets/img/service-1.jpg"],
    ["Full Services", "../assets/img/service-2.jpg"],
    ["Wash & Iron",   "../assets/img/service-3.jpg"],
    ["Wash Only",     "../assets/img/service-4.jpg"],
    ["Dry Only",      "../assets/img/service-5.jpg"],
    ["Iron Only",     "../assets/img/service-6.jpg"],
];

$experience = [
    ["300++", "Orders Completed"],
    ["11",    "Years of Service"],
    ["300++", "Happy Customers"],
];

$machines = [
    ["Setrika Uap",      "../assets/img/setrika.png"],
    ["Dry Clean Machine","../assets/img/dryclean.png"],
    ["Vacuum Cleaner",   "../assets/img/vacuum.png"],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Four "U" Laundry</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Quicksand:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --ungu: #8F1A96;
            --ungu-muda: #B05DB8;
            --kuning: #FFB800;
            --krem: #FFF8EA;
            --hitam: #111;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--hitam);
            background: #fff;
            overflow-x: hidden;
        }
        a { text-decoration: none; color: inherit; }

        /* ===== NAVBAR ===== */
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 8%;
            background: #fff;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 6px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
            color: var(--ungu-muda);
            line-height: 1;
        }
        /* Logo asli berbentuk persegi dengan ruang putih, jadi dipotong ke bagian tengah */
        .logo img {
            width: 170px;
            height: 62px;
            object-fit: cover;
            object-position: 50% 52.8%;
            display: block;
        }
        nav { display: flex; gap: 36px; }
        nav a { font-size: 11px; letter-spacing: .3px; color: #222; transition: color .2s; }
        nav a:hover { color: var(--ungu); }
        .btn {
            display: inline-block;
            background: var(--kuning);
            color: #000;
            border-radius: 30px;
            font-weight: 500;
            transition: transform .2s, box-shadow .2s;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 14px rgba(0,0,0,.2); }
        .btn-nav { font-size: 11px; padding: 7px 14px; border-radius: 6px; }
        .nav-right { display: flex; align-items: center; gap: 12px; }
        .halo { font-size: 11px; color: #444; }
        .btn-logout {
            font-size: 11px;
            padding: 6px 14px;
            border-radius: 6px;
            border: 1.5px solid var(--ungu);
            color: var(--ungu);
            font-weight: 500;
            transition: background .2s, color .2s;
        }
        .btn-logout:hover { background: var(--ungu); color: #fff; }

        /* ===== HERO ===== */
        .hero {
            position: relative;
            margin: 8px 3% 0;
            height: 340px;
            border-radius: 20px;
            overflow: hidden;
            background: #6c3a8c url('../assets/img/hero.jpg') center/cover no-repeat;
            color: #fff;
        }
        .hero::before {
            content: "";
            position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(143,26,150,.55), rgba(110,40,150,.75));
        }
        .hero-content { position: relative; padding: 36px 5%; height: 100%; }
        .hero h1 { font-family: 'Quicksand', sans-serif; font-size: 30px; font-weight: 600; letter-spacing: .5px; }
        .hero p { margin-top: 16px; font-weight: 500; font-size: 15px; line-height: 1.4; }
        .hero-btns { position: absolute; left: 5%; bottom: 28px; display: flex; gap: 22px; }
        .hero-btns .btn { padding: 10px 26px; font-size: 15px; }

        /* ===== WRAPPER GRADIENT (About -> Services -> Experience -> Machine) ===== */
        .gradient-bg {
            background: linear-gradient(180deg,
                #FFFFFF 0%,
                #FFF8EA 8%,
                #F2D5C5 22%,
                #C070B0 36%,
                #8F1A96 48%,
                #8F1A96 78%,
                #B24AA3 86%,
                #E2B3C6 96%,
                #EBC9D3 100%);
        }

        /* ===== ABOUT ===== */
        .about {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            padding: 100px 5% 40px;
            position: relative;
            min-height: 640px;
        }
        .about-text { width: 46%; }
        .about h2 { font-family: 'Quicksand', sans-serif; font-weight: 500; font-size: 28px; margin-bottom: 24px; }
        .about p { font-size: 11px; line-height: 1.35; margin-bottom: 4px; }
        .about .btn { margin-top: 110px; padding: 9px 22px; font-size: 14px; }
        .about-img { width: 46%; text-align: center; }
        .about-img img { width: 100%; max-width: 480px; }

        /* ===== SERVICES ===== */
        .section-title {
            text-align: center;
            font-family: 'Quicksand', sans-serif;
            font-weight: 500;
            font-size: 40px;
            color: #fff;
        }
        .services { padding: 40px 0 60px; }
        .services-box {
            background: #fff;
            margin: 40px 6% 0;
            border-radius: 22px;
            padding: 44px 6%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px 22px;
        }
        .service-card {
            position: relative;
            aspect-ratio: 1 / 1;
            border-radius: 28px;
            overflow: hidden;
            background: #c9b8a5 center/cover no-repeat;
        }
        .service-card::before {
            content: "";
            position: absolute; inset: 0;
            background: rgba(90, 50, 20, .35);
        }
        .service-card span {
            position: absolute;
            left: 50%; bottom: 20px;
            transform: translateX(-50%);
            background: var(--kuning);
            color: #000;
            font-size: 15px;
            font-weight: 500;
            padding: 6px 22px;
            border-radius: 20px;
            white-space: nowrap;
        }

        /* ===== EXPERIENCE ===== */
        .experience { padding: 60px 0 110px; }
        .exp-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 28px;
            margin: 36px 4% 0;
        }
        .exp-card {
            background: #fff;
            border: 4px solid var(--ungu);
            border-radius: 18px;
            box-shadow: 0 6px 10px rgba(143,26,150,.35);
            padding: 24px 12px;
            text-align: center;
            flex: 1;
        }
        .exp-card h3 { font-family: 'Quicksand', sans-serif; font-weight: 500; font-size: 56px; line-height: 1.1; }
        .exp-card p { font-family: 'Quicksand', sans-serif; font-weight: 600; font-size: 24px; color: var(--ungu); margin-top: 4px; }

        /* ===== MACHINE ===== */
        .machine {
            padding: 40px 0 80px;
            /* Lanjutan warna pink dari bagian Experience, lalu memudar ke krem/putih */
            background: linear-gradient(180deg, #EBC9D3 0%, #FBEBDD 35%, #FFFFFF 100%);
        }
        .machine .section-title { color: var(--ungu); font-size: 40px; font-weight: 600; margin-bottom: 40px; }
        .machine-item {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 11% 40px 10.8%;
            height: 128px;
            border-radius: 18px 18px 0 0;
            background: linear-gradient(90deg, #B060B8 0%, #E2C1E6 50%, #F6EAF6 100%);
            padding: 0 4%;
        }
        .machine-item h3 {
            font-family: 'Quicksand', sans-serif;
            font-weight: 600;
            font-size: 38px;
            color: var(--ungu);
        }
        .machine-item img {
            position: absolute;
            right: 8%;
            bottom: 10px;
            max-height: 120px;
            max-width: 160px;
            object-fit: contain;
        }

        /* ===== KONTAK ===== */
        .kontak {
            display: flex;
            justify-content: space-between;
            gap: 40px;
            padding: 50px 5% 40px;
            background: #fff;
        }
        .kontak-info { width: 45%; }
        .kontak h4 { font-size: 15px; font-weight: 500; margin-bottom: 12px; }
        .kontak-info .row { display: flex; align-items: center; gap: 8px; font-size: 11px; margin-bottom: 10px; }
        .kontak-info .tentang { margin-top: 26px; }
        .kontak-info p.desc { font-size: 11px; line-height: 1.4; }
        .kontak-map {
            width: 46%;
            height: 210px;
            border-radius: 6px;
            overflow: hidden;
            background: #f1f1f1;
        }
        .kontak-map iframe { width: 100%; height: 100%; border: 0; }

        footer { text-align: center; font-size: 10px; padding: 16px 0 24px; background: #fff; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 800px) {
            nav { display: none; }
            .about, .kontak, .exp-wrap { flex-direction: column; }
            .about-text, .about-img, .kontak-info, .kontak-map { width: 100%; }
            .about .btn { margin-top: 30px; }
            .services-box { grid-template-columns: repeat(2, 1fr); }
            .exp-card h3 { font-size: 40px; }
            .exp-card p { font-size: 18px; }
            .machine-item h3 { font-size: 24px; }
            .hero-btns { gap: 10px; }
            .hero-btns .btn { font-size: 13px; padding: 8px 16px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <header>
        <a href="#home" class="logo">
            <img src="../Assets/logo.jpg.jpeg" alt="Four U Laundry">
        </a>
        <nav>
            <a href="#home">HOME</a>
            <a href="#laundry">LAUNDRY</a>
            <a href="#harga">LIST HARGA</a>
            <a href="#lokasi">LOKASI</a>
            <a href="#kontak">HUBUNGI KAMI</a>
        </nav>
        <div class="nav-right">
            <?php if ($sudah_login): ?>
                <span class="halo">Hai, <?= htmlspecialchars($nama_user) ?></span>
            <?php endif; ?>
            <a href="<?= $link_pesan ?>" target="<?= $target_pesan ?>" class="btn btn-nav">Pesan Sekarang</a>
            <?php if ($sudah_login): ?>
                <a href="logout.php" class="btn-logout" onclick="return confirm('Yakin mau logout?')">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn-logout">Login</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- HERO -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>AYO LAUNDRY</h1>
            <p>Pakaian bersih<br>tanpa harus repot mencuci</p>
            <div class="hero-btns">
                <a href="#kontak" class="btn">Temui Kami</a>
                <a href="<?= $link_pesan ?>" target="<?= $target_pesan ?>" class="btn">Pesan Sekarang</a>
            </div>
        </div>
    </section>

    <div class="gradient-bg">

        <!-- ABOUT US -->
        <section class="about" id="about">
            <div class="about-text">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui hendrerit enim, sed efficitur sem est vitae lorem. Integer lobortis turpis quis ante tristique, a condimentum augue congue. Phasellus nec magna purus. Integer sollicitudin lorem id varius porttitor. Vivamus porta eleifend feugiat. Sed vitae elementum ligula. Donec vestibulum erat vitae congue finibus. Etiam nec nisi quis purus rhoncus tempor. Ut interdum egestas dictum. In sed neque a erat bibendum eleifend. Pellentesque molestie eros a felis feugiat, non tristique sapien viverra. Morbi id mi fringilla, pretium felis at, condimentum arcu. Integer elementum scelerisque diam et malesuada. Proin gravida turpis lacus, at aliquet mauris aliquet et.</p>
                <a href="#" class="btn">READ MORE</a>
            </div>
            <div class="about-img">
                <img src="../assets/img/mesin-cuci.png" alt="Mesin cuci">
            </div>
        </section>

        <!-- OUR SERVICES -->
        <section class="services" id="laundry">
            <h2 class="section-title">Our Services</h2>
            <div class="services-box">
                <?php foreach ($services as $s): ?>
                    <div class="service-card" style="background-image:url('<?= $s[1] ?>')">
                        <span><?= htmlspecialchars($s[0]) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- OUR EXPERIENCE -->
        <section class="experience">
            <h2 class="section-title">Our Experience</h2>
            <div class="exp-wrap">
                <?php foreach ($experience as $e): ?>
                    <div class="exp-card">
                        <h3><?= htmlspecialchars($e[0]) ?></h3>
                        <p><?= htmlspecialchars($e[1]) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>

    <!-- OUR MACHINE (background sendiri, bukan ungu) -->
    <section class="machine" id="harga">
        <h2 class="section-title">Our Machine</h2>
        <?php foreach ($machines as $m): ?>
            <div class="machine-item">
                <h3><?= htmlspecialchars($m[0]) ?></h3>
                <img src="<?= $m[1] ?>" alt="<?= htmlspecialchars($m[0]) ?>">
            </div>
        <?php endforeach; ?>
    </section>

    <!-- KONTAK -->
    <section class="kontak" id="kontak">
        <div class="kontak-info">
            <h4>Kontak Kami</h4>
            <div class="row">📍 <span>Jl Raya Pamayahan, Samping Alfamart, Lohbener - Indramayu</span></div>
            <div class="row">📞 <span>0819 3113 1031</span></div>

            <h4 class="tentang">Tentang Kami</h4>
            <p class="desc">Four U Laundry adalah penyedia jasa perawatan pakaian profesional di Indramayu sejak 2015. Berbekal pelatihan khusus dan peralatan modern, kami berkomitmen menghadirkan layanan cuci yang bersih, rapi, dan tepat waktu. Kami mengutamakan kepuasan pelanggan melalui jaminan garansi perawatan dan integritas pelayanan yang tinggi.</p>
        </div>
        <div class="kontak-map" id="lokasi">
            <iframe
                src="https://www.google.com/maps?q=Lohbener,Indramayu&output=embed"
                loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <footer>All rights reserved | Four U Laundry</footer>

</body>
</html>