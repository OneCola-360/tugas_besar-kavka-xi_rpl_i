<?php 
require("../../konek.php");
$newpass = $_POST['newpass'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$id = $_POST['id'];

if ($newpass == $password) {
    mysqli_query($konek, "UPDATE users SET password = '$password' WHERE id=$id");
    echo "<script>alert('Password berhasil diubah'); window.location.href='../../main_menu/profile.php'</script>";
} else {
    echo "<script>alert('Password gagal diubah'); window.location.href='../../form_manip/forgot_password.php'</script>";
}
?>