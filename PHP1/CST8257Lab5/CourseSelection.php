<?php 
// start session
session_start();

//Header
include("./Lab5Commons/Header.php"); 
 

 // Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["user"])&& empty($_SESSION["user"])){
    header("location: LogIn.php");
    exit();
}else
{
    echo '<h1 class="container"><b> Course Selection Page </b></h1>';
}
//Footer
 include('./Lab5Commons/Footer.php'); 
 ?>
