<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>后台登陆系统</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery.min.js"></script>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>后台管理系统</h1>
        <form method="post" onsubmit="return false;">
            <p><input type="text" class="login" name="login" value="" placeholder="电话或邮箱"></p>
            {{csrf_field()}}
            <p><input type="password" class="password" name="password" value="" placeholder="密码"></p>
            <p class="remember_me">
                <label>
                    <input type="checkbox" value="1" name="remember_me" id="remember_me">记住登陆信息
                </label>
            </p>
            <p class="submit"><input type="submit" name="commit" value="登陆"></p>
        </form>
    </div>
</section>
</body>
<script src="js/login.js"></script>
</html>
