
<?php include("./Lab4Commons/Header.php"); ?>
<?php session_start(); ?>
<form id="" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php
    if (!isset($_SESSION["term_condition"])) {
        header("Location:Disclaimer.php");
        exit();
    }
    ?>
    <?php
    session_start();
    if (isset($_POST['clear'])) 
    {
        //header("Refresh:0");
        header("Location:CustomerInfo.php");
    }
    $time_morning = false;
    $time_afternoon = false;
    $time_evening = false;
    if (isset($_POST['submit'])) 
    {
//checking name
        if (empty($_POST['full_name'])) 
        {
            $msg_name = "You must supply your name";
        }
        $name_subject = $_POST['full_name'];
        $name_pattern = '/^[a-zA-Z ]*$/';
        preg_match($name_pattern, $name_subject, $name_matches);
        if (!$name_matches[0]) 
        {
            $msg2_name = "Only alphabets and white space allowed";
        }
//Posotal Code
        if (empty($_POST['postal_code'])) 
        {
            $msg_postalcode = "You must supply your Postal Code";
        }
        $postalcode_subject = $_POST['postal_code'];
        $postalcode_pattern = "/[a-z][0-9][a-z]\s*[0-9][a-z][0-9]/i";
        preg_match($postalcode_pattern, $postalcode_subject, $postalcode_matches);
        if (!$postalcode_matches[0]) 
        {
            $msg2_postalcode = "must be in the form of XnX nXn";
        }
//Phone number
        if (empty($_POST['phone_number'])) 
        {
            $msg_phonenumber = "You must Enter  Your Phone Number.";
        }
        $phonenumber_subject = $_POST['phone_number'];
        $phonenumber_pattern = "/^[1-9]{1}+[0-9]{2}-[2-9]{3}-[0-9]{4}$/";
        preg_match($phonenumber_pattern, $phonenumber_subject, $phonenumber_matches);
        if (!$phonenumber_matches[0]) 
        {
            $msg2_phonenumber = "must be in the form of nnn-nnn-nnnn .";
        }
//check email
        if (empty($_POST['email_addr'])) 
        {
            $msg_email = "You must supply your email";
        }
        $email_subject = $_POST['email_addr'];
        $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        preg_match($email_pattern, $email_subject, $email_matches);
        if (!$email_matches[0]) 
        {
            $msg2_email = "Must be of valid email format";
        }
// check email or phone on radio box        
        $radiophoneemail = $_POST['phoneemail'];
        switch ($radiophoneemail) 
        {
            case "phone";
                $msg_radio = "Phone checked ";
                $times = $_POST['time'];
                if (empty($_POST['time'])) 
                {
                    $msg_time = "When preferred contact method is phone. You have to select one or more contact time";
                }
                break;

            case "email";
                $msg_radio = " Email checked ";
                break;
        }
//show error when radio not checked 
        if ($radiophoneemail == NULL) 
        {
            $msg_radio_error = "Please select one of the Contact way !";
        }
//if checkbox of time is not null, if alue equal value of checkbox show true and keep checkbox 
        if ($_POST['time'] != null) 
        {
            foreach ($_POST['time'] as $value) 
            {
                echo $value;
                if ($value == "morning") 
                {
                    $time_morning = true;
                }
                if ($value == "afternoon") 
                {
                    $time_afternoon = true;
                }
                if ($value == "evening") 
                {
                    $time_evening = true;
                }
            }
        }
    }
    ?>
    <?php
// validation complete 
// store all data user entered in the session and show in diffrent php page the values
    if (isset($_POST['submit']))
    {
        if ($msg2_pamount == "" && $msg_pamount == "" && $msg2_irate == "" && $msg_irate == "" && $msg_name == "" && $msg2_name == "" && $msg2_postalcode == "" && $msg2_postalcode == "" && $msg2_phonenumber == "" && $msg_phonenumber == "" && $msg_email == "" && $msg2_email == "" && $msg_radio_error == "" && $msg_time == "") {
            $_SESSION["name"] = $name_subject;
            $_SESSION["email"] = $email_subject;
            $_SESSION["phone"] = $phonenumber_subject;
            if (!empty($radiophoneemail)) 
            {
                $_SESSION['phoneemail'] = $_POST['phoneemail'];
            }
            
            $_SESSION["time"] = $_POST['time'];
            
            foreach ($_POST['time'] as $key => $value) 
            {
                $_SESSION["time"] = $_POST['time'];
            }
            
            $_SESSION["postalcode"] = $postalcode_subject;

            header("Location:DepositCalculator.php");
            exit();
        }
    }
    ?>  
    <div class="container">
        <fieldset>
            <div class="card-header">
                <h1 class="text-center">Customer Information</h1>
            </div> 
            <hr>
            <form id="registration_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row">
                    <div class="col-2"> 
                        <label class="lbl-format">Full name<span class="error">*</span>:</label>
                        <input type="text" name="full_name" placeholder="FirstName LastName"  value="<?php echo $_POST['full_name']; ?>">   
                        <?php echo "<p class='error'>" . $msg_name . "</p>"; ?>
                        <?php echo "<p class='error'>" . $msg2_name . "</p>"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2"> 
                        <label class="lbl-format">Postal Code: <span class="error">*</span>:</label>                 
                        <input type="text"  name="postal_code" placeholder="XnX XnX" value="<?php echo $_POST['postal_code']; ?>"><br>
                        <?php echo "<p class='error'>" . $msg_postalcode . "</p>"; ?>
                        <?php echo "<p class='error'>" . $msg2_postalcode . "</p>"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label class="lbl-format">Phone Number: <span class="error">*</span>:</label>                      
                        <input type="text"  name="phone_number" placeholder="nnn-nnn-nnnn" value="<?php echo $_POST['phone_number']; ?>"><br><?php echo "<p class='error'>" . $msg_phonenumber . "</p>"; ?><?php echo "<p class='error'>" . $msg2_phonenumber . "</p>"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label class="lbl-format">Email address<span class="error">*</span>:</label>                            
                        <input type="text" name="email_addr" value="<?php echo $_POST['email_addr']; ?>"><br>
                        <?php echo "<p class='error'>" . $msg_email . "</p>"; ?>
                        <?php echo "<p class='error'>" . $msg2_email . "</p>"; ?>
                    </div>
                </div>
                <hr>
                <label><h4>Preferred Contact Method: </h4></label><br>

                <label class="container-rd"> Phone
                    <input type = "radio" class="navbar-form .radio" name = "phoneemail" value ="phone" <?php if (isset($_POST['phoneemail']) && $_POST['phoneemail'] == 'phone') echo 'checked="phone"' ?>> 
                    <span class="checkmark-rd"></span>
                </label>
                <label class="container-rd"> Email
                    <input type = "radio" name = "phoneemail" value = "email" <?php if (isset($_POST['phoneemail']) && $_POST['phoneemail'] == 'email') echo 'checked="email"' ?>>
                    <span class="checkmark-rd"></span>
                </label>
                <?php echo "<p class='error'>" . $tncv . "</p>"; ?>
                <?php echo "<p class='error'>" . $tnclv . "</p>"; ?>
                <?php echo "<p class='error'>" . $msg_radio_error . "</p>"; ?>
                <hr>
                <label><h4>If phone is selected,when can we contact you ?  (check all applicable)</h4></label><br>
                <label class="container-ck"> Morning
                    <input type="checkbox" name="time[]" value="morning" <?php if ($time_morning) echo 'checked' ?>>   
                    <span class="checkmark"></span>
                </label>
                <label class="container-ck"> Afternoon
                    <input type="checkbox" name="time[]" value="afternoon" <?php if ($time_afternoon) echo 'checked' ?>>  
                    <span class="checkmark"></span>
                </label>
                <label class="container-ck"> Evening
                    <input type="checkbox" name="time[]" value="evening" <?php if ($time_evening) echo 'checked' ?>>
                    <span class="checkmark"></span>
                </label>
                <?php echo "<p class='error'>" . $msg_time . "</p>"; ?>
                <hr>
                <div class="row">
                    <div class="col-2">
                        <button type="submit" class="register_button" name="submit">Calculate</button>
                        <button type="submit" class="clear_button" value="reset" name="clear">Clear</button> 
                    </div>
                </div>

        </fieldset>
    </div>
</form>
<?php include('./Lab4Commons/Footer.php'); ?>

