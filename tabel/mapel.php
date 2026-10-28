<?php
require("../konek.php");
include("../header.php");

$sql = "SELECT mapel.id, kode_mapel, mapel.nama, guru_id, guru.nama AS nama_guru
FROM mapel
LEFT JOIN guru ON mapel.guru_id = guru.id
ORDER BY mapel.id asc;";

$mapelsql = mysqli_query($konek, $sql);

$mapel = mysqli_fetch_all($mapelsql, MYSQLI_ASSOC);

$o = 1;
?>
    <style>
        body {
            background-image: linear-gradient(to top, green, lime, white);
            background-attachment: fixed;
        }
    </style>
    <body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Mapel</h2>
                    <div class="mb-3">
                        <input type="text" id="myInput" onkeyup="searchFunction()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Nama" aria-label="Search">
                    </div>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;" class="bg-dark text-light">No</th>
                                <th scope="col" class="bg-dark text-light">Kode Mapel</th>
                                <th scope="col" class="bg-dark text-light">Mapel</th>
                                <th scope="col" class="bg-dark text-light">Guru</th>
                                <th scope="col" class="bg-dark text-light">Aksi</th>
                            </tr>
                         </thead>
                         <tbody id="list">
                            <?php if (count($mapel) > 0): ?>
                                <?php foreach($mapel as $i): ?>
                                    <tr class="isi">
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['kode_mapel']; ?></td>
                                        <td class="nama"><?= $i['nama']; ?></td>
                                        <td><?= $i['nama_guru']; ?></td>
                                        <td>
                                            <a href="../form_manip/form_edit_mapel.php?id=<?= $i['id']; ?>&&kode=<?= $i['kode_mapel']; ?>&&nama=<?= $i['nama']; ?>&&guru=<?= $i['nama_guru']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/mapel/aksi_hapus.php?id=<?= $i['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
function searchFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("list");
  li = ul.getElementsByClassName('isi');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("nama")[0];
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