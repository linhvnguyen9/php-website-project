<?php
$page = 'main';
include 'header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'nav.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php if ($_SESSION['role'] == 1) {
                    include 'studentscore.php';
                } else {
                    include 'managescore.php';
                } ?>
            </main>
        </div>
    </div>
<?php include 'footer.php' ?>