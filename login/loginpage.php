<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href=".css/style2.css">
    <!---we had linked our css file----->
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
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
              <header class="th">
                <h1 class="name">Smart Fire Alarm System</h1>
              </header>
            </div>

            <div  id="about" onclick="myFunction()"style="display:none; background:black;position:absolute;top:12.5%; left:35%;color: white;width:68vh; height:80vh;padding:30px 40px;">
          <h1>About Us</h1>
              <p>content</p>
            </div>
            <div  id="contact" onclick="myFunction1()"style="display:none; background:black;position:absolute;top:12.5%; left:35%;color: white;width:68vh; height:80vh;padding:30px 40px;">
          <h1>Contact</h1>
              <p>content</p>
            </div>


            <nav>
                <ul id='MenuItems'>
                    <li><a href='#' >About Us</a></li>
                    <li><a href='#' >Contact</a></li>

                </ul>
            </nav>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box" id="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <button type='button'onclick='login()'class='toggle-btn'>User</button>
                    <button type='button'onclick='register()'class='toggle-btn'>Admin</button>
                </div>
                <form id='login' class='input-group-login' method="post" action="./connect/login.php" autocomplete="off" >
                  <img src="./ezgif.com-gif-maker.gif" width="70" class="pic">

                    <input type='text'class='input-field'placeholder='Enter Username' required >
		    <input type='password'class='input-field'placeholder='Enter Password'id="myInput" required>
		    <input type='checkbox'class='check-box' onclick="myFunctionpass()"><span>Show Password</span>
		    <button type='submit'class='submit-btn'>Log in</button>
		 </form>

		 <form id='register' class='input-group-register' method="post" action="./connect/login2.php" autocomplete="off" >
        <img src="./ezgif.com-gif-maker (1).gif" width="70" class="pic">
		     <input type='password'class='input-field'placeholder='Enter Username' required>
		     <input type='password'class='input-field'placeholder='Enter Password' id="myInput1" required>
		     <input type='checkbox'class='check-box' onclick="myFunctionpass1()"><span>Show Password</span>
                    <button type='submit'class='submit-btn'>Log in</button>
	         </form>
            </div>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event)
        {
            if (event.target == modal)
            {
                modal.style.display = "none";
            }
        }
    </script>


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
    function myFunctionpass1() {
    var x = document.getElementById("myInput1");
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
    var log= document.getElementById("form-box");
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
    var log =document.getElementById("form-box");
    var y =document.getElementById("about");
    if (x.style.display === "none") {
      x.style.display = "block";
      log.style.display="none";
      y.style.display="none";
    } else {
      x.style.display = "none";
      log.style.display="block";
        y.style.display="none";
    }
    </script>

</body>
</html>
