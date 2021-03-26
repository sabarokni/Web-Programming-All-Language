<?php 
		session_start(); 	// retrieve PHP session!
		if (!isset($_SESSION["name"]))
		{
			header("Location: Welcome.php");
			exit();
		}
?>
<?php include("./common/header.php"); ?>
	
	<h3>Thank you <span class="distinct"><?php echo $_SESSION["name"] ?></span>, for building your dream PC with us!</h3>
	
	<?php session_destroy();?>
	
<?php include('./common/footer.php'); ?>