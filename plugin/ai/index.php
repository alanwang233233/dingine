<?php
$fckey = $_GET["fckey"];
if ($fckey === "ujdksghfuyegfuysd114514"){
    //NO
} else {
    echo "错误的key";
    exit();
}
$furl = $_POST['url'];
// 定义接口地址及参数
$url = "$furl/plugin/ai/ai/aiedu.php";
$apikey = 'apikey1';
$cs = $_POST["cs"];
// 拼接请求URL
$requestUrl = $url.'?apikey='.$apikey.'&text='.$cs;
// 发送请求并获取响应
$response = file_get_contents($requestUrl);
$msgtodingtalk = "问题：$cs <br /><br /> 人工智能的回答：$response";
    // 钉钉机器人的Webhook地址
    $webhook = json_decode($_POST["data"], true)['sessionWebhook'];
    // 要发送的数据
    $data = array(
        "msgtype" => "text",
        "text" => array(
            "content" => $msgtodingtalk
        )
    );
    $data = [
    'msgtype' => 'markdown',
    'markdown' => [
        'title' => "$cs",
        'text' => "$msgtodingtalk"
    ]
];
    // 将数据转换为JSON格式
    $json_data = json_encode($data);
    // 发送POST请求
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $webhook);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $msgtodingtalk;