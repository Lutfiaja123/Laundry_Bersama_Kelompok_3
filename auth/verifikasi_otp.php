<?php
session_start();
$base_url = "http://localhost/Laundry_Bersama_Kelompok_3/";
if(!isset($_SESSION['reset_id_user'])) {
    header("Location: lupa_password.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Four "U" Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(180deg, #ffffff 0%, #f1d5e4 35%, #d896bb 70%, #c562a6 100%); min-height: 100vh; margin: 0; padding-bottom: 50px; }
        .hero-auth { padding: 40px 24px; position: relative; }
        .btn-kembali { position: absolute; top: 20px; left: 28px; color: #333; font-size: 14px; font-weight: 500; text-decoration: none; }
        .logo-auth { height: 60px; margin-bottom: 20px; }
        .card-auth { background: #fff; border-radius: 24px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); max-width: 450px; margin: 0 auto; text-align: center; }
        .judul-auth { font-weight: 600; font-size: 1.5rem; margin-bottom: 10px; color: #000; }
        .deskripsi-auth { font-size: 13px; color: #A63FA0; margin-bottom: 20px; line-height: 1.5; }
        .otp-container { display: flex; justify-content: center; gap: 10px; margin-bottom: 15px; }
        .otp-box { width: 45px; height: 50px; text-align: center; font-size: 18px; font-weight: 600; border-radius: 8px; border: 1px solid #ddd; background: #e9ecef; }
        .otp-box:focus { border-color: #A63FA0; outline: none; background: #fff; }
        .btn-ungu { background: #A63FA0; color: #fff; font-weight: 500; border-radius: 8px; padding: 10px; border: none; transition: 0.3s; width: 100%; margin-top: 15px; }
        .btn-ungu:hover { background: #8c3187; color: #fff; }
    </style>
</head>
<body>
    <div class="hero-auth">
        <a href="lupa_password.php" class="btn-kembali">&larr; Kembali</a>
        <div class="text-center">
            <img src="../assets/img/logo.png" alt="Four U Laundry" class="logo-auth">
        </div>
        
        <div class="card-auth">
            <h2 class="judul-auth">Masukkan Kode OTP</h2>
            <p class="deskripsi-auth">Kami telah mengirim kode OTP ke nomor WhatsApp kamu.<br>Masukkan 6 digit kode untuk melanjutkan.</p>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" style="font-size: 13px; padding: 10px;">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['demo_otp'])): ?>
                <div class="alert alert-info text-center shadow-sm" style="border-radius: 12px; font-size: 14px;">
                    <strong>[MODE UJI COBA]</strong><br>
                    Kode OTP Anda adalah: <br>
                    <span style="font-size: 24px; font-weight: 700; color: #A63FA0; letter-spacing: 2px;">
                        <?= $_SESSION['demo_otp']; ?>
                    </span>
                </div>
                <?php unset($_SESSION['demo_otp']); ?>
            <?php endif; ?>

            <form action="proses_verifikasi.php" method="POST" id="otpForm">
                <div class="otp-container">
                    <input type="text" class="otp-box" maxlength="1" required>
                    <input type="text" class="otp-box" maxlength="1" required>
                    <input type="text" class="otp-box" maxlength="1" required>
                    <input type="text" class="otp-box" maxlength="1" required>
                    <input type="text" class="otp-box" maxlength="1" required>
                    <input type="text" class="otp-box" maxlength="1" required>
                </div>
                <input type="hidden" name="otp_input" id="otp_input_hidden">
                
                <p style="font-size: 12px; color: #666; margin-top: 10px;">Kode OTP akan kadaluarsa dalam 5 menit.</p>
                <button type="submit" class="btn btn-ungu">Verifikasi Kode</button>
            </form>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-box');
        const hiddenInput = document.getElementById('otp_input_hidden');
        
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if(e.target.value.length > 0 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                updateHiddenInput();
            });
            input.addEventListener('keydown', (e) => {
                if(e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        function updateHiddenInput() {
            let otp = '';
            inputs.forEach(input => { otp += input.value; });
            hiddenInput.value = otp;
        }
    </script>
</body>
</html>