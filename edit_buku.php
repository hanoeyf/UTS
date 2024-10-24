<?php
session_start();
include 'db.php'; 

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    $sql = "SELECT * FROM Buku WHERE id_buku = $id_buku";
    $result = $kon->query($sql); 
    $buku = $result->fetch(PDO::FETCH_ASSOC); 

    if (!$buku) {
        echo "Buku tidak ditemukan!";
        exit();
    }
} else {
    echo "ID buku tidak ditemukan!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $jenis_buku = $_POST['jenis_buku'];
    $nomor_rak = $_POST['nomor_rak'];

    $sql = "UPDATE Buku SET judul = '$judul', tahun_terbit = '$tahun_terbit', jenis_buku = '$jenis_buku', nomor_rak = '$nomor_rak' WHERE id_buku = $id_buku"; // Query sederhana untuk update
    $result1 = $kon->query($sql); 

    if ($result1) {
        header("Location: list_buku.php");
        exit();
    } else {
        echo "Gagal mengupdate buku!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
<div class="back">
        <a href="list_buku.php" class="back-button">
            <img src="arrow.png" alt="Kembali" class="back-icon">
        </a>
    </div>
    <div class="container">
    <h1>Edit Buku</h1>
    <form method="POST" action="">
        <label for="judul">Judul Buku:</label><br>
        <input type="text" name="judul" id="judul" value="<?php echo $buku['judul']; ?>" required><br><br>

        <label for="tahun_terbit">Tahun Terbit:</label><br>
        <input type="text" name="tahun_terbit" id="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required><br><br>

        <label for="jenis_buku">Jenis Buku:</label><br>
        <input type="text" name="jenis_buku" id="jenis_buku" value="<?php echo $buku['jenis_buku']; ?>" required><br><br>

        <label for="nomor_rak">Nomor Rak:</label><br>
        <input type="text" name="nomor_rak" id="nomor_rak" value="<?php echo $buku['nomor_rak']; ?>" required><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    
    </div>
</body>
</html>
