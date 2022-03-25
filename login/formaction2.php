<!DOCTYPE html>
<html >
  <body>
    <?php
         $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database

         if (mysqli_connect_error()){
           die("there was an error connecting");
         }

         $fire=$_GET['fire2'];
         $gsm=$_GET['gsm2'];
         $client_ip=$_SERVER["REMOTE_ADDR"];
         $now= date("Y-m-s H:i:s");

         $query ="INSERT INTO arduino2 (fire2,gsm2,client_ip2,reg12) VALUES ('$fire','$gsm','$client_ip','$now')";
         $result = mysqli_query($link,$query);
    ?>
  </body>
</html>