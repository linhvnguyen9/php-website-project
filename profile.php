<?php
$page = "profile";
include 'header.php' ?>

<?php
require 'functions/database.php';
$userId = $_SESSION['userId'];

$stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("s", $userId);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

$fullName = $row['hoTen'];
$dob = $row['dob'];
$address = $row['diaChi'];
$idCard = $row['cmt'];
$phoneNumber = $row['sdt'];
$course = $row['khoa'];
?>

    <div class="container-fluid">
        <div class="row">
            <?php include 'nav.php'?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Thông tin cá nhân</h1>
                </div>
                <form action="functions/updateinfo.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ tên</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               disabled="disabled" value="<?php echo $fullName ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ngày sinh</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" disabled="disabled"
                               value="<?php echo $dob ?>">
                    </div>
                    <div class=" form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                               name="address" value="<?php echo $address ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số CMT</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" disabled="disabled"
                               value="<?php echo $idCard ?>">
                    </div>
                    <div class=" form-group">
                        <label for="exampleInputPassword1">SĐT</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                               name="phoneNumber" value="<?php echo $phoneNumber ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Khoa</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" disabled="disabled"
                               value="<?php echo $course ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 mt-5">Đổi mật khẩu</h1>
                </div>
                <form action="functions/changepassword.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="confirmedPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="newPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                </form>
        </div>
    </div>
<?php include "footer.php"; ?>