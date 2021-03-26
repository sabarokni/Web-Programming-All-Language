<?php error_reporting(E_ALL); ?>
<html>
<head> 
	<title>Substring</title> 
</head>
<body>

<?php
$date = "12/25/2002";
$month = substr($date, 0, 2);
$day = substr($date, 3, 2);
print "Month=$month <br>";
print "Day=$day<br>";

$year = substr($date, 6);
print "Year=$year<br>";
?>

</body>
</html>