<?php
include 'header.php';
$page = 'subject';
require 'functions/database.php';

$id = htmlspecialchars($_GET["id"]);
$stmt = $conn->prepare("SELECT * FROM user WHERE id= ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

$username = $row['username'];
$fullName = $row['hoTen'];
$dob = $row['dob'];
$address = $row['diaChi'];
$idCard = $row['cmt'];
$phone = $row['sdt'];
$course = $row['khoa'];
$year = $row['nienKhoa'];
?>

<div class="container-fluid">
    <div class="row">
        <?php include 'nav.php' ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <?php echo "<form action=\"inputscore.php?id=" . $id . "\"method=\"post\">"?>
            <div class="form-group">
                <label for="exampleInputEmail1">Mã sinh viên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="username"
                       disabled="disabled"
                       value="<?php echo $username?>"
                >
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           name="fullName"
                           value="<?php echo $fullName?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày sinh</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="dob"
                           value="<?php echo $dob?>"
                    >
                </div>
                <div class=" form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           name="address"
                           value="<?php echo $address?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số CMT</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="idCard"
                           value="<?php echo $idCard?>"
                    >
                </div>
                <div class=" form-group">
                    <label for="exampleInputPassword1">SĐT</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                           name="phoneNumber"
                           value="<?php echo $phone?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Khoa</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="course"
                           value="<?php echo $course?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Niên khóa</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="year"
                           value="<?php echo $year?>"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
        </main>
    </div>
</div>