<?php 
require("../konek.php");
include("../header.php");
$username = $_GET['username'];
$role = $_GET['role'];
$id = $_SESSION['akun_id'];
$password = $_GET['password'];
foreach (mysqli_fetch_all(mysqli_query($konek, "SELECT users.id, username, role, password, created_at, nis, kelas, nip, guru.user_id, siswa.user_id,
COALESCE (siswa.nama, guru.nama) AS nama, COALESCE (guru.jenis_kelamin, siswa.jenis_kelamin) AS jk
FROM users
LEFT JOIN siswa ON users.id = siswa.user_id
LEFT JOIN guru ON users.id = guru.user_id
WHERE users.id = $id"), MYSQLI_ASSOC) as $i);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5" width="50%">
            <div class="card">
                <div class="card-header">
                    <h3>Profile Edit</h3>
                </div>
                <div class="card-body">
                    <form action="../aksi/akun/akun_edit.php" method="post">
                        <?php if($role == "siswa"): ?>
                            <div class="mb-3">
                                <label class="form-label">NIS:</label>
                                <input class="form-control" type="text" name="nis" id="nis" placeholder="<?= $i['nis'] ?>" value="<?= $i['nis'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama:</label>
                                <input class="form-control" type="text" name="nama" id="nama" placeholder="<?= $i['nama'] ?>" value="<?= $i['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas:</label>
                                <input class="form-control" type="text" name="kelas" id="kelas" placeholder="<?= $i['kelas'] ?>" value="<?= $i['kelas'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Laki-laki" id="laki">
                                    <label class="form-check-label" for="laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Perempuan" id="perempuan">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        <?php elseif($role == "guru"): ?>
                            <div class="mb-3">
                                <label class="form-label">NIP:</label>
                                <input class="form-control" type="text" name="nip" id="nip" placeholder="<?= $i['nip'] ?>" value="<?= $i['nip'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama:</label>
                                <input class="form-control" type="text" name="nama" id="nama" placeholder="<?= $i['nama'] ?>" value="<?= $i['nama'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Laki-laki" id="laki">
                                    <label class="form-check-label" for="laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Perempuan" id="perempuan">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
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
                        <input type="text" name="role" id="role" value="<?= $role ?>" style="display: none;" readonly>
                        <input type="text" name="id" id="id" value="<?= $id ?>" style="display: none;" readonly>
                        <input type="text" name="org_pass" id="org_pass" value="<?= $password ?>" style="display: none;" readonly>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>