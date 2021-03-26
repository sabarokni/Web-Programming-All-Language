<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
        <link href="../../twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deposit Calculator-Validation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link rel="stylesheet" href="cssStyle2.css">

        <style type="text/css">
            h1 {margin-bottom:20px}
            input, label {margin-top:7px; margin-bottom:7px; color:#000066; font-size: 18px; padding-right: 7px}
            input[type='checkbox'] {margin-left: 5px}
            .note {color: #ff0000}
            .success_msg{color:#006600}
        </style>
    </head>
    <body>
        <?php
        session_start();

        if (isset($_POST['clear'])) {
            //header("Refresh:0");
            header("Location:validate.php");
        }
        $time_morning = false;
        $time_afternoon = false;
        $time_evening = false;
        if (isset($_POST['submit'])) {

//check Pricipal Amount
            if (empty($_POST['pamount'])) {
                $msg_pamount = "You must enter Principal Amount";
            }
            $pamount_subject = $_POST['pamount'];
            $pamount_pattern = "/^\d+$/";
            preg_match($pamount_pattern, $pamount_subject, $pamount_matches);
            if (!$pamount_matches[0]) {
                $msg2_pamount = "only number and positive number.";
            }
//Intrest Rate
            if (empty($_POST['irate'])) {
                $msg_irate = "You must enter Intrest Rate";
            }
            $irate_subject = $_POST['irate'];
            $irate_pattern = "/^\d+$/";
            preg_match($irate_pattern, $irate_subject, $irate_matches);
            if (!$irate_matches[0]) {
                $msg2_irate = "only number and positive number.";
            }
            if (isset($_POST['year'])) {
                $year_subject = $_POST['year'];
            }
//checking name
            if (empty($_POST['full_name'])) {
                $msg_name = "You must supply your name";
            }
            $name_subject = $_POST['full_name'];
            $name_pattern = '/^[a-zA-Z ]*$/';
            preg_match($name_pattern, $name_subject, $name_matches);
            if (!$name_matches[0]) {
                $msg2_name = "Only alphabets and white space allowed";
            }
//Posotal Code
            if (empty($_POST['postal_code'])) {
                $msg_postalcode = "You must supply your Postal Code";
            }
            $postalcode_subject = $_POST['postal_code'];
            $postalcode_pattern = "/[a-z][0-9][a-z]\s*[0-9][a-z][0-9]/i";
            preg_match($postalcode_pattern, $postalcode_subject, $postalcode_matches);
            if (!$postalcode_matches[0]) {
                $msg2_postalcode = "must be in the form of XnX nXn";
            }
//Phone number
            if (empty($_POST['phone_number'])) {
                $msg_phonenumber = "You must Enter  Your Phone Number.";
            }
            $phonenumber_subject = $_POST['phone_number'];
            $phonenumber_pattern = "/^[1-9]{1}+[0-9]{2}-[2-9]{3}-[0-9]{4}$/";
            preg_match($phonenumber_pattern, $phonenumber_subject, $phonenumber_matches);
            if (!$phonenumber_matches[0]) {
                $msg2_phonenumber = "must be in the form of nnn-nnn-nnnn .";
            }

//check email
            if (empty($_POST['email_addr'])) {
                $msg_email = "You must supply your email";
            }
            $email_subject = $_POST['email_addr'];
            $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
            preg_match($email_pattern, $email_subject, $email_matches);
            if (!$email_matches[0]) {
                $msg2_email = "Must be of valid email format";
            }
// check email or phone on radio box

            $radiophoneemail = $_POST['phoneemail'];
            switch ($radiophoneemail) {
                case "phone";
                    $msg_radio = "Phone checked ";
                    $times = $_POST['time'];
                    if (empty($_POST['time'])) {
                        $msg_time = "When preferred contact method is phone. You have to select one or more contact time";
                    }
                    break;

                case "email";
                    $msg_radio = " Email checked ";
                    break;
            }
//show error when radio not checked 
            if ($radiophoneemail == NULL) {
                $msg_radio_error = "Please select one of the Contact way !";
            }
            if ($_POST['time'] != null) {
                foreach ($_POST['time'] as $value) {

                    if ($value == "morning") {
                        $time_morning = true;
                    }
                    if ($value == "afternoon") {
                        $time_afternoon = true;
                    }
                    if ($value == "evening") {
                        $time_evening = true;
                    }
                }
            }
        }
        ?>
        <?php
// validation complete 
// store all data user entered in the session and show in diffrent php page the values
        if (isset($_POST['submit'])) {
            if ($msg2_pamount == "" && $msg_pamount == "" && $msg2_irate == "" && $msg_irate == "" && $msg_name == "" && $msg2_name == "" && $msg2_postalcode == "" && $msg2_postalcode == "" && $msg2_phonenumber == "" && $msg_phonenumber == "" && $msg_email == "" && $msg2_email == "" && $msg_radio_error == "" && $msg_time == "") {
                if (!empty($radiophoneemail)) {
                    $_SESSION['phoneemail'] = $_POST['phoneemail'];
                }
                $_SESSION["time"] = $_POST["time"];

                $_SESSION["name"] = $name_subject;
                $_SESSION["email"] = $email_subject;
                $_SESSION["phone"] = $phonenumber_subject;
                $_SESSION["amount"] = $pamount_subject;
                $_SESSION["intrest"] = $irate_subject;
                $_SESSION["years"] = $year_subject;
                header("Location: resultcalculation.php");
                exit();
            }
        }
        ?>     
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    <h1>Deposit Calculator </h1>
                </div> 
            </div>
            <hr>
            <h3><span class="note">*</span>Mandatory Field</h4>
                <form id="registration_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="form-row">
                        <div class="col-2">
                            <label>Principle Amount: <span class="note">*</span>:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="registration input" name="pamount"  autofocus="autofocus" value="<?php echo $_POST['pamount']; ?>"><br>
                            <?php echo "<p class='note'>" . $msg_pamount . "</p>"; ?>
                            <?php echo "<p class='note'>" . $msg2_pamount . "</p>"; ?>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-2">
                            <label>Interest Rate(%): <span class="note">*</span>:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="registration input" name="irate" value="<?php echo $_POST['irate']; ?>"><br>
                            <?php echo "<p class='note'>" . $msg_irate . "</p>"; ?>
                            <?php echo "<p class='note'>" . $msg2_irate . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Year to Deposit: </label>
                        </div>
                        <div class="col-2">
                            <select name="year" value=<?php if (isset($_POST['year'])) {echo $_POST['year'];}?>>
                                
                                
                                <option value="1" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '1') {
                                    print'selected="1"';
                                }
                                ?>>1</option>
                                <option value="2" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '2') {
                                    print'selected="2"';
                                }
                                ?>>2</option>
                                <option value="3" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '3') {
                                    print'selected="3"';
                                }
                                ?>>3</option>
                                <option value="4" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '4') {
                                    print'selected="4"';
                                }
                                ?>>4</option>
                                <option value="5"<?php
                                if (isset($_POST['year']) && $_POST['year'] == '5') {
                                    print'selected="5"';
                                }
                                ?>>5</option>
                                <option value="6" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '6') {
                                    print'selected="6"';
                                }
                                ?>>6</option>
                                <option value="7" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '7') {
                                    print'selected="7"';
                                }
                                ?>>7</option>
                                <option value="8" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '8') {
                                    print'selected="8"';
                                }
                                ?>>8</option>
                                <option value="9" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '9') {
                                    print'selected="9"';
                                }
                                ?>>9</option>
                                <option value="10" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '10') {
                                    print'selected="10"';
                                }
                                ?>>10</option>
                                <option value="11" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '11') {
                                    print'selected="11"';
                                }
                                ?>>11</option>
                                <option value="12" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '12') {
                                    print'selected="12"';
                                }
                                ?>>12</option>
                                <option value="13" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '13') {
                                    print'selected="13"';
                                }
                                ?>>13</option>
                                <option value="14" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '14') {
                                    print'selected="14"';
                                }
                                ?>>14</option>
                                <option value="15" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '15') {
                                    print'selected="15"';
                                }
                                ?>>15</option>
                                <option value="16" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '16') {
                                    print'selected="16"';
                                }
                                ?>>16</option>
                                <option value="17" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '17') {
                                    print'selected="17"';
                                }
                                ?>>17</option>
                                <option value="18" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '18') {
                                    print'selected="18"';
                                }
                                ?>>18</option>
                                <option value="19" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '19') {
                                    print'selected="19"';
                                }
                                ?>>19</option>
                                <option value="20" <?php
                                if (isset($_POST['year']) && $_POST['year'] == '20') {
                                    print'selected="20"';
                                }
                                ?>>20</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"> 
                            <label>Full name<span class="note">*</span>:</label>
                        </div>
                        <div class="col-auto"> 
                            <input type="text" name="full_name" placeholder="FirstName LastName"  value="<?php echo $_POST['full_name']; ?>">   
                            <?php echo "<p class='note'>" . $msg_name . "</p>"; ?>
                            <?php echo "<p class='note'>" . $msg2_name . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"> 
                            <label>Postal Code: <span class="note">*</span>:</label>
                        </div>
                        <div class="col-auto">                  
                            <input type="text"  name="postal_code" placeholder="XnX XnX" value="<?php echo $_POST['postal_code']; ?>"><br>
                            <?php echo "<p class='note'>" . $msg_postalcode . "</p>"; ?>
                            <?php echo "<p class='note'>" . $msg2_postalcode . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Phone Number: <span class="note">*</span>:</label>
                        </div>
                        <div class="col-auto">                       
                            <input type="text"  name="phone_number" placeholder="nnn-nnn-nnnn" value="<?php echo $_POST['phone_number']; ?>"><br><?php echo "<p class='note'>" . $msg_phonenumber . "</p>"; ?><?php echo "<p class='note'>" . $msg2_phonenumber . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label>Email address<span class="note">*</span>:</label>
                        </div>
                        <div class="col-auto">                              
                            <input type="text" name="email_addr" value="<?php echo $_POST['email_addr']; ?>"><br>
                            <?php echo "<p class='note'>" . $msg_email . "</p>"; ?>
                            <?php echo "<p class='note'>" . $msg2_email . "</p>"; ?>
                        </div>
                    </div>

                    <h4>Preferred Contact Method: </h4>
                    <div class="row">
                        <div class="col-2">
                            <input type = "radio" name = "phoneemail" value ="phone" <?php if (isset($_POST['phoneemail']) && $_POST['phoneemail'] == 'phone') echo 'checked="phone"' ?>> Phone
                        </div>
                        <?php echo "<p class='note'>" . $tncv . "</p>"; ?>
                        <div class="col-2">
                            <input type = "radio" name = "phoneemail" value = "email" <?php if (isset($_POST['phoneemail']) && $_POST['phoneemail'] == 'email') echo 'checked="email"' ?>> Email
                        </div>
                    </div>
                    <?php echo "<p class='note'>" . $tnclv . "</p>"; ?>
                    <?php echo "<p class='note'>" . $msg_radio_error . "</p>"; ?>
                    <hr>
                    <h4>If phone is selected,when can we contact you ? <br>(check all applicable)</h4>
                    <div class="row">
                        <div class="col-2">
                            <input type="checkbox" name="time[]" value="morning" <?php if ($time_morning) echo 'checked' ?>>  Morning 
                        </div>
                        <div class="col-2">
                            <input type="checkbox" name="time[]" value="afternoon" <?php if ($time_afternoon) echo 'checked' ?>/>  Afternoon 
                        </div>
                        <div class="col-2">
                            <input type="checkbox" name="time[]" value="evening" <?php if ($time_evening) echo 'checked' ?>/>  Evening 
                        </div>

                    </div>
                    <?php echo "<p class='note'>" . $msg_time . "</p>"; ?>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <button type="submit" class="register_button" name="submit">Calculate</button>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="clear_button" value="reset" name="clear">Clear</button> 
                        </div>
                    </div>
                </form>
        </div>
    </body>
</html>
</div>