<!-- 
Author:     Jonathan Herron
File Name:  myProfile.php
Purpose:    Displays personal data.
-->
<?php  session_start(); ?>
     
<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>
<meta charset="utf-8" />
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body onload="showProfile()">
<div class="container">
	<div class="topBanner">
		<img src="images/bannerTitle.png" alt="Movie Mates">
	</div>
	<?php  
	if (!isset($_SESSION['user'])) { 
	    header("Location: login.php");
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
		<div id="toChange" class="self"></div>
		<br>
	</div>
	<br><br><br>
	
	<script>
	function showProfile() {
		var username = "";
		var usrObj = new XMLHttpRequest();
  	    usrObj.open("GET", "controller.php?getUN", true);
 		usrObj.send();
  	  	usrObj.onreadystatechange = function () {
      		if (usrObj.readyState == 4 && usrObj.status == 200) {  
          		username = usrObj.responseText;  
          		actOnResponse(username); 
      		}
  	  	}
	}

	function actOnResponse(username) {
		var formattedUN = username.replace(/\s+/, ""); 
		var anObj = new XMLHttpRequest();
  	    anObj.open("GET", "controller.php?getData", true);
 		anObj.send();
  	  	anObj.onreadystatechange = function () {
      		if (anObj.readyState == 4 && anObj.status == 200) {             
      			var dataArray = JSON.parse(anObj.responseText);
      			displayData(dataArray, formattedUN);
			}
		}
	}

	function displayData(dataArray, username) {
		var divToChange = document.getElementById("toChange");
		var i = 0;
		var str = "";
		var myGenre = "";
  		for (i = 0; i < dataArray.length; i++) {
      		if (dataArray[i]['username'] == username) {
      			str += "<img src='" + dataArray[i]['image'] + "'height='230' width='230' style='margin: auto; margin-right: 25px; float: left;'>"+"<h1>" + dataArray[i]['firstname'] + " " + dataArray[i]['lastname'] + "<h1><hr><h3>User Name: " + dataArray[i]['username'] + "</h3>";
				str += "<h4>Email: " + dataArray[i]['email'] + "<br></h4>";
				str += "<h4>Phone Number: " + dataArray[i]['phonenumber'] + "<br></h4>";
				str += "<h4>Location: " + dataArray[i]['state'] + ", " + dataArray[i]['city'] + "<br></h4>";
				str += 	"<fieldset><legend>About Me</legend>" + dataArray[i]['description'] + "</fieldset>";
        		}
  		}
  		str += "<br><br>";
		document.getElementById("toChange").innerHTML=str;
	}
	</script>
</div>