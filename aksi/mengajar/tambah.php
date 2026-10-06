<?php
require("../../konek,php");
$mapel = $_POST['mapel'];
$siswa = $_POST['siswa'];
foreach (mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mengajar")) as $i) {}
$id = count($i) > 0 ? count($i['id']) : count($i) + 1;
mysqli_query($konek, "INSERT INTO mengajar (id, id_siswa, id_mapel) SET ($id, $siswa, $mapel)");
echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../tabel/main_menu.php'</script>";
?>