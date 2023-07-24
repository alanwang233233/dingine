<?php
$fckey = $_GET["fckey"];
if ($fckey === "ujdksghfuyegfuysd114514"){
    //NO
} else {
    echo "错误的key";
    exit();
}
// 读取 yy.txt 文件的内容
$fileContent = file_get_contents('yy.txt');
// 将文件内容按行分割成数组
$lines = explode("\n", $fileContent);
// 随机选择一行
$randomLine = $lines[array_rand($lines)];
// 输出随机选择的行
echo $randomLine;
?>