<?php 
//session_start();

include("./Lab5Commons/Header.php");

include_once "Functions.php";
include_once "EntityClassLib.php";

extract($_POST);
$msg2_ID =$msg2_confirmpass =$msg2_pass=$msg2_phonenumber ="";
$msg_ID =$msg_confirmpass =$msg_name =$msg_pass =$msg_phonenumber = "";
//Processing Clear page and reload again
if (isset($_POST['clear'])) {
    
    header("Location:NewUser.php");
}
if(isset($_POST['regSubmit'])){
 
//Validate username
    if (empty(trim($_POST["txtId"]))) {
        $msg_ID = "You must supply your Student ID";
    } else {
        //Check student signed up or not
        $result = checkUserId($txtId);
        if ($result != null) {
            $msg2_ID = "A Student with this ID already signed up.";
        }else
        {
           $id=trim($_POST["txtId"]);
        }
    }
//checking name--null show message
    if (empty($_POST['txtName'])) {
        $msg_name = "You must supply your name";
    }
    $name= trim($_POST['txtName']);

//vlidate Phone number
    if (empty($_POST['phone_number'])) {
        $msg_phonenumber = "You must Enter  Your Phone Number.";
    }
    $phonenumber_subject = $_POST['phone_number'];
    $phonenumber_pattern = "/^[1-9]{1}+[0-9]{2}-[2-9]{3}-[0-9]{4}$/";
    preg_match($phonenumber_pattern, $phonenumber_subject, $phonenumber_matches);
    if (!$phonenumber_matches[0]) {
        $msg2_phonenumber = "must be in the form of nnn-nnn-nnnn .";
    }

//validate Password 
    if (empty($_POST['txtPassword'])) {
        $msg_pass = "You must Enter Password.";
    }
    $password_subject = $_POST['txtPassword'];
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/";
    preg_match($password_pattern, $password_subject, $password_matches);
    if (!$password_matches[0]) {
        $msg2_pass = "must be at least 6 characters long, contains at least one upper case, one lowercase and one digit.";
    }
    
    
//validate  confirm password
    if (empty($_POST['confirmPassword'])) {
        $msg_confirmpass = "You must Enter Password Again.";
    }
    else if ($_POST['confirmPassword'] != $password_subject) {
        $msg2_confirmpass = "It does not match with password";
    }
    
    
    if ($msg2_ID == "" && $msg2_confirmpass == "" && $msg2_pass == "" && $msg2_phonenumber == "" && $msg_ID == "" && $msg_confirmpass == "" && $msg_name == "" && $msg_pass == "" && $msg_phonenumber == "") {
        try {
            $password_encrypted = password_hash($password_subject, PASSWORD_BCRYPT);
            addNewUser($id, $name, $phone_number, $password_encrypted);
            
            header("Location: CourseSelection.php");
            exit();
        } catch (Exception $e) {
            die("The system is currently not available, try again later");
        }
    }
}
?>
<html>
    <head>
        <title>Algonquin College Online Course Registration</title>
        <link rel="stylesheet" type="text/css" href="RegisterUser.css" />
    </head>
    <body>
        <div class="container">
            <fieldset>
                <div class="card-header">
                    <h1 class="text-center">Sign up</h1>
                    <p>All fields are required </p>
                </div> 
                <hr>
                <form id="registration_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="row">
                        <div class="col-2"> 
                            <label class="lbl-format">Student ID <span class="error">*</span>:</label>
                            <input type="text" name="txtId" value="<?php echo $_POST['txtId']; ?>"/><br>                        
<?php echo "<p class='error'>" . $msg_ID . "</p>"; ?>
<?php echo "<p class='error'>" . $msg2_ID . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"> 
                            <label class="lbl-format">Name <span class="error">*</span>:</label>                 
                            <input type="text" name="txtName" value="<?php echo $_POST['txtName']; ?>"/><br>
<?php echo "<p class='error'>" . $msg_name . "</p>"; ?>
<?php echo "<p class='error'>" . $msg2_name . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label class="lbl-format">Phone Number <span class="error">*</span>:</label>                      
                            <input type="text"  name="phone_number" placeholder="nnn-nnn-nnnn" value="<?php echo $_POST['phone_number']; ?>">
<?php echo "<p class='error'>" . $msg_phonenumber . "</p>"; ?>
<?php echo "<p class='error'>" . $msg2_phonenumber . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label class="lbl-format">Password <span class="error">*</span>:</label>                      
                            <input type="password" name="txtPassword" value="<?php echo $_POST['txtPassword']; ?>" />                  
<?php echo "<p class='error'>" . $msg_pass . "</p>"; ?>
<?php echo "<p class='error'>" . $msg2_pass . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label class="lbl-format">Password Again <span class="error">*</span>:</label>                      
                            <input type="password" name="confirmPassword" value="<?php echo $_POST['confirmPassword']; ?>" />
<?php echo "<p class='error'>" . $msg_confirmpass . "</p>"; ?>
<?php echo "<p class='error'>" . $msg2_confirmpass . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-2" style='text-align: center'>
                        <button type="submit" class="register_button" name='regSubmit' value="Registration" />Submit</button>
                        <button type="submit" class="clear_button" value="reset" name="clear">Clear</button> 
                    </div>
                </div>
                </form>
            </fieldset>
        </div>
<?php include('./Lab5Commons/Footer.php'); ?>

