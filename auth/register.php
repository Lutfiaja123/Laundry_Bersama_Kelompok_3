<?php 
require_once '../includes/koneksi.php';
session_start();

$error = '';
$base_url = "http://localhost/Laundry_Bersama_Kelompok_3/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $no_hp    = trim($_POST['no_hp'] ?? '');
    $password = $_POST['password'] ?? '';
    $nama     = $username; 

    if (empty($username) || empty($password) || empty($no_hp)) {
        $error = "Semua kolom wajib diisi!";
    } else {
        $cek_user = $koneksi->prepare("SELECT id_user FROM user WHERE username = ?");
        $cek_user->bind_param("s", $username);
        $cek_user->execute();
        $hasil_user = $cek_user->get_result();
 
        $cek_hp = $koneksi->prepare("SELECT id_pelanggan FROM pelanggan WHERE no_whatsapp = ?");
        $cek_hp->bind_param("s", $no_hp);
        $cek_hp->execute();
        $hasil_hp = $cek_hp->get_result();

        if ($hasil_user->num_rows > 0) {
            $error = "Username sudah terdaftar.";
        } elseif ($hasil_hp->num_rows > 0) {
            $error = "Nomor HP sudah terdaftar.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = 'pelanggan';

            $koneksi->begin_transaction(); 
            try {
                $stmt1 = $koneksi->prepare("INSERT INTO user (username, password, nama, role) VALUES (?, ?, ?, ?)");
                $stmt1->bind_param("ssss", $username, $hashed_password, $nama, $role);
                $stmt1->execute();
                $id_user = $koneksi->insert_id;

                $stmt2 = $koneksi->prepare("INSERT INTO pelanggan (id_user, no_whatsapp) VALUES (?, ?)");
                $stmt2->bind_param("is", $id_user, $no_hp);
                $stmt2->execute();
                $koneksi->commit(); 

                $_SESSION['sukses_login'] = "Akun berhasil dibuat! Silakan login.";
                header("Location: login.php");
                exit;
            } catch (Exception $e) {
                $koneksi->rollback(); 
                $error = "Terjadi kesalahan: " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Four "U" Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a4ab271e04.js" crossorigin="anonymous"></script>
    <style>
        body {
            padding-top: 0 !important;
            font-family: 'Poppins', sans-serif;
        }
        .hero-auth {
            position: relative;
            min-height: 100vh;
            padding: 40px 24px 64px;
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
            margin: 32px 0 24px;
            text-align: center;
        }

        /* Ini kunci agar form & alert lebarnya sama dan ada di tengah */
        .form-auth-wrapper {
            max-width: 360px;
            margin: 0 auto;
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #333;
            margin-bottom: 6px;
            display: block;
            text-align: left;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: .6rem .8rem;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.9);
        }
        .form-control:focus {
            border-color: #A63FA0;
            box-shadow: 0 0 0 .2rem rgba(166, 63, 160, .2);
        }

        .btn-login {
            background: #A63FA0;
            color: #fff;
            font-weight: 500;
            border: 0;
            border-radius: 6px;
            padding: .6rem;
            transition: 0.3s;
        }
        .btn-login:hover { background: #8c3187; color: #fff; }

        .link-ungu { color: #9C27B0; text-decoration: none; font-weight: 600;}
        .link-ungu:hover { text-decoration: underline; }

        .pemisah {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #555;
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
            border-radius: 6px;
            padding: .55rem;
            font-size: 14px;
            color: #333;
            transition: 0.3s;
        }
        .btn-google:hover { background: #f8f8f8; }
    </style>
</head>
<body>

<section class="hero-auth">
    <a href="<?= $base_url ?>index.php" class="btn-kembali">&larr; Kembali</a>

    <div class="text-center">
        <a href="<?= $base_url ?>index.php">
            <img src="../assets/img/logo.png" alt="Four U Laundry" class="logo-auth">
        </a>
    </div>

    <h2 class="judul-auth">Buat Akun Baru</h2>
    <div class="form-auth-wrapper">
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 6px; font-size: 13px; padding: 12px;">
                <i class="fa-solid fa-triangle-exclamation me-2"></i>
                <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 10px; padding: 14px;"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">No. HP / WhatsApp</label>
                <input type="number" class="form-control" name="no_hp" placeholder="Contoh: 08123456789" required value="<?= htmlspecialchars($_POST['no_hp'] ?? '') ?>">
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Buat password" required>
            </div>

            <button type="submit" class="btn btn-login w-100">Daftar</button>
            
            <div class="text-center mt-3" style="font-size: 13px;">
                <span>Sudah punya akun?
                    <a href="<?= $base_url ?>auth/login.php" class="link-ungu">Login.</a>
                </span>
            </div>

            <div class="pemisah">Atau</div>

            <a href="#" class="btn btn-google w-100 d-flex align-items-center justify-content-center gap-2">
                <svg width="18" height="18" viewBox="0 0 48 48" aria-hidden="true">
                    <path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9.1 3.6l6.8-6.8C35.8 2.4 30.3 0 24 0 14.6 0 6.5 5.4 2.6 13.2l7.9 6.1C12.4 13.6 17.7 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.5 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.7c-.6 3-2.3 5.5-4.8 7.2l7.6 5.9c4.4-4.1 7-10.1 7-17.6z"/>
                    <path fill="#FBBC05" d="M10.5 28.7c-.5-1.5-.8-3-.8-4.7s.3-3.2.8-4.7l-7.9-6.1C.9 16.4 0 20.1 0 24s.9 7.6 2.6 10.8l7.9-6.1z"/>
                    <path fill="#34A853" d="M24 48c6.5 0 11.9-2.1 15.9-5.8l-7.6-5.9c-2.1 1.4-4.9 2.3-8.3 2.3-6.3 0-11.6-4.1-13.5-9.8l-7.9 6.1C6.5 42.6 14.6 48 24 48z"/>
                </svg>
                Continue with Google
            </a>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>