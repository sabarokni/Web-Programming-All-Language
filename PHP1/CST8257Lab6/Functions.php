<?php

include_once 'EntityClassLib.php';

// function for checking student id is exist or not 
function checkUserId($studentId) {
    //Construct the SQL statement and prepare it.
// Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);
    $sql = "SELECT StudentId FROM Student WHERE StudentId = :userId";
    $stmt = $pdo->prepare($sql);
    //Bind the provided username to our prepared statement.
    $stmt->execute(['userId' => $studentId]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return new User($row['StudentId'], null, null, null);
    }
    return null;
}

function getUserByIdAndPassword($studentId) {
// Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);

    $sql = "SELECT StudentId, Name, Phone, Password FROM Student WHERE StudentId = :userId";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $studentId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return new User($row['StudentId'], $row['Name'], $row['Phone'], $row['Password']);
    }
    return null;
}

function addNewUser($userId, $name, $phone, $password) {
// Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);

    $sql = "INSERT INTO Student VALUES( :studentId, :name, :phone, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['studentId' => $userId, 'name' => $name, 'phone' => $phone, 'password' => $password]);
}

function getNameByUserID($studentId) {
    //Construct the SQL statement and prepare it.
// Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);
    $sql = "SELECT StudentId, Name, Phone FROM Student WHERE StudentId = :userId ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $studentId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return $row['Name'];
    }
    return null;
}

function getCourseBySemeterCode($semeterID) {
    // Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $myPdo = new PDO($dsn, $scriptUser, $scriptPassword);

    // Query database to get all course codes
    $sql = "SELECT Course.CourseCode Code, Title,  WeeklyHours "
            . "FROM Course INNER JOIN CourseOffer ON Course.CourseCode = CourseOffer.CourseCode "
            . "WHERE CourseOffer.SemesterCode = :semesterCode";
    $Stmt = $myPdo->prepare($sql);
    $Stmt->execute(['semesterCode' => $semeterID]);

    foreach ($Stmt as $row) {
        // Add each record to an array
        $course = array($row['Code'], $row['Title'], $row['WeeklyHours']);
        $courses[] = $course;
    }

    // Return the array of course codes
    return $courses;
}

//get course code from CourseOffer in DB
function courseOffer($semesterCode) {
// Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);
    $sql = "SELECT CourseCode, SemesterCode FROM CourseOffer WHERE SemesterCode= :semsterId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['semsterId' => $semesterCode]);
    $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $semestersreg = array();

    foreach ($resultSet as $row) {
        $semestersreg[] = $row["CourseCode"];
    }
    return $semestersreg;
}

function getAllTerms() {
    // Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);

    $sql = "SELECT SemesterCode, Term,Year FROM Semester";

    $resultSet = $pdo->query($sql);
    //$resultSet->execute();
    //$rows = $resultSet->fetch(PDO::FETCH_ASSOC);
    $semesters = array();

    foreach ($resultSet as $row) {
        $semesters[] = [$row['SemesterCode'], $row["Term"] . '  ' . $row["Year"]];
    }
    return $semesters;
}

function getAllCourses() {
// Database connection
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    $pdo = new PDO($dsn, $scriptUser, $scriptPassword);

    $sql = "SELECT CourseCode, Title FROM Course";

    $resultSet = $pdo->query($sql);

    $courses = array();

    foreach ($resultSet as $row) {
        $courses[] = $row["CourseCode"] . ' - ' . $row["Title"];
    }
    return $courses;
}
