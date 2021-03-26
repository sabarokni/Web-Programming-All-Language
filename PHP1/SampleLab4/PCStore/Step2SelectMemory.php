<?php 
		session_start(); 				// retrieve PHP session!
		if (!isset($_SESSION["name"]))
		{
			header("Location: Welcome.html");
			exit( );
		}
		if(isset($_POST["cpu"]))
		{
			$_SESSION["cpu"] = $_POST["cpu"];
		}
		
		$m2checked = "";
		$m4checked = "";
		$m8checked = "";	
		if (isset($_SESSION["memory"]))
		{
			if ($_SESSION["memory"] == 2)
			{
				$m2checked = "checked";
			}
			elseif ($_SESSION["memory"] == 4)
			{
				$m4checked = "checked";
			}
			elseif ($_SESSION["memory"] == 8)
			{
				$m8checked = "checked";
			}
			else 
			{
				$m4checked = "checked";
			}
		}
		else 
		{
			$m4checked = "checked";
		}
		
?>

<?php include("./common/header.php"); ?>

	<h3><span class="distinct"><?php echo $_SESSION["name"] ?></span>,
		please select memory size and harddisk size and click <span class="distinct">Next</span> button to continue</h3>

		<form name="Selection" method="POST">
	    <table>
			<tr>
				<th>Memory Size</th><th>Price</th><th>Selection</th>
			</tr>
			<tr>
				<td>2G</td><td class="price">$100</td>
				<td><input type="radio" name="memory" value="2" <?php echo $m2checked ?>/></td>
			</tr>
			<tr>
				<td>4G</th><td class="price">$180</td>
				<td><input type="radio" name="memory" value="4" <?php echo $m4checked ?>/></td>
			</tr>
			<tr>
				<td>8G</th><td class="price">$250</td>
				<td><input type="radio" name="memory" value="8" <?php echo $m8checked ?>/></td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
		
			<tr>
				<td><input class="button" type="submit" value="< Back" onClick="SetFormAction('Step1SelectCPU.php');" /></td>
				<td colspan="3"><input class="button" type="submit" value="Next >" onClick="SetFormAction('Step3Review.php');" /></td>
			</tr>
		</table>
	</form>
	
<?php include('./common/footer.php'); ?>