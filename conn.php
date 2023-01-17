<?php

$host = "localhost"; // atau 127.0.0.1
$username = "root";
$password = "";
$dbname = "db_fasilitas";

// Buat koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lanjutkan dengan query SQL Anda di sini
// Tutup koneksi
// mysqli_close($conn);
?>
