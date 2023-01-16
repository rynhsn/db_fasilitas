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
    <div class="container-fluid">
        <h1>Data Fasilitas</h1>
        <a href="tambah.php" class="btn btn-sm btn-primary mb-2">Tambah fasilitas</a>
        <table class="table table-sm">
            <tr>
                <th>ID</th>
                <th>Nama Fasilitas</th>
                <th>Kategori</th>
                <th>Kapasitas</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
                include 'functions.php';
                $result = tampilFasilitas();
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $row['id_fasilitas']; ?></td>
                <td><?= $row['nama_fasilitas']; ?></td>
                <td><?= $row['kategori']; ?></td>
                <td><?= $row['kapasitas']; ?></td>
                <td><?= $row['lokasi']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a href="ubah.php?id_fasilitas=<?= $row['id_fasilitas']; ?>">Update</a> | 
                    <a href="hapus.php?id_fasilitas=<?= $row['id_fasilitas']; ?>">Delete</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>