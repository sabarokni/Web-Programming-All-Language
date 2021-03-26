<?php 
    include_once 'Functions.php';
    include_once 'EntityClassLib.php'; 
    session_start();

    extract($_POST);
    $loginErrorMsg = '';
    
    $password = $txtPswd;
    //$password = hash("sha256", $txtPswd);
    
    if(isset($btnLogin))
    {
        try {
            $user = getUserByIdAndPassword($txtId, $password);
        }
        catch (Exception $e)
        {
            die("The system is currently not available, try again later");
        }
        if ($user == null)
        {
            $loginErrorMsg = 'Incorrect User ID and Password Combination!';
        }
        else
        {
            $_SESSION['user'] = $user; 
            header("Location: Welcome.php");
            exit();
        }

    }
?>
<h1>Login</h1>

<p>If you are new, you need to <a href='Registration.php'>register</a></p>

<form action='Login.php' method='post'>
	<table>
		<tr><td colspan='2' style='color:Red'><?php echo $loginErrorMsg;?></td></tr>
		<tr>
			<th>Student ID:</th>
			<td><input type='text' name='txtId' size='30' value="<?php print(isset($txtId)?$txtId:'');?>"/>
			
		</tr>
                <tr><td>&nbsp;</td></tr>
		<tr>
			<th>Password:</th>
			<td><input type='password' name='txtPswd' size='30' /></td>
			
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type='submit' name='btnLogin' value='Login' />&nbsp;&nbsp;
				<input type='submit' value='Clear' />
			</td>
		</tr>
	</table>
</form>

