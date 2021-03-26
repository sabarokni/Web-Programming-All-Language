<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <title>Array manipulation</title>
   </head>
   <body>
      <?php
         // create array first
         print( "<strong>Creating the first array</strong><br />" );
         $first[ 0 ] = "zero";
         $first[ 1 ] = "one";
         $first[ 2 ] = "two";
         $first[] = "three";  
 
         // print each element’s index and value
         for ( $i = 0; $i < count( $first ); $i++ ) 
            print( "Element $i is $first[$i] <br />" );
   
         print( "<br /><strong>Creating the second array
            </strong><br />" );

         // call function array to create array second 
         $second = array( "zero", "one", "two", "three" );

         for ( $i = 0; $i < count( $second ); $i++ ) 
            print( "Element $i is $second[$i] <br />" );
   
         print( "<br /><strong>Creating the third array
            </strong><br />" );

         // assign values to entries using nonnumeric indices 
         $third[ "John" ] = 21;
         $third[ "Bob" ] = 18;
         $third[ "Carol" ] = 23;

         // iterate through the array elements and print each 
         // element’s name and value
         while( list($name, $age) = each($third))        
            print( "$name is $age old.<br />" );
   
         print( "<br /><strong>Creating the fourth array
            </strong><br />" );

         // call function array to create array fourth using
         // string indices
         $fourth = array(  
            "January"   => "first",   "February" => "second",
            "March"     => "third",   "April"    => "fourth",
            "May"       => "fifth",   "June"     => "sixth",
            "July"      => "seventh", "August"   => "eighth",
            "September" => "ninth",   "October"  => "tenth",
            "November"  => "eleventh","December" => "twelfth"
            );

         // print each element’s name and value
         foreach ( $fourth as $element => $value )
            print( "$element is the $value month <br />" );
      ?>
   </body>
</html>
