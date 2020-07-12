<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

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
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form action="functions/login.php" method="post" class="form-signin">
    <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Đăng nhập</h1>
    <label for="inputEmail" class="sr-only">Tên tài khoản / Mã SV</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Tên tài khoản / Mã SV" required autofocus
           name="maSV">
    <label for="inputPassword" class="sr-only">Mật khẩu</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required name="password">
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Lưu mật khẩu
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>
</body>
</html>