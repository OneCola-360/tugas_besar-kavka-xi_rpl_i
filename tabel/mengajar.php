<?php
require("../konek.php");
include("../header.php");
$sql = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (siswa.id) AS id_siswa, COALESCE (mapel.id) AS id_mapel, COALESCE (guru.id) AS id_guru, COALESCE (mapel.nama) AS nama_mapel, COALESCE (siswa.nama) AS nama_siswa, COALESCE (guru.nama) AS nama_guru FROM mengajar LEFT JOIN siswa ON mengajar.id_siswa = siswa.id LEFT JOIN mapel ON mengajar.id_mapel = mapel.id LEFT JOIN guru ON mapel.guru_id = guru.id ORDER BY mengajar.id asc"), MYSQLI_ASSOC);
?>
<body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Users</h2>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;">No</th>
                                <th scope="col">ID Mengajar</th>
                                <th scope="col">Siswa</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Aksi</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php if (count($sql) > 0): ?>
                                <?php foreach($sql as $i): ?>
                                    <tr>
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['id']; ?></td>
                                        <td><?= $i['nama_siswa']; ?></td>
                                        <td><?= $i['nama_mapel']; ?></td>
                                        <td><?= $i['nama_guru']; ?></td>
                                        <td>
                                            <a href="../form_manip/form_edit.php?id=<?= $i['id']; ?>&&siswa=<?= $i['nama_siswa']; ?>&&guru=<?= $i['nama_guru']; ?>&&mapel=<?= $i['nama_mapel']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/akun/aksi_hapus.php?id=<?= $i['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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