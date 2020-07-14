<?php
include 'header.php';
require 'functions/database.php';
$page = 'subject';

$semester = $_POST['semester'];
$subjectId = $_GET['id'];

$stmt = $conn->prepare("SELECT DISTINCT hoTen, username, user.id
FROM diem,
     monhoc,
     user
WHERE diem.MonHocid = ?
  AND role = 1
  AND LopmaLop = ?
  AND user.id NOT IN (SELECT `Sinh viênid` FROM diem WHERE hocKy = ? AND MonHocid = ? AND LopmaLop = ?)");
$stmt->bind_param("iisii", $subjectId, $_SESSION['classId'], $semester, $subjectId, $_SESSION['classId']);
$stmt->execute();
$res = $stmt->get_result();
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'nav.php' ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Mã SV</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require 'functions/database.php';

                    while ($row = $res->fetch_assoc()) {
                        $fullName = $row['hoTen'];
                        $maSV = $row['username'];
                        $studentId = $row['id'];

                        $query = array(
                            'subjectId' => $subjectId,
                            'semester' => $semester,
                            'studentId' => $studentId
                        );

                        echo "<tr>";
                        echo "<td>" . $fullName . "</td>";
                        echo "<td>" . $maSV . "</td>";
                        echo "<td><a class='badge badge-primary' href='inputscore.php?" . http_build_query($query) . "'>Nhập điểm</a></td>";
                    }
                    ?>
        </main>
    </div>
</div>