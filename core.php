{"msgtype": "text", "text": {"content": "<?php

//下列为设置项
$frameurl = "http://api.rel.lxyddice.top:55520/wang/latest/";




include "function/function.php";
stoperror();
$fckey = "ujdksghfuyegfuysd114514";
$postdata = file_get_contents("php://input");
$zhiling = NULL;
//获得用户消息，已弃用
$msg1 = json_decode($postdata, true)['text']['content'];
$usermsg = trim($msg1); // 去除首尾空格
// 判断是否存在PHP代码
if (strpos($usermsg, '<?php') !== false || strpos($usermsg, '?>') !== false) {
    // 去除PHP代码
    $usermsg = preg_replace('/<\?php(.*?)\?>/s', '', $usermsg);
}
// 判断是否存在HTML标签
if (strpos($usermsg, '<') !== false || strpos($usermsg, '>') !== false) {
    // 去除HTML标签
    $usermsg = strip_tags($usermsg);
}
$usermsg = str_replace(['$','disabled','(',')'], '', $usermsg);
//$usermsg = str_replace([ '\\', '/'], '', $usermsg);
// 使用explode函数将用户消息按空格分割数组
$usermsg_parts = explode(" ", $usermsg);
// 获取指令部分（第一个元素）
$zhiling = $usermsg_parts[0];
// 获取参数部分（从第二个元素开始）
$canshus = array_slice($usermsg_parts, 1);
$var = $canshus;
//访问数组的第一个元素（索引为 0）
$canshu = $var[0];
$url="$frameurl/plugin/$zhiling/?fckey=$fckey";
// 构造POST请求数据
$data = array(
    'data' => $postdata,
    'cs' => $canshu,
    'url' => $frameurl
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
// 输出服务器的响应
if ($response === false) {
    $response = "语法错误,帮助：help,你输入了：$usermsg,地址：$url";
}
echo $response;
?>"}, "at": {"isAtAll": false}}