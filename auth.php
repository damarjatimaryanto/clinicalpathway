<?php
session_start();

// After successful login validation
// Set the session variable
$_SESSION['username'] = $username;

// Cek apakah sesi pengguna tidak ada atau username tidak ada dalam sesi
if (isset($_SESSION['username'])) {
    header("Location: login.php"); // Mengarahkan pengguna kembali ke halaman login jika belum terautentikasi
    exit();
}else{
    header("Location: detailPasien.php");
}
?>
