<?php
include 'functions.php';

$nim = $_GET['nim'];

if (hapusMahasiswa($nim)) {
    echo "<script>alert('Data berhasil dihapus!'); location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); location.href = 'index.php'</script>";
}
?>