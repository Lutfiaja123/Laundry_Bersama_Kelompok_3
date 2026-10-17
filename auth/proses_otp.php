<?php
session_start();
require_once '../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_wa = trim($_POST['no_whatsapp']); 

    $sql = "SELECT u.id_user FROM user u 
            JOIN pelanggan p ON u.id_user = p.id_user 
            WHERE p.no_whatsapp = ?";
    
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $no_wa);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $id_user = $user['id_user'];
        
        $otp = rand(100000, 999999);
        
        date_default_timezone_set('Asia/Jakarta');
        $waktu_expired = date('Y-m-d H:i:s', strtotime('+5 minutes'));

        $update_sql = "UPDATE user SET otp_code = ?, otp_expired = ? WHERE id_user = ?";
        $update_stmt = $koneksi->prepare($update_sql);
        $update_stmt->bind_param("ssi", $otp, $waktu_expired, $id_user);
        $update_stmt->execute();

        // --- API FONNTE DIMATIKAN SEMENTARA UNTUK TESTING ---
        /*
        $token = "MASUKKAN_TOKEN_FONNTE_ANDA_DISINI"; 
        $pesan = "Halo! Ini adalah kode OTP... *$otp*";
        $curl = curl_init();
        ... (kode curl)...
        curl_close($curl);
        */
        // ----------------------------------------------------

        // Simpan id_user dan OTP untuk ditampilkan di layar verifikasi
        $_SESSION['reset_id_user'] = $id_user;
        $_SESSION['reset_no_wa'] = $no_wa;
        $_SESSION['demo_otp'] = $otp; // <-- INI YANG BARU
        
        header("Location: verifikasi_otp.php");
        exit;
    } else {
        $_SESSION['error'] = "Nomor WhatsApp tidak ditemukan!";
        header("Location: lupa_password.php");
        exit;
    }
}
?>