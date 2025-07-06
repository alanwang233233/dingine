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
$usermsg = trim($msg1);
if (strpos($usermsg, '<?php') !== false || strpos($usermsg, '?>') !== false) {
    //去除PHP代码
    $usermsg = preg_replace('/<\?php(.*?)\?>/s', '', $usermsg);
}
if (strpos($usermsg, '<') !== false || strpos($usermsg, '>') !== false) {
    // 去除HTML标签
    $usermsg = strip_tags($usermsg);
}
$usermsg = str_replace(['$','disabled','(',')'], '', $usermsg);
//$usermsg = str_replace([ '\\', '/'], '', $usermsg);
$usermsg_parts = explode(" ", $usermsg);
$zhiling = $usermsg_parts[0];
$canshus = array_slice($usermsg_parts, 1);
$var = $canshus;
$canshu = $var[0];
$url="$frameurl/plugin/$zhiling/?fckey=$fckey";
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
$response = file_get_contents($url, false, $context);
if ($response === false) {
    $response = "语法错误,帮助：help,你输入了：$usermsg,地址：$url";
}
echo $response;
?>"}, "at": {"isAtAll": false}}
