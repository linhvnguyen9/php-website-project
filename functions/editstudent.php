<?php
require 'database.php';

$fullName = $_POST['fullName'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$idCard = $_POST['idCard'];
$phoneNumber = $_POST['phoneNumber'];
$course = $_POST['course'];
$year = $_POST['year'];

$id = htmlspecialchars($_GET["id"]);

$stmt = $conn->prepare("UPDATE user SET hoTen=?, dob=?, diaChi=?, cmt=?, sdt=?, khoa=?, nienKhoa=? WHERE id=?");
$date = date("Y-m-d", strtotime($dob));
$stmt->bind_param("sssssssi", $fullName, $date, $address, $idCard, $phoneNumber, $course, $year, $id);
$stmt->execute();

header("location: ../studentlist.php");
