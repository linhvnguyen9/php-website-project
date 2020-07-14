<?php
include 'header.php';
require 'functions/database.php';
$page = 'subject';

$semester = $_POST['semester'];
$subjectId = $_GET['id'];

$stmt = $conn->prepare("SELECT ")
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'nav.php' ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        </main>
    </div>
</div>