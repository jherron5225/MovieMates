<!-- 
Author:     Jonathan Herron
File Name:  myMatches.php
Purpose:    Displays matched users.
-->
<?php  session_start(); ?>
     
<!DOCTYPE html>
<html>
<head>
<title>My Matches</title>
<meta charset="utf-8" />
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body onload="showMatches()">
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
		<div id="toChange"></div>
	</div>
	<br><br><br>
	
	<script>
	function showMatches() {
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
		//alert(formattedUN);
		//alert(typeof(formattedUN));
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
		//alert(JSON.stringify(dataArray));
		var divToChange = document.getElementById("toChange");
		var i = 0;
		var count = 0;
		var str = "<br>";
		var myGenre = "";
		for (i = 0; i < dataArray.length; i++) {
			//alert(typeof(dataArray[i]['username']));
			//alert(dataArray[i]['username']);
  			if (dataArray[i]['username'] == username) {
  	  			//alert("here");
  	  			myGenre = dataArray[i]['genre'];
  	  			//alert(myGenre);
  	  			break;
  	  		}
		}
  		for (i = 0; i < dataArray.length; i++) {
  	  		//alert(dataArray[i]['genre']);
      		if (dataArray[i]['genre'] == myGenre) {
          		if(dataArray[i]['username'] == username){
              		continue;
          		}
          		count++;
      			str +=  "<div class='user'><img src='" + dataArray[i]['image'] + "' height='200px' width='200px' style='float: left; margin-top: auto; margin-bottom: auto; margin-right: 25px;'>" + dataArray[i]['firstname'] + " " + dataArray[i]['lastname'] + "<hr>";
      			str += "Username: "+ dataArray[i]['username'];
      			str += "<br>E-mail: "+ dataArray[i]['email'];
      			str += "<br>Phone-Number: "+ dataArray[i]['phonenumber'];
      			str += "<br>Location: "+ dataArray[i]['city']+", " + dataArray[i]['state'];
      			str += "<br>Genre: "+ dataArray[i]['genre'];
      			str += "<br>Description: "+ dataArray[i]['description'];
				str += "</div>";
        	}
  		}
  		if(count == 0){
  	  		str = "<br><h2 class=\"header\">No Users Found</h2>";
  		}
  		//alert(str);
  		str += "<br>";
		document.getElementById("toChange").innerHTML=str;
	}
	</script>
</div>