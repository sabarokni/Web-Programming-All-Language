<html>
<head>
	<title>Switch Example</title>
</head>

<body>
	<?php

		$i = 2;
		while ($i <= 876 )
		{
			echo "\$i = ".$i . "<br>";

			$i = $i * ($i + 1) *($i - 1);
		}

	?>

</body>
</html>
