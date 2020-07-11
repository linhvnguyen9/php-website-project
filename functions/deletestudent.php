<?php
session_start();
require '../database.php';

$id = htmlspecialchars($_GET["id"]);

$stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
$stmt->bind_param("d", $id);
$stmt->execute();

header("location: ../studentlist.php");