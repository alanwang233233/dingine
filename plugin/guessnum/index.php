<?php
$cs = $_POST['cs'];
if ($cs === 'help') {
    echo "心里想两个数，计算出两数和和两数积，然后输入guessnum 两数和_两数积。";
    exit;
} elseif (empty($cs)) {
    die("错误：输入不能为空");
}
// 分割数字1和2，并保存到变量$a和$b
list($a, $b) = explode('_', $cs);
$a = intval($a);
$b = intval($b);
// 检查a平方-4b是否大于等于0
if (($a * $a - 4 * $b) < 0) {
    die("错误：a平方-4b小于0");
}
// 计算方程结果
$jg1 = ($a + sqrt($a * $a - 4 * $b)) / 2;
$jg2 = ($a - sqrt($a * $a - 4 * $b)) / 2;
// 输出结果
echo "成功：x1=$jg1, x2=$jg2";
?>