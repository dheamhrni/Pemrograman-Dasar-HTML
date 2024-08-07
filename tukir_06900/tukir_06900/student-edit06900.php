<?php
session_start();
require 'dbcon06900.php';

if(isset($_GET['nim'])) {
    $nim = mysqli_real_escape_string($con, $_GET['nim']);
    $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        $student = mysqli_fetch_array($query_run);
    } else {
        $_SESSION['message'] = "No Such Student Found";
        header("Location: index06900.php");
        exit(0);
    }
} else {
    header("Location: index06900.php");
    exit(0);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Student</title>
</head>
<body>

<div class="container mt-4">
    <?php include('message06900.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Student
                        <a href="index06900.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code06900.php" method="POST">
                        <input type="hidden" name="nim" value="<?= $student['nim']; ?>">

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?= $student['nama']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jkel" value="<?= $student['jkel']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="<?= $student['alamat']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= $student['email']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Kota</label>
                            <input type="text" name="kota" value="<?= $student['kota']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>IPK</label>
                            <input type="text" name="ipk" value="<?= $student['ipk']; ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
