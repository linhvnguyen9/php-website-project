<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
}
require 'database.php';

$username = $_POST['username'];
$diemCC = $_POST['diemCC'];
$diemTH = $_POST['diemTH'];
$diemKT = $_POST['diemKT'];
$diemBTL = $_POST['diemBTL'];
$diemThi = $_POST['diemThi'];
$semester = htmlspecialchars_decode($_POST['semester']);
$studentId = $_POST['studentId'];
$subjectId = $_POST['subjectId'];

$stmt = $conn->prepare("INSERT INTO diem VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("siiiiiii", $semester, $diemCC, $diemTH, $diemKT, $diemBTL, $diemThi, $studentId, $subjectId);
$stmt->execute();

header('location: ../subject.php');

