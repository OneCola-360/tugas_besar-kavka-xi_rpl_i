<?php
require("../konek.php");
include("../header.php");
$sql = "SELECT users.id, username, role, password, created_at, nis, kelas, nip, guru.user_id, siswa.user_id,
COALESCE (siswa.nama, guru.nama) AS nama, COALESCE (guru.jenis_kelamin, siswa.jenis_kelamin) AS jk
FROM users
LEFT JOIN siswa ON users.id = siswa.user_id
LEFT JOIN guru ON users.id = guru.user_id
ORDER BY users.id asc;";

$usersql = mysqli_query($konek, $sql);

$user = mysqli_fetch_all($usersql, MYSQLI_ASSOC);

$o = 1;
?>
    <style type="text/css">
        .filterDiv {
            display: none;
        }

        .show {
            display: table-row;
        }
        body {
            background-image: linear-gradient(to top, black, #444, gray, white);
            background-attachment: fixed;
        }
    </style>
    <body>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2>Tabel Users</h2>
                    <span>
                        <div class="mb-1"><input type="text" id="myInput" onkeyup="searchFunction()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Nama" aria-label="Search"></div>
                        <h5>Filter Role:</h5>
                        <div class="btn-group mb-3" role="group" aria-label="Basic example" id="btnContainer">
                            <button class="btn btn-outline-success" onclick="filterSelection('all')"> Reset Filter</button>
                            <button class="btn btn-outline-primary" onclick="filterSelection('siswa')"> Siswa</button>
                            <button class="btn btn-outline-warning" onclick="filterSelection('guru')"> Guru</button>
                            <button class="btn btn-outline-danger" onclick="filterSelection('admin')"> Admin</button>
                        </div>
                    </span>
                    <table id="tabelUser" class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;" class="bg-dark text-light">No</th>
                                <th scope="col" class="bg-dark text-light">User</th>
                                <th scope="col" class="bg-dark text-light">Username</th>
                                <th scope="col" class="bg-dark text-light">Role</th>
                                <th scope="col" class="bg-dark text-light">Aksi</th>
                            </tr>
                         </thead>
                         <tbody id="list">
                            <?php if (count($user) > 0): ?>
                                <?php foreach($user as $i): ?>
                                    <tr class="filterDiv <?= $i['role'] ?>">
                                        <td><?= $o++; ?></td>
                                        <td class="nama"><?= $i['nama']; ?></td>
                                        <td><?= $i['username']; ?></td>
                                        <td><?= $i['role']; ?></td>
                                        <td>
                                            <a href="../form_manip/form_edit.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>&&username=<?= $i['username']; ?>&&password=<?= $i['password']; ?><?php if($i['role'] == 'siswa'):?>&&nis=<?= $i['nis']; ?>&&nama=<?= $i['nama']; ?>&&kelas=<?= $i['kelas']; ?>&&jk=<?= $i['jk']; ?><?php elseif ($i['role'] == 'guru'): ?>&&nip=<?= $i['nip']; ?>&&nama=<?= $i['nama']; ?>&&jk=<?= $i['jk']; ?><?php endif; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../aksi/akun/aksi_hapus.php?id=<?= $i['id']; ?>&&role=<?= $i['role']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
    current[0].className = current[0].className.replace("active", "");
    this.className += " active";
  });
}

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