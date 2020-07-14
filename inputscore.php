<?php
include 'header.php';
$page = 'subject';
require 'functions/database.php';
$studentId = $_GET['studentId'];
$stmt = $conn->prepare("SELECT username, hoTen FROM user WHERE id=$studentId");
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'nav.php' ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <form action="functions/savescore.php" method="post">
                <input readonly type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="studentId"
                       value="<?php echo $_GET['studentId'] ?>"
                >
                <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="subjectId"
                       value="<?php echo $_GET['subjectId'] ?>"
                >
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã sinh viên</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="username"
                           value="<?php echo $row['username'] ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="fullName"
                           disabled="disabled"
                           value="<?php echo $row['hoTen'] ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Học kỳ</label>
                    <input readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="semester"
                           value="<?php echo $_GET['semester'] ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Điểm CC</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="diemCC"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Điểm TH</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="diemTH"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Điểm KT</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="diemKT"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Điểm BTL</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="diemBTL"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Điểm thi</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="diemThi"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </main>
    </div>
</div>