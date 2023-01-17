<?php
include 'functions.php';

$id_fasilitas = $_GET['id_fasilitas'];

if (hapusFasilitas($id_fasilitas)) {
    echo "<script>alert('Data berhasil dihapus!'); location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); location.href = 'index.php'</script>";
}
?>