<?php 
require("../konek.php");
include("../header.php");
$id = $_GET['siswa_id'];
$o = 1;
$sqlrapor = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (mapel.id, siswa.id) AS nid, COALESCE (siswa.nama) AS nama, COALESCE (mapel.nama) AS nama_mapel FROM nilai_rapor LEFT JOIN siswa ON nilai_rapor.siswa_id = siswa.id LEFT JOIN mapel ON nilai_rapor.mapel_id = mapel.id WHERE nilai_rapor.siswa_id = $id"), MYSQLI_ASSOC);
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
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Nilai KKM</th>
                                <th scope="col">Nilai Pengetahuan</th>
                                <th scope="col">Nilai Keterampilan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php if (count($sqlrapor) > 0): ?>
                                <?php foreach($sqlrapor as $i): ?>
                                    <tr>
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['kelas']; ?></td>
                                        <td><?= $i['nama_mapel']; ?></td>
                                        <td><?= $i['nilai_kkm']; ?></td>
                                        <td><?= $i['nilai_pengetahuan']; ?></td>
                                        <td><?= $i['nilai_keterampilan']; ?></td>
                                        <td><?= $i['keterangan']; ?></td>
                                        <td>
                                            <a href="../form_manip/rapor_edit.php?id=<?= $i['id'] ?>&&mapel<?= $i['nama_mapel'] ?>&&siswa=<?= $i['nama'] ?>&&kkm=<?= $i['nilai_kkm'] ?>&&pengetahuan=<?= $i['nilai_pengetahuan'] ?>&&keterampilan=<?= $i['nilai_keterampilan'] ?>&&keterangan=<?= $i['keterangan']?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/rapor/hapus.php?id=<?= $i['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9">Data Belum Di Isi</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>