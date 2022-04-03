<?php
    $link = mysqli_connect("remotemysql.com","X6awpxRRoa","jLhKLl0WRL","X6awpxRRoa");// server, user, password, database
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
          <script>

var pStart = { x: 0, y: 0 };

var pStop = { x: 0, y: 0 };

function swipeStart(e) {
  if (typeof e["targetTouches"] !== "undefined") {
    var touch = e.targetTouches[0];
    pStart.x = touch.screenX;
    pStart.y = touch.screenY;
  } else {
    pStart.x = e.screenX;
    pStart.y = e.screenY;
  }
}

function swipeEnd(e) {
  if (typeof e["changedTouches"] !== "undefined") {
    var touch = e.changedTouches[0];
    pStop.x = touch.screenX;
    pStop.y = touch.screenY;
  } else {
    pStop.x = e.screenX;
    pStop.y = e.screenY;
  }

  swipeCheck();
}

function swipeCheck() {
  var changeY = pStart.y - pStop.y;
  var changeX = pStart.x - pStop.x;
  if (isPullDown(changeY, changeX)) {
      window.location.href ="dashboard.php";
  }
}

function isPullDown(dY, dX) {
  // methods of checking slope, length, direction of line created by swipe action
  return (
    dY < 0 &&
    ((Math.abs(dX) <= 100 && Math.abs(dY) >= 300) ||
      (Math.abs(dX) / Math.abs(dY) <= 0.3 && dY >= 60))
  );
}

document.addEventListener(
  "touchstart",
  function (e) {
    swipeStart(e);
  },
  false
);
document.addEventListener(
  "touchend",
  function (e) {
    swipeEnd(e);
  },
  false
);
    
    </script>






    <meta http-equiv="refresh" content="5; dashboard.php "/> 
         
         
         
         
         
         
         
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
      
    <!--    <script type="text/javascript">-->
    <!--  $(document).ready(function()-->
    <!--  {-->
    <!--    setInterval(function(){-->
    <!--      $("#autodata").load("dashboardr1.php");-->
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
    
  
}

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
      <span class="link_name" >Administrator</span>
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
         <div class="autodata">
<br><br>
<h1 class="home"  >Home</h1><br>
<table style="border-spacing: 20px 20px;">
    
    <thead> 
    <tr> </tr>
    <tr>
    <th>
        <div class="r1">
    <?php
    $query = "SELECT * FROM `arduino` ORDER BY `id` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id'];

    $lightson=$result['fire'];
    $lightid=$result['id'];
    $gas=$result['gsm'];

    if($lightson ==0 && $gas >=501){
         echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182891607-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
      echo"<img src='./assets/sirenon.gif' style=' width:300px;'><br>";
        // echo"<td bgcolor=red style='color:red;' >safe</td>";
    echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>fire and gas detected!</h3> ";

    }
    elseif ($gas >= 501) {
           echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182787103-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
        echo"<img src='./assets/sirenon.gif' style=' width:300px;'><br>";
          // echo"<td bgcolor=red style='color:red;' >safe</td>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Gas level is above Thershold!</h3> ";
    }
     elseif($lightson== "0") {
          echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641052840360-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
                  echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";

         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Room 1</h3> ";
        echo"<img src='./assets/sirenon.gif' style='width:300px;'><br>";
       echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Fire is detected!</h3> ";
    }
    else {
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,green,black);'>Room1</h3>";
      echo" <img src='./assets/offsiren.png' style='width:300px; '>";
      
    }


     }}?>
</div>
     </th>
     <th class="r2">
     <?php
    $query = "SELECT * FROM `arduino1` ORDER BY `id1` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id1'];


     
    $lightson=$result['fire1'];
    $lightid=$result['id1'];
    $gas=$result['gsm1'];
 if($lightson ==0 && $gas >=501){
         echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182891607-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
      echo"<img src='./assets/sirenon.gif' style=' width:300px;'><br>";
        // echo"<td bgcolor=red style='color:red;' >safe</td>";
    echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>fire and gas detected!</h3> ";

    }
    elseif ($gas >= 501) {
           echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182787103-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
        echo"<img src='./assets/sirenon.gif' style=' width:300px;'><br>";
          // echo"<td bgcolor=red style='color:red;' >safe</td>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Gas level is above Thershold!</h3> ";
    }
     elseif($lightson== "0") {
          echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641052840360-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
        echo"<img src='./assets/sirenon.gif' style='width:300px;'><br>";
       echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Fire is detected!</h3> ";
    }
    else {
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,green,black);'>Room 2</h3>";
      echo" <img src='./assets/offsiren.png' style='width:300px; '>";
      
    }

     }}?>

     </th>
     <th class="r3">
          <?php
    $query = "SELECT * FROM `arduino2` ORDER BY `id2` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id2'];


     
    $lightson=$result['fire2'];
    $lightid=$result['id2'];
    $gas=$result['gsm2'];

   if($lightson ==0 && $gas >=501){
         echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182891607-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
      echo"<img src='./assets/sirenon.gif' style=' width:300px;'><br>";
        // echo"<td bgcolor=red style='color:red;' >safe</td>";
    echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>fire and gas detected!</h3> ";

    }
    elseif ($gas >= 501) {
           echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182787103-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
        echo"<img src='./assets/sirenon.gif' style=' width:300px;'><br>";
          // echo"<td bgcolor=red style='color:red;' >safe</td>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Gas level is above Thershold!</h3> ";
    }
     elseif($lightson== "0") {
          echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641052840360-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
        echo"<img src='./assets/sirenon.gif' style='width:300px;'><br>";
       echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Fire is detected!</h3> ";
    }
    else {
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,green,black);'>Room 3</h3>";
      echo" <img src='./assets/offsiren.png' style='width:300px; '>";
      
    }

     }}?>

     </th>
     <th></th>
     </tr>
    </thead>
   <tr>
       <td align="center">
   <table border="5" style="padding:5px; border-spacing: 5px 10px; " >
        <thead style="color:green" bgcolor="black">
        <tr >
          <!-- <th>Id</th> -->
        <th>Flame</th>
          <th>Gas</th>


        </tr >
        </thead>


    <?php
    $query = "SELECT * FROM `arduino` ORDER BY `id` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id'];


      ?>
      <tr>
        <!-- <td><?php echo $result['id'];?></td> -->
        <td><?php echo $result['fire'];?></td>
        <td><?php echo $result['gsm'];?></td>


      </tr>
    
    <?php

     }}?>

     </table >

   <!------------------------------------------------------------------->
   
   
   
    </td>
       <td align="center">
   <table border="5" style="padding:5px; border-spacing: 5px 10px; " >
        <thead style="color:green" bgcolor="black">
        <tr >
          <!-- <th>Id</th> -->
        <th>Flame</th>
          <th>Gas</th>


        </tr >
        </thead>


    <?php
    $query = "SELECT * FROM `arduino1` ORDER BY `id1` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id1'];


      ?>
      <tr>
        <!-- <td><?php echo $result['id1'];?></td> -->
        <td><?php echo $result['fire1'];?></td>
        <td><?php echo $result['gsm1'];?></td>


      </tr>
    
    <?php

     }}?>           
</table>
       </td>
       
       <td align="center">
             <table border="5" style="padding:5px; border-spacing: 5px 10px; " >
        <thead style="color:green" bgcolor="black">
        <tr >
          <!-- <th>Id</th> -->
        <th>Flame</th>
          <th>Gas</th>


        </tr >
        </thead>


    <?php
    $query = "SELECT * FROM `arduino2` ORDER BY `id2` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id2'];


      ?>
      <tr>
        <!-- <td><?php echo $result['id2'];?></td> -->
        <td><?php echo $result['fire2'];?></td>
        <td><?php echo $result['gsm2'];?></td>


      </tr>
    
    <?php

     }}?>

    </table


</div>
  <div></div>


  </body>
</html>
