<?php
include '../login_function.php';
cek_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Booking</title>
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../ukm">UKM</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../unit-kerja">Unit Kerja</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="#">Booking</a>
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
                <h1 class="mt-4">Data Booking</h1>
                <a href="tambah.php" class="btn btn-sm btn-primary mb-2 rounded-0">Buat Booking</a>
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                        include 'functions.php';
                        $result = tampilBooking();
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['nama_fasilitas']; ?></td>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['waktu_mulai']; ?></td>
                        <td><?= $row['waktu_selesai']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <a href="ubah.php?id_booking=<?= $row['id_booking']; ?>" class="btn btn-sm btn-success rounded-0">Ubah</a>  
                            <a href="#" onclick="hapusBooking('<?= $row['id_booking']; ?>')" class="btn btn-sm btn-danger rounded-0">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../assets/js/scripts.js"></script>
    <script>
        function hapusBooking(id_booking) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location = "hapus.php?id_booking=" + id_booking;
            }
        }
    </script>
</body>
</html>
