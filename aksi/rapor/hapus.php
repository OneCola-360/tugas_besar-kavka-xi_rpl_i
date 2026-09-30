<?php
require("../../konek.php");

$id = $_GET['id'];
$akun_id = $_GET['akun_id'];

mysqli_query($konek, "DELETE nilai_rapor WHERE id = $id");
echo"<script>alert('Data berhasil Dihapus'); window.location.href='../../tabel/nilai_siswa.php?akun_id=$akun_id'</script>";
?>