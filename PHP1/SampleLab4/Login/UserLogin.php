<?php error_reporting(E_ALL); ?>
<?php 
	session_start(); 	// start PHP session! 

	extract($_GET);

	$nameErrorMsg = '';
	$pinErrorMsg = '';

	if(isset($btnLogin))
	{
		if(!trim($txtName))
		{
			$nameErrorMsg = "Name field can not be blank!";
			$pinErrorMsg ="";
		}
		else if(!trim($txtPIN))
		{
			$nameErrorMsg = "";
			$pinErrorMsg = "PIN field can not be blank!";
		}
		else if ($txtName != "Wei Gong")
		{
			$nameErrorMsg = "Un-recoganized name!";
			$pinErrorMsg ="";
		}
		else if ($txtPIN != "1234")
		{
			$nameErrorMsg = "";
			$pinErrorMsg = "Incorrect PIN!";
		}
		else
		{
			$_SESSION["name"] = $txtName;
			header("Location: WelcomeBack.php");
			exit( );
		}

	}

	if(isset($txtName))
	{
		$name  = $txtName;
	}
	else
	{
		$name = '';
	}
	
print <<<EOS
<html>
<head>
	<title>User Login</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>
<body>
	<h2>To Start, Please Login</h2>
	<form action='UserLogin.php' method='get'>
		<table>
			<tr>
				<th>Name:</th>
				<td><input type='text' class='input' name='txtName' size='30' value='$name' />
				</td><td class='error'>$nameErrorMsg</td>
			</tr>
			<tr>
				<th>PIN:</th>
				<td><input type='password' class='input' name='txtPIN' size='30' /></td>
				</td><td class='error'>$pinErrorMsg</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type='submit' class='button' name='btnLogin' value='Login' />&nbsp;&nbsp;
					<input type='reset' class='button' name='btnReset' value='Clear' />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
EOS;
?>