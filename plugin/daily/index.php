<?php
$url = json_decode($_POST["data"], true)['sessionWebhook'];
$data = '{
    "msgtype": "feedCard",
    "feedCard": {
        "links": [
            {
                "title": "欢迎查看今天的每日早报",
                "messageURL": "https://news.icodeq.com/",
                "picURL": "https://ts1.cn.mm.bing.net/th/id/R-C.534134e3d66277841675fdd5fbd39e54?rik=%2bj7jnpJNs72JXQ&riu=http%3a%2f%2fpic33.photophoto.cn%2f20141218%2f0034034493430595_b.jpg&ehk=sqVdbL%2baXOV1TVAgFQnZ%2fN8A15CH8Vqxs6FyCVWBbOc%3d&risl=&pid=ImgRaw&r=0"
            }
        ]
    }
}';
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json",
        'method'  => 'POST',
        'content' => $data
    )
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);