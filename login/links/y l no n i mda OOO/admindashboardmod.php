<?php
     $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database
?>
 <?php
     if(!isset($_SERVER['HTTP_REFERER'])){
         echo'<img src="../../assets/we-dont-do-that-here-black-panther.gif" style=" display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">';
  echo'<h3 align="center">Please Log in First to Access the Dashboard :)</h3>';
         echo'<a href="../../loginpage.php" style=" display: block;
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
    <!-- <meta http-equiv="refresh" content="1; admindashboard.php "/> -->
    <meta charset="utf-8">
    <title>AdminDashboard</title>
    <link rel="stylesheet" href="../../css/admindashboard.css">

    <script type="text/javascript">
      function preventBack(){window.history.forward()};
      setTimeout("preventBack()",0);
      window.onunload=function(){null;}
    </script>

    <!-- <script type="text/javascript">
      $(document).click(function){
        if(timeof timeOutObj != "undefined"){
          clearTimeout(timeOutObj);
        }
        timeOutObj = setTimeout(function(){
          localStorage.clear();
          window.location = "logout.php";
        }, 10);
      });
    </script> -->
  </head>
  <body>

    <!-- <?php
    if(isset($_SESSION[`username`]))
    { header("location: loginpage.php");
    }
    ?> -->
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <div class="logo_name">ADMINISTRATOR</div>
        </div>
      <div >
         <img src="../../assets/menu.png" id="btn">
      </div>
    </div>
<ul class="nav_list">

    <li>
      <a href="admindashboarddelete.php">

        <img id="ico"src="../../assets/Group-Icon-File.png">
      <span class="link_name">User Accounts</span>
      </a>
    </li>
    <li>
      <a href="admindashboardmod.php">
        <img id="ico"src="../../assets/155-1556969_update-details-icon.png">
      <span class="link_name">Modify Password</span>
      </a>
  </li>
    <li>
      <a href="../../dashboard.php" onclick="return confirm('Close Administrator Page?');">
      <img id="ico"src="../../assets/download.png">
      <span class="link_name" >Dashboard</span>
</a>
    </li>
    <li>
      <a href="../../connect/logout.php">
        <img id="ico"src="../../assets/126467.png" onclick="return confirm('Logout?');">
      <span class="link_name">Logout</span>
      </a>
    </li>

</ul>


    <script>
      let btn = document.querySelector("#btn");
      let sidebar = document.querySelector(".sidebar");

      btn.onclick = function(){
        sidebar.classList.toggle("active");
      }
      // btn.onclick=function(){
      //   sidebar.classList.toogle("active");
      // }
    </script>
    <div class="content">

<!-- MODIFY -->

<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
      <div id="b2" class="containerTab" style="display:block;background:rgba(0,0,0,0.5);position:absolute;top:3%; left:100%;color: white;width:186vh; height:95vh;padding:30px 40px;">
        <h2>MODIFY</h2>
        <br>
        <table >
        <form action="editexec1.php" method="post">

        <?php
        $query = "SELECT * FROM `admin`";
         $results = mysqli_query($link,$query);
        $result= mysqli_fetch_array($results);
        ?>

        <input type="hidden" value="<?php echo $id; ?>" name ="id">
        <tr>
        <td align="center" colspan="2">
        </td>
        </tr>

        <tbody bgcolor="green" style="color:white;">
        <!--<tr >-->
        <!--<td>Id:</td>-->
        <!--<td><input type="text" name ="id" required value ="<?php echo $result['id']; ?>"></td>-->
        <!--</tr>-->


        <tr>
        <td>Username: </td>
        <td><input type="text" name ="username" value ="<?php echo $result['A_User']; ?>"> </td>
        </tr>


        <tr>
        <td>Password: </td>
        <td>
          <input type="text" name ="password" value ="<?php echo $result['A_Pass']; ?>" required></td>
        </tr >


        <tr style="color:white">
        <td></td>
        <td><input type="submit" value ="UPDATE" onclick="return confirm('Are you sure you want to update this admin password?');"  ></td>

        </tr>


        </tbody>
        </form>
 <tr>
   <td></td>
   <td>
   <input type="submit" name="" value="CANCEL" onclick="myFunction()">
   </td>
 </tr>
        </table>

      </div>


    </div>

  </div>

  <script type="text/javascript">


      function openTab(tabName) {
    var i, x;
    x = document.getElementsByClassName("containerTab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
  }
  </script>

<script type="text/javascript">
function myFunction() {
var x = document.getElementById("myDIV");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}
</script>

<script type="text/javascript">
function add() {
var x = document.getElementById("ADD");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}
</script>
  </body>
</html>
