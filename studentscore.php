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

        function calculateRank($gpa)
        {
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
    <p>Điểm trung bình tích lũy: <?php echo $totalScore / $totalCredit ?></p>
    <p>Xếp loại: <?php echo calculateRank($totalScore / $totalCredit) ?></p>
</div>
