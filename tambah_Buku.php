<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $thn = $_POST['tahun_terbit'];
    $jenis = $_POST['jenis_buku'];
    $nomor_rak = $_POST['nomor_rak'];

    if (!empty($judul) && !empty($thn) && !empty($jenis) && !empty($nomor_rak)) {
        $result = tambah_Buku($judul, $thn, $jenis, $nomor_rak);
        if ($result) {
            $pesanTB = "Buku berhasil ditambahkan.";
        } else {
            $pesanTB = "Gagal menambahkan buku.";
        }
    } else {
        $pesanTB = "Harap isi semua field!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
<div class="back">
        <a href="list_buku.php" class="back-button">
            <img src="arrow.png" alt="Kembali" class="back-icon">
        </a>
    </div>
    <div class="container">
        <h1>Tambah Buku</h1>
        <form method="POST" action="">
            <input type="text" name="judul" placeholder="Judul Buku" required>
            <input type="text" name="tahun_terbit" placeholder="Tahun Terbit" required>
            <input type="text" name="jenis_buku" placeholder="Jenis Buku">
            <input type="text" name="nomor_rak" placeholder="Nomor Rak">
            <button type="submit">Tambah</button>
            <br>
        
        </form>
        <?php if (isset($pesanTB)): ?>
            <div class="feedback"><?php echo $pesanTB; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
