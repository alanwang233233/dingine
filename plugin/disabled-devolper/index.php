<?php
$cs = $_POST["cs"];
echo "bug测试：1，$cs\n";
$url = "https://api.lxyddice.top/wang/latest/plugin/devolper/bug/$cs.php";
$response = file_get_contents($url);
echo "2,$response";
$webhook = json_decode($_POST["postdata"], true)['sessionWebhook'];
echo "3,Webhook:$webhook";