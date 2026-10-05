<?php
require("../konek.php");
$sql = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (guru.id) AS id_guru FROM guru LEFT JOIN users ON users.id = guru.user_id
ORDER BY guru.id asc"), MYSQL_ASSOC);
?>
<body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Guru</h2>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;">No</th>
                                <th scope="col">ID Siswa</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
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
                                        <td><?= $i['id_guru']; ?></td>
                                        <td><?= $i['nip']; ?></td>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['jk']; ?></td>
                                        <td><?= $i['user_id']; ?></td>
                                        <td>
                                            <a href="../form_manip/form_edit.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>&&username=<?= $i['username']; ?>&&password=<?= $i['password']; ?>&&nis=<?= $i['nik']; ?>&&nama=<?= $i['nama']; ?>&&jk=<?= $i['jk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/akun/aksi_hapus.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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