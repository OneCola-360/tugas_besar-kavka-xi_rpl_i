<?php
require("../../konek.php");

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$guru = $_POST['guru'];
$id = $_POST['id'];

mysqli_query($konek, "UPDATE mapel SET kode_mapel = '$kode', nama = '$nama', guru_id = $guru WHERE id = $id");
echo "<script>alert('Data Berhasil Diubah'); window.location.href='../../tabel/mapel.php'</script>"
?>