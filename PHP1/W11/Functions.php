<?php
include_once 'EntityClassLib.php';

function getPDO()
{
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    return new PDO($dsn, $scriptUser, $scriptPassword);  
}

function getUserByIdAndPassword($studentId, $password)
{
     $pdo = getPDO();
    
    $sql = "SELECT StudentId, Name, Phone FROM Student WHERE StudentId = :userId AND Password = :password";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $studentId, 'password' => $password]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row)
    {
        return new User($row['StudentId'], $row['Name'], $row['Phone'] );
    }
    return null;
}


function addNewUser($userId, $name, $phone, $password)
{
    $pdo = getPDO();
   
    $sql = "INSERT INTO Student VALUES( :studentId, :name, :phone, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['studentId' => $userId, 'name' => $name, 'phone' => $phone, 'password' => $password]);
}

function getAllCourses()
{
    $pdo = getPDO();
    
    $sql = "SELECT CourseCode, Title FROM Course";
        
    $resultSet = $pdo->query($sql);
    
    $courses = array();
    
    foreach($resultSet as $row)
    {
        $courses[] = $row["CourseCode"] . ' - ' .  $row["Title"];
    }
    return $courses;
}

