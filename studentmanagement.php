<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Thêm sinh viên</h1>
    </div>
    <form action="functions/addstudent.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Mã sinh viên</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username"
            >
            <div class="form-group">
                <label for="exampleInputEmail1">Họ tên</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fullName"
                >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ngày sinh</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="dob"
                >
            </div>
            <div class=" form-group">
                <label for="exampleInputPassword1">Địa chỉ</label>
                <input type="text" class="form-control" id="exampleInputPassword1"
                       name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số CMT</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="idCard"
                >
            </div>
            <div class=" form-group">
                <label for="exampleInputPassword1">SĐT</label>
                <input type="text" class="form-control" id="exampleInputPassword1"
                       name="phoneNumber">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Khoa</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="course"
                >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Niên khóa</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="year"
                >
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>