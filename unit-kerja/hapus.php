<?php
include 'functions.php';

$id_unit = $_GET['id_unit'];

if (hapusUnit($id_unit)) {
    echo "<script>alert('Data berhasil dihapus!'); location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); location.href = 'index.php'</script>";
}
?>