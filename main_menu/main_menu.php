<?php 
require("../konek.php");
include("../header.php");
if (session_status() == 0) session_start();
$id = $_SESSION['akun_id'];
$sqlrole = mysqli_fetch_all(mysqli_query($konek, "SELECT role FROM users WHERE id = $id"), MYSQLI_ASSOC);
foreach ($sqlrole as $r) {};
$role = $r['role'];
if ($role == "siswa"):
$sqlnilai = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (siswa.nama) AS nama, COALESCE (mapel.nama) AS nama_mapel FROM nilai_rapor LEFT JOIN siswa ON nilai_rapor.siswa_id = siswa.id LEFT JOIN mapel ON nilai_rapor.mapel_id = mapel.id WHERE siswa_id = $id"), MYSQLI_ASSOC);
?>
<body>
    <div class="container-lg">
        <?php foreach($sqlnilai as $i): ?>
            <div class="card">
                <div class="card-head">
                    <h3>Nilai Pelajaran <?= $i['nama_mapel'] ?></h3>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <h5>Nama: <?= $i['nama'] ?></h5>
                    </div>
                    <div class="mb-1">
                        <h5>Kelas: <?= $i['kelas'] ?></h5>
                    </div>
                    <hr>
                    <div class="mb-1">
                        <h5>Nilai KKM: <?= $i['nilai_kkm'] ?></h5>
                    </div>
                    <div class="mb-1">
                        <h5>Nilai Pengetahuan: <?= $i['nilai_pengetahuan'] ?></h5>
                    </div>
                    <div class="mb-1">
                        <h5>Nilai Keterampilan: <?= $i['nilai_keterampilan'] ?></h5>
                    </div>
                    <hr>
                    <div class="mb-1">
                        <h5>Keterangan: <?= $i['keterangan'] ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php endif; 
if ($role == "guru"):
$sqlsiswa = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM siswa"), MYSQLI_ASSOC);
?>
    <body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Siswa/Siswi</h2>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php if (count($sqlsiswa) > 0): ?>
                                <?php foreach($sqlsiswa as $i): ?>
                                    <tr>
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['kelas']; ?></td>
                                        <td>
                                            <a href="../tabel/nilai_siswa.php?siswa_id=<?= $i['id'] ?>" class="btn btn-warning btn-sm">Lihat Nilai Rapor Siswa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">Data Belum Di Isi</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php endif;
if ($role == "admin"):
?>
<body>
    <div class="container-lg">
        <div class="container px-4 text-center">
            <h1>Main Menu</h1>
            <div class="row align-items-start">
                <div class="col">
                    <div class="card">
                        <div class="card-head">
                            <p class="p-3"><h3>Tabels</h3></p>
                            <hr>
                        </div>
                        <div class="card-body">
                            <h5>Tabel</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../tabel/users.php" class="btn btn-outline-primary">Tabel User</a>
                                    <a href="../tabel/mapel.php" class="btn btn-outline-primary">Tabel Mapel</a>
                                    <a href="../tabel/siswa.php" class="btn btn-outline-primary">Tabel Siswa</a>
                                    <a href="../tabel/guru.php" class="btn btn-outline-primary">Tabel Guru</a>
                                    <a href="../tabel/mengajar.php" class="btn btn-outline-primary">Tabel Mengajar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-head">
                            <p class="p-3"><h3>Buat Baru</h3></p>
                            <hr>
                        </div>
                        <div class="card-body">
                            <h5>Buat Akun</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../create_new/siswa_input.php" class="btn btn-outline-warning">Buat Akun Siswa</a>
                                    <a href="../create_new/guru_input.php" class="btn btn-outline-warning">Buat Akun Guru</a>
                                    <a href="../create_new/admin_input.php" class="btn btn-outline-warning">Buat Akun Admin</a>
                                </div>
                            </div>
                            <h5>Buat Data Mapel</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../create_new/mapel_input.php" class="btn btn-outline-success">Buat Mapel</a>
                                </div>
                            </div>
                            <h5>Buat Data Mengajar</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../create_new/mengajar.php" class="btn btn-outline-primary">Tabel Mapel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</head>
<?php endif; ?>