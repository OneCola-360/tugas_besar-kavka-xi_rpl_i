<?php
require("../../konek.php");
$keterampilan = $_POST['keterampilan'];
$pengetahuan = $_POST['pengetahuan'];
$keterangan = $_POST['keterangan'];
$kkm = $_POST['kkm'];
$id = $_POST['id'];

mysqli_query($konek, "UPDATE nilai_rapor SET nilai_keterampilan, nilai_pengetahuan, nilai_kkm, keterangan VALUE $keterampilan, $pengetahuan, $kkm, '$keterangan' WHERE id = $id");
echo"<script>alert('Edit Berhasil'); window.location.href='../../main_menu/main_menu.php'</script>";
?>