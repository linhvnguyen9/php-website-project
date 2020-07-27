<?php
$page = 'subject';
include 'header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'nav.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Danh sách môn học</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Trọng số chuyên cần</th>
                            <th>Trọng số thực hành</th>
                            <th>Trọng số kiểm tra</th>
                            <th>Trọng số BTL</th>
                            <th>Trọng số Thi</th>
                            <th>Số tín chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require 'functions/database.php';

                        $stmt = $conn->prepare("SELECT * FROM monhoc");
                        $stmt->execute();
                        $res = $stmt->get_result();

                        while ($row = $res->fetch_assoc()) {
                            $name = $row['tenMonHoc'];
                            $attendanceWeight = $row['trongSoCC'];
                            $labWeight = $row['trongSoTH'];
                            $midtermWeight = $row['trongSoKT'];
                            $projectWeight = $row['trongSoBTL'];
                            $testWeight = $row['trongSoThi'];
                            $credit = $row['soTinChi'];

                            echo "<tr>";
                            echo "<td><b>" . $row['tenMonHoc'] . "</b></td>";
                            echo "<td>" . $attendanceWeight . "</td>";
                            echo "<td>" . $labWeight . "</td>";
                            echo "<td>" . $midtermWeight . "</td>";
                            echo "<td>" . $projectWeight . "</td>";
                            echo "<td>" . $testWeight . "</td>";
                            echo "<td>" . $credit . "</td>";
                            echo "<td><a class='badge badge-primary' href='inputscoresemester.php?id=" . $row['id'] . "'>Nhập điểm</a></td>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
<?php include 'footer.php' ?>