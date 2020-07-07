<?php
require 'database.php';
require 'class/User.php';
$stmt = $conn->prepare("SELECT * FROM user WHERE maSV=? AND password=?");
$maSV = $_POST["maSV"];
$password = $_POST["password"];
$stmt->bind_param("ss", $maSV, $password);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if ($row == null) {
    echo "Invalid username or password";
} else {
    $user = new User($row['id'], $row['maSV'], $row['hoTen'], $row['role']);
    $_SESSION["user"] = $user;
    header("Location:main.php");
}
