<?php
session_start();
require __DIR__ . '/auth_fungsi.php';

if (isset($_SESSION['user'])) { header('Location: main.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no   = bersihkan_no($_POST['no'] ?? '');
    $pass = $_POST['password'] ?? '';
    $users = baca_user();

    if (strlen($no) < 9 || strlen($no) > 15) {
        $error = 'Nomor HP tidak valid (9-15 angka).';
    } elseif (strlen($pass) < 6) {
        $error = 'Password minimal 6 karakter.';
    } elseif (isset($users[$no])) {
        $error = 'Nomor ini sudah terdaftar. Silakan login.';
    } else {
        $users[$no] = ['password' => password_hash($pass, PASSWORD_DEFAULT), 'dibuat' => date('c')];
        if (!simpan_user($users)) {
            $error = 'Gagal menyimpan akun. Pastikan folder data/ bisa ditulis.';
        } else {
            header('Location: login.php?daftar=1' . (isset($_GET['pesan']) ? '&pesan=1' : ''));
            exit;
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
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="auth.css">
</head>
<body>
<section class="auth-atas">
    <a href="login.php<?= isset($_GET['pesan']) ? '?pesan=1' : '' ?>" class="kembali">
        <svg viewBox="0 0 22 12" fill="none" stroke="#000" stroke-width="1"><path d="M22 6H1M6 1L1 6l5 5"/></svg> Kembali
    </a>
    <img class="auth-logo" src="../Assets/logo.jpg.jpeg" alt="Four U Laundry">

    <h1 class="auth-judul">Selamat datang di Four U Laundry!</h1>

    <?php if ($error): ?><div class="pesan error"><?= htmlspecialchars($error) ?></div><?php endif; ?>

    <form class="auth" method="post" autocomplete="on">
        <input type="tel" name="no" placeholder="No HP" required inputmode="numeric" value="<?= htmlspecialchars($_POST['no'] ?? '') ?>">
        <input type="password" name="password" placeholder="Password" required minlength="6">
        <button type="submit" class="btn-utama">Register</button>

        <div class="atau">Or</div>
        <button type="button" class="btn-google" onclick="alert('Daftar dengan Google belum diaktifkan.')">
            <svg viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9.1 3.6l6.8-6.8C35.8 2.4 30.3 0 24 0 14.6 0 6.5 5.4 2.6 13.2l7.9 6.1C12.4 13.6 17.7 9.5 24 9.5z"/><path fill="#4285F4" d="M46.5 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.7c-.6 3-2.3 5.5-4.8 7.2l7.5 5.8c4.4-4.1 7.1-10.1 7.1-17.5z"/><path fill="#FBBC05" d="M10.5 28.7A14.5 14.5 0 0 1 9.5 24c0-1.6.3-3.2.8-4.7l-7.9-6.1A24 24 0 0 0 0 24c0 3.9.9 7.5 2.6 10.8l7.9-6.1z"/><path fill="#34A853" d="M24 48c6.5 0 11.9-2.1 15.9-5.8l-7.5-5.8c-2.1 1.4-4.8 2.3-8.4 2.3-6.3 0-11.6-4.1-13.5-9.8l-7.9 6.1C6.5 42.6 14.6 48 24 48z"/></svg>
            Continue with Google
        </button>
        <p class="pindah">Sudah punya akun? <a href="login.php<?= isset($_GET['pesan']) ? '?pesan=1' : '' ?>">Login</a></p>
    </form>
</section>
<?php include __DIR__ . '/auth_bawah.php'; ?>
</body>
</html>