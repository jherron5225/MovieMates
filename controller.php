<!-- 
Author:     Jonathan Herron
File Name:  controller.php
Purpose:    Controls all data being communicated between
            the database and PHP files.
-->
<?php  session_start(); ?>

<?php
include 'DataBaseAdaptor.php';

if (isset($_GET['register'])) {
    $un = htmlspecialchars($_GET['un']);
    $pw = htmlspecialchars($_GET['pw']);
    $fn = htmlspecialchars($_GET['fn']);
    $ln = htmlspecialchars($_GET['ln']);
    $em = htmlspecialchars($_GET['em']);
    $pn = htmlspecialchars($_GET['pn']);
    $c = htmlspecialchars($_GET['c']);
    $s = htmlspecialchars($_GET['s']);
    $g = htmlspecialchars($_GET['g']);
    $img = htmlspecialchars($_GET['img']);
    $desc = htmlspecialchars($_GET['desc']);
    $exists = $theDBA->checkUsers($un);
    if ($exists == "true") {
        echo "<h2 class=\"header\">Account name already exists</h2>";
    }
    else {
        $theDBA->register($un, $pw, $fn, $ln, $em, $pn, $c, $s, $g, $img, $desc);
        echo "<h2 class=\"header\">Your account is registered!</h2>";
    }
}

if (isset($_GET['login'])) {
    $un = htmlspecialchars($_GET['un']);
    $pw = htmlspecialchars($_GET['pw']);
    $exists = $theDBA->checkLogin($un, $pw);
    if ($exists === "true") {
        echo "<h2 class=\"header\">You are logged in!</h2>";
        $_SESSION['user'] = $un;
    }
    else {
        echo "<h2 class=\"header\">You are not registered!</h2>";
    }
}

if (isset($_GET['getUN'])) {
    echo $_SESSION['user'];
}

if (isset($_GET['getData'])) {
    $arr = $theDBA->getData();
    echo json_encode ( $arr );
}

?>