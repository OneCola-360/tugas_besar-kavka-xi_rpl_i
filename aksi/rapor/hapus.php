<?php
require("../../konek.php");

$id = $_GET['id'];

mysqli_query($konek, "DELETE FROM nilai_rapor WHERE id = $id");
echo"<script>alert('Data berhasil Dihapus'); window.location.href='../../main_menu/main_menu.php'</script>";
?>