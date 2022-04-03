<?php
     $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database


     if (mysqli_connect_error()){
       die("there was an error connecting");
     }
else{
echo"connection success";
}
?>
