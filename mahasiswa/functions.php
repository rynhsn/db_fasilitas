<?php
include '../conn.php';

function tambahMahasiswa($nim, $nama, $prodi, $fakultas, $angkatan, $jenis_kelamin) {
    global $conn;
    $query = "INSERT INTO mahasiswa (nim, nama, prodi, fakultas, angkatan, jenis_kelamin) VALUES ('$nim', '$nama', '$prodi', '$fakultas', '$angkatan', '$jenis_kelamin')";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }

}

function ubahMahasiswa($nim, $nama, $prodi, $fakultas, $angkatan, $jenis_kelamin) {
    global $conn;
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', fakultas = '$fakultas', angkatan = '$angkatan', jenis_kelamin = '$jenis_kelamin' WHERE nim = '$nim'";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

function tampilMahasiswaPerNim($nim) {
    global $conn;
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function tampilMahasiswa() {
    global $conn;
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($conn, $query);
    return $result;
}

function hapusMahasiswa($nim) {
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    return mysqli_query($conn, $query);
}
