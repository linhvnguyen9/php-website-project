<?php
session_start();
?>
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
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Quản lý sinh viên</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    Quản lý sinh viên
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Đăng xuất</a>
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
                            <span data-feather="bar-chart-2"></span>
                            Điểm thi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentlist.php">
                            <span data-feather="users"></span>
                            Danh sách lớp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <span data-feather="layers"></span>
                            Thông tin cá nhân
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

            <h2>Lịch sử điểm thi</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Môn học</th>
                        <th>Số tín chỉ</th>
                        <th>Học kỳ</th>
                        <th>Chuyên cần</th>
                        <th>Thực hành</th>
                        <th>Kiểm tra</th>
                        <th>Bài tập</th>
                        <th>Thi</th>
                        <th>Điểm môn (Hệ 10)</th>
                        <th>Điểm môn (chữ)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'database.php';
                    $userId = $_SESSION["userId"];
                    $stmt = $conn->prepare("SELECT * FROM diem,monhoc WHERE diem.monhocid=monhoc.id AND `Sinh viênid`=?");
                    $stmt->bind_param("s", $userId);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    $totalCredit = 0;
                    $totalScore = 0;

                    while ($row = $res->fetch_assoc()) {
                        $attendanceWeight = $row['trongSoCC'];
                        $labWeight = $row['trongSoTH'];
                        $midtermWeight = $row['trongSoKT'];
                        $projectWeight = $row['trongSoBTL'];
                        $testWeight = $row['trongSoThi'];

                        $attendanceScore = $row['diemCC'];
                        $labScore = $row['diemTH'];
                        $midtermScore = $row['diemKT'];
                        $projectScore = $row['diemBTL'];
                        $testScore = $row['diemThi'];

                        $credit = $row['soTinChi'];

                        $avgScore = calculateAvgScore($attendanceScore, $attendanceWeight, $labScore, $labWeight, $midtermScore, $midtermWeight, $projectScore, $projectWeight, $testScore, $testWeight);

                        $totalCredit += $credit;
                        $totalScore += calculateScore4($avgScore)*$credit;

                        echo "<tr>";
                        echo "<td><b>"  . $row['tenMonHoc'] . "</b></td>";
                        echo "<td>" . $credit . "</td>";
                        echo "<td>" . $row['hocKy'] . "</td>";
                        echo "<td>" . $row['diemCC'] . "</td>";
                        echo "<td>" . $row['diemTH'] . "</td>";
                        echo "<td>" . $row['diemKT'] . "</td>";
                        echo "<td>" . $row['diemBTL'] . "</td>";
                        echo "<td>" . $row['diemThi'] . "</td>";
                        echo "<td>" . $avgScore . "</td>";
                        echo "<td>" . calculateTextScore($avgScore) . "</td>";
                    }

                    function calculateAvgScore($attendanceScore, $attendanceWeight, $labScore, $labWeight, $midtermScore, $midtermWeight, $projectScore, $projectWeight, $testScore, $testWeight)
                    {
                        return $attendanceScore * $attendanceWeight + $labScore * $labWeight + $midtermScore * $midtermWeight + $projectScore * $projectWeight + $testScore * $testWeight;
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

                    function calculateScore4($score10)
                    {
                        $textScore = calculateTextScore($score10);

                        switch ($textScore) {
                            case "F":
                                return 0;
                            case "D":
                                return 1;
                            case "D+":
                                return 1.5;
                            case "C":
                                return 2;
                            case "C+":
                                return 2.5;
                            case "B":
                                return 3;
                            case "B+":
                                return 3.5;
                            case "A":
                                return 3.7;
                            case "A+":
                                return 4;
                            default:
                                return 0;
                        }
                    }

                    function calculateRank($gpa) {
                        if ($gpa < 1) {
                            return "Kém";
                        } else if ($gpa < 1.99) {
                            return "Yếu";
                        } else if ($gpa < 2.49) {
                            return "Trung bình";
                        } else if ($gpa < 3.19) {
                            return "Khá";
                        } else if ($gpa < 3.59) {
                            return 'Giỏi';
                        } else if ($gpa <= 4) {
                            return "Xuất sắc";
                        }
                        return "";
                    }

                    ?>
                    </tbody>
                </table>

                <p>Tổng số tín chỉ: <?php echo $totalCredit ?></p>
                <p>Điểm trung bình tích lũy: <?php echo $totalScore/$totalCredit ?></p>
                <p>Xếp loại: <?php echo calculateRank($totalScore/$totalCredit) ?></p>
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