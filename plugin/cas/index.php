<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);
$fckey = $_GET["fckey"];
if ($fckey === "ujdksghfuyegfuysd114514"){
    //NO
} else {
    echo "错误的key";
    exit();
}
$cs = $_POST["cs"];
$postdata = $_POST["data"];
if ($cs == "register"){
    echo "功能内测中！请使用cas login指令登录";
    exit();
}
if ($cs == "ver"){
    echo "版本：0.1";
    exit();
}
$url="http://api.lxyddice.top/wang/latest/plugin/cas/$cs";
// 构造POST请求数据
$data = array(
    'postdata' => $postdata,
);
$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
// 发送POST请求
$response = file_get_contents($url, false, $context);
if ($response === false) {
    $response = 'ERROR';
}
echo $response;