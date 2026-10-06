<?php 
require("../../konek.php");
$sqlusers = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM users"), MYSQLI_ASSOC);
$is_there = false;
$username = $_POST['username'];
$password = $_POST['password'];
foreach ($sqlusers as $i) {
    if ($username == $i['username'] && password_verify($password, $i['password'])) {
        $is_there = true;
        $id = $i['id'];
    }
}
session_start();
$_SESSION['akun_id'] = $id;

if ($is_there == false) {
    echo"<script>alert('Ada yang salah, Mohon di cek kembali'); window.location.href='../../index.php'</script>";
}
if ($is_there == true) {
    echo"<script>alert('Selamat Datang $username'); window.location.href='../../main_menu/main_menu.php'</script>";
}

?>