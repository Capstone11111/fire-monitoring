<?php
      $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database

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
header('location:admindashboardmod.');
} else {
echo "fail";
}
?>
