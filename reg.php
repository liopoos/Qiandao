<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册签到(beta)</title>
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

                </div>
                <label for="inputEmail">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="请输入Email" required autofocus><br>
                <label for="inputPassword">密码</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="请输入密码" required
                       maxLength="16"><br>
                <label for="inputPassword">重复密码</label>
                <input type="password" id="inputPassword2" class="form-control" placeholder="请再次输入密码" required
                       maxLength="16"><br>
                <button type="submit" class="btn btn-primary" id="btn-reg">注册</button>
                <a href="./login.php" class="btn btn-default" id="btn-reg">返回登录</a>
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
            $("#btn-reg").click(function () {
                var info = {
                    user: $("#inputEmail").val(),
                    passwd: $("#inputPassword").val()
                };
                if ($("#inputEmail").val() != "" && $("#inputPassword").val() != "" && $("#inputPassword2").val() != "") {
                    if ($("#inputPassword").val() != $("#inputPassword2").val()) {
                        $('#info').html('<div class="alert alert-danger" role="alert">两次密码输入不一致</div>');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "./ajax/reg.php",
                            data: info,
                            dataType: "json",
                            success: function (result) {
                                if (result.code == 1) {
                                    $('#info').html('<div class="alert alert-success" role="alert">注册成功，请返回登录</div>');
                                }
                                else if (result.code == -1) {
                                    $('#info').html('<div class="alert alert-danger" role="alert">该邮箱已注册</div>');
                                }
                                else {
                                    $('#info').html('<div class="alert alert-danger" role="alert">出现未知错误</div>');
                                }

                            }
                        });
                    }
                }

            });
        });
    </script>
</body>
</html>
