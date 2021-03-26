<?php

include_once 'EntityClassLib.php';

function getPDO() {
    $dbConnection = parse_ini_file("DBConnection.ini");
    extract($dbConnection);
    return new PDO($dsn, $scriptUser, $scriptPassword);
}

// function for checking student id is exist or not 
function checkUserId($studentId) {
    //Construct the SQL statement and prepare it.
    $pdo = getPDO();
    $sql = "SELECT StudentId FROM Student WHERE StudentId = :userId";
    $stmt = $pdo->prepare($sql);
        //Bind the provided username to our prepared statement.
    $stmt->execute(['userId' => $studentId]);
     
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User($row['StudentId'],null,null,null);
        }
        return null;
}

function getUserByIdAndPassword($studentId) {
    $pdo = getPDO();

    $sql = "SELECT StudentId, Name, Phone, Password FROM Student WHERE StudentId = :userId";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userId' => $studentId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return new User($row['StudentId'], $row['Name'], $row['Phone'] , $row['Password']);
    }
    return null;
}

function addNewUser($userId, $name, $phone, $password) {
    $pdo = getPDO();

    $sql = "INSERT INTO Student VALUES( :studentId, :name, :phone, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['studentId' => $userId, 'name' => $name, 'phone' => $phone, 'password' => $password]);
}

function getAllCourses() {
    $pdo = getPDO();

    $sql = "SELECT CourseCode, Title FROM Course";

    $resultSet = $pdo->query($sql);

    $courses = array();

    foreach ($resultSet as $row) {
        $courses[] = $row["CourseCode"] . ' - ' . $row["Title"];
    }
    return $courses;
}
