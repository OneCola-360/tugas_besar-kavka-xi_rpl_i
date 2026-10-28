<?php
require("../konek.php");
include("../header.php");
$akun_id = $_SESSION['akun_id'];
$sqlmapel = mysqli_fetch_all(mysqli_query($konek, "SELECT mapel.id, mapel.nama, mapel.kode_mapel FROM mapel LEFT JOIN guru ON mapel.guru_id = guru.id WHERE guru.user_id = $akun_id"), MYSQLI_ASSOC);
?>
<style>
    body {
        background-image: linear-gradient(to right, lightgreen, palegreen, white);
        background-attachment: fixed;
    }
</style>
<body>
<div class="container mt-5" style="width=50%">
    <div class="card shadow">
        <div class="card-header bg-dark text-light">
            <h3>Form Tambah Data Rapor Siswa</h3>
        </div>
        <div class="card-body">
            <form action="../aksi/rapor/tambah.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <div class="dropdown">
                        <select name="siswa" id="siswa" class="btn btn-info">
                            <?php 
                            foreach ($sqlmapel as $mapel):
                                $mapel_id = $mapel['id'];
                                $mapel_kode = $mapel['kode_mapel'];
                                $sqlsiswa = mysqli_fetch_all(mysqli_query($konek, "SELECT siswa.id, siswa.nama FROM siswa LEFT JOIN mengajar ON mengajar.siswa_id = siswa.id LEFT JOIN mapel ON mapel.id = mengajar.mapel_id WHERE mapel.kode_mapel = '$mapel_kode'"), MYSQLI_ASSOC);
                                foreach($sqlsiswa as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach; endforeach; ?>
                        </select>
                    </div>
                </div>
                <?php if (count($sqlmapel) > 1): ?>
                    <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <div class="dropdown">
                        <select name="mapel" id="mapel" class="btn btn-success">
                            <?php foreach($sqlmapel as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                <?php else: ?>
                <input type="text" name="mapel" id="mapel" value="<?= $mapel_id ?>" style="display: none;" readonly>
                <?php endif; ?>
                <div class="mb-3">
                    <label class="form-label">Nilai KKM</label>
                    <input type="number" class="form-control" name="kkm" placeholder="Masukkan Nilai KKM" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai Pengetahuan</label>
                    <input type="number" class="form-control" name="pengetahuan" placeholder="Masukkan Nilai Pengetahuan Siswa" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai Keterampilan</label>
                    <input type="number" class="form-control" name="keterampilan" placeholder="Masukkan Nilai Keterampilan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>