<?php
    $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database

     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT `username`, `password` FROM `users` WHERE BINARY `username`='$username' AND BINARY `password` ='$password'";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result)== 1){

$_SESSION['username'] = $username1;
header('location:../dashboard.php');

} else{
header('location:../loginpage.php');


}
?>
