<?php
include_once 'EntityClassLib.php';

function getPDO()
{
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    return new PDO($dsn, $scriptUser, $scriptPassword);  
}
function getUserByIdAndPassword($userId, $password)
{
    $pdo = getPDO();
    
    $sql = "SELECT StudentId, Name, Phone FROM Student WHERE StudentId = '$userId' AND Password = '$password'";
        
    $resultSet = $pdo->query($sql);
    if ($resultSet)
    {
        $row = $resultSet->fetch(PDO::FETCH_ASSOC);
        if ($row)
        {
           return new User($row['UserId'], $row['Name'], $row['Phone'] );            
        }
        else
        {
            return null;
        }
    }
    else
    {
        throw new Exception("Query failed! SQL statement: $sql");
    }
}


function addNewUser($userId, $name, $phone, $password)
{
   $pdo = getPDO();
     
    $sql = "INSERT INTO Student (StudentId, Name, Phone, Password) VALUES( '$userId', '$name', '$phone', '$password')";
    $pdoStmt = $pdo->query($sql);
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

