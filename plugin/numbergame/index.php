<?php
$fckey = $_GET['fckey'];
if ($fckey === "ujdksghfuyegfuysd114514"){
    //NO
} else {
    echo "错误的key";
    exit();
}
$file = 'num.php';
if (!file_exists($file)) {
    // 创建新文件
    $content = "正在准备";
    file_put_contents($file, $content);
    //echo "成功创建文件：$file";
}
include($file);
if (empty($_POST['cs'])) {
    echo "你没有输入！";
}
elseif (empty($sessionnum)) {
    $gennum = rand(0, 100);
    file_put_contents($file, '<?php $sessionnum = ' . $gennum . ';');
} else {
    $result = (int)$_POST['cs'] - (int)$sessionnum;
    if ($result == 0) {
        $message = '恭喜猜对了';
        unlink($file);
    } elseif ($result > 0) {
        $message = "猜大了";
    } elseif ($result < 0) {
        $message = '猜小了或字符无效';
    }
}

echo $message;
?>