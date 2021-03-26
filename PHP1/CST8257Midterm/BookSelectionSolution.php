<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();


include "BookList.php";
$selectionErrorClass="hidden";
$buy=$_POST["buy"];
$copies=$_POST["copies"];
$back=$_POST["back"];

$sort = $_GET["sort"];


if(isset($_SESSION['displayList']))
{
    $displayList=$_SESSION['displayList'];
    
}else
{
    $displayList=$bookList;
    $_SESSION['displayList']=$displayList;
}


if(isset($buy))
{
    for($i=0;$i<sizeof($copies);$i++)
    {
        if(is_numeric($copies[$i]) && $copies[$i]>0)
        {
            $_SESSION['copies']=$copies;
            header("Location:ConfirmationSolution.php");
            exit();
        }
    }
    $selectionErrorClass='error';
}
elseif(isset ($back))
{
    $copies=$_SESSION['copies'];
}
elseif(isset ($sort))
{
    if($sort=='title')
    {
        ksort($displayList);
    }else
    {
        asort($displayList);
    }
    if(isset($_SESSION['ascending']))
    {
        if($_SESSION['ascending'])
        {
            $displayList= array_reverse($displayList);
        }
        $_SESSION['ascending']=!$_SESSION['ascending'];
    }
 else {
     $_SESSION['ascending']= True;   
    }
    $copy= array();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Algonquin College Bookstore</title>
        <link rel="stylesheet" type="text/css" href="BookStore.css" />
    </head>
    <body>
        <h3>Select the number of copies for books you want to buy and click Buy button</h3>
        <form action="BookSelectionSolution.php" method="post">
            <br/>
            <span class='<?php echo $selectionErrorClass ?>'>
            At Least one book's number of copies should be greater than zero!
            </span>
            
            <table border="1">
                <tr>
                    <th><a href="BookSelectionSolution.php?sort=title">Title</a></th>
                    <th><a href="BookSelectionSolution.php?sort=price">Price</a></th>
                </tr>
                <?php
                
                $i=0;
                foreach($displayList as $title=>$price)
                {
                    echo "<tr>";
                    echo "<td>$title</td><td>$price</td>";
                    echo "<td align='center'><input type='text' name='copies[]' value='".(isset($copies) ? $copies[$i] : '')."' size='2'/></td>";
                    echo "</tr>";
                    $i++;
                }
                $_SESSION['displayList']=$displayList;
                ?>
            </table>
            <br/>
            <input type="submit" class="button" name="buy" value="Buy"/>
        </form>
        
    </body>
</html>
