<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database


     if (mysqli_connect_error()){
       die("there was an error connecting");
     };
        
     if(!isset($_SERVER['HTTP_REFERER'])){
         echo'<img src="./assets/we-dont-do-that-here-black-panther.gif" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">';
  echo'<h3 align="center">Please Log in First to Access the Dashboard :)</h3>';
         echo'<a href="loginpage.php" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">Close<a/>';
    // redirect them to your desired location
    // header('location: ./loginpage.php');
    exit;}

$del = mysqli_query($link,"delete from arduino where `id` !='1' "); // delete query

if($del)
{
    mysqli_close($link); // Close connection
    header("location:db.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
     ?>
    