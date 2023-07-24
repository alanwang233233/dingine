<?php
function stoperror() {
  // 设置错误报告级别
  error_reporting(E_ERROR | E_PARSE);
  // 关闭警告输出
  ini_set('display_errors', 0);
}