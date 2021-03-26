<?php include("./common/header.php"); ?>

	<h2>Welcome to Wei Gong's Build-Your-Dream-PC Store </h2>
	<p>To start, please login with your name and password</p>
	
	<form action="Step1SelectCPU.php" method="POST">
		<label>Name:</label><input type="text" name="name" class="input"/><br/>
		<input type="reset" value="Clear" class="button"/>&nbsp;&nbsp;
		<input type="submit" value="Login" class="button" />
	</form>

<?php include('./common/footer.php'); ?>