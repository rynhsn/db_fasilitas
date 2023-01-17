<?php
include '../conn.php';
// Fungsi untuk menambahkan data ke tabel booking
function tambahBooking($id_fasilitas, $nim, $waktu_mulai, $waktu_selesai, $status) {
    global $conn;
    $sql = "INSERT INTO booking (id_fasilitas, nim, waktu_mulai, waktu_selesai, status) VALUES ('$id_fasilitas', '$nim', '$waktu_mulai', '$waktu_selesai', '$status')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menampilkan data dari tabel booking
function tampilBooking() {
    global $conn;
    $sql = "SELECT b.*, f.id_fasilitas, f.nama_fasilitas, m.nim, m.nama FROM booking AS b 
                     JOIN fasilitas AS f ON b.id_fasilitas = f.id_fasilitas
                     JOIN mahasiswa AS m ON b.nim = m.nim";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function tampilBookingPerId($id_booking) {
    global $conn;
    $query = "SELECT * FROM booking AS b 
                       JOIN fasilitas AS f ON b.id_fasilitas = f.id_fasilitas
                       JOIN mahasiswa AS m ON m.nim = b.nim
                      WHERE id_booking = $id_booking";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Fungsi untuk mengubah data dalam tabel booking
function ubahBooking($id_booking, $id_fasilitas, $nim, $waktu_mulai, $waktu_selesai, $status) {
    global $conn;
    $sql = "UPDATE booking SET id_fasilitas='$id_fasilitas', nim='$nim', waktu_mulai='$waktu_mulai', waktu_selesai='$waktu_selesai', status='$status' WHERE id_booking='$id_booking'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus data dari tabel booking
function hapusBooking($id_booking) {
    global $conn;
    $sql = "DELETE FROM booking WHERE id_booking='$id_booking'";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>