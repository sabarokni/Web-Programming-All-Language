<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <title>Using Array to Access Form Data</title>
   </head>
   <body>
    <?php
		$language = $_POST["lang"];									//variable $language is an associative array.
		
		echo "<h3>You speak ". count($language). " language(s). </h3>";      //count() is a php function
		echo "They are: <br/>";
		foreach($language as $lang )									//use foreach to iterate through an array
		{
		    echo "$lang<br/>";
		}
		echo "<br/>";
		if (in_array("cn", $language))								//in_arrary() is a php function
		{
		    echo "You even speak Chinese!";
		}

	?>

   </body>
</html>
