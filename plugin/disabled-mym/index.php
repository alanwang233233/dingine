<?php
$cs = $_POST["cs"];
$url = "https://xiaoapi.cn/API/bq_mym.php?type=json&url=$cs";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$mymurl = json_decode($response, true)['text'];
$webhook = json_decode($_POST["data"], true)['sessionWebhook'];
$message = [
    'msgtype' => 'markdown',
    'markdown' => [
        'title' => "$cs",
        'text' => "![$cs]($mymurl)"
    ]
];
$options = [
    'http' => [
        'header' => "Content-Type: application/json",
        'method' => 'POST',
        'content' => json_encode($message)
    ]
];
$context = stream_context_create($options);
$result = file_get_contents($webhook, false, $context);