<?php
require_once "token.php";
if ($_COOKIE["token"] === $token && $_COOKIE["username"] === $username && $_COOKIE["password"] === $password) {
    //不执行
} else {
    echo "打开后台时出现问题！退出登录中";
    // 清除cookie
    setcookie("token", "", time() - 3600, "/");
    setcookie("username", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    die;
}
?>
<?php include "nav.php"; ?>
        <h3>测试机器人</h3>
        
        <form id="myForm">
            <div class="form-group">
                <label for="inputText">Text:</label>
                <input type="text" class="form-control" id="inputText" name="text" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <div id="responseArea" class="mt-4"></div>
    </div>
    
<?php
include "cdn.php";
?>

    <script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); // 阻止表单默认提交行为
            
            var inputText = document.getElementById("inputText").value;
            
            var data = {
                "text": {
                    "content": inputText
                }
            };
            
            axios.post("https://api.lxyddice.top/wang/latest/core.php", data)
                .then(function(response) {
                    var responseData = response.data;
                    
                    var responseHtml = "<h3>Server Response:</h3><pre>" + JSON.stringify(responseData, null, 4) + "</pre>";
                    document.getElementById("responseArea").innerHTML = responseHtml;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>
</body>
</html>
    <?php include "footer.php"; ?>