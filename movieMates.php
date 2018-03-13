<!-- 
Author:     Jonathan Herron
File Name:  movieMates.php
Purpose:    Sets start screen for website. Includes logged in
            and logged out versions.
-->
     
<?php  session_start(); ?>
     
<!DOCTYPE html>
<html>
<head>
<title>Movie Mates</title>
<meta charset="utf-8" />
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
        echo "<div id=\"buttons\" class=\"buttons\">";
        echo "<button class=\"button\" onclick=\"window.location='movieMates.php';\">Home</button>&nbsp;&nbsp;&nbsp;";
        echo "<button class=\"button\" onclick=\"window.location='myMatches.php';\">My Matches</button>&nbsp;&nbsp;&nbsp;";
        echo "<button class=\"button\" onclick=\"window.location='allUsers.php';\">All Users</button>&nbsp;&nbsp;&nbsp;";
        echo "<button class=\"button\" onclick=\"window.location='myProfile.php';\">My Profile</button>&nbsp;&nbsp;&nbsp;";
        echo "<button class=\"button\" onclick=\"window.location='logout.php';\">Log Out</button>&nbsp;&nbsp;&nbsp;";
        echo "<br><br>";
        echo "</div>";
    }
	?>
	<div id="containerTwo" class="containerTwo">
    	<br>
    	<div class="testimonial">
    		<img src="images/ramsay.jpg" alt="Ramsay" width="50%" style="float: left; margin-top: auto; margin-bottom: auto; margin-right: 25px;">
    		<p style="margin: 5px"> "I found my soulmate on MovieMates. It is the <b>only</b> way to find someone that you have anything in common with!" <br><br> <i>-Gordan Ramsay</i>
    	</div>
    	<div class="testimonial">
    		<img src="images/whoopi.jpg" alt="Whoopi" width="50%" style="float: left; margin-top: auto; margin-bottom: auto; margin-right: 25px;">
    		<p style="margin: 25px"> "This is an amzing site to find great people on. I wouldn't recommend any other site." <br><br> <i>-Whoopi Goldberg</i>
    	</div>
    	<div class="testimonial">
    		<img src="images/hefner.jpg" alt="Hefner" width="50%" style="float: left; margin-top: auto; margin-bottom: auto; margin-right: 25px;">
    		<p style="margin: 25px"> "I've used this site many times, and i've always found amazing mates!!!" <br><br> <i>-Hugh Hefner</i>
    	</div>
    	<br>
	</div>
	<br><br><br>
</div>
</body>
</html>