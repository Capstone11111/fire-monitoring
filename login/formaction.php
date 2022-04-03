<!DOCTYPE html>
<html >
  <body>
    <?php
        $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database

         if (mysqli_connect_error()){
           die("there was an error connecting");
         }

         $fire=$_GET['fire'];
         $gsm=$_GET['gsm'];
         $client_ip=$_SERVER["REMOTE_ADDR"];
         $now= date("Y-m-s H:i:s");

         $query ="INSERT INTO arduino (fire,gsm,client_ip,reg1) VALUES ('$fire','$gsm','$client_ip','$now')";
         $result = mysqli_query($link,$query);
    ?>
  </body>
</html>
