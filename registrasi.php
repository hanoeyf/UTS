<?php
include 'db.php';  
$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    try {
        $checkSql = "SELECT * FROM Login WHERE email = '$email'"; 
        $simpanEmail = $kon->query($checkSql);
        $isiEmail = $simpanEmail->fetch(PDO::FETCH_ASSOC); 
        // var_dump($isiEmail);
        // die();
        // $2y$10$.JQIOL9wf1STG1TrdoFFU.75Vkv4LfeitmiUvTgpobfE5kkRpQY0u

        if ($isiEmail) {
            $pesan = "<p style='color: red;'>Email sudah terdaftar!</p>";
        } else {
            $sql = "INSERT INTO Login (username, email, password) VALUES ('$user_name', '$email', '$password')";
            $kon->exec($sql);
            $pesan = "<p style='color: orange;'>Registrasi berhasil!</p>";
        }
    } catch (PDOException $e) {
        $pesan = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Sinar Abadi</title>
    <link rel="stylesheet" href="styleReg.css">
</head>
<body>
    <div class="regis">
        <h1>Perpustakaan Sinar Abadi</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
        <div class="pesan">
            <?php 
            echo $pesan; 
            ?>
        </div>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
    </div>
</body>
</html>
