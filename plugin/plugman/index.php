<?php
// 设置错误报告级别
error_reporting(E_ERROR | E_PARSE);
// 关闭警告输出
ini_set('display_errors', 0);
$directory = "/www/wwwroot/api.lxyddice.top/wang/latest/plugin";
$cs = isset($_POST['cs']) ? $_POST['cs'] : '';
function listFolders($directory) {
    if (!is_dir($directory)) {
        return "指定目录不存在";
    }
    $result1 = '';
    $result = '';
    $folders = scandir($directory);
    foreach ($folders as $folder) {
        if ($folder === "." || $folder === "..") {
            continue;
        }
        $rrr = '';
        $file = $directory . "/" . $folder . "/plugin.php";
        if (file_exists($file)) {
            echo NULL;
        } else {
            $rrr = "警告：该插件不符合钉钉机器人框架的要求，可能不能正常运行或者含有恶意程序，建议卸载插件，新版本中不符合要求的插件将被强制停用。\n";
        }
        if (is_dir($directory . "/" . $folder)) {
            $folderName = str_replace("disabled", "已停用，去掉disabled启用", $folder);
            $folderName1 = "$folderName $rrr";
            $result .= $folderName1 . "\n";
        }
    }
    return $result;
}
if ($cs == 'list') {
    $result = listFolders($directory);
    echo "以下是已安装的插件：\n" . $result;
} else {
    echo "指令不存在！";
    exit;
}