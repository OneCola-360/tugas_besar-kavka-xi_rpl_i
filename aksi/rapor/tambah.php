<?php
require("../../konek.php");
$siswa = $_POST['siswa'];
$mapeli = $_POST['mapel'];
$keterangan = $_POST['keterangan'];
$kkm = $_POST['kkm'];
$pengetahuan = $_POST['pengetahuan'];
$keterampilan = $_POST['keterampilan']; 
if (count(mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mengajar LEFT JOIN siswa ON siswa.id = mengajar.siswa_id LEFT JOIN mapel ON mapel.id = mengajar.mapel_id WHERE mapel.id = $mapeli AND siswa.id = $siswa")), MYSQLI_ASSOC) == 0) {
    $sql = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mengajar"), MYSQLI_ASSOC);
    foreach ($sql as $i) {};
    $mengajarid = intval($i['id']) + 1;
    mysqli_query($konek, "INSERT INTO mengajar (id, siswa_id, mapel_id) VALUES ($mengajarid, $siswa, $mapeli)");
}

$sqlrapor = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM nilai_rapor"), MYSQLI_ASSOC);
foreach ($sqlrapor as $idrapor) {};
$id = count($sqlrapor) > 0 ? intval($idrapor['id']) + 1 : 1;

mysqli_query($konek, "INSERT INTO nilai_rapor (id, siswa_id, mapel_id, nilai_kkm, nilai_pengetahuan, nilai_keterampilan, keterangan) VALUES ($id, $siswa, $mapeli, $kkm, $pengetahuan, $keterampilan, '$keterangan')");
echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../main_menu/main_menu.php'</script>";
?>