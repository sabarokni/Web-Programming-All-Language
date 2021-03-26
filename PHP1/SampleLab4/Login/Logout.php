<?php error_reporting(E_ALL); ?>
<?php 
	session_start(); 	// retrieve PHP session! 
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
	<title>Logout</title>
</head>
<body>
	<h3><?php echo $_SESSION["name"]?>, please come back soon.</h3>
	
	<?php session_destroy();?>
</body>
</html>