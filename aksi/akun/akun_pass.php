<?php 
$newpass = $_POST['newpass'];
$password = $_POST['password'];
$id = $_POST['id'];

if ($newpass == $password) {
    mysqli_query($konek, "ALTER TABLE users MODIFY password = '$password' WHERE id=$id");
    echo "<script>alert('Password berhasil diubah'); window.location.href='../../profile.php'</script>";
} else {
    echo "<script>alert('Password gagal diubah'); window.location.href='../../form_manip/forgot_password.php'</script>";
}
?>