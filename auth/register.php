<?php 
require_once '../includes/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register - Four "U" Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a4ab271e04.js" crossorigin="anonymous"></script>
    <style>
        body {
            padding-top: 0 !important;
        }
        .hero-auth {
            position: relative;
            min-height: 640px;
            padding: 24px 24px 64px;
            background: linear-gradient(180deg, #ffffff 0%, #f1d5e4 35%, #d896bb 70%, #c562a6 100%);
        }
        .btn-kembali {
            position: absolute;
            top: 20px;
            left: 28px;
            color: #000;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }
        .btn-kembali:hover { text-decoration: underline; }

        .logo-auth { height: 70px; }

        .judul-auth {
            font-weight: 600;
            font-size: 1.6rem;
            margin: 48px 0 32px;
            text-align: center;
        }

        .form-auth { max-width: 360px; margin: 0 auto; }
        .form-auth .form-control {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: .6rem .8rem;
            font-size: 14px;
        }
        .form-auth .form-control:focus {
            border-color: #A63FA0;
            box-shadow: 0 0 0 .2rem rgba(166, 63, 160, .2);
        }

        .btn-login {
            background: #A63FA0;
            color: #fff;
            font-weight: 500;
            border: 0;
            border-radius: 4px;
            padding: .6rem;
        }
        .btn-login:hover { background: #8c3187; color: #fff; }

        .link-ungu { color: #9C27B0; text-decoration: none; }
        .link-ungu:hover { text-decoration: underline; }

        .pemisah {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #777;
            font-size: 13px;
            margin: 16px 0;
        }
        .pemisah::before, .pemisah::after {
            content: "";
            flex: 1;
            border-top: 1px solid #999;
        }

        .btn-google {
            background: #fff;
            border: 1px solid #999;
            border-radius: 4px;
            padding: .55rem;
            font-size: 14px;
            color: #333;
        }
        .btn-google:hover { background: #f8f8f8; }

        .info-bawah { background: #fff; padding: 40px 0; }
        .info-bawah h6 { font-weight: 600; }
        .info-bawah p, .info-bawah li { font-size: 13px; }
        .peta { width: 100%; height: 220px; border: 0; border-radius: 6px; }
    </style>
</head>
<body>

<section class="hero-auth">
    <a href="<?= $base_url ?>index.php" class="btn-kembali">&larr; Kembali</a>

    <div class="text-center">
        <a href="<?= $base_url ?>index.php" class="logo_daftar">
            <img src="../assets/img/logo.png" alt="Four U Laundry" class="logo-auth">
        </a>
    </div>

    <h2 class="judul-auth">Buat Akun Baru</h2>

    <form class="form-auth" method="POST" action="" novalidate>
        <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="tel" class="form-control" name="no_hp" placeholder="No. HP">
        </div>

        <div class="mb-4">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-login w-100">Daftar</button>
           <div class="text-center mt-3" style="font-size: 12px;">
            <span>Sudah punya akun?
                <a href="<?= $base_url ?>auth/login.php" class="link-ungu">Login.</a>
            </span>
        </div>

        <div class="pemisah">Or</div>

        <a href="#" class="btn btn-google w-100 d-flex align-items-center justify-content-center gap-2">
            <svg width="16" height="16" viewBox="0 0 48 48" aria-hidden="true">
                <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9.1 3.6l6.8-6.8C35.8 2.4 30.3 0 24 0 14.6 0 6.5 5.4 2.6 13.2l7.9 6.1C12.4 13.6 17.7 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.5 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.7c-.6 3-2.3 5.5-4.8 7.2l7.6 5.9c4.4-4.1 7-10.1 7-17.6z"/>
                <path fill="#FBBC05" d="M10.5 28.7c-.5-1.5-.8-3-.8-4.7s.3-3.2.8-4.7l-7.9-6.1C.9 16.4 0 20.1 0 24s.9 7.6 2.6 10.8l7.9-6.1z"/>
                <path fill="#34A853" d="M24 48c6.5 0 11.9-2.1 15.9-5.8l-7.6-5.9c-2.1 1.4-4.9 2.3-8.3 2.3-6.3 0-11.6-4.1-13.5-9.8l-7.9 6.1C6.5 42.6 14.6 48 24 48z"/>
            </svg>
            Continue with Google
        </a>
    </form>
</section>
<?php include '../includes/footer.php'; ?>