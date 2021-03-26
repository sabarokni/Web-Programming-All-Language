<?php error_reporting(E_ALL); ?>
<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <title>Data type conversion</title>
   </head>
   <body>
      <?php
         // declare a string, double and integer
         $testString = "3.5 dollars";
         $testDouble = 79.2;   
		 $testInteger = 50;
      ?>

      <?php 
         print( "$testString is a(n) " . gettype( $testString ) . "<br />" );
         print( "$testDouble is a(n) " . gettype( $testDouble ) . "<br />" );
		 print( "$testInsteger is a(n) " . gettype( $testInteger ) . "<br />" );
      ?>
      <br />
		Use the data in + operation:<br />
      <?php 
		$result = $testString + $testDouble;
		
		print( "$result is a(n) " . gettype( $result ) . "<br />" );
      
		$result = $testString + $testInteger;
		
		print( "$result is a(n) " . gettype( $result ) . "<br />" );
		
		$result = $testString . $testDouble;
		
		print( "$result is a(n) " . gettype( $result ) . "<br />" );
		
		$result = 5 + is_float($testDouble); 
		
		print( "$result is a(n) " . gettype( $result ) . "<br />" );
		
		$result = 5 + is_string($testDouble); 
		
		print( "$result is a(n) " . gettype( $result ) . "<br />" );
		
		$result = 5 + $undefVar;

		print( "$result is a(n) " . gettype( $result ) . "<br />" );
		
		$result = 5 + null;
		
		print( "$result is a(n) " . gettype( $result ) . "<br />" );
		
		$boolVar = 0;
		print "</br>" . gettype( $boolVar ) . " $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}
		
		$boolVar = 0.0;
		print "</br>" . gettype( $boolVar ) . " $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}

		$boolVar = 1;
		print "</br>" . gettype( $boolVar ) . " $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}
		
		$boolVar = 1.0;
		print "</br>" . gettype( $boolVar ) . " $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}
		
		$boolVar = "ABC";
		print "</br>" . gettype( $boolVar ) . " $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}
		$boolVar = "";
		print "</br>" . gettype( $boolVar ) . " $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}
		
		$boolVar = null;
		print "</br> $boolVar is ";
		if ($boolVar)
		{
			print "true";
		}
		else
		{
			print "false";
		}
		
		print "</br> Undefined variable is ";
		if ($undefValue)
		{
			print "true";
		}
		else
		{
			print "false";
		}

		echo "</br>Undefined variable: $undefVar";
		
		$nullVar = null;
		
		$result = $testString.$nullVar;
		
		echo "<br/>$result";
	  ?>

   </body>
</html>
