<?php
session_start();
// Mengakhiri sesi
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: login.php");
exit();
?>
