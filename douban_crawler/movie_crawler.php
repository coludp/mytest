<?php 
// 豆瓣电影抓取
// url eg : https://movie.douban.com/subject/26694988/

/*version 0.1 20161207
#1 cmd 下编码有问题
#2 https  file_get_contents读不了数据   php配置文件中开启 php_openssl.dll 
#3 正则相关 () 子表达式
*/
define("DOUBAN_MOVE","https://movie.douban.com/");
//define("LOOP_MAX_NUM",100);
define("LOOP_MAX_NUM",10000);
header("Content-Type:text/html;charset=utf-8"); 

// 记录检索下标
$move_start_num = 25911694;
$last_record = $move_start_num;
if(file_exists("./record_digital.txt")){
	echo "1 loading record_digital.txt ...\r\n";
	$handle = fopen("./record_digital.txt","r");
	if($handle){
		while(($buffer = fgets($handle,200)) !== false)
			$last_record = $buffer;
	}
	fclose($handle);
}else{
	echo  "2 create record_digital.txt ...\r\n";
	touch(dirname(__FILE__)."/record_digital.txt");
}
echo "last_record:".$last_record;

//exit;
if($last_record <1000)
	exit;
for($i=0;$i<LOOP_MAX_NUM;$i++){
	$url = DOUBAN_MOVE."subject/".($last_record-$i)."/";
	echo $url."<br>";
	// 网页内容
	$htmlconts = @file_get_contents($url);
	
	if($htmlconts){
		echo "分析网页内容$i....<br>";
		// 初步正则筛选
		$contents_preg = '/<div id="content"\>(.+) id="related-pic"/is';
		preg_match($contents_preg,$htmlconts,$contents);
		
		// 影名正则筛选
		$name_preg = '/"v:itemreviewed">(.+)<\/span>/';
		preg_match($name_preg,$contents[1],$name_conts);
		$name = $name_conts[1];
	//	var_dump($name);
				
		// 年份正则筛选
		$year_preg = '/"year">\((.+)\)<\/span>/';
		preg_match($year_preg,$contents[1],$year_conts);
		$year = $year_conts[1];
	//	echo $year;
		
		// 海报正则筛选
		$mainpic_preg = '/"点击看更多海报">(.+(<img src=\"(.+))") title="点击看更多海报"/is';
		preg_match($mainpic_preg,$contents[1],$mainpic_conts);
		$mainpic = $mainpic_conts[3];
	//	echo $mainpic;
		
		// 类型正则筛选
		$type_preg = '/类型:<\/span>(.+"v:genre">.*<\/span>)<br\/>/';
		preg_match($type_preg,$contents[1],$type_conts);
		$type = preg_replace('/<\/*([a-zA-Z]+)[^>]*>/',"",$type_conts[1]);
	//	var_dump($type_conts);
	//	echo $type;
	
		// 地区正则筛选
		$area_preg = '/制片国家\/地区\:<\/span>(.+)<br/';
		preg_match($area_preg,$contents[1],$area_conts);
		$area = $area_conts[1];
	//	var_dump($area_conts);
		
		// 豆评分正则
		$score_preg = '/"v:average">(.+)<\/strong>/';
		preg_match($score_preg,$contents[1],$score_conts);
		$score = $score_conts[1];
		//echo $score;
		
		// 简介正则
		$summary_preg = '/"v:summary"(.+(class="">(.+)))<\/span>/is';
		preg_match($summary_preg,$contents[1],$summary_conts);
	//	echo "xxxxx:".$summary_conts[3];
		$summary = preg_replace("/\s*/","",$summary_conts[3]);
		//var_dump($summary_conts[3]);
	//	var_dump($summary_conts[3]);
		$movie_txt_msg = $name."|".$area."|".$year."|".$type."|".$mainpic."|".$score."|".$summary."\r";
		if(file_put_contents("./test2.txt",$movie_txt_msg,FILE_APPEND))
			echo "写入文件成功".$i."！<br>";
	}else{
		echo "读取失败".$i."！<br>";
	}
}

file_put_contents("./record_digital.txt",($last_record-LOOP_MAX_NUM)."\r\n",FILE_APPEND);
echo "end".($last_record-LOOP_MAX_NUM);
?>