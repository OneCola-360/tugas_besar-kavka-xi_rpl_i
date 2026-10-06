<?php
require("../../konek.php");
$id = $_GET['id'];
$role = $_GET['role'];

/*$sql = "DELETE users, siswa FROM users JOIN siswa ON siswa.user_id = users.id WHERE users.id = $id */ 

if ($role == "guru") {
    mysqli_query($konek, "DELETE guru, users FROM guru LEFT JOIN users ON users.id = guru.user_id WHERE guru.user_id =" . $id);
    if (mysqli_query($konek, "DELETE guru, users FROM guru LEFT JOIN users ON users.id = guru.user_id WHERE guru.user_id = $id")) {
        echo"<script>alert('User berhasil dihapus'); window.location.href='../../tabel/users.php?akun_id=$akun_id'</script>";
    } else {
        echo"<script>alert('User gagal dihapus'); window.location.href='../../tabel/users.php'</script>";
    }
} 
if ($role == "admin") {
    mysqli_query($konek, "DELETE FROM users WHERE users.id =" . $id);
    if (mysqli_query($konek, "DELETE FROM users WHERE users.id =" . $id)) {
        echo"<script>alert('User berhasil dihapus'); window.location.href='../../tabel/users.php'</script>";
    } else {
        echo"<script>alert('User gagal dihapus'); window.location.href='../../tabel/users.php'</script>";
    }
} 
if ($role == "siswa") {
    mysqli_query($konek, "DELETE siswa, users FROM siswa JOIN users ON users.id = siswa.user_id WHERE siswa.user_id =" . $id);
    if (mysqli_query($konek, "DELETE siswa, users FROM siswa JOIN users ON users.id = siswa.user_id WHERE siswa.user_id =" . $id)) {
        echo"<script>alert('User berhasil dihapus'); window.location.href='../../tabel/users.php'</script>";
    } else {
        echo"<script>alert('User gagal dihapus'); window.location.href='../../tabel/users.php'</script>";
    }
}
?>