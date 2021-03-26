<?php
session_start();
include "BookList.php";

?>
<html>
    <head>
        <title>Confirmation</title>
        <link rel="stylesheet" type="text/css" href="BookStore.css" />

    </head>
    
        <h2> Thank you, please review your selection </h2>
        <table border="1">
            <tr>
                <th>Title</th><th>Price</th><th>Copies</th><th>Total</th>
            </tr>
            <?php
            $i=0;
            $copies=$_SESSION['copies'];
            $displayList=$_SESSION['diplayList'];
            $total=0;
            foreach($displayList as $title => $price)
            {
                
                if($copies[$i]>0)
                {
                    $subTotal=$price * $copies[$i];
                    echo "<tr>$title<td></td>$price<td></td><td>$copies[$i]</td><td>$$subTotal</td></tr>";
                    $total += $price* $copies[$i];
                }
                $i++;
            }
            echo "<tr><th colspan='3' style='text-align: right'>Grand Total: </th><td>\$$total</td></tr>";
        ?>
        </table>
        </br></br>
        <form action="BookSelectionSolution.php" method="post">
            <input type="submit" class="button" name="back" value="Back"/>
        </form>
    
</html>
