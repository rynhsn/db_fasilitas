<?php
include 'login_function.php';
session_start();

if(isset($_SESSION['is_logged_in'])) {
    // redirect ke halaman login jika belum login
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        header('Location: index.php');
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
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
        <title>Facility Simple App</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Page content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <form action="" method="post" class="text-center border border-light p-5">
                                <p class="h4 mb-4">Sign in</p>
                                <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username">
                                <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
                                <button class="btn btn-primary rounded-0 btn-block" type="submit">Sign in</button>
                            </form>
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
