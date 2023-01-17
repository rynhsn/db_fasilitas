<?php
include 'functions.php';
include '../login_function.php';

cek_login();

$id_booking = $_GET['id_booking'];
$result = tampilBookingPerId($id_booking);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_fasilitas = $_POST['id_fasilitas'];
    $nim = $_POST['nim'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $status = $_POST['status'];

    if (ubahBooking($id_booking, $id_fasilitas, $nim, $waktu_mulai, $waktu_selesai, $status)) {
        echo "<script>alert('Data berhasil diubah!'); location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah!');</script>";
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="../booking">Booking</a>
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
                <h1 class="mt-4">Ubah Booking</h1>
                <a href="index.php" class="btn btn-sm btn-danger mb-2 rounded-0">Kembali</a>
                <form action="" method="post">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="id_fasilitas">Fasilitas:</label>
                            <select class="form-select rounded-0" aria-label="id_fasilitas" id="id_fasilitas" name="id_fasilitas" required>
                                <option disabled value="">Pilih</option>
                                <?php 
                                    include '../fasilitas/functions.php';
                                    $result = tampilFasilitas();
                                    while ($r = mysqli_fetch_assoc($result)) 
                                    {
                                ?>
                                <option value="<?= $r['id_fasilitas'];?>" <?= ($row['id_fasilitas']==$r['id_fasilitas'])? 'selected' : '';?>><?= $r['nama_fasilitas'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="nim">Mahasiswa:</label>
                            <select class="form-select rounded-0" aria-label="nim" id="nim" name="nim" required>
                                <option disabled value="" selected>Pilih</option>
                                <?php 
                                    include '../mahasiswa/functions.php';
                                    $result = tampilMahasiswa();
                                    while ($r = mysqli_fetch_assoc($result)) 
                                    {
                                ?>
                                <option value="<?= $r['nim'];?>" <?= ($row['nim']==$r['nim'])? 'selected' : '';?>><?= $r['nama'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="waktu_mulai">Waktu Mulai:</label>
                            <input type="datetime-local" class="form-control rounded-0" id="waktu_mulai" name="waktu_mulai" value="<?= $row['waktu_mulai'];?>" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="waktu_selesai">Waktu Selesai:</label>
                            <input type="datetime-local" class="form-control rounded-0" id="waktu_selesai" name="waktu_selesai" value="<?= $row['waktu_selesai'];?>" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="status">Status:</label>
                            <select class="form-select rounded-0" aria-label="status" id="status" name="status" required>
                                <option disabled value="">Pilih</option>
                                <option value="Dipesan" <?= $row['status']=='Dipesan'? 'selected': '';?>>Dipesan</option>
                                <option value="Selesai" <?= $row['status']=='Selesai'? 'selected': '';?>>Selesai</option>
                            </select>
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

