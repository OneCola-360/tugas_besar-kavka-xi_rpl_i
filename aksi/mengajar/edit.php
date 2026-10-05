<?php 
require("../../konek.php");
$siswa = $_POST['siswa'];
$mapel = $_POST['mapel'];
$guru = $_POST['guru'];
$id = $_POST['id'];
mysqli_query($konek, "UPDATE mengajar (id_siswa, id_mapel) SET ($siswa, $mapel) WHERE id = $id; UPDATE mapel (guru_id) SET ($guru) WHERE id = $mapel");
echo "<script>alert('Data Berhasil Diubah'); window.location.href='../../tabel/mengajar.php'</script>";
?>