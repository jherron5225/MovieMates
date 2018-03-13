<!-- 
Author:     Jonathan Herron
File Name:  login.php
Purpose:    The login page.
-->
<?php  session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Page</title>
<link href="styles.css" type="text/css" rel="stylesheet" /> 
</head>
<body>
	<div class="container">
		<div class="topBanner">
			<img src="images/bannerTitle.png" alt="Movie Mates">
		</div>
		<?php  
    	if (!isset($_SESSION['user'])) { 
    	   echo "<div id=\"buttons\" class=\"buttons\">";
    	   echo "<button class=\"button\" onclick=\"window.location='movieMates.php';\">Home</button>&nbsp;&nbsp;&nbsp;";
    	   echo "<button class=\"button\" onclick=\"window.location='register.php';\">Register</button>&nbsp;&nbsp;&nbsp;";
    	   echo "<button class=\"button\" onclick=\"window.location='login.php';\">Login</button>&nbsp;&nbsp;&nbsp;";
    	   echo "<br><br>";
           echo "</div>";
    	}
        else {
            header("Location: movieMates.php");
        }
	   ?>
		<div id="form" class="containerTwo">
    		<br><h2 class="header">LOGIN</h2>
    		<form class="form" id="loginform" onsubmit="login(event); return false;">
    			<table>
    			<tr><td>User Name: </td><td><input type="text" id="username" name="username" required></td></tr>
        		<tr><td>Password: </td><td><input type="password" id="password" name="password" required></td></tr>
        		</table>
        	<br><input type="submit" value="Login" class="button"></form>
    		<br><br>
    		<div id="toChange"></div>
		</div>
	</div>
	<br><br><br>
	
	<script>
  	function login(event) {
  		event.preventDefault();
  	  	var un = document.getElementById("username").value;
  	  	var pw = document.getElementById("password").value;
  	  	var anObj = new XMLHttpRequest();
  	    anObj.open("GET", "controller.php?login&un="+un+"&pw="+pw, true);
 		anObj.send();
  	  	anObj.onreadystatechange = function () {
      		if (anObj.readyState == 4 && anObj.status == 200) {               
      			var response = anObj.responseText;
      			//alert(response);
      			var divToChange = document.getElementById("toChange");
      			divToChange.innerHTML = response;
      			if (response.includes("logged")) {
      				divToChange.innerHTML += "<h2 class=\"header\">You will be redirected to Your Profile</h2><br>"; 
      	  			setTimeout('RedirectSuccess()', 2000);  
      			}
      			else {
      				divToChange.innerHTML += "<h2 class=\"header\">You will be redirected to the registration page</h2><br>"; 
      				setTimeout('RedirectFail()', 2000);   
      			}
  	  	  	}
  		}
  	}

  	function RedirectFail(){  
  		window.location="register.php"; 
  	}
  	
  	function RedirectSuccess(){  
  		window.location="movieMates.php"; 
  	} 
  	</script>
</body>