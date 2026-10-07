<?php 
include("../header.php");
$id = $_GET['id'];
$kkm = $_GET['kkm'];
$mapel = $_GET['mapel'];
$siswa = $_GET['siswa'];
$pengetahuan = $_GET['pengetahuan'];
$keterampilan = $_GET['keterampilan'];
$keterangan = $_GET['keterangan'];
?>
<body class="bg-light">
<div class="container mt-5" style="width=50%">
    <div class="card shadow">
        <div class="card-header">
            <h3>Form Edit Data Rapor <?= $siswa ?></h3>
        </div>
        <div class="card-body">
            <form action="../aksi/rapor/edit.php" method="post">
                <h4>Mapel <?= $mapel ?></h4>
                <div class="mb-3">
                    <label class="form-label">Nilai KKM</label>
                    <input type="number" class="form-control" name="kkm" placeholder="<?= $kkm; ?>" value="<?= $kkm; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai Pengetahuan</label>
                    <input type="number" class="form-control" name="pengetahuan" placeholder="<?= $pengetahuan; ?>" value="<?= $pengetahuan; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nilai Keterampilan</label>
                    <input type="number" class="form-control" name="keterampilan" placeholder="<?= $keterampilan; ?>" value="<?= $keterampilan; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="<?= $keterangan; ?>" value="<?= $keterangan; ?>" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Hapus</button>
                </div>
                <input type="text" value="<?= $id ?>" style="display: none;" name="id" id="id" readonly>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>