<?php 
require("konek.php");
session_start();
$id = $_SESSION['akun_id'];
$sqlrole = mysqli_fetch_all(mysqli_query($konek, "SELECT role FROM users WHERE id = $id"), MYSQLI_ASSOC);
foreach ($sqlrole as $r) {};
$role = $r['role'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <nav class="navbar navbar-expand-lg bg-dark-subtle">
        <div class="container-fluid">
            <?php if($role == "admin"): ?>
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../main_menu/main_menu.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a type="button" class="btn btn-outline-warning" href="../create_new/siswa_input.php">Buat Akun Siswa</a>
                            <a type="button" class="btn btn-outline-warning" href="../create_new/guru_input.php">Buat Akun Guru</a>
                            <a type="button" class="btn btn-outline-warning" href="../create_new/admin_input.php">Buat Akun Admin</a>
                            <a type="button" class="btn btn-outline-success" href="../create_new/mapel_input.php">Buat Data Mapel</a>
                            <a type="button" class="btn btn-outline-primary" href="../create_new/mengajar.php">Buat Data Mengajar</a>
                        </div>
                    </li>
                </ul>
                <span>
                    <a class="nav-link active" aria-current="page" href="../main_menu/profile.php">Profile</a>
                </span>
            </div>
            <?php elseif($role == "guru"): ?>
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../main_menu/main_menu.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a type="button" class="btn btn-outline-warning" href="../create_new/rapor.php">Tambah Nilai Rapor</a>
                        </div>
                    </li>
                </ul>
                <span>
                    <a class="nav-link active" aria-current="page" href="../main_menu/profile.php">Profile</a>
                </span>
            </div>
            <?php else: ?>
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../main_menu/main_menu.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" role="group" aria-label="Basic example" id="btnContainer">
                            <button class="btn btn-outline-success" onclick="filterSelection('all')"> Reset Filter</button>
                            <button class="btn btn-outline-primary" onclick="filterSelection('kamu')"> Nilaimu</button>
                        </div>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input type="text" id="myInput" onkeyup="searchFunction()" class="form-control me-2" type="search" placeholder="Cari Berdasarkan Nama" aria-label="Search">
                </form>
                <span>
                    <a class="nav-link active" aria-current="page" href="../main_menu/profile.php">Profile</a>
                </span>
            </div>
            <?php endif; ?>
        </div>
    </nav>