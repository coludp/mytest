<?php 
	var_dump($_POST);
	echo "<br>";
	$ch = curl_init();
 
// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://skin.1yyg.com/JS/GoodsComm.js?date=20141020");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
// 抓取URL并把它传递给浏览器
curl_exec($ch);
$contents = curl_multi_getcontent($ch);
 
// 关闭cURL资源，并且释放系统资源
curl_close($ch);
 
echo $contents;
?>