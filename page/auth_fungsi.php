<?php
// Penyimpanan akun sederhana (file JSON). Untuk produksi, ganti ke database MySQL.
define('FILE_USER', __DIR__ . '/../data/users.json');

function baca_user() {
    if (!file_exists(FILE_USER)) return [];
    return json_decode(file_get_contents(FILE_USER), true) ?: [];
}
function simpan_user($users) {
    $dir = dirname(FILE_USER);
    if (!is_dir($dir) && !@mkdir($dir, 0775, true)) return false;
    return @file_put_contents(FILE_USER, json_encode($users, JSON_PRETTY_PRINT), LOCK_EX) !== false;
}
function bersihkan_no($no) {
    return preg_replace('/\D+/', '', $no); // hanya angka
}

// Link WhatsApp untuk pemesanan (dipakai main.php dan login.php)
function link_wa($nomor_user) {
    return "https://wa.me/6281931131031?text=" . urlencode("Halo Four U Laundry, saya " . $nomor_user . " mau pesan laundry.");
}