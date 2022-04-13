
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
       <meta http-equiv="refresh" content="5; dashboardr2.php "/> 
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
      
    <!--    <script type="text/javascript">-->
    <!--  $(document).ready(function()-->
    <!--  {-->
    <!--    setInterval(function(){-->
    <!--      $("#autodata").load("dashboardr2.php");-->
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

<h1 class="home"> ROOM 2</h1>
<br>
<table style=" border-spacing: 20px 20px;">
  
      <thead>
        <tr>
            <th></th><th></th><th></th>
          <th align="center" class="r2">
    <?php
    $query = "SELECT * FROM `arduino1` ORDER BY `id1` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id1'];


    $lightson=$result['fire1'];
    $lightid=$result['id1'];
    $gas=$result['gsm1'];

    if($lightson ==0 && $gas >=401){
         echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182891607-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
          echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
        echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
      echo"<img src='./assets/sirenon.gif' style=' width:300px;'>";
      echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>fire and gas detected!</h3> ";

    }
    elseif ($gas >= 401) {
           echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182787103-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
          echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>...</h3> ";
        echo"<img src='./assets/sirenon.gif' style=' width:300px;'>";
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
        echo"<img src='./assets/sirenon.gif' style=' width:300px;'>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,red,black);transition:0.5s ease;'>Fire Detected!</h3> ";
    }
    else {
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,green,black);transition:0.5s ease;'>...</h3> ";
      echo"<img src='./assets/offsiren.png' style=' width:300px;'>";
         echo"<h3 align='center' style='background:linear-gradient(90deg,black,green,black);transition:0.5s ease;'>...</h3> ";
    }


     }}?>
          </th>
          <th></th>
          <th align="center">
           <table border="5" style="padding:5px; border-spacing: 5px 10px;" >
        <thead style="color:green" bgcolor="black">
        <tr >
          <!-- <th>Id</th> -->
        <th>Flame</th>
          <th>Gas</th>
 <?php
    $query = "SELECT * FROM `arduino1` ORDER BY `id1` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id1'];


      ?>
      <tr style="color:white;">
        <!-- <td><?php echo $result['id1'];?></td> -->
        <td><?php echo $result['fire1'];?></td>
        <td><?php echo $result['gsm1'];?></td>


      </tr>
     
    <?php

     }}?>
     
     
     
     <!--SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
     
      <?php
    $query = "SELECT * FROM `arduino` ORDER BY `id` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id'];


     
    $lightson=$result['fire'];
    $lightid=$result['id'];
    $gas=$result['gsm'];
 if($lightson ==0 && $gas >=401){
         echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182891607-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo '<script>window.location.replace("dashboard.php");</script>';
    }
    elseif ($gas >= 401) {
           echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182787103-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo '<script>window.location.replace("dashboard.php");</script>';
    }
     elseif($lightson== "0") {
          echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641052840360-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
    echo '<script>window.location.replace("dashboard.php");</script>';
    }
    else {
         echo"<h3 align='center' style=' display:none;background:linear-gradient(90deg,black,green,black);'>Room 2</h3>";
      echo" <img src='./assets/offsiren.png' style=' display:none;width:300px; '>";
      
    }

     }}?>
     
     <!--SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
     
     
      <?php
    $query = "SELECT * FROM `arduino2` ORDER BY `id2` DESC LIMIT 1";
    $results = mysqli_query($link,$query);
    if (mysqli_num_rows($results)>=1) {
    while($result = mysqli_fetch_array($results)){
      $id = $result['id2'];


     
    $lightson=$result['fire2'];
    $lightid=$result['id2'];
    $gas=$result['gsm2'];
 if($lightson ==0 && $gas >=401){
         echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182891607-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo '<script>window.location.replace("dashboard.php");</script>';
    }
    elseif ($gas >= 401) {
           echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641182787103-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
         echo '<script>window.location.replace("dashboard.php");</script>';
    }
     elseif($lightson== "0") {
          echo" <audio controls autoplay style='display:none;'>
         <source src='./assets/1641052840360-voicemaker.in-speech.mp3'  type='audio/mp3'>
        </audio>";
         echo" <audio controls autoplay style='display:none;'>

         <source src='./assets/mixkit-battleship-alarm-1001.wav'  type='audio/mp3'>

        </audio>";
    echo '<script>window.location.replace("dashboard.php");</script>';
    }
    else {
         echo"<h3 align='center' style=' display:none;background:linear-gradient(90deg,black,green,black);'>Room 2</h3>";
      echo" <img src='./assets/offsiren.png' style=' display:none;width:300px; '>";
      
    }

     }}?>
</th>
        </tr >
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
