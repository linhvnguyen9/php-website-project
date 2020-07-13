<?php
include 'header.php';
$page = 'subject';
require 'functions/database.php';

?>

<div class="container-fluid">
    <div class="row">
        <?php include 'nav.php' ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <?php echo "<form action=\"inputscorestudentlist.php?id=" . $_GET['id'] . "\"method=\"post\">"?>
            <div class="form-group">
                <div class="form-group">
                    <label for="exampleInputEmail1">Học kỳ</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="semester"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Nhập</button>
                </form>
        </main>
    </div>
</div>