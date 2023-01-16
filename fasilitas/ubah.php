<?php
    include 'functions.php';

    $id_fasilitas = $_GET['id_fasilitas'];
    $result = tampilFasilitasPerId($id_fasilitas);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <form action="" method="post">
            <input type="hidden" name="id_fasilitas" value="<?php echo $row['id_fasilitas']; ?>">
            <label for="nama_fasilitas">Nama Fasilitas:</label>
            <input type="text" id="nama_fasilitas" name="nama_fasilitas" value="<?php echo $row['nama_fasilitas']; ?>"><br>
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>"><br>
            <label for="kapasitas">Kapasitas:</label>
            <input type="number" id="kapasitas" name="kapasitas" value="<?php echo $row['kapasitas']; ?>"><br>
            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo $row['lokasi']; ?>"><br>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="<?php echo $row['status']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_fasilitas = $_POST['id_fasilitas'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $kategori = $_POST['kategori'];
    $kapasitas = $_POST['kapasitas'];
    $lokasi = $_POST['lokasi'];
    $status = $_POST['status'];

    if (ubahFasilitas($id_fasilitas, $nama_fasilitas, $kategori, $kapasitas, $lokasi, $status)) {
        echo "Data berhasil diubah.";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>
