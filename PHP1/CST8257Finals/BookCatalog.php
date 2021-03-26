<?php
session_start();
include './Common/Functions.php';
include "./Common/PageHeader.php";

extract($_POST);

//Connect to DB using the parameters defined in the ini file. 
//Review the ini file and change the parameter values if necessary. 
$dbConnection = parse_ini_file("Final.ini");
extract($dbConnection);
$pdo = new PDO($dsn, $user, $password);


//Add your code here to process Search or Add to Cart button clicks as required. 



$keyWordError = "";
$bookSelectError = "";
$validCopies = false;


 
//$numRow = 0;
if (isset($_POST['btnSearch'])) {
        //Query database to retrieve book catalog 
    echo hello;
$sql = 'SELECT BookId, Title, Price FROM Book WHERE Title like:param AND BookId NOT IN (SELECT BookId FROM ShoppingCart)';
$txtkey = "%$txtkey%";
$pStmt = $pdo->prepare($sql);
$pStmt->execute([':param' => $txtkey]);
$bookCatalog = $pStmt->fetchAll();


    $search_subject = $_POST['txtKey'];
    if(empty($_POST['txtKey']))
    {
        $keyWordError = "The keyword can not be blank and must be at least 3 characters long!"; 
            
    }   
     if($search_subject < 3) 
     {
        $keyWordError = "The keyword can not be blank and must be at least 3 characters long!";
    }
    


//add Buttom

if (isset($_POST['add'])) {
    // Assign copies array values to copies session:
    $_SESSION['copies'] = $_POST['copies'];
    $neg = 0;
    $Empty = 0;
    foreach ($_POST['copies'] as $n) { //looping through each array row
        if ((int) $n != "") {
            $Empty = $Empty + 1; //Empty will be more than 0 if there is at least one value
        }
        if ((int) $n < 0) {
            $neg = $neg + 1; //neg will be more than one if there is any negative number
        }
    }

    if (($Empty != 0) && (neg == 0)) {//if there's at least one number and no one is negative
        $intCounter = 0;
        $intCopies = $_POST['copies'];
        $strTest = "";

        //insert books into ShoppingCart:
        foreach ($bookCatalog as $row) {
            if ($intCopies[$intCounter] > 0) {
                $sqlStatement = "INSERT INTO ShoppingCart VALUES ( :bookId, :copies)";
                $pStmt = $pdo->prepare($sqlStatement);
                $pStmt->execute(array(':bookId' => $row[0], ':copies' => $intCopies[$intCounter]));
                $pStmt->commit;
            }
            $intCounter++;
        }
        header("Location: ShoppingCart.php"); //move to second page  
        exit;
    } else { //in case everything is empty or there's a negative value
        $bookSelectError = "At least one book's number of copies should be greater than 0! <br/>";
    }
}
}
?>

    <form action="BookCatalog.php" method="post">
    <p>Enter a keyword e.g. programming, to search for titles containing the key word</p>

    <input type='text' name='txtKey' />
    &nbsp;<input type="submit" name="btnSearch" value="Search"/>
    <p class="error"><?php echo $keyWordError; ?></p>  
    <br><p>&nbsp &nbsp Enter the number of copies for books you want to buy and click <b>'Add to Shopping Cart'</b> button:<p>
    <table border="1" align="left" padding-left="20px;">
        <!--table header:-->
        <div class='col-lg-6' style='color:red'> <?php print $bookSelectError; ?></div><br>       
        <tr><th>Title</th><th>Price</th><th>Copies</th></tr>        
        <!--table body-->
    <?php
    $counter = 0; // Counts the position in the array
    if ($bookCatalog) {
        foreach ($bookCatalog as $row) {
            echo "<tr>";
            echo "<td style='background-color:lightgrey' align='left'>";
            echo $row[1];
            echo "</a></td>";

            echo "<td style='background-color:lightgrey' align='left'>";
            echo "$" . $row[2];
            echo "</td>";

            echo "<td style='background-color:lightgrey' align='left'>";
            echo "<input type='text' name='copies[]' value=''>";
            echo "</td>";
            $counter = $counter + 1;
        }
    } else if (empty($bookCatalog)) {
    echo "<td style='background-color:lightgrey' align='left'>";
    echo "No book found with the title containing the specified key word :.$search_subject. ";
    echo "</td>";
    }
    ?>   
    </table><br/><br><br>    

    <div class='form-group row'>                
        <button type='submit' name='add' class='btn btn-primary col-lg-2'>Add to Shopping Cart</button>
    </div>   

    <br/>

</form>
<?php include "./Common/PageFooter.php"; ?>