<?php 
session_start();
$id = $_SESSION['akun_id'];
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
                    <form action="../aksi/akun/akun_pass.php">
                        <div class="mb-3">
                            <label class="form-label">Password Baru:</label>
                            <input type="password" class="form-control" name="newpass" placeholder="Masukan Password Baru" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ketik Ulang:</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan Ulang Untuk Melanjutkan" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <input type="text" name="id" id="id" value="<?= $id ?>" style="display: none;" readonly>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>