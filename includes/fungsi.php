<?php

function format_rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}


function bersihkan_no($no) {
    return preg_replace('/\D+/', '', $no);  }

function link_wa($nomor_user) {
    return "https://wa.me/6281931131031?text=" . urlencode("Halo Four U Laundry, saya " . $nomor_user . " mau pesan laundry.");
}

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>