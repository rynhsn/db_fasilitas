<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">
        <label for="nama_fasilitas">Nama Fasilitas:</label>
        <input type="text" id="nama_fasilitas" name="nama_fasilitas"><br>
        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori"><br>
        <label for="kapasitas">Kapasitas:</label>
        <input type="number" id="kapasitas" name="kapasitas"><br>
        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi"><br>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status"><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>

<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama_fasilitas = $_POST['nama_fasilitas'];
    $kategori = $_POST['kategori'];
    $kapasitas = $_POST['kapasitas'];
    $lokasi = $_POST['lokasi'];
    $status = $_POST['status'];

    if (tambahFasilitas($nama_fasilitas, $kategori, $kapasitas, $lokasi, $status)) {
        echo "Data berhasil ditambahkan.";
        // header("location: index.php");
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>