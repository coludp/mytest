<?php 
$ch = curl_init();
$timeout =5;
//curl_setopt($ch,CURLOPT_URL,'http://dev.goobike.com/web/api/return_bike_data.php?stockbike_id=0100001B30150421023');
curl_setopt($ch,CURLOPT_URL,'http://blog.csdn.net/sunchengwei/article/details/6675537');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, $timeout);
/*
curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC); // 
curl_setopt($ch,CURLOPT_USERPWD,'idac:idac1129'); // 
curl_setopt($ch,CURLOPT_PROXY,'da-gbk-a001:80'); // 
*/

$file_contents = curl_exec($ch); 
curl_close($ch); 
echo $file_contents; 
?>