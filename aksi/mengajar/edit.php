<?php 
require("../../konek.php");
$siswa = $_POST['siswa'];
$mapel = $_POST['mapel'];
$guru = $_POST['guru'];
$id = $_POST['id']; 
$sql1 = "UPDATE mengajar SET siswa_id = $siswa, mapel_id = $mapel WHERE mengajar.id = $id";
$sql2 = "UPDATE mapel SET guru_id = $guru WHERE mapel.id = $mapel";
mysqli_query($konek, $sql1);
mysqli_query($konek, $sql2);
echo "<script>alert('Data Berhasil Diubah'); window.location.href='../../tabel/mengajar.php'</script>";
?>