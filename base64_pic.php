<?php

$file = "test.jpg";
$fp = fopen($file,"rb",0);
$base64 = base64_encode(fread($fp,filesize($file)));
fclose($fp);
//echo $base64;
if(isset($base64{2*1024*1024*(4/3)})){
	echo "这个";
}
$img = base64_decode($base64);
$a = file_put_contents('./test1.jpg',$img);

print_r($a);
?>

<img src='./test.jpg' alt="test">

