<?php
require_once "token.php";
if ($_COOKIE["token"] === $token && $_COOKIE["username"] === $username && $_COOKIE["password"] === $password) {
    echo "您已登录！";
    header("Location: admin.php"); 
    die;
} else {
    //6
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // 验证用户名和密码
    if ($username === "admin" && $password === "admin123") {
        // 生成token
        $token = bin2hex(random_bytes(16));
        
        // 将token、用户名和密码保存到cookie
        setcookie("token", $token, time() + 3600, "/");
        setcookie("username", $username, time() + 3600, "/");
        setcookie("password", $password, time() + 3600, "/");
        
        // 将token、用户名和密码保存到token.php文件
        $data = "<?php\n\$token = '$token';\n\$username = '$username';\n\$password = '$password';\n";
        file_put_contents("token.php", $data);
        
        // 重定向到成功页面
        header("Location: success.php");
        exit();
    } else {
        // 重定向到错误页面
        header("Location: error.php");
        exit();
    }
}
?>
<?php
include "cdn.php";
?>
<html lang="zh-CN">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理后台登录</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2 class="text-center">用户登录</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group">
            <label for="username">用户名：</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
          </div>
          <div class="form-group">
            <label for="password">密码：</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码"><br>
          </div>
          <button type="submit" class="btn btn-primary btn-block">登录</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
    <?php include "footer.php"; ?>
