<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "qlysv";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_errno) {
    // echo "Error";
} else {
    // echo "Connection success";
}
