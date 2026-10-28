<?php
require("../konek.php");
include("../header.php");
$o = 1;
$sql = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (mengajar.id) AS id, COALESCE (siswa.id) AS id_siswa, COALESCE (mapel.id) AS id_mapel, COALESCE (guru.id) AS id_guru, COALESCE (mapel.nama) AS nama_mapel, COALESCE (siswa.nama) AS nama_siswa, COALESCE (guru.nama) AS nama_guru FROM mengajar LEFT JOIN siswa ON mengajar.siswa_id = siswa.id LEFT JOIN mapel ON mengajar.mapel_id = mapel.id LEFT JOIN guru ON mapel.guru_id = guru.id ORDER BY mengajar.id asc"), MYSQLI_ASSOC);
?>
    <style>
        body {
            background-image: linear-gradient(to top, blue, cyan, white);
            background-attachment: fixed;
        }
    </style>
    <body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Mengajar</h2>
                    <span>
                        <div class="mb-1"><input type="text" id="srcSiswa" onkeyup="searchBySiswa()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Siswa" aria-label="Search"></div>
                        <div class="mb-1"><input type="text" id="srcMapel" onkeyup="searchByMapel()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Mapel" aria-label="Search"></div>
                        <div class="mb-3"><input type="text" id="srcGuru" onkeyup="searchByGuru()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Guru" aria-label="Search"></div>
                    </span>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;" class="bg-dark text-light">No</th>
                                <th scope="col" class="bg-dark text-light">Siswa</th>
                                <th scope="col" class="bg-dark text-light">Mata Pelajaran</th>
                                <th scope="col" class="bg-dark text-light">Guru</th>
                                <th scope="col" class="bg-dark text-light">Aksi</th>
                            </tr>
                         </thead>
                         <tbody id="list">
                            <?php if (count($sql) > 0): ?>
                                <?php foreach($sql as $i): ?>
                                    <tr class="isi">
                                        <td><?= $o++; ?></td>
                                        <td class="siswa"><?= $i['nama_siswa']; ?></td>
                                        <td class="mapel"><?= $i['nama_mapel']; ?></td>
                                        <td class="guru"><?= $i['nama_guru']; ?></td>
                                        <td>
                                            <a href="../form_manip/mengajar_edit.php?id=<?= $i['id']; ?>&&siswa=<?= $i['nama_siswa']; ?>&&guru=<?= $i['nama_guru']; ?>&&mapel=<?= $i['nama_mapel']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/mengajar/hapus.php?id=<?= $i['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
    <script>
    function searchBySiswa() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('srcSiswa');
  filter = input.value.toUpperCase();
  ul = document.getElementById("list");
  li = ul.getElementsByClassName('isi');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("siswa")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

function searchByGuru() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('srcGuru');
  filter = input.value.toUpperCase();
  ul = document.getElementById("list");
  li = ul.getElementsByClassName('isi');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("guru")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

function searchByMapel() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('srcMapel');
  filter = input.value.toUpperCase();
  ul = document.getElementById("list");
  li = ul.getElementsByClassName('isi');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("mapel")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
    </script>
</html>