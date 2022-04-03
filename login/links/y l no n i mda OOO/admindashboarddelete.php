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
      <div id="b1" class="containerTab" style="display:block;background:rgba(0,0,0,0.5);position:absolute;top:3%; left:100%;color: white;width:186vh; height:95vh;padding:30px 40px;">
        <h2>USERS</h2>
        <br>
        <a href="#"onclick="add()" style="color:green;">ADD USER</a>
        <table border="5" style="padding:5px; border-spacing: 5px 10px;" >
        <thead style="color:green" bgcolor="black">
        <tr >
          <th>Id</th>
        <th>Username</th>
          <th>Password</th>
        <th>Code</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr >
        </thead>

    <?php
    $query = 'SELECT * FROM `users`';
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id_number'];
      ?>
      <tr>
        <td><?php echo $result['id_number'];?></td>
        <td><?php echo $result['username'];?></td>
        <td><?php echo $result['password'];?></td>
        <td><?php echo $result['code'];?></td>
          <td><a href="#"onclick="myFunction()" style="color:green;">Edit</a></td>
          <td><a href="admindashboarddelete.php?delete=<?php echo $id; ?>"  style="color:green;"onclick="return confirm('Are you sure you want to delete this user? \n Refresh the page after to take effect');">Delete</a></td>

      </tr>




      <?php
      }
      if (isset($_GET['delete'])){
        $delete_data=$_GET['delete'];
        mysqli_query($link, "DELETE FROM users  WHERE id_number='$delete_data'");

      }
      } else {
       ?>
       <tr>
       <td colspan="9"> No Data Found!</td>
       </tr>
       <?php } ?>
     </table >
<!-- -----------------------------------------------edit------------------------------------------------- -->



     <div id="myDIV" style="display:none; position:absolute;">
       <table align="center">
       <form action="editexec.php" method="POST">

       <?php
       $query = "SELECT * FROM `users` WHERE `id_number`= '$id'";
        $results = mysqli_query($link,$query);
       $result= mysqli_fetch_array($results);
       ?>

       <input type="hidden" value="<?php echo $id; ?>" name ="id_number">
       <tr>
       <td align="center" colspan="2">
       </td>
       </tr>

       <tbody bgcolor="green" style="color:Black;">
       <tr >
       <td>Id:</td>
       <td><input type="text" name ="id_number" required value ="<?php echo $result['id_number']; ?>"></td>
       </tr>


       <tr>
       <td>Username: </td>
       <td><input type="text" name ="username" value ="<?php echo $result['username']; ?>"> </td>
       </tr>


       <tr>
       <td>Password</td>
       <td>
         <input type="text" name ="password" value ="<?php echo $result['password']; ?>" required></td>
       </tr >


       <tr>
       <td>Code:</td>
       <td>
       <input type="text" name ="code" value ="<?php echo $result['code']; ?>" required></td>
       </tr >

       <tr style="color:white">
       <td></td>
       <td><input type="submit" value ="UPDATE" onclick="return confirm('Are you sure you want to update this user?');" ></td>

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


     <!-- =============================================================== -->
     <div id="ADD" style="display:none; position:absolute;">
       <table align="center" >
       <form action="register.php" method="POST">
       <tbody bgcolor="green"  color="black">


       <tr style="color:black">
       <td align="center" colspan="2">
       </td>



       <tr style="color:black">
       <td >Id:</td>
       <td><input type="text" name ="a" placeholder="Numbers only"></td>
       </tr>

       <tr style="color:black">
       <td>Username: </td>
       <td><input type="text" name ="b" autocomplete="off"> </td>
       </tr>


       <tr  style="color:black">
       <td>Password: </td>
       <td><input type="text" name ="c" autocomplete="off"> </td>
       </tr>

       <tr  style="color:black">
       <td>Code: </td>
       <td><input type="text" name ="d" autocomplete="off"> </td>
       </tr>


       <tr>
       <td></td>
       <td align="center"><input type="submit" value ="REGISTER"></td>

       </tr>

</tr>

       </tbody>
       </form>
       <tr>
         <td></td>
          <td align="center"><input type="submit" value ="CANCEL" onclick="add()"></td>
       </tr>
       </table>
     </div>
</div>




<!-- MODIFY -->

<!-- ------------------------------------------------------------------------------------------------------------------------------------- -->
      <div id="b2" class="containerTab" style="display:none;background:rgba(0,0,0,0.5);position:absolute;top:3%; left:100%;color: white;width:186vh; height:95vh;padding:30px 40px;">
        <h2>MODIFY</h2>
        <br>
        <table >
        <form action="editexec1.php" method="POST">

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

        <tbody bgcolor="green" style="color:Black;">
        <tr >
        <td>Id:</td>
        <td><input type="text" name ="id" required value ="<?php echo $result['id']; ?>"></td>
        </tr>


        <tr>
        <td>Username: </td>
        <td><input type="text" name ="username" value ="<?php echo $result['A_User']; ?>"> </td>
        </tr>


        <tr>
        <td>Password</td>
        <td>
          <input type="text" name ="password" value ="<?php echo $result['A_Pass']; ?>" required></td>
        </tr >


        <tr style="color:white">
        <td></td>
        <td><input type="submit" value ="UPDATE" onclick="return confirm('Are you sure you want to update this user?');" ></td>

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
var y = document.getElementById("ADD");
if (x.style.display === "none") {
  x.style.display = "block";
  y.style.display = "none";
} else {
  x.style.display = "none";
  x.style.display = "none";
}
}
</script>

<script type="text/javascript">
function add() {
var x = document.getElementById("ADD");
var y=document.getElementById("myDIV");
if (x.style.display === "none") {
  x.style.display = "block";
  y.style.display = "none";
} else {
  x.style.display = "none";
  x.style.display = "none";
}
}
</script>
  </body>
</html>
