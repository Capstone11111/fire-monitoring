<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/style1.css">
    
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
      window.location.href ="loginpage.php";
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
  </head>
  <body >
//     <?php
//     if(isset($_SESSION[`username`]))
// { header("location:dashboard.php");
// }
//     ?>
    <header class="th">
      <h1 class="name">Smart Fire Alarm System</h1>
    </header>

    <div class="full-page">
      <div class="navbar">
          <nav>
              <ul id='MenuItems'>
                <li>
            <a href="#"onclick="myFunction()">About Us</a>
                </li>
                <li>
            <a href="#"onclick="myFunction1()">Contact</a>
                </li>
                  <li>
<a href="admin.php">Admin</a>
                  </li>
                  <!-- <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li> -->
              </ul>
          </nav>
      </div>
    </div>

    <div  id="about" onclick="myFunction()"style="display:none; background:black;position:absolute;top:12.5%; left:35%;color: white;width:68vh; height:80vh;padding:30px 40px;">
  <h1>About Us</h1>
      <p>content</p>
    </div>
    <div  id="contact" onclick="myFunction1()"style="display:none; background: black;position:absolute;top:12.5%; left:35%;color: white;width:68vh; height:80vh;padding:30px 40px;
    #box{
    display:none;
    }
    
    ">
  <h1>Contact</h1>
      <p>content</p>
    </div>
<!-- main page -->


<div id="log" >


    <form class="box" method="post" action="./connect/login.php" autocomplete="off" style="display:block;">
      <img src="./assets/ezgif.com-gif-maker.gif" width="120" class="pic">
      <h1>
        Login
      </h1>
      <input type="text" placeholder="Enter Username" name="username" required>
        <input type="password"  placeholder="Enter Password" name="password" id="myInput"required>
        <input type="checkbox" onclick="myFunctionpass()"><span>Show password</span>
          <input type="submit" value="Log in" name="btn">
    </form>
</div>







<script type="text/javascript">
function myFunctionpass() {
var x = document.getElementById("myInput");
if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}
}
</script>

<script type="text/javascript">
function myFunction() {
var x = document.getElementById("about");
var log= document.getElementById("log");
var y= document.getElementById("contact");
if (x.style.display === "none") {
  x.style.display = "block";
  log.style.display="none";
  y.style.display="none";
} else {
  x.style.display = "none";
  log.style.display="block";
    y.style.display="none";

}
}
</script>

<script type="text/javascript">
function myFunction1() {
var x = document.getElementById("contact");
var log =document.getElementById("log");

var y =document.getElementById("about");
if (x.style.display === "none") {
  x.style.display = "block";
  log.style.display="none";
  log.style.display="none";
} else {
  x.style.display = "none";
  log.style.display="block";
    y.style.display="none";
}
}

</script>
  </body>
</html>
