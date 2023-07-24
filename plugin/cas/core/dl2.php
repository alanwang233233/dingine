<?php
include "database/fastdata.php";

// 检查提交的表单数据
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // 验证用户名和密码是否匹
  if (isset($users[$username]) && $users[$username]['password'] === $password) {
    // 认证成功，返回用户的 API 密钥
    $apikey = $users[$username]['apikey'];
    echo '登录成功！您的 API 密钥是：' . $apikey;
  } else {
    // 认证失败
    echo '用户名或密码错误！';
  }
}
?>
