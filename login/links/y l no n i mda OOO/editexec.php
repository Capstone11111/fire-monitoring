<?php
      $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database

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
