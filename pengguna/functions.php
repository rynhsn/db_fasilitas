<?php
include '../conn.php';

// session_start();
// if($_SESSION['role'] != 'admin'){
//     header('location: ../');
//     exit;
// }

function tambahUser($nama, $username, $password, $role) {
    global $conn;
    $query = "INSERT INTO users (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";
    return mysqli_query($conn, $query);
}

function tampilUser() {
    global $conn;
    $query = "SELECT * FROM users";
    return mysqli_query($conn, $query);
}

function tampilUserPerId($id_user) {
    global $conn;
    $query = "SELECT * FROM users WHERE id_user = $id_user";
    return mysqli_query($conn, $query);
}

function ubahUser($id_user, $nama, $username, $password, $role) {
    global $conn;
    $query = "UPDATE users SET nama = '$nama', username = '$username', password = '$password', role = '$role' WHERE id_user = $id_user";
    return mysqli_query($conn, $query);
}

function hapusUser($id_user) {
    global $conn;
    $query = "DELETE FROM users WHERE id_user = $id_user";
    return mysqli_query($conn, $query);
}



