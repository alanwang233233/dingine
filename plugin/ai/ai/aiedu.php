<?php
include 'key.php';
$randomString = $strings[array_rand($strings)];
$url = "https://api.aigcfun.com/api/v1/text?key=$randomString";
$usertext = $_GET["text"];
$allowedAPIKeys = array("lxyddice1145141919810", "ggh1", "apikey1");
$apiKey = $_GET["apikey"];

if (!in_array($apiKey, $allowedAPIKeys)) {
    die("APIKEY错误");
}
$data = array(
    "messages" => array(
        array(
            "role" => "system",
            "content" => "请以markdown的形式返回答案"
        ),
        array(
            "role" => "user",
            "content" => "$usertext" // 这里的 $usertext 是你要发送给服务器的用户输入
        )
    ),
    "tokensLength" => 35,
    "model" => "gpt-3.5-turbo"
);
$options = array(
    "http" => array(
        "header" => "Content-type: application/json",
        "method" => "POST",
        "content" => json_encode($data)
    )
);
$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
if ($response === false) {
    // 请求失败处理
    echo "请求失败";
} else {
    // 解析服务器返回的结果
    $result = json_decode($response, true);
    if ($result && isset($result["choices"][0]["message"]["content"])) {
        $serverAnswer = $result["choices"][0]["message"]["content"];
        echo $serverAnswer;
        echo "<br /><br />由Error404(7430王梓豪)赞助";
    } else {
        echo "服务器出错，原因：1，敏感词；2，超过每天100条限制；3，服务器日常卡顿";
    }
}
?>