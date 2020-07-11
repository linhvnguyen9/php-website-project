<?php
$page = 'studentlist';
include 'header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'nav.php' ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Danh sách lớp</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Khoa</th>
                            <th>Niên khóa</th>
                            <?php if ($_SESSION['role'] == 0) echo "<th>Thao tác</th>"; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require 'database.php';
                        $classId = $_SESSION['classId'];
                        $stmt = $conn->prepare("SELECT user.id, hoTen, dob, diaChi, sdt, khoa, nienKhoa FROM lop, user WHERE lop.maLop = user.LopmaLop AND user.LopmaLop = ? AND role = 1");
                        $stmt->bind_param("s", $classId);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        while ($row = $res->fetch_assoc()) {
                            $fullName = $row['hoTen'];
                            $dob = $row['dob'];
                            $address = $row['diaChi'];
                            $phone = $row['sdt'];
                            $course = $row['khoa'];
                            $year = $row['nienKhoa'];

                            echo "<tr>";
                            echo "<td>" . $fullName . "</td>";
                            echo "<td>" . $dob . "</td>";
                            echo "<td>" . $address . "</td>";
                            echo "<td>" . $phone . "</td>";
                            echo "<td>" . $course . "</td>";
                            echo "<td>" . $year . "</td>";
                            if ($_SESSION['role'] == 0) {
                                echo "<td><a class='badge badge-danger' href='deletestudent.php?id=" . $row['id'] . "'>Xóa</a><a class='badge badge-primary' href='editstudent.php?id=" . $row['id'] . "'>Sửa</a></td>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php if ($_SESSION['role'] == 0) {
                        include 'studentmanagement.php';
                    }
                    ?>
            </main>
        </div>
    </div>
<?php include "footer.php"; ?>