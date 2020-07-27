<?php
session_start();
require 'database.php';

$newAddress = $_POST["address"];
$newPhoneNumber = $_POST["phoneNumber"];

$userId = $_SESSION['userId'];

echo $newAddress . "<br>";
echo $newPhoneNumber . "<br>";

$stmt = $conn->prepare("UPDATE user SET diaChi = ?, sdt = ? WHERE id = ?");
$stmt->bind_param("ssi", $newAddress, $newPhoneNumber, $userId);
$stmt->execute();

header('location: ../profile.php');