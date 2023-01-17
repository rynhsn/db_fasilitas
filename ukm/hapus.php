<?php
include 'functions.php';

$id_ukm = $_GET['id_ukm'];

if (hapusUkm($id_ukm)) {
    echo "<script>alert('Data berhasil dihapus!'); location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); location.href = 'index.php'</script>";
}
?>