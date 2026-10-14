<?php
require("../konek.php");
include("../header.php");
$siswa = $_GET['siswa'];
$mapel = $_GET['mapel'];
$guru = $_GET['guru'];
$id = $_GET['id'];
$siswas = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM siswa"), MYSQLI_ASSOC);
$mapels = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mapel"), MYSQLI_ASSOC);
$gurus = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM guru"), MYSQLI_ASSOC);
?>
<style>
    body {
        background-image: linear-gradient(to left, blue, cyan, white);
        background-attachment: fixed;
    }
</style>
<body class="bg-light">
<div class="container mt-5" style="width=50%">
    <div class="card shadow">
        <div class="card-header bg-primary">
            <h3>Form Edit Mengajar</h3>
        </div>
        <div class="card-body">
            <form action="../aksi/mengajar/edit.php" method="post">
                <h5>Pelajar: <?= $siswa ?></h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="siswa" id="siswa" class="btn btn-info">
                            <?php foreach($siswas as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <h5>Mapel: <?= $mapel; ?></h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="mapel" id="mapel" class="btn btn-success">
                            <?php foreach($mapels as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <h5>Pengajar: <?= $guru; ?></h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="guru" id="guru" class="btn btn-warning">
                            <?php foreach($gurus as $i): ?>
                                <li><option value="<?= $i['id']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Kembali</button>
                </div>
                <input type="text" name="id" id="id" value="<?= $id; ?>" style="display: none;" readonly>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>