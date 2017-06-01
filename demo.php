<?php 

	function father1($arr1){
		
		son1("test1","","test3");
	}
	
	function son1($arr1,$arr2=false,$arr3=false){
		echo "arr1:".$arr1."</br>";
		echo "arr2:".$arr2."</br>";
		echo "arr3:".$arr3."</br>";
	}
	
	function father2($arr1){
		
		son2("test1");
	}
	function son2($arr1,$arr2="xxx",$arr3=false){
		echo "arr1:".$arr1."</br>";
		echo "arr2:".$arr2."</br>";
		echo "arr3:".$arr3."</br>";
	}
	
	function father3($arr1,$arr2=false,$arr3=false){
		
		son3($arr1,$arr2,$arr3);
	}
	function son3($arr1,$arr2="xxx",$arr3=false){
		echo "arr1:".$arr1."</br>";
		echo "arr2:".$arr2."</br>";
		echo "arr3:".$arr3."</br>";
	}
	
	
	father1("test");
	echo"</br></br></br>";
	
	father2("aaa");
	echo"</br></br></br>";
	
	father3("aaa",false);
	echo"</br></br></br>";
	
	echo"4";
	father3("aaa",false,"xxx");
	echo "方法中的参数可以赋默认值，如果有默认值，调用方法的时候如果不填写参数值，方法中使用的是默认值。</br>";
	echo "如果没有默认值，调用有参数的方法，参数要写全。";
	
	
?>