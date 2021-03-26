<?php include("./Lab4Commons/Header.php"); ?>

<?php session_start(); ?>

<form id="" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
<div class="container-fluid">
    <?php
    if (!isset($_SESSION["name"])) {
        echo $msg_error_name = "<h1>Thank you, for using our deposit calculation tool.</h1>";
    } else {
        ?>
        <h1>Thank you,<b style="color:blue"> <?php echo $_SESSION["name"] ?></b>, for using our deposit calculation tool.</h1>
        <br>
    <?php
    $phoneemail = "";

    //session for radio button email or phone selected show value in session
    if (isset($_SESSION['phoneemail'])) {
        $phoneemail = $_SESSION['phoneemail'];
    }
    // if session radio is email show result or if radio is phone show result 
    if ($phoneemail == "email") {
        echo $msg_check = "<h3>An email about the details of our GIC has been sent to ";
        echo $_SESSION["email"];
        "</h4>";
    } elseif ($phoneemail == "phone") {
        //if user select radio-btn phone so checkboxes for time should be stored in session and show here
        if (isset($_SESSION['time'])) {
            echo $msg_check = "<h3> We will call you Tomorrow ,";

            foreach ($_SESSION['time'] as $value) {
                echo $value . ", ";
            }
            echo $_SESSION["phone"];
            echo "  about the details of our GIC.</h3>";
        }
    }
}
?> 
    <?php session_destroy(); ?>
    </div>
</form>
    <?php include('./Lab4Commons/Footer.php'); ?>

