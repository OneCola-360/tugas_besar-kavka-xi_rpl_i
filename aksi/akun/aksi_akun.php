<?php 
require("../../konek.php");
$akun_id = $_POST['akun_id'];
$sqluserid = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM users"), MYSQLI_ASSOC);
foreach ($sqluserid as $o) {}
$user_id = intval($o['id']) + 1;

$role = $_POST["role"] ?? "";
if ($role == "") return;
$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

if ($username !== "" || $role !== "" || $password !== "") {
    mysqli_query($konek, "INSERT INTO users (id, username, password, role) VALUES (" . $user_id . ",'" . $username . "','" . $password . "','" . $role . "')");
} else return;

if ($role == "siswa"):
    $nik = $_POST["nis"] ?? "";
    $nama = $_POST["nama"] ?? "";
    $kelas = $_POST["kelas"] ?? "";
    $jk = $_POST["jk"] ?? "";

    if ($nik !== "" && $nama !== "" && $kelas !== "" && $jk !== "") {
        $sqlid = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM siswa"), MYSQLI_ASSOC);
        foreach ($sqlid as $i) {}
        $id = intval($i['id']) + 1;

        mysqli_query($konek, "INSERT INTO siswa (id, nis, nama, kelas, jenis_kelamin, user_id) VALUES (" . $id . "," . $nik . ",'" . $nama . "','" . $kelas . "','" . $jk . "'," . $user_id . ")");
    }
    echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../tabel/users.php?akun_id=$akun_id'</script>";
endif;
if ($role == "guru"):
    $nik = $_POST["nip"] ?? "";
    $nama = $_POST["nama"] ?? "";
    $jk = $_POST["jk"] ?? "";

    if ($nik !== "" && $nama !== "" && $jk !== "") {
        $sqlid = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM guru"), MYSQLI_ASSOC);
        foreach ($sqlid as $i) {}
        $id = intval($i['id']) + 1;

        mysqli_query($konek, "INSERT INTO guru (id, nip, nama, jenis_kelamin, user_id) VALUES (" . $id . "," . $nik . ",'" . $nama . "','" . $jk . "'," . $user_id . ")");
    }
    echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../tabel/users.php?akun_id=$akun_id'</script>"; 
endif; 
if ($role == "admin"):
    echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='../../tabel/users.php?akun_id=$akun_id'</script>"; 
endif; ?>