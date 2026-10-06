<?php
require("../konek.php");
include("../header.php");
$sql = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (siswa.id) AS id_siswa FROM siswa LEFT JOIN users ON users.id = siswa.user_id
ORDER BY siswa.id asc"), MYSQLI_ASSOC);
?>
<body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Siswa</h2>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;">No</th>
                                <th scope="col">ID Siswa</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Aksi</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php if (count($sql) > 0): ?>
                                <?php foreach($sql as $i): ?>
                                    <tr>
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['id_siswa']; ?></td>
                                        <td><?= $i['nis']; ?></td>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['kelas']; ?></td>
                                        <td><?= $i['jenis_kelamin']; ?></td>
                                        <td><?= $i['user_id']; ?></td>
                                        <td>
                                            <a href="../form_manip/form_edit.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>&&username=<?= $i['username']; ?>&&password=<?= $i['password']; ?>&&nis=<?= $i['nis']; ?>&&nama=<?= $i['nama']; ?>&&kelas=<?= $i['kelas']; ?>&&jk=<?= $i['jenis_kelamin']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/akun/aksi_hapus.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">Data Belum Di Isi</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>