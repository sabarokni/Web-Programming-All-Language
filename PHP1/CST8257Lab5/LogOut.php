<?php

/*
 * Page : Logout
 */
// start session
session_start();
// remove all session variables
session_unset();
// destroy the session 
session_destroy();
// Redirect to index.php page
header("Location: Index.php");
?>