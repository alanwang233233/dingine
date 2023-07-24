<?php
require_once "token.php";
if ($_COOKIE["token"] === $token && $_COOKIE["username"] === $username && $_COOKIE["password"] === $password) {
    //不执行
} else {
    echo "打开后台时出现问题！退出登录中";
    echo "<meta http-equiv='refresh' content='0; URL=login.php'>";
    echo "<p>如果你的浏览器没有自动重定向，那么点击： <a href='login.php'>click here</a>.</p>";
    // 清除cookie
    setcookie("token", "", time() - 3600, "/");
    setcookie("username", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    die;
}
?>
<?php
include "cdn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>后台管理系统</title>
</head>
<body>
    <?php include "nav.php"; ?>
    <div class="container">
  <div class="card">
    <div class="card-body">请选择项目！</div>
    </div>
    <?php include "footer.php"; ?>