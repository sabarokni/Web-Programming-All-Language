<?php 
    session_start();	
    include './Common/Functions.php';

    extract($_POST);

    //Connect to DB using the parameters defined in the ini file. 
    //Review the ini file and change the parameter values if necessary. 
    $dbConnection = parse_ini_file("Final.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $user, $password);

	//Enter your code here to process Update button clicks as required.	
	
	include "./Common/PageHeader.php";	
?>	
	<h3><?php echo $name?>Your Shopping Cart</h3>
	<p>To change the number of copies to purchase, enter the new number and click Update button.</p>
	<p>To remove any book from the shopping cart, change the number of copies to 0 and click Update button.</p>
	<form method = 'post' action='ShoppingCart.php'>
            <table border='1'>
                <tr><th>Title</th><th >Price</th><th>Copies</th></tr>
	<?php	
            
            $numRow = 0;   
            $total = 0.0;
            
	    //Enter your code here to display books in the shopping cart as required.	

	 ?>		
            </table>
	<br/>
	<input type='submit' name='btnUpdate' value='Update' class="button"/>
	</form>
<?php include "./Common/PageFooter.php"; ?>