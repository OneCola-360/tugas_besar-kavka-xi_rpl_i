<?php
require("../konek.php");
include("../header.php");
$akun_id = $_SESSION['akun_id'];
$user = mysqli_fetch_all(mysqli_query($konek, "SELECT users.id, username, role, password, created_at, nis, kelas, nip, COALESCE (guru.user_id, siswa.user_id) AS user_id,
COALESCE (siswa.nama, guru.nama) AS nama, COALESCE (guru.jenis_kelamin, siswa.jenis_kelamin) AS jk
FROM users
LEFT JOIN siswa ON users.id = siswa.user_id
LEFT JOIN guru ON users.id = guru.user_id
WHERE users.id = $akun_id"), MYSQLI_ASSOC);
foreach ($user as $i);
$role = $i['role'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <style>
        body {
            background-image: linear-gradient(to top, cyan, #9ee, white);
            background-attachment: fixed;
        }
    </style>
    <body>
        <div class="container mt-5" width="50%">
            <div class="card">
                <div class="card-header bg-info">
                    <h3>Profile <?= $i['username'] ?></h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Username: <?= $i['username'] ?></h5>
                    </div>
                    <div class="mb-3">
                        <h5>Role: <?= $i['role'] ?></h5>
                    </div>
                    <div class="mb-3">
                        <h5>Created At: <?= $i['created_at'] ?></h5>
                    </div>
                    <?php if($role=="siswa"):?>
                        <hr>
                        <div class="mb-3">
                            <h5>NIS: <?= $i['nis'] ?></h5>
                        </div>
                        <div class="mb-3">
                            <h5>Nama: <?= $i['nama'] ?></h5>
                        </div>
                        <div class="mb-3">
                            <h5>Kelas: <?= $i['kelas'] ?></h5>
                        </div>
                        <div class="mb-3">
                            <h5>Jenis Kelamin: <?= $i['jk'] ?></h5>
                        </div>
                    <?php elseif($role=="guru"): ?>
                        <hr>
                        <div class="mb-3">
                            <h5>NIP: <?= $i['nip'] ?></h5>
                        </div>
                        <div class="mb-3">
                            <h5>Nama: <?= $i['nama'] ?></h5>
                        </div>
                        <div class="mb-3">
                            <h5>Jenis Kelamin: <?= $i['jk'] ?></h5>
                        </div>
                    <?php endif; ?>
                    <div class="mb-1">
                        <a class="btn btn-primary" href="../form_manip/profile_edit.php?id=<?= $akun_id ?>&&username=<?= $i['username'] ?>&&password=<?= $i['password'] ?>&&role=<?= $role ?>">Edit</a>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-danger" href="../aksi/akun/logout.php" onclick="return confirm('Anda Yakin Ingin Logout?')">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>