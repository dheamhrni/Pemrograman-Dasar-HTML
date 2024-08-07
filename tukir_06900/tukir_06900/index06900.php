<?php
    session_start();
    require 'dbcon06900.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>a122206894</title>
</head>
<body>

<body>
  
    <div class="container mt-4">

        <?php include('message06900.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Mahasiswa 06900
                            <a href="student-create06900.php" class="btn btn-info float-end m-3">Add Students</a>
                            <a href="logout06900.php" class="btn btn-danger float-end m-3">Logout</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Kota</th>
                                    <th>IPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM mahasiswa";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['nim']; ?></td>
                                                <td><?= $student['nama']; ?></td>
                                                <td><?= $student['jkel']; ?></td>
                                                <td><?= $student['alamat']; ?></td>
                                                <td><?= $student['email']; ?></td>
                                                <td><?= $student['kota']; ?></td>
                                                <td><?= $student['ipk']; ?></td>
                                                <td>
                                                    
                                                    <a href="student-edit06900.php?nim=<?= $student['nim']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code06900.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['nim'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                    <a href="student-cetak06900.php?nim=<?= $student['nim']; ?>" class="btn btn-warning btn-sm">Cetak</a>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>