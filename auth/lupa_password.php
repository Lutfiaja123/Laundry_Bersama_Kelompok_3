<?php
session_start();
$base_url = "http://localhost/Laundry_Bersama_Kelompok_3/";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Four "U" Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(180deg, #ffffff 0%, #f1d5e4 35%, #d896bb 70%, #c562a6 100%); min-height: 100vh; margin: 0; padding-bottom: 50px; }
        .hero-auth { padding: 40px 24px; position: relative; }
        .btn-kembali { position: absolute; top: 20px; left: 28px; color: #333; font-size: 14px; font-weight: 500; text-decoration: none; }
        .logo-auth { height: 60px; margin-bottom: 20px; }
        .card-auth { background: #fff; border-radius: 24px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); max-width: 450px; margin: 0 auto; text-align: center; }
        .judul-auth { font-weight: 600; font-size: 1.5rem; margin-bottom: 10px; color: #000; }
        .deskripsi-auth { font-size: 13px; color: #A63FA0; margin-bottom: 25px; line-height: 1.5; }
        .form-control { border-radius: 8px; font-size: 14px; padding: 10px 15px; border: 1px solid #ddd; }
        .form-control:focus { border-color: #A63FA0; box-shadow: 0 0 0 0.2rem rgba(166, 63, 160, 0.2); }
        .btn-ungu { background: #A63FA0; color: #fff; font-weight: 500; border-radius: 8px; padding: 10px; border: none; transition: 0.3s; width: 100%; margin-top: 15px; }
        .btn-ungu:hover { background: #8c3187; color: #fff; }
        .link-masuk { color: #A63FA0; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <div class="hero-auth">
        <a href="login.php" class="btn-kembali">&larr; Kembali</a>
        <div class="text-center">
            <img src="../assets/img/logo.png" alt="Four U Laundry" class="logo-auth">
        </div>
        
        <div class="card-auth">
            <h2 class="judul-auth">Lupa Password?</h2>
            <p class="deskripsi-auth">Jangan khawatir! Masukkan nomor WhatsApp yang terdaftar untuk menerima kode OTP!</p>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" style="font-size: 13px; padding: 10px;">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>

            <form action="proses_otp.php" method="POST">
                <div class="mb-3 text-start">
                    <input type="text" class="form-control" name="no_whatsapp" placeholder="Masukkan nomor WhatsApp" required>
                </div>
                <button type="submit" class="btn btn-ungu">Kirim Kode OTP</button>
            </form>
            <div class="mt-4" style="font-size: 13px;">
                Ingat password kamu? <a href="login.php" class="link-masuk">Masuk.</a>
            </div>
        </div>
    </div>
</body>
</html>