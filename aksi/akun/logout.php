<?php 
session_start();
session_unset();
session_destroy();
echo"<script>alert('Kembali ke Halaman Login'); window.location.href='../../index.php'</script>";
?>