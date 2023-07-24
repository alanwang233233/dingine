<html lang="zh-CN">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录页面</title>
  <!-- 引入Bootstrap样式 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2 class="text-center">用户登录</h2>
        <form action="dl2.php" method="POST">
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

  <!-- 引入Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3./dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>