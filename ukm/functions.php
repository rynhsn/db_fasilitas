<?php
include '../conn.php';

// Fungsi untuk menambahkan data ke tabel ukm
function tambahUkm($nama_ukm, $ketua, $jumlah_anggota, $kategori) {
    global $conn;
    $sql = "INSERT INTO ukm (nama_ukm, ketua, jumlah_anggota, kategori) VALUES ('$nama_ukm', '$ketua', '$jumlah_anggota', '$kategori')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menampilkan data dari tabel ukm
function tampilUkm() {
    global $conn;
    $sql = "SELECT * FROM ukm";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function tampilUkmPerId($id_ukm) {
    global $conn;
    $query = "SELECT * FROM ukm WHERE id_ukm = $id_ukm";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Fungsi untuk mengubah data dalam tabel ukm
function ubahUkm($id_ukm, $nama_ukm, $ketua, $jumlah_anggota, $kategori) {
    global $conn;
    $sql = "UPDATE ukm SET nama_ukm='$nama_ukm', ketua='$ketua', jumlah_anggota='$jumlah_anggota', kategori='$kategori' WHERE id_ukm='$id_ukm'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus data dari tabel ukm
function hapusUkm($id_ukm) {
    global $conn;
    $sql = "DELETE FROM ukm WHERE id_ukm='$id_ukm'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}