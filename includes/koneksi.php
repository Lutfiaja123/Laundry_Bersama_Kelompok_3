<?php
$host = 'localhost';      // Server database 
$user = 'root';           // Username MySQL
$pass = '';               // Password 
$db   = 'four_u_laundry'; // Nama database

// Membuat koneksi menggunakan ekstensi MySQLi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi berhasil
if (!$conn) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}

// Pengaturan karakter agar mendukung emoji/karakter khusus
mysqli_set_charset($conn, "utf8mb4");
?>