<?php
include 'functions.php';

$id_booking = $_GET['id_booking'];

if (hapusBooking($id_booking)) {
    echo "<script>alert('Data berhasil dihapus!'); location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); location.href = 'index.php'</script>";
}
?>