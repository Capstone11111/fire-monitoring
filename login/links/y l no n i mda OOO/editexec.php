<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database

     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
session_start();
$id=$_POST['id_number'];
$username = $_POST['username'];
$password = $_POST['password'];
$code = $_POST['code'];

$query ="UPDATE `users` SET
`id_number`='$id',`username`='$username',`password`='$password',`code`='$code' WHERE `id_number`= '$id'";
$result = mysqli_query($link,$query);
if ($result) {
header('location:admindashboarddelete.php');
} else {
echo "fail";
}
?>
