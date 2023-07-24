请前往下列网站登录：
<?php
$postdata = $_POST["data"];
$dingtalkid = json_decode($postdata, true)['senderId'];
echo "http://api.lxyddice.top/wang/latest/plugin/cas/core/dl.php?dingtalkid=$dingtalkid";
?>