<?php
require("../../konek.php");
$mapel = $_POST['mapel'];
$siswa = $_POST['siswa'];
$sql = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mengajar"), MYSQLI_ASSOC);
foreach ($sql as $i) {};
$id = intval($i['id']) + 1;
mysqli_query($konek, "INSERT INTO mengajar (id, siswa_id, mapel_id) VALUES ($id, $siswa, $mapel)");
echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../main_menu/main_menu.php'</script>";
?>