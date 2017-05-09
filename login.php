<?php
if (!isset($_SESSION['user'])) {
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    }
}
if (!empty($_SESSION['user'])) {
    header("Location: ./index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录签到(beta)</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form class="form-signin" target="submitFrame" method="post">
                <h2 class="form-signin-heading">签到(beta)</h2>
                <div id="info">
                    <?php
                    $s = $_GET['s'];
                    if ($s == 1) {
                        echo '<div class="alert alert-info" role="alert">已成功注销</div>';
                    } elseif ($s == -1) {
                        echo '<div class="alert alert-danger" role="alert">请先登录</div>';
                    }
                    ?>
                </div>
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="请输入Email" required autofocus><br>
                <label for="inputPassword">密码</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="请输入密码" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me" checked="checked"> 记住密码
                    </label>
                </div>
                <button type="submit" class="btn btn-primary" id="btn-login">登录</button>
                <a href="./reg.php" class="btn btn-default">注册</a>
            </form>
            <iframe style="display: none;" name="submitFrame" src="about:blank"></iframe>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#btn-login").click(function () {
                var info = {
                    user: $("#inputEmail").val(),
                    passwd: $("#inputPassword").val()
                };
                if ($("#inputEmail").val() != "" && $("#inputPassword").val() != "") {
                    $.ajax({
                        type: "POST",
                        url: "./ajax/login.php",
                        data: info,
                        dataType: "json",
                        success: function (result) {
                            if (result.code == 1) {
                                $('#info').html('<div class="alert alert-success" role="alert">登录成功</div>');
                                setTimeout(function () {
                                    top.location = './index.php';
                                }, 1000);
                            }
                            else if (result.code == -1) {
                                $('#info').html('<div class="alert alert-danger" role="alert">用户名或密码错误</div>');
                            }
                            else if (result.code == -2) {
                                $('#info').html('<div class="alert alert-danger" role="alert">用户名不存在</div>');
                            }
                        }
                    });
                }
            })

        });
    </script>
</body>
</html>
