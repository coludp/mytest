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


$str = "AAAAA青青AA";
//echo preg_match("/^[\x{3040}-\x{30FF}\x{4E00}-\x{9FA5}\x{f900}-x{fa2d}\s]*$/u",$str);
// if(!(/^[\u3040-\u30FF\u4E00-\u9FA5\uf900-\ufa2d]+$/.test(arr_frame[j])))

echo (mb_strlen($str));
$pattern ='/^[\x{30A0}-\x{30FF}\x{3040}-\x{309F}\x{4E00}-\x{9FBF}\s]*$/u';

define('CHAR_TO',"ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890----");

$pregstr ='/^[\x{3040}-\x{30FF}\x{4E00}-\x{9FA5}\x{f900}-\x{fa2d}\s]*$/u';
for($i=0;$i< mb_strlen($str);$i++){
	$ckchar = mb_substr($str,$i,1);
	//echo $ckchar;
	//var_dump(strpos(CHAR_TO,"1"));
	if(false ===  strpos(CHAR_TO,$ckchar)){
		echo "x";
		if(!preg_match($pregstr,$ckchar)){
			echo "false";
			//self::addmsg($msg_arr,"ERR","車台番号はひらがな、カタカナ、漢字、アルファベット、数字、ハイフン（-）などの半角文字で入力してください。");
			break;
		}
	}
}
//echo preg_match_all($pregstr,"w");
?>


