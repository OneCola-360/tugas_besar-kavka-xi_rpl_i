<?php 
$password = $_POST['password'];
$org_pass = $_POST['org_pass'];
$id = $_POST['id'];
$username = $_POST['username'];
$role = $_POST['role'];

if (password_verify($password, $org_pass)) {
    mysqli_query($konek, "UPDATE users SET username='$username' WHERE id=$id");
    if ($role == "siswa") {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jk = $_POST['jk'] ?? "Laki-Laki";
        mysqli_query($konek, "UPDATE siswa SET nis=$nis, nama='$nama', kelas='$kelas', jenis_kelamin='$jk' WHERE user_id=$id");
    }
    if ($role == "guru") {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'] ?? "Laki-Laki";
        mysqli_query($konek, "UPDATE guru SET nip=$nip, nama='$nama', jenis_kelamin='$jk' WHERE user_id=$id");
    }
    echo "<script>alert('Data Akun Berhasil Diubah'); window.location.href='../../main_menu/profile.php'</script>";
} else {
    echo "<script>alert('Data Akun Gagal Diubah'); window.location.href='../../main_menu/profile.php'</script>";
}
?>