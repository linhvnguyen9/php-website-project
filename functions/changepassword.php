<?php
session_start();
require 'database.php';

$confirmedPassword = $_POST["confirmedPassword"];
$newPassword = $_POST["newPassword"];

$userId = $_SESSION['userId'];
$stmt = $conn->prepare("SELECT password FROM user WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
$oldPassword = $row['password'];

if ($oldPassword == $confirmedPassword) {
    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $newPassword, $userId);
    $stmt->execute();

    header('location: ../profile.php');
} else {
    echo "Old password does not match!";
}
