<?php
    // start session
    session_start();
    include("./Lab5Commons/Header.php");
    include_once 'Functions.php';
    include_once 'EntityClassLib.php';

    $msgError = "";

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if (!isset($_SESSION["user"]) && empty($_SESSION["user"])) {
        header("location: LogIn.php");
        exit();
    } 
    else {
        $id = $_SESSION['user'];
    // get  name of user with function by Id
        $name_user = getNameByUserID($id);
    //check courses for checkboxes
        $checkCourse = $_POST['checkCourse'];


        //Connection to dbo
        $dbConnection = parse_ini_file("DBConnection.ini");
        extract($dbConnection);
        $myPdo = new PDO($dsn, $scriptUser, $scriptPassword);



        $sql = "SELECT * FROM Semester ";
        $getSems = $myPdo->prepare($sql);
        $getSems->execute();


        foreach ($getSems as $sem) {
            $Ssemester = array($sem['SemesterCode'], $sem['Year'], $sem['Term']);
            $semArray[] = $Ssemester;
        }

        $_SESSION['SEMESTERSARRAY'] = $semArray;

        if($_SERVER['REQUEST_METHOD']!='POST'){
            $_POST['semester_list'] = $semArray[0][0];
        }
        
        $sql = "SELECT Course.CourseCode CourseCode, Title, WeeklyHours "
                . " FROM Course INNER JOIN Registration "
                . " ON Course.CourseCode = Registration.CourseCode "
                . " INNER JOIN semester ON registration.SemesterCode = semester.SemesterCode "
                . " WHERE Registration.StudentID = :studendId AND semester.SemesterCode = :semesterCode ";
        $Stmt = $myPdo->prepare($sql);
        $Stmt->execute(array(':studendId' => $_SESSION['user'], ':semesterCode' => $_POST['semester_list']));
        $result = $Stmt->fetchAll();


        $totalRegisteredHours = 0;
        foreach ($result as $row) {
            $totalRegisteredHours = $totalRegisteredHours + $row[2];
        }
        $_SESSION['totalRegisteredHours'] = $totalRegisteredHours;
    //sessions  total  hours  registered for users


        if (isset($_POST['submit_selection'])) {
            if (isset($_POST['selectedCourse'])) {
                foreach ($_POST['selectedCourse'] as $row) {
                    $sql = "SELECT WeeklyHours FROM Course WHERE CourseCode = :courseCode";
                    $Stmt = $myPdo->prepare($sql);
                    $Stmt->execute([':courseCode' => $row]);
                    $course_Hour = $Stmt->fetch();
                    $totalRegisteredHours = $totalRegisteredHours + $course_Hour[0];
    //total of hours user is  registered
                }

                if ($totalRegisteredHours <= 16) {
                    foreach ($_POST['selectedCourse'] as $row) {
                        $sql = "INSERT INTO registration VALUES (:StudentID, :CourseCode, :SemesterCode)";
                        $pStmt = $myPdo->prepare($sql);
                        $pStmt->execute(array(':StudentID' => $_SESSION['user'], ':CourseCode' => $row, ':SemesterCode' => $_POST['semester_list']));
                        $pStmt->commit;
                    }
                    $_SESSION['totalRegisteredHours'] = $totalRegisteredHours;
                } else {
                    //exceed over 16 hours show error message
                    $msgError = "Your selection exceeds the maximum weekly hours(16 Hours)!";
                }
            } else {
                $msgError = "You need to select at least one course!!";
            }
        }

        
?>
<html>
    <head>
        <title>Online Course Registration</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <form method='post' action=CourseSelection.php>  
        <body>
            <h1 class="text-center"><b>Course Selection</b></h1>
            <p>Welcome <strong><?php echo $name_user ?></strong> (not you? change user <a href="Login.php">here</a>)</p>
            <p>You have registered <strong><?php echo $_SESSION['totalRegisteredHours'] ?></strong> hours of course(s) for the semester</p>
            <p>You can register <strong><?php echo(16 - $_SESSION['totalRegisteredHours']) ?></strong> more hours of course(s) for the semester</p>
            <p>Please note that the courses you have registered will not be displayed in the list</p>
            <p style="color: red"><?php echo $msgError ?></p>
            <br/>
            <div class="dropdown text-right">
                <select name="semester_list"  onchange="this.form.submit()" style="width:175px ;margin-right:30px; order-radius: 10px;height: 30px;position: right;">
    <?php
    $semArray = $_SESSION['SEMESTERSARRAY'];

    foreach ($semArray as $row) {
        echo "<option  value='".$row[0]."'";
        if ($row[0] == $_POST['semester_list']) {
            echo "selected='selected'";
        }
        echo '>' . $row[1] . " " . $row[2] . '</option>';
    }
    ?>
        </select> 
    </div> 
    <div id="tableContainer"> 
        <table border="1" class="table" id="table1">
            <thead class="thead-light">
                <tr>
                    <th scope="col" >Code</th>
                    <th scope="col"> Course Title</th>
                    <th scope="col">Hours</th>
                    <th  scope="col">Select</th>
                </tr>
            </thead>
            <tbody>
    <?php
    if (isset($_POST['semester_list']) && $_POST['semester_list'] != "") 
    {
        $chosenSemester = $_POST['semester_list'];
        $chosenSemester1 = getCourseBySemeterCode($chosenSemester);
        
        foreach ($chosenSemester1 as $cs) 
        {
            $sql = "SELECT CourseCode "
                    . "FROM Registration "
                    . "WHERE StudentId = :studentId AND CourseCode = :courseCode";
            $Stmt = $myPdo->prepare($sql);
            $Stmt->execute([':studentId' => $_SESSION['user'], ':courseCode' => $cs[0]]);
            $courseAlreadySelected = $Stmt->fetch();

            

                if ($courseAlreadySelected[0] != $cs[0]) 
                {
                    echo "<tr>";
                    echo "<td scope='col'>" . $cs[0] . "</td>";
                    echo "<td scope='col'>" . $cs[1] . "</td>";
                    echo "<td scope='col'>" . $cs[2] . "</td>";
                    echo "<td scope='col'><input type='checkbox' name='selectedCourse[]' value='$cs[0]' /></td>";
                    echo "</tr>";
                }
            }
        }
    }
    ?>
            </tbody>  
          </table> 
            <div class="form-group">
                <input type='submit'  class="btn btn-primary"   name='submit_selection' value='submit'/>   
                <input type='reset'  class="btn btn-primary"   name='btnClear' value='clear'/>
            </div>
        </div>
        <br/> 
        </form>
    </body>
</html>
<?php
//Footer
include('./Lab5Commons/Footer.php');
    