<?php
include 'functions.php';
include '../login_function.php';

cek_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_ukm = $_POST['nama_ukm'];
    $ketua = $_POST['ketua'];
    $jumlah_anggota = $_POST['jumlah_anggota'];
    $kategori = $_POST['kategori'];

    if (tambahUKM($nama_ukm, $ketua, $jumlah_anggota, $kategori)) {
        echo "<script>alert('Data berhasil ditambahkan!'); location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data UKM</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">CRUD Fasilitas</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../fasilitas">Fasilitas</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../mahasiswa">Mahasiswa</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="../ukm">UKM</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../unit-kerja">Unit Kerja</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../booking">Booking</a>
                <?php if($_SESSION['role'] == 'admin'){?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../pengguna">Pengguna</a>
                <?php } ?>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary rounded-0" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="../logout.php"><?= $_SESSION['name'];?> | Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <h1 class="mt-4">Tambah UKM</h1>
                <a href="index.php" class="btn btn-sm btn-danger mb-2 rounded-0">Kembali</a>
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama_ukm">Nama UKM:</label>
                            <input type="text" class="form-control rounded-0" id="nama_ukm" name="nama_ukm" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="ketua">Ketua:</label>
                            <input type="text" class="form-control rounded-0" id="ketua" name="ketua" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="jumlah_anggota">Jumlah Anggota:</label>
                            <input type="number" class="form-control rounded-0" id="jumlah_anggota" name="jumlah_anggota" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="kategori">Kategori:</label>
                            <input type="text" class="form-control rounded-0" id="kategori" name="kategori" required>
                        </div>
                    </div>
                    <input class="btn btn-primary mt-2 btn-sm rounded-0" type="submit" value="Simpan">
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../assets/js/scripts.js"></script>
</body>
</html>
