<?php 

	// bool isset( mixed $var [mixed $var2...]);  // php 4,5,7
	// 检测变量是否设置，并且不是null //unset( mixed $var)后变量销毁
	$test_var = "test";
	$test_null = null;
	echo "isset1:".isset($test_var).":</br>";
	echo "isset_null:".isset($test_null).":</br>";
	echo "isset1 and isset_null:".isset($test_var,$test_null).":</br>";
	
	unset($test_var);
	echo "isset2:".isset($test_var).":</br>";
	
	echo "</br></br></br>";
	echo "==emtpy==</br>";
	//bool empty(mixed $var)
	// 检测一个变量是否为空,如果变量不存在，并不会产生警告。
	//在 PHP 5.5 之前，empty() 仅支持变量；
	$empty_var = "test";
	$empty_null = null;
	echo "empty1:".empty(null).":</br>";
	echo "empty_null:".empty(null).":</br>";
?>