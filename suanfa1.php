<?php

// -------------------------------------1
// 讲字符串第一个字符移除，第二个字符放到最后；得到的新字符串第一字符移除，第二个放到最后..
$xx  = "615947283";
$num = "631758924";
$new = "";
$i =0;
while(mb_strlen($num)>0){
	
	$new .=$num[0];
	if(mb_strlen($num)>1)
		$num = substr($num,1).$num[1];
	$num = substr($num,1);
}
//echo $new."\n" -------------------------------;
// -------------------------------------1

// -------------------------------------2
//模拟扑克发牌，有52张扑克牌，我们给它编号，从1,2,3...52。一共52张牌。
//请使用数组装载这些牌，然后再打乱顺序输出。比如:43,2,18,21...3。
//bool shuffle ( array &$array )
//本函数打乱（随机排列单元的顺序）一个数组

$arrpk = range(1, 52);
shuffle($arrpk);
var_dump($arrpk);
// -------------------------------------2

// 给定一个数字区间 $start < $num < $end 如果$num 小于$start 返回 $start 如果大于$end 返回$end 否则返回$num
// 要求不要使用if else 或者三元运算 ，
//mixed min ( mixed $value1 , mixed $value2 [, mixed $... ] )
//如果仅有一个参数且为数组，min() 返回该数组中最小的值。如果给出了两个或更多参数, min() 会返回这些值中最小的一个。
// 和这个方法类似的 max();
$num=4;
$start =5;
$end =10
echo min(max($num,$start),$end);


function foo($a, $b, $c) {
    return (((($c-$a) + (($c-$a)  >> 31)) ^ (($c-$a) >> 31)) - ((($c-$b) + (($c-$b)  >> 31)) ^ (($c-$b) >> 31)) + $a + $b) / 2;
}
 
echo foo(20, 30, 50);  // 30
?>