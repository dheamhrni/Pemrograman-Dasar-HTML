<?php
include("config06900.php");
session_start();

$username = $_POST['username']; // username: Admin
$password = md5($_POST['password']); // password: Admin

$username = $mysqli->real_escape_string($username);

$query = "SELECT username, password FROM user WHERE username = '$username' AND password='$password';";
$result = $mysqli->query($query);

if($result->num_rows == 1) {
    $_SESSION['users'] = $username;
    header('Location: index06900.php');
} else {
    header('Location: login06900.html');
}
?>
