<?php 

//                            _ooOoo_
//                           o8888888o
//                           88" . "88
//                           (| -_- |)
//                            O\ = /O
//                        ____/`---'\____
//                      .   ' \\| |// `.
//                       / \\||| : |||// \
//                     / _||||| -:- |||||- \
//                       | | \\\ - /// | |
//                     | \_| ''\---/'' | |
//                      \ .-\__ `-` ___/-. /
//                   ___`. .' /--.--\ `. . __
//                ."" '< `.___\_<|>_/___.' >'"".
//               | | : `- \`.;`\ _ /`;.`/ - ` : | |
//                 \ \ `-. \_ __\ /__ _/ .-` / /
//         ======`-.____`-.___\_____/___.-`____.-'======
//                            `=---='
//
//         .............................................
//                  佛祖镇楼                  BUG辟易

$domains = "http://www.qiegaowz.com";
$scanurl = "http://www.qiegaowz.com/product/Default.html";
$scanurlRegexes = "/product\/.{36}\\.html/";

$scanContents = get_contents($scanurl);

// 获取url 内容
function get_contents($url){
	return file_get_contents($url);
}
//echo $scanContents;

$summyRegexeh1 = '/<h1>(.*?)<\/h1>/';
$summyRegexecmt = '/<div class="shownewdes">([\s\S]+?)<\/div>/';

$pregRsult = preg_match_all($scanurlRegexes,$scanContents,$matchedResult);
$matchedResult = array_unique($matchedResult[0]);
$resultheadhcmt = array();
if($pregRsult){
	//print_r($matchedResult);
	foreach($matchedResult as $k => $v){
		$summyContents = get_contents($domains."/".$v);
		preg_match_all($summyRegexecmt,$summyContents,$resultheadhcmt);
		preg_match_all("/<img src=(.*?)\/>/",$resultheadhcmt[0][0],$pic_img);
		
		$resultheadhcmt[0][0] = str_replace("/Content/UploadFiles/","$domains/Content/UploadFiles/",$resultheadhcmt[0][0]);
		echo $resultheadhcmt[0][0];
		file_put_contents("$k.txt",$resultheadhcmt[0][0]);
		foreach($pic_img[0] as $k => $v){
			$v = str_replace("/Content/UploadFiles/","$domains/Content/UploadFiles/",$v);
		}
	}
	
}
?>


