<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CST8257 Lab2-Saba Rokni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="cssStyle.css">
    </head>
    <body class="container mt-5">
       <?php
        //Clear page and refresh it again

        if(isset($_POST['clear']))
        {
            header("Refresh:0");
        }
       if(isset($_POST['submit']))
        {
          ?>
        <h1 class="mt-5">Deposit Calculator</h1>
        <hr/>
        <?php

        $amount=trim($_POST['pamount']);
        $inrestRate=trim($_POST['irate']);
        $years=trim($_POST['year']);
        $name=trim($_POST['name']);
        $postalCode=trim($_POST['pcode']);
        $phonenumber=trim($_POST['phonenumber']);
        $email=trim($_POST['email']);
        $phoneemail=trim($_POST['phoneemail']);
                
        //$errorsForm=validateForm($amount,$inrestRate,$years,$name,$PostalCode,$phonenumber,$email,$phoneemail,$checkmorning,$checkafternoon,$checkevening);

        ?>
                
        <?php
        if(strlen($name)==0)
        {
            echo $msglable="<h3>Thank you, for using our deposit caculator</h3>";

        
        //no field can be blank
        if  (empty($amount)|| empty($inrestRate)|| empty($years)|| empty($PostalCode)||empty($phonenumber)||empty($email)||empty($phoneemail)) 
        {

            echo $msgPrincipalAmount="However we can not process your request of the following input errors:";
            echo "<li> The principle amount must be numeric and greater than 0</li>";
            echo "<li> The Principle amount must be numeric and non-negative</li>";
            echo "<li> Postal code can not be blank</li>";
            echo "<li> Phone number can not be blank</li>";
            echo "<li> When preferred contact method is phone. You have to select one or more contact time</li>";
        }
        }else{
        
            echo $msglable ="<h3>Thank you, <b>$name</b> ,for using our deposit caculator<br></h3>";
 
             //Principale Amount must be numeric and greater than zero
            //Interest rate not numeric and not negative
        if (!is_numeric($inrestRate)|| $inrestRate<0 ||!is_numeric($amount) || $amount<0)
        {
            echo $msgPrincipalAmount="However we can not process your request of the following input errors:";
            echo "<li> The principle amount must be numeric and greater than 0</li>";
            echo "<li> The Intrest of Year must be numeric and non-negative</li>";
        }
        
        else{
                //phone is set choose morning,afternoon, evening
            if(!empty($phoneemail))
            {
                
                if ($phoneemail=="phone")
                {
                    if(!empty($_POST['time']))
                    {
                        if(isset($_POST['time']))
                        {
                             echo $msgphone="<h4> our customer service department will call you tomorrow";
                             foreach($_POST['time'] as $checked){
                              echo " ,";
                              echo $checked  ; 
                             }
                             echo" at $phonenumber</h4>";
                        }   
                    }elseif(empty($_POST['time']))
                    {
                        echo $msgPrincipalAmount="However we can not process your request of the following input errors:";

                        echo "<li> When preferred contact method is phone. You have to select one or more contact time</li>";

                    }
                    
                }
                //Email is set for cantact 
                else if($phoneemail=="email")
                {
                    echo $msgemail="  our customer service department will email you by <b>$email</b>";
                }
                echo "<h4><hr>The following is the result of the Calculation :  <br></h4>";
                ?>
                <br>
                <table class="table table-bordered">
                <tr>

                <th class = "years" >Year </th>
                <th class = "principaleyear">Principal at year start</th>
                <th class = "intrestyear">Interest for a Year</th>
                <?php
                    //create table show calcualtion 
                for($i=1; $i<=$years; $i++)
                    {
                    $principaleyear=$amount;
                    $interestyear=round($inrestRate/100*$principaleyear,2);
                      echo "<tr>";
                      echo "<td>$i</td>";
                      echo "<td> $principaleyear </td>";
                      echo "<td>$interestyear</td>";
                      echo"</tr>";
                      echo "<tr></tr>"; 
                    $principaleyear=$amount+=$interestyear;
                    }
                ?>
                </tr>
                </table>            
                <?php
            }
            else{
                
            echo $msgPrincipalAmount="However we can not process your request of the following input errors:";
            echo "<li> The Contact must be choose by Phone or Email !</li>";
            
            }
        }
        }
    }
                ?>

    </body>
</html>
