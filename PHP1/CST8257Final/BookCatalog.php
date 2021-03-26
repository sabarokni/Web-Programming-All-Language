<?php
    session_start();	
    include './Common/Functions.php';

    extract($_POST);

    //Connect to DB using the parameters defined in the ini file. 
    //Review the ini file and change the parameter values if necessary. 
    $dbConnection = parse_ini_file("Final.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $user, $password);

    $keyWordError= "";
    $bookSelectError = "";
    $validCopies = false;
    
    //Add your code here to process Search or Add to Cart button clicks as required. 


    
    include "./Common/PageHeader.php";
?>

    <form action="BookCatalog.php" method="post">
        <p>Enter a keyword e.g. programming, to search for titles containing the key word</p>
       
        <input type='text' name='txtKey' />
        &nbsp;<input type="submit" name="btnSearch" value="Search"/>
        <p class="error"><?php echo $keyWordError; ?></p>   
       
     <?php
        $numRow = 0;   
        
        //Enter your code here to show search results for the user to enter 
        //the number of copies to put into the shopping cart as required.
     
     ?>
        <br/>
       
    </form>
<?php include "./Common/PageFooter.php"; ?>