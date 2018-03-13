<!-- 
Author:     Jonathan Herron
File Name:  logout.php
Purpose:    The logout page. Destroys session and redirects to home.
-->
<?php
session_start();

echo "<h2 class=\"header\">Logout Successfully</h2>";
session_destroy();
header("Location: movieMates.php");
?>