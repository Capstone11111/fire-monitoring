 <?php
     if(!isset($_SERVER['HTTP_REFERER'])){
         echo'<img src="../assets/we-dont-do-that-here-black-panther.gif" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">';
  echo'<h3 align="center">Please Log in First to Access the Dashboard :)</h3>';
         echo'<a href="../loginpage.php" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">Close<a/>';
    // redirect them to your desired location
    // header('location: ./loginpage.php');
    exit;}
     ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/adminPage.css">

</head>
  <body>
    <div class="back">
    </div>
    <form  action="../connect/login22.php" class="box" method="post">
      <img src="../assets/ezgif.com-gif-maker (1).gif" id="ico">
      <h1>
      Administrator
      </h1>
      <input type="text" placeholder="Enter Username" name="username" required autocomplete="off">
        <input type="password"  placeholder="Enter Password" name="password"id="myInput" required >
            <input type="checkbox" onclick="myFunction()" ><span style="color:grey;">Show password</span>
          <input type="submit" value="Log in"  >
          <li>
        <a href="../dashboard.php">
        <span class="title" style="color:red; position:absolute; left:43.5%;">Return</span>
        </a>
          </li>
    </form>
    <script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    }
    </script>
  </body>
</html>
