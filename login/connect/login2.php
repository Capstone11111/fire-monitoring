<?php
    $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database

     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
session_start();
$username1 = $_POST['username'];
$password1 = $_POST['password'];

$query = "SELECT `A_User`, `A_Pass` FROM `admin` WHERE BINARY `A_User`='$username1' AND BINARY `A_Pass` ='$password1'";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result)== 1){

$_SESSION['username'] = $username1;
header('location:../links/y l no n i mda OOO/admindashboarddelete.php');

} else{
header('location:../loginpage.php');


}
?>
