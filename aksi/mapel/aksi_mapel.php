<?php 
require("../../konek.php");

$sqlmapelid = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mapel"), MYSQLI_ASSOC);
$nama = $_POST['nama'];
$guru = $_POST['guru'];
foreach ($sqlmapelid as $o) {}
$mapel_id = count($sqlmapelid) >= 1 ? intval($o['id']) + 1 : count($sqlmapelid) + 1;
$mapelkode = array("MP", "0", "0", $mapel_id);
if ($mapel_id >= 10) {
    $mapelkode = array("MP", "0", $mapel_id);
} else if ($mapel_id >= 100) {
    $mapelkode = array ("MP", $mapel_id);
}
$kode = join($mapelkode);

if (mysqli_query($konek, "INSERT INTO mapel (id, kode_mapel, nama, guru_id) VALUES (" . $mapel_id . ",'" . $kode . "','" . $nama . "','" . $guru . "')")):
echo "alert('Data Berhasil Ditambahkan'); window.location.href='../../main_menu/main_menu.php'";
else:
echo "alert('Data Gagal Ditambahkan'); window.location.href='../../main_menu/main_menu.php'";
endif;
?>