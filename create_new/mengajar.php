<?php
require("../konek.php");
include("../header.php");
$siswa = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM siswa"), MYSQLI_ASSOC);
$mapel = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mapel"), MYSQLI_ASSOC);
?>
<style>
    body {
        background-image: linear-gradient(to right, blue, cyan, white);
        background-attachment: fixed;
    }
</style>
<body class="bg-light">
<div class="container mt-5" style="width=50%">
    <div class="card shadow">
        <div class="card-header bg-primary">
            <h3>Form Tambah Mengajar</h3>
        </div>
        <div class="card-body">
            <form action="../aksi/mengajar/tambah.php" method="post">
                <h5>Pilih Pelajar:</h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="siswa" id="siswa" class="btn btn-info">
                            <?php foreach($siswa as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <h5>Pilih Mapel:</h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="mapel" id="mapel" class="btn btn-success">
                            <?php foreach($mapel as $i): ?>
                                <li><option value="<?= $i['id'] ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>