<?php
    include_once "Functions.php";
    include_once "EntityClassLib.php"; 	
    session_start();
    
    extract($_POST);
    $password = $txtPassword;
    //$password = hash("sha256", $txtPassword);
    
    if(isset($regSubmit))
    {
        
        try {
            addNewUser($txtId, $txtName, null, $password);
            header("Location: Login.php");
            exit();
        }
        catch (Exception $e)
        {
            die("The system is currently not available, try again later");
        }
        
    }
?>
<html>
<head>
	<title>Algonquin College Online Course Registration</title>
	<link rel="stylesheet" type="text/css" href="RegisterUser.css" />
</head>
<body>
    <h1>Register User</h1>
    <p>To start, please enter the required registration data </p>
    <form action="Registration.php" method="post">
    <table>
        <tr>
            <th>Student ID:</th>
            <td><input type="text" name="txtId" value="<?php echo isset($txtId)? $txtId : ''; ?>"/></td>
        </tr>
        <tr>
            <td colspan='2'>&nbsp;</td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="txtName" value="<?php echo isset($txtName)? $txtName : ''; ?>"/></td>
        </tr>
        <tr>
            <td colspan='2'>&nbsp;</td>
        </tr>
        <tr>
            <th>Create Password:</th>
            <td>
                    <input type="password" name="txtPassword" value="" />
            </td>
            <td >&nbsp;</td>	
        </tr>
        <tr>
            <td colspan='2'>&nbsp;</td>
        </tr>
        <tr>
            <td style='text-align: center'>
                <input type="submit" name='regSubmit' value="Registration" class="button"/>
            </td>
        </tr>
    </table>
    </form>