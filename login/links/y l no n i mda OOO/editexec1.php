<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database

     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
session_start();
$id=$_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
// $code = $_POST['code'];

$query ="UPDATE `admin` SET `A_User`='$username',`A_Pass`='$password' WHERE `id`= '$id'";
$result = mysqli_query($link,$query);
if ($result) {
header('location:admindashboardmod.php');
} else {
echo "fail";
}
?>
