<?php 
$password = $_POST['password'];
$org_pass = $_POST['org_pass'];
$id = $_POST['id'];
$username = $_POST['username'];

if ($password == $org_pass) {
    mysqli_query($konek, "ALTER TABLE users MODIFY username='$username' WHERE id=$id");
    echo "<script>alert('Data Akun Berhasil Diubah'); window.location.href='../../profile.php?akun_id=$id'</script>";
} else {
    echo "<script>alert('Data Akun Gagal Diubah'); window.location.href='../../profile.php?akun_id=$id'</script>";
}
?>