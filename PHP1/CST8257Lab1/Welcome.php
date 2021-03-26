<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        date_default_timezone_set("America/Toronto");
        //get current date in the format of yyyy-mm-dd
        $today = date("y-m-d");
        ?>
        <h2>Welcome to PHP!</h2>
        <!-- display current date -->
        Today is <?php print($today);?>
        
    </body>
</html>
