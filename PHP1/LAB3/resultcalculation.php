<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
// start PHP session
session_start();  
header('Cache-Control: no-cache');
header('Pragma; no-cache');

if(!isset($_SESSION["name"]))
{
    header("Location:validate.php");
    exit();
}
              
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CST8257 Lab3-Saba Rokni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="cssStyle.css">
    </head>
        <title>Deposit Calculator</title>
    </head>
    <body class="container mt-5">
        <h2>Thank you,<b style="color:blue"> <?php echo $_SESSION["name"]?></b>, for using our deposit calculation tool.</h2>
        <br>
        <?php
        $phoneemail="";

        //session for radio button email or phone selected show value in session
         if(isset($_SESSION['phoneemail']))
                {
                    $phoneemail=$_SESSION['phoneemail'];
                }
 // if session radio is email show result or if radio is phone show result 
        if($phoneemail=="email")
        {
           echo $msg_check="<h4>An email about the details of our GIC has been sent to ";echo $_SESSION["email"];"</h4>";
        }
        elseif ($phoneemail=="phone") {
            //if user select radiobtn phone so checkboxes for time should be stored in session and show here
            if (isset($_SESSION['time'])) 
        {
         echo $msg_check="<h4>We will call you Tomorrow ,";

                foreach ($_SESSION['time'] as $value)
                {
                echo $value.",";
        }
        echo $_SESSION["phone"];echo " about the details of our GIC.</h4>";
        }  
        }
        ?>
        <br><h4>Following is the result of the calculation:</h4>
        <br>
    <hr>
                <table class="table table-bordered">
                <tr>

                <th class = "years" >Year </th>
                <th class = "principaleyear">Principal at year start</th>
                <th class = "intrestyear">Interest for a Year</th>
                <?php
                //show table count deposit calculator 
                  for($i=1; $i<=$_SESSION["years"]; $i++)
                    {
                    $principaleyear=$_SESSION["amount"];
                    $interestyear=round($_SESSION["intrest"]/100*$principaleyear,2);
                      echo "<tr>";
                      echo "<td>$i</td>";
                      echo "<td> $principaleyear </td>";
                      echo "<td>$interestyear</td>";
                      echo"</tr>";
                      echo "<tr></tr>"; 
                    $principaleyear=$_SESSION["amount"]+=$interestyear;
                    }
                ?>
    </body>
</html>
