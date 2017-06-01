<?php 
/*
商务英语听说</td>90</td>2.0</td></tr>形势与政策（八）</td>70</td>0.5</td></tr>积极心态训练</td>89</td>1.0</td></tr>欧洲旅游产品设计与营销</td>76</td>2.0</td></tr>
把上面的用遍历成，绩点是按照分数算的
课程:	 形势与政策（八）  绩点:2.0   成绩:70 
课程:	 积极心态训练   绩点:3.0   成绩:89 
课程:	 欧洲旅游产品设计与营销    绩点:2.0   成绩:76 
课程:      商务英语听说   绩点:4.0   成绩:90 
*/
$str = "商务英语听说</td>90</td>2.0</td></tr>形势与政策（八）</td>70</td>0.5</td></tr>积极心态训练</td>89</td>1.0</td></tr>欧洲旅游产品设计与营销</td>76</td>2.0</td></tr>";
//echo "<div>aaa</div>";
//echo "<div>xxx</div>";
//echo "<table> <tr> <td>1</td> <td>11</td></tr> <tr><td>2</td> <td>22</td></tr>";
$arr = explode("</td>",$str);

$new = "<table><tr>"; 
foreach($arr as $k => $v){
	$v = "<td>".$v."</td>";
	$v = str_replace("</tr>","</tr><tr><td>",$v);
	$new .= $v;
}
//echo "<pre>";
//顺序错误，绩点没运算
//echo $new."</table>";

// 添加list 正常。
$str = '商务英语听说</td>90</td>2.0</td></tr>形势与政策（八）</td>70</td>0.5</td></tr>积极心态训练</td>89</td>1.0</td></tr>欧洲旅游产品设计与营销</td>76</td>2.0</td></tr>';
$data = explode('</tr>', $str);
$new = "<table>";
foreach($data as $itm){
    if($itm){
        list($course_name, $score,$num) = explode('</td>', $itm);
        $num = $num * 2; 
		$new .= "<tr><td>".$course_name."</td><td>".$num."</td><td>".$score."</td></tr>";
		echo $course_name,$num,$score;
	}
}
echo $new."</table>";

// 高手写的。。
$s = '商务英语听说</td>90</td>2.0</td></tr>形势与政策（八）</td>70</td>0.5</td></tr>积极心态训练</td>89</td>1.0</td></tr>欧洲旅游产品设计与营销</td>76</td>2.0</td></tr>';
$d = array_chunk(preg_split('#(</t.>)+#', $s), 3);
array_pop($d);
foreach($d as $v) $r[] = $v[2];
array_multisort($r, $d);
foreach($d as $v) printf("课程: %s %s %s\n", $v[0], $v[2], $v[1]);

?>

