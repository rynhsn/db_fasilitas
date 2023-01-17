<?php
include 'functions.php';

$id_user = $_GET['id_user'];

if (hapusUser($id_user)) {
    echo "<script>alert('Data berhasil dihapus!'); location.href = 'index.php'; </script>";
} else {
    echo "<script>alert('Data gagal dihapus!'); location.href = 'index.php'</script>";
}
?>