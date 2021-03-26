<?php error_reporting(E_ALL); ?>
<?php 
	session_start(); 	// start PHP session! 
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');

	if (!isset($_SESSION["name"]))
	{
		header("Location: UserLogin.php");
		exit( );
	}
?> 
<html>
<head>
	<title>Welcome Back</title>
</head>
<body>
	<h3>Welcome Back <?php echo $_SESSION["name"]?>!</h3>
	
	<p>To logout, click <a href="Logout.php">here</a></p>
	
</body>
</html>