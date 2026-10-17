<?php
session_start();
require_once '../includes/koneksi.php';

// Pastikan user masuk ke halaman ini setelah OTP-nya valid!
if (!isset($_SESSION['otp_valid']) || $_SESSION['otp_valid'] !== true) {
    header("Location: lupa_password.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass_baru = $_POST['password_baru'];
    $pass_konfirmasi = $_POST['konfirmasi_password'];
    $id_user = $_SESSION['reset_id_user'];

    if (strlen($pass_baru) < 6) {
        $error = "Password minimal 6 karakter!";
    } elseif ($pass_baru !== $pass_konfirmasi) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        // Enkripsi password baru
        $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);
        
        // Update database dan hapus OTP agar tidak bisa dipakai lagi
        $sql = "UPDATE user SET password = ?, otp_code = NULL, otp_expired = NULL WHERE id_user = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("si", $password_hash, $id_user);
        
        if ($stmt->execute()) {
            // Bersihkan sesi reset password
            unset($_SESSION['reset_id_user']);
            unset($_SESSION['reset_no_wa']);
            unset($_SESSION['otp_valid']);
            
            // Set pesan sukses untuk ditampilkan di halaman login
            $_SESSION['sukses_login'] = "Password berhasil diubah! Silakan login dengan password baru.";
            header("Location: login.php");
            exit;
        } else {
            $error = "Gagal mengubah password. Silakan coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Password Baru - Four "U" Laundry</title>
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
        .form-control { border-radius: 8px; font-size: 14px; padding: 10px 15px; border: 1px solid #ddd; margin-bottom: 15px; }
        .form-control:focus { border-color: #A63FA0; box-shadow: 0 0 0 0.2rem rgba(166, 63, 160, 0.2); }
        .btn-ungu { background: #A63FA0; color: #fff; font-weight: 500; border-radius: 8px; padding: 10px; border: none; transition: 0.3s; width: 100%; margin-top: 10px; }
        .btn-ungu:hover { background: #8c3187; color: #fff; }
    </style>
</head>
<body>
    <div class="hero-auth">
        <div class="text-center">
            <img src="../assets/img/logo.png" alt="Four U Laundry" class="logo-auth">
        </div>
        
        <div class="card-auth">
            <h2 class="judul-auth">Buat Password Baru</h2>
            <p class="deskripsi-auth">Masukkan password baru yang akan kamu gunakan untuk login ke akun Four U Laundry.</p>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" style="font-size: 13px; padding: 10px;">
                    <?= htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="text-start">
                    <input type="password" class="form-control" name="password_baru" placeholder="Masukkan password baru" required>
                    <p style="font-size: 11px; color: #888; margin-top: -10px; margin-bottom: 15px;">Minimal 6 karakter kombinasi huruf dan angka.</p>
                    
                    <input type="password" class="form-control" name="konfirmasi_password" placeholder="Masukkan kembali password baru" required>
                </div>
                <button type="submit" class="btn btn-ungu">Simpan Password Baru</button>
            </form>
        </div>
    </div>
</body>
</html>