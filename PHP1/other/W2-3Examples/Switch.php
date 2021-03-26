<html>
<head>
	<title>Switch Example</title>
</head>

<body>
<?php
	$action = "Create";

	switch ($action)
	{
		case "Create":
			echo "Create a new user in database";
			break;
		case "Read":
			echo "Read a user from database";
			break;
		case "Update":
			echo "Update a user in database";
			break;
		case "Delete" :
			echo "Delete a user from database";
			break;
		default:
			echo "Error, unrecognized action: $action";
	}

?>

</body>
</html>
