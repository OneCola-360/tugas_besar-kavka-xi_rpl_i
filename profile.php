<?php
$id = $_GET['id'];
$user = mysqli_fetch_all(mysqli_query($konek, "SELECT * FROM users WHERE id = $id"), MYSQLI_ASSOC);
foreach ($user as $i);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5" width="50%">
            <div class="card">
                <div class="card-head">
                    <h3>Profile <?= $i['username'] ?></h3>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <h5>Username: <?= $i['username'] ?></h5>
                    </div>
                    <div class="mb-2">
                        <h5>Role: <?= $i['role'] ?></h5>
                    </div>
                    <div class="mb-3">
                        <h5>Created At: <?= $i['created_at'] ?></h5>
                    </div>
                    <div class="mb-3">
                        <a href="form_manip/profile_edit.php?id=<?= $i['id'] ?>&&username=<?= $i['username'] ?>&&password=<?= $i['password'] ?>">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>