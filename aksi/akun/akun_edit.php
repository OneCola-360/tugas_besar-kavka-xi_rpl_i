<?php 
require("../../konek.php");

$id = $_POST['id'];
$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];
$org_pass = $_POST['org_pass'];

if (password_verify($password, $org_pass)):
    mysqli_query($konek, "UPDATE users SET role = '$role', username = '$username' WHERE id = $id");
    if ($role == "guru") {
        mysqli_query($konek, "UPDATE guru SET nip = '$role', nama = '" . $_POST['nama'] . "', jenis_kelamin = '" . $_POST['jk'] . "'  WHERE guru.user_id = $id");
    }
    if ($role == "siswa") {
        mysqli_query($konek, "UPDATE siswa SET nis = '$role', nama = '" . $_POST['nama'] . "', kelas = '" . $_POST['kelas'] . "',jenis_kelamin = '" . $_POST['jk'] . "'  WHERE siswa.user_id = $id");
    }
    echo "<script>alert('Data Berhasil Diubah'); window.location.href='../../main_menu/profile.php'</script>";
else:
echo "<script>alert('Data Gagal Diubah'); window.location.href='../../main_menu/profile.php'</script>";
endif; ?>