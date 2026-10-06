<?php 
session_unset();
session_destroy();
echo "<script>alert('Kembali ke halaman login'); windown.location.href='../../index.php'</script>";
?>