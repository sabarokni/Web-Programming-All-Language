<html>
<head>
	<title>Do While Example</title>
</head>

<body>
	<?php

		$i = 900;
		do
		{
			echo "\$i = ".$i . "<br>";

			$i = $i * ($i + 1) *($i - 1);
		} while ($i <= 876 )

	?>

</body>
</html>
