// 冒泡排序
	function maopao($params,$desc="Z"){
		// 非数组
		if(!is_array($params)){
			$params = explode(',',$params);
			if(!$params)
				return "参数格式错误";
		}
		$cnt = count($params);
		if($desc == "Z"){
			for($i=0;$i<$cnt;$i++){
				for($j=0;$j<=$i;$j++){
					if($params[$i] >= $params[$j]){
						$zj = $params[$i];
						$params[$i] = $params[$j];
						$params[$j] = $zj;
					}
				}
				//print_r($params);
			}
		}else{
			for($i=0;$i<$cnt;$i++){
				for($j=0;$j<=$i;$j++){
					if($params[$i] <= $params[$j]){
						$zj = $params[$i];
						$params[$i] = $params[$j];
						$params[$j] = $zj;
					}
				}
				//print_r($params);
			}
		}
		return $params;
	}
	
	$array = array (1,3,5,2,4,6,2,9,4,0);
	echo "<pre>";
	print_r($array2);
	print_r(maopao($array2,"F"));
