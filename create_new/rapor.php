<?php
require("../konek.php");
$akun_id = $_GET['akun_id'];
$sqlsiswa = mysqli_fetch_all(mysqli_query($konek, "SELECT id, nama FROM siswa"));
$sqlmapel = mysqli_fetch_all(mysqli_query($konek, "SELECT id, nama FROM mapel"));
?>
<body>
<div class="container mt-5" style="width=50%">
    <div class="card shadow">
        <div class="card-header">
            <h3>Form Tambah Data Rapor Siswa</h3>
        </div>
        <div class="card-body">
            <form action="../aksi/rapor/tambah.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <div class="dropdown">
                        <select name="siswa" id="siswa" class="btn btn-secondary">
                            <?php foreach($sqlsiswa as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mapel</label>
                    <div class="dropdown">
                        <select name="siswa" id="siswa" class="btn btn-secondary">
                            <?php foreach($sqlmapel as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
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
                <input type="text" value="<?= $akun_id ?>" style="display: none;" name="akun_id" id="akun_id" readonly>
            </form>
        </div>
    </div>
</div>
</body>
</html>