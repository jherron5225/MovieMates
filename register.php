<!-- 
Author:     Jonathan Herron
File Name:  register.php
Purpose:    Registration page.
-->
<?php  session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registration Page</title>
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
			<br><h2 class="header">REGISTER</h2>
			<form class="form" id="registerform" onsubmit="register(event); return false;">
				<table>
				<tr><td>User Name: </td><td><input type="text" id="username" name="username" required></td></tr>
	    		<tr><td>Password: </td><td><input type="password" id="password" name="password" required></td></tr>
		    	<tr><td>First name: </td><td><input type="text" id="firstname" name="firstname" required></td></tr>
		    	<tr><td>Last name: </td><td><input type="text" id="lastname" name="lastname" required></td></tr>
		    	<tr><td>E-Mail: </td><td><input type="text" id="email" name="email" required></td></tr>
		    	<tr><td>Phone Number: </td><td><input type="text" id="phonenumber" name="phonenumber"></td></tr>
				<tr><td>City: </td><td><input type="text" id="city" required></td></tr>
				<tr><td>State: </td><td><select id="state" required>
					<option value="AL">Alabama</option>
        			<option value="AK">Alaska</option>
        			<option value="AZ" selected>Arizona</option>
        			<option value="AR">Arkansas</option>
        			<option value="CA">California</option>
        			<option value="CO">Colorado</option>
        			<option value="CT">Connecticut</option>
        			<option value="DE">Delaware</option>
        			<option value="DC">District of Colombia</option>
        			<option value="FL">Florida</option>
        			<option value="GA">Georgia</option>
        			<option value="HI">Hawaii</option>
        			<option value="ID">Idaho</option>
        			<option value="IL">Illinois</option>
        			<option value="IN">Indiana</option>
        			<option value="IA">Iowa</option>
        			<option value="KS">Kansas</option>
        			<option value="KY">Kentucky</option>
        			<option value="LA">Louisiana</option>
        			<option value="ME">Maine</option>
        			<option value="MD">Maryland</option>
        			<option value="MA">Massachusetts</option>
        			<option value="MI">Michigan</option>
        			<option value="MN">Minnesota</option>
        			<option value="MS">Mississippi</option>
        			<option value="MO">Missouri</option>
        			<option value="MT">Montana</option>
        			<option value="NE">Nebraska</option>
        			<option value="NV">Nevada</option>
        			<option value="NH">New Hampshire</option>
        			<option value="NJ">New Jersey</option>
        			<option value="NM">New Mexico</option>
        			<option value="NY">New York</option>
        			<option value="NC">North Carolina</option>
        			<option value="ND">North Dakota</option>
        			<option value="OH">Ohio</option>
        			<option value="OK">Oklahoma</option>
        			<option value="OR">Oregon</option>
        			<option value="PA">Pennsylvania</option>
        			<option value="RI">Rhode Island</option>
        			<option value="SC">South Carolina</option>
        			<option value="SD">South Dakota</option>
        			<option value="TN">Tennessee</option>
        			<option value="TX">Texas</option>
        			<option value="UT">Utah</option>
        			<option value="VT">Vermont</option>
        			<option value="VA">Virginia</option>
        			<option value="WA">Washington</option>
        			<option value="WV">West Virginia</option>
        			<option value="WI">Wisconsin</option>
        			<option value="WY">Wyoming</option>
				</select></td></tr>
				<tr><td>Favorite Genre: </td><td><select id="genre" required>
        			<option value="Action" selected>Action</option>
        			<option value="Horror">Horror</option>
        			<option value="Romance" selected>Romance</option>
        			<option value="Comedy">Comedy</option>
        			<option value="Sci-Fi">Sci-Fi</option>
        		</select></td></tr>
        		<tr><td>User image: </td><td>
        			<fieldset>
    				<label>
    					<img src="images/prof1.gif" alt="Profile 1" height="60" width="60"/>
    					<input type="radio" name="profile" id="prof1" value="1"/>
					</label>
					&emsp;
					<label>
    					<img src="images/prof2.jpg" alt="Profile 2" height="60" width="60"/>
    					<input type="radio" name="profile" id="prof2" value="2"/>
					</label>
					&emsp;
					<label>
    					<img src="images/prof3.jpg" alt="Profile 3" height="60" width="60"/>
    					<input type="radio" name="profile" id="prof3" value="3"/>
					</label>
					&emsp;
					<br>
					&nbsp;
					<label>
    					<img src="images/prof4.jpg" alt="Profile 4" height="60" width="60"/>
    					<input type="radio" name="profile" id="prof4" value="4"/>
					</label>
					&emsp;
					<label>
    					<img src="images/prof5.jpg" alt="Profile 5" height="60" width="60"/>
    					<input type="radio" name="profile" id="prof5" value="5"/>
					</label>
					&emsp;
					<label>
    					<img src="images/prof6.jpg" alt="Profile 6" height="60" width="60"/>
    					<input type="radio" name="profile" id="prof6" value="6"/>
					</label>
					&emsp;&nbsp;
					</fieldset>
				</td></tr>
            	<tr><td>Describe Yourself: </td><td><textarea id="description" rows="5" cols="54" required></textarea></td></tr>
		    	</table>
		    	<br><input type="submit" value="Register" class="button"></form>
		    	<br><br>
		    	<div id="toChange"></div>
		</div>
		<br><br><br>
	</div>
  	
  	<script>
  	function register(event) {
  		event.preventDefault();
  	  	var un = document.getElementById("username").value;
  	  	var pw = document.getElementById("password").value;
  	  	var fn = document.getElementById("firstname").value;
		var ln = document.getElementById("lastname").value;
		var em = document.getElementById("email").value;
		var pn = document.getElementById("phonenumber").value;
		var c = document.getElementById("city").value;
		var s = document.getElementById("state").value;
		var g = document.getElementById("genre").value;
		var img = "";
		var prof1 = document.getElementById("prof1");
		if (prof1.checked) {
			img = "images/prof1.gif";
		}
		var prof2 = document.getElementById("prof2");
		if (prof2.checked) {
			img = "images/prof2.jpg";
		}
		var prof3 = document.getElementById("prof3");
		if (prof3.checked) {
			img = "images/prof3.jpg";
		}
		var prof4 = document.getElementById("prof4");
		if (prof4.checked) {
			img = "images/prof4.jpg";
		}
		var prof5 = document.getElementById("prof5");
		if (prof5.checked) {
			img = "images/prof5.jpg";
		}
		var prof6 = document.getElementById("prof6");
		if (prof6.checked) {
			img = "images/prof6.jpg";
		}
		var desc = document.getElementById("description").value;
  	  	var anObj = new XMLHttpRequest();
  	    anObj.open("GET", "controller.php?register&un="+un+"&pw="+pw+"&fn="+fn+"&ln="+ln+"&em="+em+"&pn="+pn+"&c="+c+"&s="+s+"&g="+g+"&img="+img+"&desc="+desc, true);
 		anObj.send();
  	  	anObj.onreadystatechange = function () {
      		if (anObj.readyState == 4 && anObj.status == 200) {             
      			var response = anObj.responseText;
      			var divToChange = document.getElementById("toChange");
      			if (response.includes("exists")) {
      				divToChange.innerHTML += response; 
      	  			setTimeout('RedirectFail()', 2000);  
      			}
      			else {
      				divToChange.innerHTML += response + "<h2 class=\"header\">You will be redirected to the login page</h2><br>"; 
      				setTimeout('RedirectSuccess()', 2000);   
      			}
      		}	
      	}
  	}

  	function RedirectFail(){  
  		window.location="register.php"; 
  	}
  	
  	function RedirectSuccess(){  
  		window.location="login.php"; 
  	} 
  	</script>
</body>

