<?php
// 获取用户的User-Agent信息
$userAgent = $_SERVER['HTTP_USER_AGENT'];
// 判断用户使用的设备类型
if (strpos($userAgent, 'Mobile') !== false) {
    // 手机设备
    //header("Location: admin/mobile/login.php");
    echo "手机不支持登录面板，除非电脑模式＋横屏";
    die;
} else {
    // 电脑设备
    header("Location: admin/login.php");
}
?>