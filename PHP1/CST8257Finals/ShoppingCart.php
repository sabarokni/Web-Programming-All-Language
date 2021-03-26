<?php
session_start();
include "./Common/PageHeader.php";

include './Common/Functions.php';

extract($_POST);

//Connect to DB using the parameters defined in the ini file. 
//Review the ini file and change the parameter values if necessary. 
$dbConnection = parse_ini_file("Final.ini");
extract($dbConnection);
$pdo = new PDO($dsn, $user, $password);

//Enter your code here to process Update button clicks as required.	
//Quering database to retrieve shopping cart       
$sql = 'SELECT book.BookId, book.Price, book.Title, shoppingcart.Copies FROM book '
        . 'INNER JOIN shoppingcart ON book.BookId = shoppingcart.BookId ';
$pStmt = $pdo->prepare($sql);
$pStmt->execute();
$shoppingCart = $pStmt->fetchAll();

//update Button
if (isset($_POST['btnUpdate'])) {
    $_SESSION['copies'] = $_POST['copies'];
    $bookIdArray = $_POST['bookId']; //retriveing id's from books
    $intCounter = 0;

    foreach ($_POST['copies'] as $row) { //looping through each array row
        //if book copies is empty:
        if ($row == "") {
            //delete books from ShoppingCart:
            $sqlStatement = "DELETE FROM ShoppingCart WHERE BookId = :bookId";
            $pStmt = $pdo->prepare($sqlStatement);
            $pStmt->execute(array(':bookId' => $bookIdArray[$intCounter]));
            $pStmt->commit;
        }
        //if book copies is 0:
        else if ($row < 1) {
            //delete books from ShoppingCart:
            $sqlStatement = "DELETE FROM ShoppingCart WHERE BookId = :bookId AND customerId = :userId";
            $pStmt = $pdo->prepare($sqlStatement);
            $pStmt->execute(array(':bookId' => $bookIdArray[$intCounter]));
            $pStmt->commit;
        }
        //if book copies was modified:
        else {
            //update books into ShoppingCart:
            $sqlStatement = "UPDATE ShoppingCart SET copies = :newCopy "
                    . "WHERE BookId = :bookId";
            $pStmt = $pdo->prepare($sqlStatement);
            $pStmt->execute(array(':newCopy' => $row, ':bookId' => $bookIdArray[$intCounter]));
            $pStmt->commit;
        }
        $intCounter++;
    }
    header("Location: ShoppingCart.php");
    exit;
}
?>	
<h3><?php echo $name ?>Your Shopping Cart</h3>
<p>To change the number of copies to purchase, enter the new number and click Update button.</p>
<p>To remove any book from the shopping cart, change the number of copies to 0 and click Update button.</p>
<form method = 'post' action='ShoppingCart.php'>
    <table border='1'>
        <tr><th>Title</th><th >Price</th><th>Copies</th></tr>
<?php
$numRow = 0;
$total = 0.0;

//Enter your code here to display books in the shopping cart as required.	
$counter = 0; // Counts the position in the array
if($shoppingCart>0)
{
foreach ($shoppingCart as $row) {
    echo "<tr>";

    echo "<input type='hidden' name='bookId[]' value='" . $row[0] . "' />";
    echo "<td style='background-color:lightgrey' align='left'>";
    echo $row[2];
    echo "</a></td>";

    echo "<td style='background-color:lightgrey' align='left'>";
    echo "$" . $row[1];
    echo "</td>";

    echo "<td style='background-color:lightgrey' align='left'>";
    echo "<input type='text' name='copies[]' value='";

    // Print the number of copies selected if the value exists
    echo $row[3];
    echo "'></td>";
    $counter = $counter + 1;
}
    echo "<tr><th colspan='3' style='text-align: right'>Grand Total: </th><td>\$$total</td></tr>";
}
else {
    echo "<td style='background-color:lightgrey' align='left'>";
    echo "You have no book in your shopping cart";
    echo "</td>";
}
?>   
    </table><br/><br>		
    <input type='submit' name='btnUpdate' value='Update' class="button"/>
</form>
        <?php include "./Common/PageFooter.php"; ?>