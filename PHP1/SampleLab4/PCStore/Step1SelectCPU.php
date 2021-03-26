<?php 
	session_start(); 	// start PHP session! 
?>
<?php
	if(isset($_POST["name"]))
	{
		$_SESSION["name"] = $_POST["name"];	
	}
	elseif(!isset($_SESSION["name"]))
	{
		header("Location: Welcome.html");
		exit( );
	}
	
	$i3check = " ";
	$i5check = " ";
	$i7check = " ";
	if(isset($_SESSION["cpu"]))
	{
		if($_SESSION["cpu"] === "Core i3 E300")
		{
			$i3check = "checked";
		}
		elseif($_SESSION["cpu"] === "Core i5 M500")
		{
			$i5check = "checked";
		}
		elseif($_SESSION["cpu"] === "Core i7 P700")
		{
			$i7check = "checked";
		}
		else
		{
			$i5check = "checked";
		}
	}
	else
	{
		$i5check = "checked";
	}
?>

<?php include("./common/header.php"); ?>

<?php 
	$name = $_SESSION["name"];
	
print <<<EOD
	<h3><span class="distinct">$name</span>, 
		please select the CPU type and click <span class="distinct">Next</span> button to continue</h3>

	<form action="Step2SelectMemory.php" method="POST">
	    <table>
			<tr>
				<th>Core i3 E300:</th><td class="price">$250</td>
				<td><input type="radio" name="cpu" value="Core i3 E300" $i3check /></td>
			</tr>
			<tr>
				<th>Core i5 M500:</th><td class="price">$780</td>
				<td><input type="radio" name="cpu" value="Core i5 M500" $i5check /></td>
			</tr>
			<tr>
				<th>Core i7 P700:</th><td class="price">$1000</td>
				<td><input type="radio" name="cpu" value="Core i7 P700" $i7check /></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			<tr>
			<tr>
				<td colspan="3"><input class="button" type="submit" value="Next >" /></td>
			</tr>
		</table>
	</form>
EOD;
?>

<?php include('./common/footer.php'); ?>