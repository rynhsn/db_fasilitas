<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['is_logged_in'])) {
    // redirect ke halaman login jika belum login
    header("Location: login.php");
    exit;
}

function countData($tabel) {
    global $conn;
    $ukm = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM ukm");
    $ukm = mysqli_fetch_assoc($ukm)['jumlah'];

    $unit_kerja = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM unit_kerja");
    $unit_kerja = mysqli_fetch_assoc($unit_kerja)['jumlah'];

    $mahasiswa = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM mahasiswa");
    $mahasiswa = mysqli_fetch_assoc($mahasiswa)['jumlah'];

    $fasilitas = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM fasilitas");
    $fasilitas = mysqli_fetch_assoc($fasilitas)['jumlah'];

    $booking = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM booking");
    $booking = mysqli_fetch_assoc($booking)['jumlah'];

    $user = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM users");
    $user = mysqli_fetch_assoc($user)['jumlah'];

    if($tabel == 'ukm') {return $ukm;}
    else if($tabel == 'unit_kerja') {return $unit_kerja;}
    else if($tabel == 'mahasiswa') {return $mahasiswa;}
    else if($tabel == 'fasilitas') {return $fasilitas;}
    else if($tabel == 'booking') {return $booking;}
    else if($tabel == 'user') {return $user;}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Facility Simple App</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">CRUD Fasilitas</div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="#">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="fasilitas">Fasilitas</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="mahasiswa">Mahasiswa</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ukm">UKM</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="unit-kerja">Unit Kerja</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="booking">Booking</a>
                <?php if($_SESSION['role'] == 'admin'){?>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pengguna">Pengguna</a>
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
                                <li class="nav-item"><a class="nav-link" href="logout.php"><?= $_SESSION['name'];?> | Keluar</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <!-- <div class="container-fluid">
                    <h1 class="mt-4">Facility Simple App</h1>
                    <p class="text-justify-">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis repellat a excepturi ducimus eius, hic quis saepe corporis optio voluptatibus molestias assumenda illum consectetur odio sapiente! Facilis incidunt nostrum sit vero, maiores accusamus eveniet, repellat dolore laborum sunt dignissimos nam nemo pariatur veritatis magnam, corrupti sint alias ducimus rem culpa?</p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem debitis harum aspernatur aliquam, neque pariatur. Amet possimus consequatur veniam iure.
                    </p>
                </div> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white rounded-0 m-2">
                                <div class="card-body">
                                <h5 class="card-title">Jumlah UKM</h5>
                                <h3 class="card-text">
                                    <?php 
                                    $jumlah_ukm = countData('ukm');
                                    echo $jumlah_ukm;
                                    ?>
                                </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white rounded-0 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Unit Kerja</h5>
                                    <h3 class="card-text">
                                        <?php 
                                        $jumlah_unit_kerja = countData('unit_kerja');
                                        echo $jumlah_unit_kerja;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white rounded-0 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Mahasiswa</h5>
                                    <h3 class="card-text">
                                        <?php 
                                        $jumlah_mahasiswa = countData('mahasiswa');
                                        echo $jumlah_mahasiswa;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white rounded-0 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Fasilitas</h5>
                                    <h3 class="card-text">
                                        <?php 
                                        $jumlah_fasilitas = countData('fasilitas');
                                        echo $jumlah_fasilitas;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-dark text-white rounded-0 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Booking</h5>
                                    <h3 class="card-text">
                                        <?php 
                                        $jumlah_booking = countData('booking');
                                        echo $jumlah_booking;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white rounded-0 m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pengguna</h5>
                                    <h3 class="card-text">
                                        <?php 
                                        $jumlah_pengguna = countData('user');
                                        echo $jumlah_pengguna;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
