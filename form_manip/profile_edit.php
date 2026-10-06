<?php 
include("../header.php");
session_start();
$username = $_GET['username'];
$id = $_SESSION['akun_id'];
$password = $_GET['password'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5" width="50%">
            <div class="card">
                <div class="card-head">
                    <h3>Profile Edit</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="../aksi/akun/akun_edit.php">
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="<?= $username ?>" value="<?= $username ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password Untuk Melanjutkan" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="mb-3">
                            <a href="forgot_password.php?id=<?= $id ?>&&password=<?= $password ?>">Lupa Password?</a>
                        </div>
                        <input type="text" name="id" id="id" value="<?= $id ?>" style="display: none;" readonly>
                        <input type="text" name="org_pass" id="org_pass" value="<?= $password ?>" style="display: none;" readonly>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>