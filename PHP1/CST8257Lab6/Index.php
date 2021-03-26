<?php
session_start();

include("./Lab5Commons/Header.php");


if((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    echo '<h1 class="container"><b>Welcome to Algonquin College Online Course Registration</b></h1>';
    echo '<p class="container">If you want terminate your registration, you can <a href="LogOut.php">Log Out</a> now.</p>';
}else
{
echo '<h1 class="container"><b>Welcome to Algonquin College Online Course Registration</b></h1>';
echo '<p class="container">If you never used this before, you have to <a href="NewUser.php">Sign up</a>.</br>
        If you have already signed up, you can <a href="LogIn.php">Log In</a> now.</p>';
}

include('./Lab5Commons/Footer.php'); 

?>