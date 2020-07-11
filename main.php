<?php
$page = 'main';
include 'header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'nav.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Điểm thi</h1>
                </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

                <?php if ($_SESSION['role'] == 1) {
                    include 'studentscore.php';
                } else {
                    include 'managescore.php';
                } ?>
            </main>
        </div>
    </div>
<?php include 'footer.php' ?>