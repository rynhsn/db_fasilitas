<?php
include "../conn.php";

// Fungsi untuk menambahkan data ke tabel unit_kerja
function tambahUnit($nama_unit, $kategori, $lokasi) {
    global $conn;
    $sql = "INSERT INTO unit_kerja (nama_unit, kategori, lokasi) VALUES ('$nama_unit', '$kategori', '$lokasi')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menampilkan data dari tabel unit_kerja
function tampilUnit() {
    global $conn;
    $sql = "SELECT * FROM unit_kerja";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function tampilUnitPerId($id_unit) {
    global $conn;
    $query = "SELECT * FROM unit_kerja WHERE id_unit = $id_unit";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Fungsi untuk mengubah data dalam tabel unit_kerja
function ubahUnit($id_unit, $nama_unit, $kategori, $lokasi) {
    global $conn;
    $sql = "UPDATE unit_kerja SET nama_unit='$nama_unit', kategori='$kategori', lokasi='$lokasi' WHERE id_unit='$id_unit'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus data dari tabel unit_kerja
function hapusUnit($id_unit) {
    global $conn;
    $sql = "DELETE FROM unit_kerja WHERE id_unit='$id_unit'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}