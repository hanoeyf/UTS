<?php
session_start();
include 'db.php'; 
$sql = "SELECT * FROM Buku";
$result = $kon->query($sql); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="styleList.css"> 
</head>  
<body>
   
<a href="logout.php" class="logout" onclick="return confirm('Apakah Anda yakin ingin keluar?')">Logout</a>

<div class="buku">
    <img src="buku.png" alt="buku" style="width:10%">
</div>

<div class="main-content">
    <div class="judul">
    <h1 style="text-align: center;">Daftar Buku</h1>
    </div>
    <br><br>
    <div class="table">
        <table border="1" cellpadding="10" cellspacing="0" class="w3-table-all">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tahun Terbit</th>
                <th>Jenis Buku</th>
                <th>Nomor Rak</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($result->rowCount() == 0) {
                echo "<tr><td colspan='6' style='text-align: center;'>Tidak ada buku terdaftar.</td></tr>";
            } else {
                while ($buku = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $buku['id_buku'] . "</td>";
                    echo "<td>" . $buku['judul'] . "</td>";
                    echo "<td>" . $buku['tahun_terbit'] . "</td>";
                    echo "<td>" . $buku['jenis_buku'] . "</td>";
                    echo "<td>" . $buku['nomor_rak'] . "</td>";
                    echo "<td><a href='edit_buku.php?id_buku=" . $buku['id_buku'] . "'>Edit</a> | ";
                    echo "<a href='hapus_buku.php?id_buku=" . $buku['id_buku'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus buku ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        </div>
            <br><br><br><br>

        <a href="tambah_buku.php" class="tambah">Tambah Buku Baru</a>
    </div>

</body>
</html>
