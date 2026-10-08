<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For U Laundry</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #4a154b, #b57edc, #fef9ef);
            color: #333;
            margin: 0;
        }
        /* Navbar */
        .navbar-custom {
            background-color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .btn-yellow {
            background-color: #ffc107;
            color: #000;
            font-weight: bold;
            border-radius: 20px;
            padding: 8px 20px;
        }
        /* Hero Section */
        .hero-section {
            padding: 60px 20px;
            color: white;
        }
        /* Card Services */
        .service-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        /* Experience Box */
        .exp-box {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <!-- 1. NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-purple" href="#" style="color: #6f42c1;">FOR U LAUNDRY</a>
            <div class="ms-auto d-flex align-items-center gap-4">
                <a href="#" class="text-dark text-decoration-none">Home</a>
                <a href="#" class="text-dark text-decoration-none">About Us</a>
                <a href="#" class="text-dark text-decoration-none">Our Services</a>
                <a href="#" class="text-dark text-decoration-none">Our Machine</a>
                <a href="#" class="text-dark text-decoration-none">Kontak Kami</a>
                <a href="#" class="btn btn-yellow btn-sm">Sign Up/Login</a>
            </div>
        </div>
    </nav>
    <div style="margin-top: 80px;"></div>

    <!-- 2. HERO SECTION -->
    <section class="hero-section container text-center text-md-start">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold display-5 mb-3">AYO LAUNDRY</h1>
                <p class="lead mb-4">Pakaian bersih, wangi, bebas dari noda membandel!</p>
                <a href="#" class="btn btn-yellow me-2">Pesan Sekarang</a>
                <a href="#" class="btn btn-outline-light rounded-pill px-4">Rental Mesin cuci</a>
            </div>
            <div class="col-md-6 text-center mt-4 mt-md-0">
                <!-- Placeholder ilustrasi dari Figma kamu -->
                <div class="p-5 bg-white bg-opacity-25 rounded-4">
                    <h5 class="text-white">Ilustrasi Mesin Cuci & Pelanggan</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. ABOUT US -->
    <section class="container py-5 text-white">
        <div class="row align-items-center bg-white bg-opacity-10 p-4 rounded-4 shadow-sm">
            <div class="col-md-7">
                <h3 class="fw-bold mb-3 text-warning">About Us</h3>
                <p style="font-size: 14px; line-height: 1.6;">
                    For U Laundry hadir memberikan solusi terbaik untuk kebutuhan cuci pakaian harian Anda. Menggunakan teknologi modern dan deterjen ramah lingkungan demi menjaga kualitas pakaian tetap terjaga bersih, lembut, dan harum tahan lama. Kepuasan Anda adalah prioritas utama kami.
                </p>
                <a href="#" class="btn btn-yellow btn-sm mt-2">READ MORE</a>
            </div>
            <div class="col-md-5 text-center mt-3 mt-md-0">
                <div class="bg-white p-3 rounded-3 text-dark fw-bold shadow">
                    [ Gambar Mesin Cuci & Keranjang ]
                </div>
            </div>
        </div>
    </section>

    <!-- 4. OUR SERVICES -->
    <section class="container py-5 text-center text-white">
        <h2 class="fw-bold mb-4">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card text-dark">
                    <div class="bg-secondary rounded mb-3" style="height: 120px;"></div>
                    <h5 class="fw-bold">Wash & Dry</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-dark">
                    <div class="bg-secondary rounded mb-3" style="height: 120px;"></div>
                    <h5 class="fw-bold">All Inclusive</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-dark">
                    <div class="bg-secondary rounded mb-3" style="height: 120px;"></div>
                    <h5 class="fw-bold">Wash & Iron</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-dark">
                    <div class="bg-secondary rounded mb-3" style="height: 120px;"></div>
                    <h5 class="fw-bold">Wash Only</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-dark">
                    <div class="bg-secondary rounded mb-3" style="height: 120px;"></div>
                    <h5 class="fw-bold">Dry Only</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card text-dark">
                    <div class="bg-secondary rounded mb-3" style="height: 120px;"></div>
                    <h5 class="fw-bold">Iron Only</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. OUR EXPERIENCE -->
    <section class="container py-5 text-white">
        <h2 class="fw-bold mb-4 text-center">Our Experience</h2>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="exp-box text-purple">
                    <h2 class="fw-bold text-dark">300++</h2>
                    <p class="text-muted mb-0">Orders Completed</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="exp-box">
                    <h2 class="fw-bold text-dark">11</h2>
                    <p class="text-muted mb-0">Years of Service</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="exp-box">
                    <h2 class="fw-bold text-dark">300++</h2>
                    <p class="text-muted mb-0">Happy Customers</p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>