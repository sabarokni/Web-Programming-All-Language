<html xmlns = "http://www.w3.org/1999/xhtml">
   <head>
      <title>Access Form Data</title>
      <style type = "text/css">
         body      { font-family: arial, sans-serif }
         div       { font-size: 10pt;
                     text-align: center }
         table     { border: 0 }
         td        { padding-top: 2px;
                     padding-bottom: 2px;
                     padding-left: 10px;
                     padding-right: 10px }  
         .error    { color: red }
         .distinct { color: blue } 
         .name     { background-color: #ffffaa }
         .email    { background-color: #ffffbb }
         .phone    { background-color: #ffffcc }
         .os       { background-color: #ffffdd }
      </style>
   </head>
   <body>
      <?php
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$book = $_POST["book"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$os = $_POST["os"]; 
      ?>
      <p>Hi 
         <span class = "distinct">
            <strong><?php print( "$fname" ); ?></strong>
         </span>.
         Thank you for completing the survey.<br />
         You have been added to the 
         <span class = "distinct">
            <strong><?php print( "$book " ); ?></strong>       
         </span>
         mailing list.
      </p>
      <p><strong>The following information has been saved 
          in our database:</strong></p>
      <table>
         <tr>
            <td class = "name" >Name </td>
            <td class = "email">Email</td>
            <td class = "phone">Phone</td>
            <td class = "os">OS</td>
         </tr>
         <tr>
            <?php
               // print each form field’s value
               print( "<td>$fname $lname</td>
                  <td>$email</td>
                  <td>$phone</td>
                  <td>$os</td>" );
            ?>
         </tr>
      </table>
   </body>
</html>
