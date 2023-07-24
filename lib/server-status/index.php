<?php
$msgtodingtalk = "你好";
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