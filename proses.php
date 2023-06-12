<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'neurotech';

// Menghubungkan ke database
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// Memeriksa koneksi database
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Memeriksa apakah formulir telah dikirimkan
if(isset($_POST['submit'])){
    // Memeriksa apakah ada checkbox yang dipilih
    if(isset($_POST['pilihan'])){
        $pilihan = $_POST['pilihan'];

        // Menggabungkan nilai-nilai yang dipilih menjadi satu string terpisah dengan koma
        $nilai_terpilih = implode(', ', $pilihan);

        // Menyimpan nilai terpilih ke dalam database
        $query = "INSERT INTO asesmenawalmedis (dokterIGD1) VALUES ('$nilai_terpilih')";
        mysqli_query($koneksi, $query);

        // Mengalihkan pengguna ke halaman lain (misalnya, halaman sukses)
        header("Location: sukses.php");
        exit();
    }
}
?>
