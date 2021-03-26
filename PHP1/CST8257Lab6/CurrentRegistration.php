<?php include("./Lab5Commons/Header.php"); ?>	
<?php
include_once 'Functions.php';
include_once 'EntityClassLib.php';
    session_start();   
    $msgError = "";
    $selectedCourse = array();
    $id = $_SESSION["user"];
// get  name of user with function by Id
    $name_user = getNameByUserID($id);
      
    
    if (!isset($_SESSION["user"]) && empty($_SESSION["user"]))
    {
        header('Location: Login.php');
        exit;
    }
  
    //Connection to dbo
    $dbConnection = parse_ini_file("DBConnection.ini");        	
    extract($dbConnection);
    $myPdo = new PDO($dsn, $scriptUser, $scriptPassword);
    
    if(isset($_POST['submit']))
    {  
        if (isset($_POST['selectedCourse']))
        { 
            foreach ($_POST['selectedCourse'] as $row) 
            {
                $sql = "DELETE FROM Registration WHERE Registration.CourseCode = :courseCode ";  
                $Stmt = $myPdo->prepare($sql);
                $Stmt->execute(array(':courseCode' => $row));
                $Stmt->commit;      
            }
        }
        else 
        {
            $msgError = "You must select at least one checkbox!";
        }                
    }
?>

    <form method='post' action=CurrentRegistration.php>   
    <br><br><h1 class="text-center">Current Registrations</h1>    
    <br><br><h4>Welcome <b><?php print $name_user;?></b>! (Not you? Change your session <a href="Login.php">here</a>). The following are your current registrations:</h4>
  
    <div class='col-lg-4' style='color:red'> <?php print $msgError;?></div><br>
    <br><br><table class="table">
        <thead>
            <tr>
                <th scope="col">Year</th>
                <th scope="col">Term</th>
                <th scope="col">Course Code</th>
                <th scope="col">Course Title</th>
                <th scope="col"></th>
                <th scope="col">Hours</th>
                <th scope="col">Select</th>                                                                                
            </tr>
        </thead> 
        <tbody>

            <?php
            $sql = "SELECT semester.Year, semester.Term, Course.CourseCode, course.Title, course.WeeklyHours "
                . "FROM Course INNER JOIN Registration ON Course.CourseCode = Registration.CourseCode " 
                . "INNER JOIN courseoffer ON courseoffer.CourseCode = Registration.CourseCode "
                . "INNER JOIN semester ON (courseoffer.SemesterCode = semester.SemesterCode AND semester.SemesterCode = registration.SemesterCode) "
                . "WHERE Registration.StudentID = :studendId "
                . "ORDER BY semester.Year ASC, semester.Term" ;  
            $Stmt = $myPdo->prepare($sql);
            $Stmt->execute ([':studendId' => $_SESSION["user"]]);
            $coursesRegistered = $Stmt->fetchAll();
            $thisTerm = "";
            $thisYear = "";

            foreach ($coursesRegistered as $row)
            {
                if ($thisYear == null)
                {
                    $thisYear = $row[0];
                    $totalHours = 0;
                }  

                if ($thisTerm == null)
                {
                    $thisTerm = $row[1];                       
                    $totalHours = 0;
                }  

                if ( $thisYear != $row[0] ||  $thisTerm != $row[1]) 
                { 
                        echo "<tr>";
                        echo "<td scope='col'></td>"; 
                        echo "<td scope='col'></td>"; 
                        echo "<td scope='col'></td>"; 
                        echo "<td scope='col'></td>";
                        echo "<th scope='col'>Total Weekly Hours :</th>";
                        echo "<td scope='col'><b>".$totalHours."</b></td>";
                        echo "<td></td>"; 
                        echo "</tr>";
                        $totalHours = 0;
                        $thisYear = $row[0];                             
                        $thisTerm = $row[1];                         

                }     
                echo "<tr>";
                echo "<td scope='col'>".$row[0]."</td>"; 
                echo "<td scope='col'>".$row[1]."</td>"; 
                echo "<td scope='col'>".$row[2]."</td>"; 
                echo "<td scope='col'>".$row[3]."</td>"; 
                echo "<td scope='col'></td>"; 
                echo "<td scope='col'>".$row[4]."</td>"; 
                echo "<td scope='col'><input type='checkbox' name='selectedCourse[]' value='$row[2]' /></td>"; 
                echo "</tr>";  
                $totalHours = $totalHours + $row[4];
            }
            echo "<tr>";
            echo "<td scope='col'></td>"; 
            echo "<td scope='col'></td>"; 
            echo "<td scope='col'></td>"; 
            echo "<td scope='col'></td>"; 
            echo "<th scope='col'>Total Weekly Hours</th>"; 
            echo "<td scope='col'><b>".$totalHours."</b></td>"; 
            echo "<td></td>"; 
            echo "</tr>";
            ?> 
        </tbody>
    </table> 

    <br><br><div class='form-group row'>  
            <div class="col-md-6">
                <button type='submit' name='submit' class='btn btn-primary' onclick='return confirm("The selected registration will be deleted!")'>Delete Selected</button>
                &nbsp; &nbsp;
                <button type='submit' name='clear' class='btn btn-primary'>Clear</button>
            </div>
    </div><br><br>            
    </form>   
   

<?php include('./Lab5Commons/Footer.php'); ?>
