<?php
require("../../konek.php");
$id = $_GET['id'];
mysqli_query($konek, "DELETE mengajar WHERE id = $id");
echo "<script>alert('Data Berhasil Dihapus'); window.location.href='../../tabel/mengajar.php'</script>";
?>