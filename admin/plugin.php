    <?php include "nav.php"; ?>
        <?php include "cdn.php"; ?>
<?php
require_once "token.php";
if ($_COOKIE["token"] === $token && $_COOKIE["username"] === $username && $_COOKIE["password"] === $password) {
    $url = "http://api.rel.lxyddice.top:55520/wang/latest/plugin/plugin.php";
    // 发送GET请求
    $response = file_get_contents($url);
    echo $response;
} else {
    echo "打开后台时出现问题！退出登录中";
    // 清除cookie
    setcookie("token", "", 1, "/");
    setcookie("username", "", 1, "/");
    setcookie("password", "", 1, "/");
    die;
}
?>
    <?php include "footer.php"; ?>