<?php
session_start();
require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input OTP dari form (input hidden)
    $otp_input = trim($_POST['otp_input']); 
    $id_user = $_SESSION['reset_id_user'] ?? null;

    // Jika tidak ada sesi reset, tendang balik ke awal
    if (!$id_user) {
        header("Location: lupa_password.php");
        exit;
    }

    // Ambil data OTP dari database
    $sql = "SELECT otp_code, otp_expired FROM user WHERE id_user = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();

    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');

    // Proses validasi OTP
    if ($data['otp_code'] === $otp_input) {
        if ($waktu_sekarang <= $data['otp_expired']) {
            // OTP benar dan waktu belum habis -> Arahkan ke halaman buat password baru
            $_SESSION['otp_valid'] = true;
            header("Location: buat_password_baru.php");
            exit;
        } else {
            // OTP benar tapi waktu habis (lebih dari 5 menit)
            $_SESSION['error'] = "Kode OTP sudah kedaluwarsa!";
            header("Location: verifikasi_otp.php");
            exit;
        }
    } else {
        // OTP salah
        $_SESSION['error'] = "Kode OTP yang Anda masukkan salah!";
        header("Location: verifikasi_otp.php");
        exit;
    }
}
?>