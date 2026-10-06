<?php
require("../../konek.php");
$siswa = $_POST['siswa'];
$mapel = $_POST['mapel'];
$keterangan = $_POST['keterangan'];
$kkm = $_POST['kkm'];
$pengetahuan = $_POST['pengetahuan'];
$keterampilan = $_POST['keterampilan'];

$sqlrapor = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM nilai_rapor"), MYSQLI_ASSOC);
foreach ($sqlrapor as $idrapor);
$id = count($sqlrapor) > 0 ? intval($idrapor['id']) + 1 : 1;

mysqli_query($konek, "INSERT INTO nilai_rapor (id, siswa_id, mapel_id, nilai_kkm, nilai_pengetahuan, nilai_keterampilan, keterangan) VALUES ($id, $siswa, $mapel, $kkm, $pengetahuan, $keterampilan, '$keterangan')");
echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../main_menu/main_menu.php'</script>";
?>