
<?php session_start(); ?>
<?php include("./Lab4Commons/Header.php"); ?>
<div class="container">
<form id="" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


    <?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['agree_condition'])) {
            $msg_disagree = " You must agree Terms and Conditions!";
        } else {
            $_SESSION["term_condition"] = $_POST['agree_condition'];
            header("Location:CustomerInfo.php");
            exit();
        }
    }
    ?>
    <h1 class="text-center">Terms and Conditions</h1>
    <textarea id="termscondition" class="disclaimer-center"  name="term_condition" rows="3">I agree to abide by the Bank's Term and Conditions and rules in force and the changes.therefore in Terms and Conditions from time relating to my account as communicated and made available on the Bank's website.
    </textarea><br>
    <textarea id="termscondition" class="disclaimer-center" name="term_condition" rows="5">I agree that the bank before opening my deposit account will carry out a due diligence as required under know your Customer.guidelines of the Bank. I would be required to submit necessary documents or proofs, such as identity, address, photograph and any such information.I agree to submit the above documents again at periodic intervals as may be required by the Bank.
    </textarea><br>
    <textarea id="termscondition" class="disclaimer-center" name="term_condition" rows="4">I agree that the Bank can at its sole direction amend any of the services/facilities given in my account either wholly or partially at any time by giving me at least 30 days notice and/or provided an option to me to switch to other services/facilities.
    </textarea>

<?php echo "<p class='error'>" . $msg_disagree . "</p>"; ?>
    <input type="checkbox" name="agree_condition" value="agree" <?php if (isset($_POST['agree_condition']) && $_POST['agree_condition'] == 'agree') echo 'checked="agree"' ?>><h4>I have read and agree with the terms and conditions</h4><br>
    <button type="submit" class="register_button" name="submit">Start</button>


</form>
    </div>
<?php include('./Lab4Commons/Footer.php'); ?>

