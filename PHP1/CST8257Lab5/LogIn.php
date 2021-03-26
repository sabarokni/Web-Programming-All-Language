<?php include("./Lab5Commons/Header.php"); ?>
<?php
session_start();
include_once 'Functions.php';
include_once 'EntityClassLib.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: Index.php");
//    exit;
//}

extract($_POST);
$loginErrorMsg = '';

//$password = hash("sha256", $txtPswd);
if (isset($_POST['clear'])) {
    //header("Refresh:0");
    header("Location:LogIn.php");
}
if (isset($regSubmit)) {

    //Checking Student ID--null show message
    if (empty($_POST['txtId'])) {
        $msg_ID = "You must supply your Student ID";
    }

    //Cecking Password 
    if (empty($_POST['txtPassword'])) {
        $msg_pass = "You must Enter Password.";
    }

    if ($msg_ID == "" && $msg_pass == "") {

        try {
            
            $user = getUserByIdAndPassword($txtId);
            if ($user == null) {
                        //Could not find a user with that username!
                        $loginErrorMsg = 'No account found with that username and password.!';
                    } else {
                        //hash password 
                        //$password_encrypted = password_hash($txtPassword, PASSWORD_BCRYPT);

                        //Compare the passwords.
                        $validPassword = password_verify($txtPassword, $user->getPassword());

                        //If $validPassword is TRUE, the login has been successful.
                        if ($validPassword) {
                            // Password is correct, so start a new session
                            session_start();

                            //Provide the user with a login session.
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user"] = $txtId;
                            header("Location: CourseSelection.php");
                            exit();
                        } else {
                            //$validPassword was FALSE. Passwords do not match.
                            $loginErrorMsg = 'Incorrect Password Combination!';
                        }
                    }

        } catch (Exception $e) {
            die("The system is currently not available, try again later");
        }
        
        
        
    }
}
?>


<head>
    <title>Algonquin College Online Course Registration</title>
    <link rel="stylesheet" type="text/css" href="RegisterUser.css" />
</head>
<body>
    <div class="container">
        <fieldset>
            <div class="card-header">
                <h1 class="text-center">Login</h1>
                <p>You need to <a href='NewUser.php'>Sign up</a> if you a new user.</p>
            </div> 
            <hr>
            <form id="registration_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div  colspan='2' style='color:Red'><?php echo $loginErrorMsg; ?></div>
                <div class="row">
                    <div class="col-2"> 
                        <label class="lbl-format">Student ID <span class="error">*</span>:</label>
                        <input type="text" name="txtId" value="<?php echo $_POST['txtId']; ?>"/>                       
<?php echo "<p class='error'>" . $msg_ID . "</p>"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label class="lbl-format">Password <span class="error">*</span>:</label>                      
                        <input type="password" name="txtPassword" value="<?php echo $_POST['txtPassword']; ?>" />                  
<?php echo "<p class='error'>" . $msg_pass . "</p>"; ?>
                    </div>
                </div><br>

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
