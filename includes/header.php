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
            <a href="auth/login.php" class="login-button">LOGIN</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
    </nav>
