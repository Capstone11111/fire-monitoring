<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database

     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
session_start();
$id = $_POST['a'];
$username = $_POST['b'];
$password = $_POST['c'];
$code = $_POST['d'];

$query = "INSERT INTO `users`(`id_number`, `username`, `password`, `code`) VALUES ('$id','$username','$password','$code')";
$result = mysqli_query($link,$query);

if ($result) {
header('location:admindashboarddelete.php');
} else {
echo '<table align="center">
<thead>
<tr>
<th>
<h1 align="center">Data Exist / Duplicated</h1><br>
<h3>TIP: <h4>Do not use existing ID</h4></h3>
<form style="align:center;" action="admindashboarddelete.php">
<input type="submit" value="Return"></form>

</th>

</tr>

</thead>

</table>';
}
?>
