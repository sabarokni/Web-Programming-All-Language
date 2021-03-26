<?php
	session_start();
if(!isset($_SESSION["copies"])&&!isset($_SESSION["price"])&&!isset($_SESSION["title"]))
{
    header("Location:BookSelection.php");
    exit();
}

?>
<html>
<head>
	<title>Confirmation</title>
	<link rel="stylesheet" type="text/css" href="Contents/BookStore.css" />
</head>
<body>
    <h2>Thank you, please review your selection</h2>
    <table border="1">
        <tr><th>Title</th><th>Price</th><th>Copies</th><th>Total</th></tr>
        
        <?php
        $copies=$_SESSION["copies"];
        $price=$_SESSION["price"];
        $title=$_SESSION["title"];
         echo "<tr>";
                        echo "<td>$title</td>";
                        echo "<td> $price </td>";
                        echo "<td>$copies</td>";
                        echo "<td>$total</td>";
                        echo"</tr>";
                        echo "<tr></tr>";
        $total=$price*$copies;
        ?>
            </tr>
    </table>
    </br></br>
    <form action="BookSelection.php" method="post">
        <input type='submit'  class='button' name='back' value='Back'/>
    </form>
</body>
</html>