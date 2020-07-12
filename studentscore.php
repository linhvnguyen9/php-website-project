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
        require 'functions/database.php';
        include 'functions/calculatescore.php';

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
            $totalScore += calculateScore4($avgScore) * $credit;

            echo "<tr>";
            echo "<td><b>" . $row['tenMonHoc'] . "</b></td>";
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
        ?>
        </tbody>
    </table>

    <p>Tổng số tín chỉ: <?php echo $totalCredit ?></p>
    <p>Điểm trung bình tích lũy: <?php echo $totalScore / $totalCredit ?></p>
    <p>Xếp loại: <?php echo calculateRank($totalScore / $totalCredit) ?></p>
</div>
