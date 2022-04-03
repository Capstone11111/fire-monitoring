<?php
     $link = mysqli_connect("localhost","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database


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
