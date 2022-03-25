
<?php
     $link = mysqli_connect("localhost","id17983626_capstone","GtO_P^Nm51R#9^o4","id17983626_credentials");// server, user, password, database
     ?>
         <?php
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
     ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
       <!--<meta http-equiv="refresh" content="5; dashboardr3.php "/> -->
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
      
    <!--    <script type="text/javascript">-->
    <!--  $(document).ready(function()-->
    <!--  {-->
    <!--    setInterval(function(){-->
    <!--      $("#autodata").load("dashboardr3.php");-->
    <!--      refresh();-->
    <!--    },10000);-->
    <!--  });-->
    <!--</script>-->
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/dashstyle.css">
     <!--<meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  

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
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
          <div class="logo_name">DASHBOARD</div>
        </div>
      <div >
         <img src="./assets/menu.png" id="btn">
      </div>
    </div>
<ul class="nav_list">
    <li>
<!-- <button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button> -->
      <a href="dashboard.php">
        <img id="ico"src="./assets/free-home-icon-2502-thumb.png" >
      <span class="link_name" >Home</span>
      </a>

    </li>
    <li>
      <a href="dashboardr1.php" >
        <img id="ico"src="./assets/door-icon-png-7.png">
      <span class="link_name">Room 1</span>
      </a>
    </li>
    <li>
      <a href="dashboardr2.php">

        <img id="ico"src="./assets/door2-icon-png-7.png">
      <span class="link_name">Room 2</span>
      </a>
    </li>
    <li>
      <a href="dashboardr3.php">
        <img id="ico"src="./assets/door3-icon-png-7.png">
      <span class="link_name">Room 3</span>
      </a>
  </li>
  <br>
   <li>
      <a href="db.php">
        <img id="ico"src="./assets/db.png">
      <span class="link_name">History</span>
      </a>
  </li>
    <li>
      <a href="./links/admin.php">
      <img id="ico"src="./assets/admin-icon-9.png">
      <span class="link_name" >Admin Page</span>
</a>
    </li>
    <li>
      <a href="./connect/logout.php" onclick="return confirm('Logout?');" >
        <img id="ico"src="./assets/126467.png">
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



    <!-- ........................................... -->
  <div class="autodata"  >
      <br><br>

<h1 class="home"> History</h1>
<br><br>
<table style=" border-spacing: 20px 20px; border:solid #EF5625; box-shadow: 1px 1px 20px red inset; background:rgba(0,0,0,0.7);"  >
  <thead style="overflow-y:scroll;">
     
     
     <!--data-->
     <tr style="display:inline-flex; flex-wrap: wrap; margin: 6px; gap: 15px;" >
        
         <td>
              <div>
           <table border="5" style="padding:5px; border-spacing: 5px 10px;" >
        <thead style="color:green" bgcolor="black">
            
            <tr class="rtitle"> <h5 >Room 1</h5></tr>
            <tr class="clr">
                 <!--room1 --><td>
    <a href=dbdel.php onclick="return confirm('Clear Data?')" name="data1">
        <img src="./assets/bin.png" style="height:40px;  width: 40px;">
     </a>
    </td>
            </tr>
        <tr >
          <th>Id</th>
        <th>Fire Sensor</th>
          <th>MQ-2</th>
        <th>Date and Time</th>
        </tr >
        </thead>

    <?php
    $query = 'SELECT * FROM `arduino` WHERE `fire` = "0" OR `gsm`> 500 ORDER BY `id` DESC';
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id'];
      ?>
      <tr>
        <td><?php echo $result['id'];?></td>
        <td><?php echo $result['fire'];?></td>
        <td><?php echo $result['gsm'];?></td>
        <td><?php echo $result['reg1'];?></td>

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
       </table>
       </div>
       </td> 


     <td >
             <div>
           <table border="5" style="padding:5px; border-spacing: 5px 10px; " >
        <thead style="color:green" bgcolor="black">
            <tr class="rtitle"> <h5>Room 2</h5></tr>
              <tr class="clr">
                 <!--room1 --><td>
    <a href=dbdel1.php onclick="return confirm('Clear Data?')">
        <img src="./assets/bin.png" style="height:40px;  width: 40px;">
     </a>
    </td>
            </tr>
        <tr >
          <th>Id</th>
        <th>Fire Sensor</th>
          <th>MQ-2</th>
        <th>Date and Time</th>
        </tr >
        </thead>

    <?php
    $query = 'SELECT * FROM `arduino1`   WHERE `fire1` = "0" OR `gsm1`> 500 ORDER BY `id1` DESC';
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id1'];
      ?>
      <tr>
        <td><?php echo $result['id1'];?></td>
        <td><?php echo $result['fire1'];?></td>
        <td><?php echo $result['gsm1'];?></td>
        <td><?php echo $result['reg11'];?></td>

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
       </table>
       </div>
       </td> 
       
          <td >
             <div>
           <table border="5" style="padding:5px; border-spacing: 5px 10px; " >
        <thead style="color:green" bgcolor="black">
            <tr> <h5>Room 3</h5></tr>
             <tr class="clr">
                 <!--room1 --><td>
    <a href=dbdel2.php onclick="return confirm('Clear Data?');">
        <img src="./assets/bin.png" style="height:40px;  width: 40px;">
     </a>
    </td>
            </tr>
        <tr >
          <th>Id</th>
        <th>Fire Sensor</th>
          <th>MQ-2</th>
        <th>Date and Time</th>
        </tr >
        </thead>

    <?php
    $query = 'SELECT * FROM `arduino2`  WHERE `fire2` = "0" OR `gsm2`> 500 ORDER BY `id2` DESC';
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id2'];
      ?>
      <tr>
        <td><?php echo $result['id2'];?></td>
        <td><?php echo $result['fire2'];?></td>
        <td><?php echo $result['gsm2'];?></td>
        <td><?php echo $result['reg12'];?></td>

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
       </table>
       </div>
       </td> 
       
     </tr>
      
  </thead>
</table >

    
       

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
  </body>
</html>
