<?php
    include_once 'Functions.php';
    include_once 'EntityClassLib.php'; 
    session_start();

    if (!isset($_SESSION['user']))
    {
        header("Location: Login.php");
        exit();
    }
    $user = $_SESSION['user'];
    print("<h1>Welcome ".$user->getName()." !</h1>");
    Print("<h3>these are available courses.</h3>");
    $courses = getAllCourses();
    foreach($courses as $course)
    {
        print("$course <br/>" );
    } 

?>

