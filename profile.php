<?php
session_start();
require 'database.php';

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
                        <a class="nav-link" href="main.php">
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
                        <a class="nav-link active" href="#">
                            <span data-feather="layers"></span>
                            Thông tin cá nhân <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Thông tin cá nhân</h1>
            </div>
            <form action="updateinfo.php" method="post">
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
            <form action="changepassword.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="confirmedPassword">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="newPassword">
                </div>
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </form>
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