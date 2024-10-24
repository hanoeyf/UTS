<?php
include 'db.php'; 

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    $result = hapusBuku($id_buku);
    if ($result) {
        echo "<script>alert('Buku berhasil dihapus.'); window.location.href='list_buku.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus buku.'); window.location.href='list_buku.php';</script>";
    }
} else {
    echo "<script>alert('ID buku tidak ditemukan!'); window.location.href='list_buku.php';</script>";
}
?>
