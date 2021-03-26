<?php 
	session_start(); 				// retrieve PHP session!
	if (!isset($_SESSION["name"]))
	{
		header("Location: Welcome.php");
		exit();
	}
	
	if(isset($_POST["memory"]))
	{
		$_SESSION["memory"] = $_POST["memory"];
	}
	
?>

<?php include("./common/header.php"); ?>

	<h3><span class="distinct"><?php echo $_SESSION["name"] ?></span>, please review your PC configuration</h3>
	<p>If you are happy with your configuration, click <span class="distinct">Finish</span> button.</p>
	<p>To make changes to your selection, click the component.</p> 
	<form name="Selection" method="POST">
		<table>
			<tr><th><a href="Step1SelectCPU.php">CPU</a></th><td><?php echo $_SESSION["cpu"] ?></td></tr>
			<tr><th><a href="Step2SelectMemory.php">Memory</a></th><td><?php echo $_SESSION["memory"] ?> G</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>
					<input class="button" type="submit" value="< Back" onClick="SetFormAction('Step2SelectMemory.php');" /></td>
				<td colspan="3">
					<input class="button" type="submit" value="Finish" onClick="SetFormAction('Step4Finish.php');" /></td>
				</td>
			</tr>
		</table>	
	</form>
	
<?php include('./common/footer.php'); ?>