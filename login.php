<?php
session_start();
require 'database.php';
$stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
$username = $_POST["maSV"];
$password = $_POST["password"];
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if ($row == null) {
    echo "Invalid username or password";
} else {
    $userId = $row['id'];
    $username = $row['username'];
    $fullName = $row['hoTen'];
    $role =  $row['role'];
    $classId = $row['LopmaLop'];

    $_SESSION["userId"] = $userId;
    $_SESSION["username"] = $username;
    $_SESSION["fullName"] = $fullName;
    $_SESSION["role"] = $role;
    $_SESSION["classId"] = $classId;

    header("Location:main.php");
}
