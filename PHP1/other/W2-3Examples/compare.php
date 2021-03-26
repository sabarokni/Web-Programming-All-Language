<?php error_reporting(E_ALL); ?>
<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <title>String Comparison</title>
   </head>
   <body>
      <?php 
         $fruit = "apple";
      
            if ( strcmp( $fruit, "banana" ) < 0 )
			{
               print( "$fruit is less than banana " );
            }
			elseif ( strcmp( $fruit, "banana" ) > 0 ) 
			{	
				print( "$fruit is greater than banana " );
            }
			else
			{
               print( "$fruit is equal to banana " );
			}
            
			if ( $fruit < "apple" )     
            {
				print( "and less than apple! <br />" );
            }
			elseif ( $fruit > "apple" ) 
            {
				print( "and greater than apple! <br />" );
            }
			elseif ( $fruit == "apple" )
			{	
				print( "and equal to apple! <br />" );
			}
      ?>
   </body>
</html>
