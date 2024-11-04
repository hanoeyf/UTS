<?php
try {
    $kon = new PDO("sqlsrv:server=DESKTOP-RF6CM3D\SQLEXPRESS;database=Library");
    $kon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
    echo "Koneksi gagal: " . $error->getMessage();
}

function tambah_Buku($judul, $tahun_terbit, $jenis_buku, $nomor_rak) {
    global $kon;
    try {
        $sql = "INSERT INTO Buku (judul, tahun_terbit, jenis_buku, nomor_rak) VALUES ('$judul', '$tahun_terbit', '$jenis_buku', '$nomor_rak')";
        $kon->exec($sql);  
        
        return "Buku berhasil ditambahkan!";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function edit_buku($id_buku, $judul, $tahun_terbit, $jenis_buku) {
    global $kon;
    
    try {
        $sql = "UPDATE Buku SET judul = '$judul', tahun_terbit = '$tahun_terbit', jenis_buku = '$jenis_buku' WHERE id_buku =$id_buku";
        $kon->exec($sql); 
        
        return "Buku berhasil diupdate!";
    } catch (PDOException $e) {   
        return "Error: " . $e->getMessage();
    }
}

function hapusBuku($id_buku) {
    global $kon;
    
    try {
        $sql = "DELETE FROM Buku WHERE id_buku =$id_buku";
        $kon->exec($sql);
        
        return "Buku berhasil dihapus!";
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
?>