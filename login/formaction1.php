<!DOCTYPE html>
<html >
  <body>
    <?php
         $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database

         if (mysqli_connect_error()){
           die("there was an error connecting");
         }

         $fire=$_GET['fire1'];
         $gsm=$_GET['gsm1'];
         $client_ip=$_SERVER["REMOTE_ADDR"];
         $now= date("Y-m-s H:i:s");

         $query ="INSERT INTO arduino1 (fire1,gsm1,client_ip1,reg11) VALUES ('$fire','$gsm','$client_ip','$now')";
         $result = mysqli_query($link,$query);
    ?>
  </body>
</html>