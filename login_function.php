<?php
include 'conn.php';

// Function for login
function login($username, $password) {
    global $conn;
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        // session_start();
        $result = mysqli_fetch_array($result);
        $_SESSION['name'] = $result['nama'];
        $_SESSION['username'] = $result['username'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['is_logged_in'] = true;
        return true;
    } else {
        return false;
    }
}

function logout() {
    session_start();
    session_destroy();
    header("location: login.php");
    exit;
}

function cek_login() {
    session_start();
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        header('location: ../login.php');
        exit;
    }
}