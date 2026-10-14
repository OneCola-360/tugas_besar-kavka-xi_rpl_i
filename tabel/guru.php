<?php
require("../konek.php");
include("../header.php");
$sql = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (guru.id) AS id_guru FROM guru LEFT JOIN users ON users.id = guru.user_id
ORDER BY guru.id asc"), MYSQLI_ASSOC);
$o = 1;
?>
    <style>
        body {
            background-image: linear-gradient(to top, orange, yellow, white);
            background-attachment: fixed;
        }
    </style>
    <body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Guru</h2>
                    <span>
                        <div class="mb-1"><input type="text" id="myInput" onkeyup="searchFunction()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Nama" aria-label="Search"></div>
                    </span>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;" class="bg-dark text-light">No</th>
                                <th scope="col" class="bg-dark text-light">NIP</th>
                                <th scope="col" class="bg-dark text-light">Nama</th>
                                <th scope="col" class="bg-dark text-light">Jenis Kelamin</th>
                                <th scope="col" class="bg-dark text-light">User ID</th>
                                <th scope="col" class="bg-dark text-light">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php if (count($sql) > 0): ?>
                                <?php foreach($sql as $i): ?>
                                    <tr class="isi">
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['nip']; ?></td>
                                        <td class="nama"><?= $i['nama']; ?></td>
                                        <td><?= $i['jenis_kelamin']; ?></td>
                                        <td><?= $i['user_id']; ?></td>
                                        <td>
                                            <a href="../form_manip/form_edit.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>&&username=<?= $i['username']; ?>&&password=<?= $i['password']; ?>&&nip=<?= $i['nip']; ?>&&nama=<?= $i['nama']; ?>&&jk=<?= $i['jenis_kelamin']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/akun/aksi_hapus.php?id=<?= $i['user_id']; ?>&&role=<?= $i['role']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">Data Belum Di Isi</td>
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