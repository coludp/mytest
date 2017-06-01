<?PHP

$s = 'hello word ';
$fontfile = 'FZYTK.TTF';
$fontsize = 12;
$t = imagettfbbox($fontsize, 0, $fontfile, $s);
//print_r($t);exit;
$im = imagecreate($t[2] - $t[0], $t[1] - $t[7]);
$b = imagecolorallocate($im, 255, 255, 255);
$c = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, $fontsize, 0, 0, $t[1] + $fontsize, $c, $fontfile, $s);
//imagepng($im);

echo '<pre>';
$ind = imagecolorclosest($im, 255, 255, 255);
for($y=0; $y<imagesy($im); $y++) {
  for($x=0; $x<imagesx($im); $x++)
    echo imagecolorat($im, $x, $y) == $ind ? ' ' : '*';
  echo PHP_EOL;
}

  exit;
	$im = imagecreatefromstring(file_get_contents('http://avatar.csdn.net/0/4/B/1_u011516112.jpg'));
$w = imagesx($im);
$h = imagesy($im);
$dst = imagecreatetruecolor($w,$h);
imagecopymergegray($dst,$im,0,0,0,0,$w,$h,50);
 
$str='';
for($y=0;$y<$h;$y++){
    for($x=0;$x<$w;$x++){
      $c = imagecolorat($dst,$x,$y);
      $c = array_sum(imagecolorsforindex($dst, $c))/3/4 + 32;
      //$c = round(imagecolorat($dst,$x,$y)/180400)+34;
        $str.=chr($c);
    }
    $str.=PHP_EOL;
}
imagedestroy($dst);
imagedestroy($im);
 
echo "<pre style='font-size:4px'>$str";
?>