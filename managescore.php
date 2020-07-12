<h2>Bảng điểm lớp</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Họ tên</th>
            <th>Mã SV</th>
            <th>Môn học</th>
            <th>Học kỳ</th>
            <th>Chuyên cần</th>
            <th>Thực hành</th>
            <th>Kiểm tra</th>
            <th>Bài tập</th>
            <th>Thi</th>
            <th>Điểm môn (Hệ 10)</th>
            <th>Điểm môn (chữ)</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'functions/database.php';
        include 'functions/calculatescore.php';

        $classId = $_SESSION["classId"];
        $stmt = $conn->prepare("SELECT * FROM diem,monhoc,user WHERE diem.monhocid=monhoc.id AND `Sinh viênid`=user.id AND LopmaLop=?");
        $stmt->bind_param("i", $classId);
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
            $totalScore += calculateScore4($avgScore) * $credit;

            echo "<tr>";
            echo "<td><b>" . $row['hoTen'] . "</b></td>";
            echo "<td><b>" . $row['username'] . "</b></td>";
            echo "<td><b>" . $row['tenMonHoc'] . "</b></td>";
            echo "<td>" . $row['hocKy'] . "</td>";
            echo "<td>" . $row['diemCC'] . "</td>";
            echo "<td>" . $row['diemTH'] . "</td>";
            echo "<td>" . $row['diemKT'] . "</td>";
            echo "<td>" . $row['diemBTL'] . "</td>";
            echo "<td>" . $row['diemThi'] . "</td>";
            echo "<td>" . $avgScore . "</td>";
            echo "<td>" . calculateTextScore($avgScore) . "</td>";
            echo "<td><a class='badge badge-primary' href='editstudent.php?id=" . $row['id'] . "'>Sửa</a></td>";
        }
        ?>
        </tbody>
    </table>
</div>