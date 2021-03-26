<?php include("./Lab5Commons/Header.php"); ?>	
<?php
 
// start session
session_start();
 // Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["user"])&& empty($_SESSION["user"])){
    header("location: LogIn.php");
    exit();
}else
{
    echo '<h1 class="container"><b> Current Registration Page </b></h1>';
}
?>
<?php include('./Lab5Commons/Footer.php'); ?>
