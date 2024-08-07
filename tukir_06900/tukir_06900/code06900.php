<?php
session_start();
require 'dbcon06900.php';

if(isset($_POST['update_student'])) {
    $nim = mysqli_real_escape_string($con, $_POST['nim']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $jkel = mysqli_real_escape_string($con, $_POST['jkel']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $kota = mysqli_real_escape_string($con, $_POST['kota']);
    $ipk = mysqli_real_escape_string($con, $_POST['ipk']);

    $query = "UPDATE mahasiswa SET nama='$nama', jkel='$jkel', alamat='$alamat', email='$email', kota='$kota', ipk='$ipk' WHERE nim='$nim'";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index06900.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index06900.php");
        exit(0);
    }
}

if(isset($_POST['delete_student'])) {
    $nim = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM mahasiswa WHERE nim='$nim'";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index06900.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index06900.php");
        exit(0);
    }
}

if(isset($_POST['save_student'])) {
    $nim = mysqli_real_escape_string($con, $_POST['nim']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $jkel = mysqli_real_escape_string($con, $_POST['jkel']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $kota = mysqli_real_escape_string($con, $_POST['kota']);
    $ipk = mysqli_real_escape_string($con, $_POST['ipk']);

    $query = "INSERT INTO mahasiswa (nim, nama, jkel, alamat, email, kota, ipk) VALUES ('$nim', '$nama', '$jkel', '$alamat', '$email', '$kota', '$ipk')";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: index06900.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Created";
        header("Location: index06900.php");
        exit(0);
    }
}
?>
