<?php require "class/User.php";
session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/3/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Điểm thi <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers"></span>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Điểm thi</h1>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

            <h2>Chi tiết điểm thi</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Môn học</th>
                        <th>Học kỳ</th>
                        <th>Chuyên cần</th>
                        <th>Thực hành</th>
                        <th>Thi</th>
                        <th>Điểm môn (Hệ 10)</th>
                        <th>Điểm môn (chữ)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'database.php';
                    $stmt = $conn->prepare("SELECT * FROM diem,monhoc WHERE diem.monhocid=monhoc.id");
                    $stmt->execute();
                    $res = $stmt->get_result();
                    // $row = $res->fetch_assoc();

                    while ($row = $res->fetch_assoc()) {
                        echo $_SESSION["user"] as User;
                        $weight = $row['trongSo'];
                        $weightArr = explode("_", $weight);
                        $attendanceWeight = $weightArr[0] / 100;
                        $practiceWeight = $weightArr[1] / 100;
                        $testWeight = $weightArr[2] / 100;
                        $diemCC = $row['diemCC'];
                        $diemTH = $row['diemTH'];
                        $diemThi = $row['diemThi'];
                        $avgScore = $diemCC * $attendanceWeight + $diemTH * $practiceWeight + $diemThi * $testWeight;
                        echo "<tr>";
                        echo "<td>" . $row['tenMonHoc'] . "</td>";
                        echo "<td>" . $row['hocKy'] . "</td>";
                        echo "<td>" . $row['diemCC'] . "</td>";
                        echo "<td>" . $row['diemTH'] . "</td>";
                        echo "<td>" . $row['diemThi'] . "</td>";
                        echo "<td>" . $avgScore . "</td>";
                        echo "<td>" . calculateTextScore($avgScore) . "</td>";
                    }

                    function calculateTextScore($avgScore)
                    {
                        if ($avgScore < 4) {
                            return "F";
                        } else if ($avgScore < 4.9) {
                            return "D";
                        } else if ($avgScore < 5.4) {
                            return "D+";
                        } else if ($avgScore < 6.4) {
                            return "C";
                        } else if ($avgScore < 6.9) {
                            return "C+";
                        } else if ($avgScore < 7.9) {
                            return "B";
                        } else if ($avgScore < 8.4) {
                            return "B+";
                        } else if ($avgScore < 8.9) {
                            return "A";
                        } else {
                            return "A+";
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="dashboard.js"></script>
</body>

</html>