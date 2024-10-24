<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Sinar Abadi</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
    <h1>Perpustakaan Sinar Abadi</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
<p>Belum punya akun? <a href="registrasi.php">Register di sini</a>.</p>
    </div>
</body>
</html>
<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Login WHERE username = '$user_name'"; 
    $result = $kon->query($sql); 
    $user = $result->fetch(PDO::FETCH_ASSOC); 

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('Selamat datang admin!'); window.location.href='list_buku.php';</script>";
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Login gagal! Username tid
        ak ditemukan.');</script>";
    }
}
?>


