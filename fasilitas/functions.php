<?php
    include_once "../conn.php";
    
    // Fungsi untuk menambahkan data ke tabel fasilitas
    function tambahFasilitas($nama_fasilitas, $kategori, $kapasitas, $lokasi, $status) {
        global $conn;
        $sql = "INSERT INTO fasilitas (nama_fasilitas, kategori, kapasitas, lokasi, status) VALUES ('$nama_fasilitas', '$kategori', '$kapasitas', '$lokasi', '$status')";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk menampilkan data dari tabel fasilitas
    function tampilFasilitas() {
        global $conn;
        $sql = "SELECT * FROM fasilitas";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    function tampilFasilitasPerId($id_fasilitas) {
        global $conn;
        $query = "SELECT * FROM fasilitas WHERE id_fasilitas = $id_fasilitas";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    // Fungsi untuk mengubah data dalam tabel fasilitas
    function ubahFasilitas($id_fasilitas, $nama_fasilitas, $kategori, $kapasitas, $lokasi, $status) {
        global $conn;
        $sql = "UPDATE fasilitas SET nama_fasilitas='$nama_fasilitas', kategori='$kategori', kapasitas='$kapasitas', lokasi='$lokasi', status='$status' WHERE id_fasilitas='$id_fasilitas'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk menghapus data dari tabel fasilitas
    function hapusFasilitas($id_fasilitas) {
        global $conn;
        $sql = "DELETE FROM fasilitas WHERE id_fasilitas='$id_fasilitas'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

// Tutup koneksi
// mysqli_close($conn);

?>