<?php
$msgtodingtalk = "公告：一.规则         
正所谓“无规矩不成方圆”，而自由往往也是建立在规则之上的，绝对的自由只会让强者剥削弱者，故而作此规则，这并非放弃魏王以前的思想，而是以他思想为基础来进行完善，进行延伸，还望诸位理解。 亲爱的群友们：
 ​1.不得刷屏煽情带节奏否则按情节来进小黑屋。
 2.不可宣群（圈子关联的群才可以宣），要管理（管理满辣，下次一定（））
 3.迷你玩家随便来，但诋毁MC的迷你玩家请自己退  
4.祖安人适当，注意文明（管理不可以主动挑事骂人带节奏哦，要是遇到那些生气上头应先去进行劝阻，无理取闹之人可以直接禁言或者踢掉），禁止发暴力，血腥，恐怖，过度黄色的视频
  5.开车车要适度，不要涩涩否则群被封了就不好了
 6.那种开玩笑似的要加滑稽哦，不可以无稽之谈[doge] 
7.Ti老成员要接纳新人​，不得冷眼相待或者调戏新人
 8.学会克制自己的情绪​ 
9.Ti不强迫任何人加入，看自己意愿，喜欢MC即可加入​ 
10.Ti成员不得在群里闹矛盾，有过节私下处理 
11.Ti成员不能以Ti名声无缘无故诋毁别的任何组织 
12.剩下的请大家商讨来定";
    // 钉钉机器人的Webhook地址
    $webhook = "https://oapi.dingtalk.com/robot/send?access_token=1a4a0729f59a1d0e79d0605baf9d500c57a31c653482443e63257f35b8333c28";
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
        'title' => "公告",
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
    echo $result;