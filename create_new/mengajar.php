<?php
require("../konek.php");
$siswas = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM siswa"), MYSQL_ASSOC);
$mapels = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM mapel"), MYSQL_ASSOC);
$gurus = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM guru"), MYSQL_ASSOC);
?>
<body class="bg-light">
<div class="container mt-5" style="width=50%">
    <div class="card shadow">
        <div class="card-header">
            <h3>Form Tambah Mapel</h3>
        </div>
        <div class="card-body">
            <form action="../aksi/mengajar/edit.php" method="post">
                <h5>Pilih Pelajar:</h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="siswa" id="siswa" class="btn btn-secondary">
                            <?php foreach($siswas as $i): ?>
                                <li><option value="<?= $i['siswa']; ?>"><?= $i['nama']; ?></option></li>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <h5>Pilih Mapel:</h5>
                <div class="mb-3">
                    <div class="dropdown">
                        <select name="mapel" id="mapel" class="btn btn-secondary">
                            <?php foreach($gurus as $i): ?>
                                <li><option value="<?= $i['mapel']; ?>"><?= $i['nama']; ?></option></li>
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