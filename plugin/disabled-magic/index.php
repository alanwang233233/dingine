<?php
$fckey = $_GET["fckey"];
if ($fckey === "ujdksghfuyegfuysd114514"){
    //NO
} else {
    echo "错误的key";
    exit();
}
$zurl = $_POST["cs"];
$curl = urldecode($zurl);
$regex = '/\?id=(\w+)&url=(\S+)&t=(\S+)&m=(\S+)/';
if (preg_match($regex, $curl, $matches)) {
    // 提取出地址、标题和正文
    $id = $matches[1];
    $address = $matches[2];
    $title = $matches[3];
    $content = $matches[4];
    // 赋值给相应的变量
    $url = $address;
    $t = $title;
    $m = $content;
    //echo "正在发送中，稍等\n";
    //echo "地址：$curl\n";
    //echo "标题：$t\n";
    //echo "正文：$m\n";
} else {
    echo "错误的地址，请到这个网站生成后填到magic后面：https://mat.lxyddice.cf/live/";
    exit();
}
$url = json_decode($_POST["data"], true)['sessionWebhook'];
$data = '{
    "msgtype": "feedCard",
    "feedCard": {
        "links": [
            {
                "title": "'.$t.'",
                "messageURL": "'.$curl.'",
                "picURL": "https://img.shida66.com/upload/head_img_tmp/2019/03/29/f07aedb2fc2879994362d07e6c88b1e8.gif"
            }
            {
                "title": "'.$m.'", 
                "messageURL": "$curl", 
                "picURL": "https://ts1.cn.mm.bing.net/th/id/R-C.21a5279207d923e3b8e967697d6913d6?rik=vVYuRYATb3rmWQ&riu=http%3a%2f%2fpic.66wz.com%2f0%2f01%2f10%2f74%2f1107458_860635.jpg&ehk=%2fZHuXwjMNA9wf1ogQRzVrSSK61Q%2bk4%2f9D9tHOC%2bI8Nk%3d&risl=&pid=ImgRaw&r=0"
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