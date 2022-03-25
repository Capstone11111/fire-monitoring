<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database


     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
if(isset($_POST["btn"])){
  $err=" Incorrect Username/ password";
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION["status"]=false;

$query = "SELECT `username`, `password` FROM `users` WHERE BINARY `username`='$username' AND BINARY `password` ='$password'";
$result = mysqli_query($link,$query);
$_SESSION["status"]=true;

if(mysqli_num_rows($result)== 1){
header('location:../dashboard.php');
} else{
   // echo $err;
 header('location:../loginpage.php');
}
}
?>
