CREATE DATABASE IF NOT EXISTS four_u_laundry
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE four_u_laundry;

CREATE TABLE user (
  id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  role ENUM('pelanggan','kasir','superadmin') NOT NULL
) ENGINE=InnoDB;

CREATE TABLE pelanggan (
  id_pelanggan INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_user INT UNSIGNED NULL UNIQUE,
  nama VARCHAR(100) NULL,
  email VARCHAR(100) NULL,
  no_whatsapp VARCHAR(20) NOT NULL,
  alamat TEXT NULL,
  FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE layanan (
  id_layanan INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nama_layanan VARCHAR(100) NOT NULL,
  kategori ENUM('Kiloan','Satuan') NOT NULL,
  satuan ENUM('kg','item') NOT NULL,
  harga DECIMAL(12,2) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE pesanan (
  id_pesanan INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_pelanggan INT UNSIGNED NOT NULL,
  tanggal_pesan DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  kecepatan_pengerjaan ENUM('4 Jam','1 Hari','2 Hari','3 Hari') NOT NULL,
  antar_jemput ENUM('Ambil dan Antar','Ambil Saja','Antar Saja','Datang Sendiri') NOT NULL,
  alamat TEXT NULL,
  catatan TEXT NULL,
  status_pesanan ENUM('Menunggu Konfirmasi','Diproses','Selesai')
    NOT NULL DEFAULT 'Menunggu Konfirmasi',
  total_harga DECIMAL(12,2) NULL,
  FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan)
) ENGINE=InnoDB;

CREATE TABLE detail_pesanan (
  id_detail INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_pesanan INT UNSIGNED NOT NULL,
  id_layanan INT UNSIGNED NOT NULL,
  berat DECIMAL(8,2) NULL,
  jumlah INT NULL,
  harga_satuan DECIMAL(12,2) NULL,
  subtotal DECIMAL(12,2) NULL,
  FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE,
  FOREIGN KEY (id_layanan) REFERENCES layanan(id_layanan)
) ENGINE=InnoDB;

CREATE TABLE pembayaran (
  id_pembayaran INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_pesanan INT UNSIGNED NOT NULL UNIQUE,
  metode VARCHAR(30) NULL,
  jumlah_bayar DECIMAL(12,2) NOT NULL,
  status_bayar ENUM('Belum Lunas','Lunas') NOT NULL DEFAULT 'Belum Lunas',
  tanggal_bayar DATETIME NULL,
  midtrans_order_id VARCHAR(64) NULL UNIQUE,
  FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan)
) ENGINE=InnoDB;

CREATE TABLE notifikasi (
  id_notifikasi INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_pesanan INT UNSIGNED NOT NULL,
  pesan TEXT NOT NULL,
  waktu DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  jenis ENUM('Pesanan Diterima','Diproses','Selesai') NOT NULL,
  status_kirim ENUM('Menunggu','Terkirim','Gagal') NOT NULL DEFAULT 'Menunggu',
  FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan)
) ENGINE=INNODB;

-- lupapassword
ALTER TABLE user 
ADD otp_code VARCHAR(10) NULL,
ADD otp_expired DATETIME NULL;