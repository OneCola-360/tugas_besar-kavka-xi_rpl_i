<?php 
require("../konek.php");
include("../header.php");
if (session_status() == 0) session_start();
$id = $_SESSION['akun_id'];
$o = 1;
$sqlrole = mysqli_fetch_all(mysqli_query($konek, "SELECT role FROM users WHERE id = $id"), MYSQLI_ASSOC);
foreach ($sqlrole as $r) {};
$role = $r['role'];
if ($role == "siswa"):
$sql360 = mysqli_fetch_all(mysqli_query($konek, "SELECT kelas FROM siswa WHERE user_id = $id"), MYSQLI_ASSOC);
foreach ($sql360 as $l) {};
$kelas = $l['kelas'];
$sqlnilai = mysqli_fetch_all(mysqli_query($konek, "SELECT *, COALESCE (siswa.nama) AS nama, COALESCE (mapel.nama) AS nama_mapel, COALESCE (siswa.user_id) AS akun_id FROM nilai_rapor LEFT JOIN siswa ON nilai_rapor.siswa_id = siswa.id LEFT JOIN mapel ON nilai_rapor.mapel_id = mapel.id LEFT JOIN users ON siswa.user_id = users.id"), MYSQLI_ASSOC);
?>
<style type="text/css">
.filterDiv {
  display: none;
}

.show {
  display: block;
}

body {
    background-image: linear-gradient(to top, blue, cyan, white);
    background-attachment: fixed;
}
</style>
<body>
    <div class="container-lg">
        <ul id="list" style="list-style-type: none;">
        <?php if ($sqlnilai > 0): ?>
        <?php foreach($sqlnilai as $i): ?>
            <li class="isi">
            <a href="#" style="display: none;" class="nama"><?= $i['nama'] ?></a>
            <a href="#" style="display: none;" class="kelas"><?= $i['kelas'] ?></a>
            <div class="mt-4">
            <div class="filterDiv <?= $i['akun_id'] == $id ? 'kamu' : 'orangLain' ?>">
            <div class="card">
                <div class="card-header text-light" style="background-image: url(../bgblueprint.jpe);">
                    <h3>Nilai Pelajaran <?= $i['nama_mapel'] ?></h3>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <h5>Nama: <?= $i['nama'] ?></h5>
                    </div>
                    <div class="mb-1">
                        <h5>Kelas: <?= $i['kelas'] ?></h5>
                    </div>
                    <hr>
                    <div class="mb-1">
                        <h5>Nilai KKM: <?= $i['nilai_kkm'] ?></h5>
                    </div>
                    <div class="mb-1">
                        <h5>Nilai Pengetahuan: <?= $i['nilai_pengetahuan'] ?></h5>
                    </div>
                    <div class="mb-1">
                        <h5>Nilai Keterampilan: <?= $i['nilai_keterampilan'] ?></h5>
                    </div>
                    <hr>
                    <div class="mb-1">
                        <h5>Keterangan: <?= $i['keterangan'] ?></h5>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </li>
        <?php endforeach; ?>
        <?php else: ?>
            <li>
            <div class="card">
                <div class="card-header">
                    <h3>Data Belum Di Isi</h3>
                </div>
            </div>
            </li>
        <?php endif; ?>
        </ul>
    </div>
</body>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("btnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

function searchByName() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('srcName');
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

function searchByKelas() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('srcKelas');
  filter = input.value.toUpperCase();
  ul = document.getElementById("list");
  li = ul.getElementsByClassName('isi');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("kelas")[0];
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
<?php endif; 
if ($role == "guru"):
$sqlsiswa = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM siswa"), MYSQLI_ASSOC);
?>
    <style>
        body {
            background-image: linear-gradient(to top, blue, cyan, lime, white);
            background-attachment: fixed;
        }
    </style>
    <body>
        <div class="container my-4" >
            <div class="row justify-content-center">
                <div class="col-md:10">
                    <h2>Tabel Siswa/Siswi</h2>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;" class="bg-dark text-light">No</th>
                                <th scope="col" class="bg-dark text-light">Nama</th>
                                <th scope="col" class="bg-dark text-light">Kelas</th>
                                <th scope="col" class="bg-dark text-light">Aksi</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php if (count($sqlsiswa) > 0): ?>
                                <?php foreach($sqlsiswa as $i): ?>
                                    <tr>
                                        <td><?= $o++; ?></td>
                                        <td><?= $i['nama']; ?></td>
                                        <td><?= $i['kelas']; ?></td>
                                        <td>
                                            <a href="../tabel/nilai_siswa.php?siswa_id=<?= $i['id'] ?>" class="btn btn-warning btn-sm">Lihat Nilai Rapor Siswa</a>
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
</html>
<?php endif;
if ($role == "admin"):
?>
<style>
    body {
        background-image: linear-gradient(to top, #842, #c84, white);
        background-attachment: fixed;
    }
</style>
<body>
    <div class="container-lg">
        <div class="container px-4 text-center">
            <div class="mt-4">
            <h1>Main Menu</h1>
            <div class="row align-items-start">
                <div class="col">
                    <div class="card">
                        <div class="card-header" style="background-image: url(../bgcardboard.jpe);">
                            <p class="p-3"><h3>Tabels</h3></p>
                        </div>
                        <div class="card-body">
                            <h5>Tabel Akun-Users</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../tabel/siswa.php" class="btn btn-outline-warning">Tabel Siswa</a>
                                    <a href="../tabel/guru.php" class="btn btn-outline-warning">Tabel Guru</a>
                                    <a href="../tabel/users.php" class="btn btn-outline-warning">Tabel User</a>
                                </div>
                            </div>
                            <h5>Tabel Mapel</h5>
                            <div class="mb-1">
                                <a href="../tabel/mapel.php" class="btn btn-outline-success">Tabel Mapel</a>
                            </div>
                            <h5>Tabel Mengajar</h5>
                            <div class="mb-1">
                                <a href="../tabel/mengajar.php" class="btn btn-outline-primary">Tabel Mengajar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header" style="background-image: url(../bgcardboard.jpe);">
                            <p class="p-3"><h3>Buat Baru</h3></p>
                        </div>
                        <div class="card-body">
                            <h5>Buat Akun</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../create_new/siswa_input.php" class="btn btn-outline-warning">Buat Akun Siswa</a>
                                    <a href="../create_new/guru_input.php" class="btn btn-outline-warning">Buat Akun Guru</a>
                                    <a href="../create_new/admin_input.php" class="btn btn-outline-warning">Buat Akun Admin</a>
                                </div>
                            </div>
                            <h5>Buat Data Mapel</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../create_new/mapel_input.php" class="btn btn-outline-success">Buat Mapel</a>
                                </div>
                            </div>
                            <h5>Buat Data Mengajar</h5>
                            <div class="mb-1">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="../create_new/mengajar.php" class="btn btn-outline-primary">Tabel Mapel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</head>
<?php endif; ?>