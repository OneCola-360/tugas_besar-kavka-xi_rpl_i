<?php 
require("../../konek.php");
$password = $_POST['password'];
$org_pass = $_POST['org_pass'];
$id = $_POST['id'];
$username = $_POST['username'];
$role = $_POST['role'];

if (password_verify($password, $org_pass)):
    mysqli_query($konek, "UPDATE users SET role = '$role', username = '$username'  WHERE users.id = $id");
    if ($role == "guru") {
        mysqli_query($konek, "UPDATE guru SET nip = '$role', nama = '" . $_POST['nama'] . "', jenis_kelamin = '" . $_POST['jk'] . "'  WHERE guru.user_id = $id");
    }
    if ($role == "siswa") {
        mysqli_query($konek, "UPDATE siswa SET nis = '$role', nama = '" . $_POST['nama'] . "', kelas = '" . $_POST['kelas'] . "',jenis_kelamin = '" . $_POST['jk'] . "'  WHERE siswa.user_id = $id");
    }
    echo "<script>alert('Data Berhasil Diubah'); window.location.href='../../tabel/users.php'</script>";
else:
echo "<script>alert('Data Gagal Ditambahkan'); window.location.href='../../tabel/users.php'</script>";
endif; ?>
?>