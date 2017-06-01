<?php 
	
	//String implode(string $glue,array $pieces)
	//String implode(array $pieces)
	// 将一维数组转换成字符串 用$glue 链接；
	// 没有参数$glue 表示数组值的链接符为空；
	/*
	$arraydemo = array ("a",'b','c','d','e');
	$test = implode(" next ",$arraydemo);
	echo $test;
	
	$test2 = implode($arraydemo);
	echo $test2;
	*/
	
	// array array_map(callable $callback, array $arr1[,array $arr2,array $arr3...]);
	// 讲数组中的每个元素进行回调函数$callback 处理。并返回
	$array_maptest = array('1','a','你好','hello','。。。');
	function retTypeElement($str){
		return "元素".$str;
	}
	$array2 = array_map("retTypeElement",$array_maptest);
	var_dump($array2);
	
?>