<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database

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
header('location:../links/admin.php');


}
?>
