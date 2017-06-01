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


$pic = $_FILES["upfile"];
$file_tmp_name = $pic["tmp_name"];
$file_name = $pic["name"];

$destination = "./uploadfile/".$file_name;

$fp = fopen($file_tmp_name ,"rb");
echo $base64 = base64_encode(fread($fp,filesize($file_tmp_name )));
fclose($fp);
$file = base64_decode($base64);
if (!move_uploaded_file ($file_tmp_name, $destination)){
	echo "文件保存失败";
}

if($file){
	
	//echo "<img src='$destination' style='hight:100px;width:160px'>";
	
}
exit;
// php判断 图片格式
//var_dump(getimagesize($file_name));
echo move_uploaded_file ($file_tmp_name, $destination);
exit;

if($pic && getimagesize($pic)){
	// 图片正确，转换base64
	
	if(!move_uploaded_file ($file_name, $destination)){
		echo "上传失败";
	}
	//echo base64_encode($file_name);
	 
}else{
	// 图片格式错误
	echo "图片错误";
}
exit;
$pic_str = POST['pic_fil'];

echo $pic_str;
?>


