<?php
session_start();
include "database.php";

$userName = $_POST["username"];
$fullName = $_POST["fullName"];
$dob = $_POST["dob"];
$address = $_POST["address"];
$idCard = $_POST["idCard"];
$phoneNumber = $_POST["phoneNumber"];
$course = $_POST["course"];
$year = $_POST["year"];
$classId = $_SESSION["classId"];

$stmt = $conn->prepare("INSERT INTO user VALUES (null, ?, '1', ?, ?, ?, ?, ?, ?, ?, 1, ?)");
$stmt->bind_param("sssssssss", $userName, $fullName, date("Y-m-d", strtotime($dob)), $address, $idCard, $phoneNumber, $course, $year, $classId);
$stmt->execute();

header("location: ../studentlist.php");
