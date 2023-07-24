<?php
$cs = $_POST['cs'];
$url = 'https://huggingface.co/chat/conversation/64b28712c3302a63953a6037';
$headers = [
    'authority: huggingface.co',
    'accept: */*',
    'accept-language: zh-CN,zh;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6',
    'content-type: application/json',
    'cookie: hf-chat=53f19f96-6656-4813-a848-7c56d004e8f3; __stripe_mid=b6e60e43-4a22-4289-be28-b84530bb368b66c3ee; token=OHmEDrNRDUQkRgNwuNCGxMxgiHomLTjXjUQbMQryVPlKbGhekbkCSUAIuknGrzXMdCcEFcisIsGmyyEqKrTXtzVyRwXTHMtHboLnFFTeRARUOJhEpBEpScSkVirqPnIO; _ga_8Q63TH4CSL=GS1.1.1687961409.2.1.1687961580.0.0.0; _ga=GA1.2.1644075408.1685254244; _gid=GA1.2.127543227.1689421475; __stripe_sid=0a068a6c-3699-42f2-9963-864fc3d649b21e945b',
    'origin: https://huggingface.co',
    'referer: https://huggingface.co/chat/conversation/64b28712c3302a63953a6037',
    'sec-ch-ua: "Chromium";v="116", "Not)A;Brand";v="24", "Microsoft Edge";v="116"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.0.0'
];
$data = [
    'inputs' => '$cs',
    'parameters' => [
        'temperature' => 0.9,
        'truncate' => 1000,
        'max_new_tokens' => 1024,
        'stop' => ["</s>"],
        'top_p' => 0.95,
        'repetition_penalty' => 1.2,
        'top_k' => 50,
        'return_full_text' => false
    ],
    'stream' => true,
    'options' => [
        'id' => 'b8adf598-0599-46b7-b9d5-ab2cbed9e1ba',
        'response_id' => '9fff4761-34d5-43f9-a69c-5aa5c196cc16',
        'is_retry' => false,
        'use_cache' => false,
        'web_search_id' => ""
    ]
];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate, br');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);
$responseData = json_decode($response, true);
$message = $responseData['generated_text']; 
$msgtodingtalk = "问题：$cs \n 人工智能的回答：$response";
    // 钉钉机器人的Webhook地址
    $webhook = json_decode($_POST["data"], true)['sessionWebhook'];
    // 要发送的数据
    $data = array(
        "msgtype" => "text",
        "text" => array(
            "content" => $msgtodingtalk
        )
    );
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
?>