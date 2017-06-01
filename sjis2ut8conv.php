<?php 
$special_char_map=array(  // ‚±‚Ì”z—ñ‚ÍUTF-8‚Å‚·B
         "\xe3\x8e\x9c"=>"\x6d\x6d",   // mm
         "\xe3\x8e\x9d"=>"\x63\x6d",   // cm
         "\xe3\x8e\x9e"=>"\x6b\x6d",   // km
         "\xe3\x8e\x8e"=>"\x6d\x67",   // mg
         "\xe3\x8e\x8f"=>"\x6b\x67",   // kg
         "\xe3\x8f\x84"=>"\x63\x63",   // cc
         "\xe3\x8e\xa1"=>"\x6d\x5e\x32",   // m^2
         "\xe2\x84\x96"=>"\x4e\x6f\x2e",   // No.
         "\xe3\x8f\x8d"=>"\x4b\x2e\x4b\x2e",   // K.K.
         "\xe2\x84\xa1"=>"\x54\x45\x4c",   // TEL
         "\xe3\x8d\x89"=>"\xe3\x83\x9f\xe3\x83\xaa",   // ƒ~ƒŠ
         "\xe3\x8c\x94"=>"\xe3\x82\xad\xe3\x83\xad",   // ƒLƒ
         "\xe3\x8c\xa2"=>"\xe3\x82\xbb\xe3\x83\xb3\xe3\x83\x81",   // ƒZƒ“ƒ`
         "\xe3\x8d\x8d"=>"\xe3\x83\xa1\xe3\x83\xbc\xe3\x83\x88\xe3\x83\xab",   // ƒ[ƒgƒ‹
         "\xe3\x8c\x98"=>"\xe3\x82\xb0\xe3\x83\xa9\xe3\x83\xa0",   // ƒOƒ‰ƒ€
         "\xe3\x8c\xa7"=>"\xe3\x83\x88\xe3\x83\xb3",   // ƒgƒ“
         "\xe3\x8c\x83"=>"\xe3\x82\xa2\xe3\x83\xbc\xe3\x83\xab",   // ƒA[ƒ‹
         "\xe3\x8c\xb6"=>"\xe3\x83\x98\xe3\x82\xaf\xe3\x82\xbf\xe3\x83\xbc\xe3\x83\xab",   // ƒwƒNƒ^[ƒ‹
         "\xe3\x8d\x91"=>"\xef\xbc\xac",   // ‚k
         "\xe3\x8d\x97"=>"\xe3\x83\xaf\xe3\x83\x83\xe3\x83\x88",   // ƒƒbƒg
         "\xe3\x8c\x8d"=>"\xe3\x82\xab\xe3\x83\xad\xe3\x83\xaa\xe3\x83\xbc",   // ƒJƒƒŠ[
		  "\xe3\x8c\xa6"=>"\xe3\x83\x89\xe3\x83\xab",   // ƒhƒ‹
         "\xe3\x8c\xa3"=>"\xe3\x82\xbb\xe3\x83\xb3\xe3\x83\x88",   // ƒZƒ“ƒg
         "\xe3\x8c\xab"=>"\xe3\x83\x91\xe3\x83\xbc\xe3\x82\xbb\xe3\x83\xb3\xe3\x83\x88",   // ƒp[ƒZƒ“ƒg
         "\xe3\x8d\x8a"=>"\xe3\x83\x9f\xe3\x83\xaa\xe3\x83\x90\xe3\x83\xbc\xe3\x83\xab",   // ƒ~ƒŠƒo[ƒ‹
         "\xe3\x8c\xbb"=>"\xe3\x83\x9a\xe3\x83\xbc\xe3\x82\xb8",   // ƒy[ƒW
         "\xe3\x8a\xa4"=>"\xe4\xb8\x8a",   // ã
         "\xe3\x8a\xa5"=>"\xe4\xb8\xad",   // ’†
         "\xe3\x8a\xa6"=>"\xe4\xb8\x8b",   // ‰º
         "\xe3\x8a\xa7"=>"\xe5\xb7\xa6",   // ¶
         "\xe3\x8a\xa8"=>"\xe5\x8f\xb3",   // ‰E
         "\xe3\x88\xb1"=>"\x28\xe6\xa0\xaa\x29",   // (Š”)
         "\xe3\x88\xb2"=>"\x28\xe6\x9c\x89\x29",   // (—L)
         "\xe3\x88\xb9"=>"\x28\xe4\xbb\xa3\x29",   // (‘ã)
         "\xe3\x8d\xbe"=>"\xe6\x98\x8e\xe6\xb2\xbb",   // –¾Ž¡
         "\xe3\x8d\xbd"=>"\xe5\xa4\xa7\xe6\xad\xa3",   // ‘å³
         "\xe3\x8d\xbc"=>"\xe6\x98\xad\xe5\x92\x8c",   // º˜a
         "\xe3\x8d\xbb"=>"\xe5\xb9\xb3\xe6\x88\x90",   // •½¬
         "\xe2\x85\xa0"=>"\x49",   // I
         "\xe2\x85\xa1"=>"\x49\x49",   // II
         "\xe2\x85\xa2"=>"\x49\x49\x49",   // III
         "\xe2\x85\xa3"=>"\x49\x56",   // IV
         "\xe2\x85\xa4"=>"\x56",   // V
         "\xe2\x85\xa5"=>"\x56\x49",   // VI
         "\xe2\x85\xa6"=>"\x56\x49\x49",   // VII
         "\xe2\x85\xa7"=>"\x56\x49\x49\x49",   // VIII
         "\xe2\x85\xa8"=>"\x49\x58",   // IX
         "\xe2\x85\xa9"=>"\x58",   // X
		   "\xe2\x88\x91"=>"\xce\xa3",   // ƒ°
         "\xe2\x8a\xbf"=>"\xce\x94",   // ƒ¢
         "\xe2\x88\xae"=>"\xe2\x88\xab",   // ç
         "\xe2\x91\xa0"=>"\x31",   // 1
         "\xe2\x91\xa1"=>"\x32",   // 2
         "\xe2\x91\xa2"=>"\x33",   // 3
         "\xe2\x91\xa3"=>"\x34",   // 4
         "\xe2\x91\xa4"=>"\x35",   // 5
         "\xe2\x91\xa5"=>"\x36",   // 6
         "\xe2\x91\xa6"=>"\x37",   // 7
         "\xe2\x91\xa7"=>"\x38",   // 8
         "\xe2\x91\xa8"=>"\x39",   // 9
         "\xe2\x91\xa9"=>"\x31\x30",   // 10
         "\xe2\x91\xaa"=>"\x31\x31",   // 11
         "\xe2\x91\xab"=>"\x31\x32",   // 12
         "\xe2\x91\xac"=>"\x31\x33",   // 13
         "\xe2\x91\xad"=>"\x31\x34",   // 14
         "\xe2\x91\xae"=>"\x31\x35",   // 15
         "\xe2\x91\xaf"=>"\x31\x36",   // 16
         "\xe2\x91\xb0"=>"\x31\x37",   // 17
         "\xe2\x91\xb1"=>"\x31\x38",   // 18
         "\xe2\x91\xb2"=>"\x31\x39",   // 19
         "\xe2\x91\xb3"=>"\x32\x30",   // 20
         "\xe3\x80\x9d"=>"\x22",   // "
         "\xe3\x80\x9f"=>"\x2c\x2c"   // ,,
     );
	  $a = "aaƒuƒ‹[ƒŒƒbƒh";
	  
	  define('FROM_SPECIAL_CHAR_ARR',serialize(array('‡o', '‡p', '‡q', '‡r', '‡s', '‡t', '‡u','‡‚','‡ƒ','‡„',
                                                  '‡_','‡`','‡a','‡b','‡c','‡d','‡e','‡f',
                                                  '‡g','‡h','‡i','‡j','‡k','‡l','‡m','‡n',
                                                  '‡…', '‡†', '‡‡','‡ˆ','‡‰','‡Š','‡‹','‡Œ',
                                                  '‡','‡Ž','‡','‡~',
												  '‡T',
												  '‡U',
												  '‡V',
												  '‡W',
												  '‡X',
												  '‡Y',
												  '‡Z',
												  '‡[',
												  '1',
												  '‡]',
                                                  '‡”', '‡™', '‡“','‡@', '‡A', '‡B', '‡C', '‡D', '‡E', '‡F',
                                                  '‡G', '‡H', '‡I', '‡J', '‡K', '‡L', '‡M', '‡N', '‡O', '‡P', '‡Q', '‡R','‡S','‡€', '‡')));
  define('TO_SPECIAL_CHAR_ARR',serialize(array('mm', 'cm', 'km', 'mg', 'kg', 'cc', 'm^2', 'No.', 'K.K.', 'TEL',
                                              'ƒ~ƒŠ', 'ƒLƒ', 'ƒZƒ“ƒ`', 'ƒ[ƒgƒ‹', 'ƒOƒ‰ƒ€', 'ƒgƒ“', 'ƒA[ƒ‹', 'ƒwƒNƒ^[ƒ‹',
                                              '‚k', 'ƒƒbƒg', 'ƒJƒƒŠ[', 'ƒhƒ‹', 'ƒZƒ“ƒg', 'ƒp[ƒZƒ“ƒg', 'ƒ~ƒŠƒo[ƒ‹', 'ƒy[ƒW',
                                              'ã', '’†', '‰º', '¶', '‰E', '(Š”)', '(—L)', '(‘ã)',
                                              '–¾Ž¡', '‘å³',  'º˜a',  '•½¬',
                                              'I' , 'II',  'III',  'IV',  'V' ,  'VI',  'VII', 'VIII', 'IX', 'X',
                                              'ƒ°', 'ƒ¢', 'ç',
                                              '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16',
                                               '17', '18', '19', '20', '"', ',,')));
											   
											   
	
	//sjis -> utf8 ???¬ H
	// sjis => ”¼Šp ‡\
	//echo $a."<br> ";
	$_3 = "‡V";
	//echo $un = utf8_encode("”¼Šp");
echo "ÎE";
	exit;
	$__3 ="IIIIII";
	$special_char_from_arr = (unserialize(FROM_SPECIAL_CHAR_ARR));
	$special_char_to_arr = (unserialize(TO_SPECIAL_CHAR_ARR));
	$prev_regex_enc=mb_regex_encoding();
var_dump($special_char_from_arr);
	 mb_regex_encoding('UTF-8');
	
	
	$test = "Šp‡V";
	echo "xxxx";
	echo mb_convert_encoding($special_char_from_arr[40],"EUC-JP","SJIS");
	echo "xxx";
	//$b_iro_n = str_replace($special_char_from_arr[39],$special_char_to_arr[39],$test);
	$b_iro_n = str_replace($special_char_from_arr,$special_char_to_arr,$test);
	echo $b_iro_n;
	echo   $a = mb_convert_encoding($b_iro_n,"UTF-8","SJIS");
	exit;
	//mb_regex_encoding($prev_regex_enc);
	echo   $a = mb_convert_encoding($b_iro_n,"UTF-8","SJIS");
	exit;
	echo  $aa = iconv( "SJIS","UTF-8", $b_iro_n);
	
//	echo "xxu".str_replace("‡V","\x49\x49\x49",$_3);
	 $a = mb_convert_encoding($__3,"UTF-8","SJIS");
	 echo $a;
	 exit;
	  $a = "aaƒuƒ‹[‡VƒŒƒbƒh‡U";
	 echo "xxu2".str_replace("‡V","xx",$a);
	 //echo $a;
	exit;
	 $a = mb_convert_encoding($lastchar,"UTF-8","SJIS");
	 echo "\xe2\x85\xa1"."aaa$a";
	 echo "json".json_encode($utf8);
	 
	 $letters = 'a';
$fruit   = 'apple11';
$text    = 'a p';
$output  = str_replace($letters, $fruit, $text);
echo $output;
	 exit;
	//$prev_regex_enc=mb_regex_encoding();
	// mb_regex_encoding('UTF-8');
	// $sjis = "’|“c˜aO";
	// echo $sjis;
	// mb_regex_encoding($prev_regex_enc);
	
//	$sjis_url = urlencode($sjis);
//	$data = array ("b_iro_n" => $sjis);
//	$data_ = bsm_conv_special_chars("INSERT",$data,"b_iro_n");
//	var_dump($data_);
	//$sjis_url_utf8 = mb_convert_encoding($sjis,"UTF-8","SJIS");
	
	//$sjis_json = json_encode($sjis_url_utf8);
	
	//echo urldecode($sjis_url_utf8);
	
	//echo mb_convert_encoding("’†‡V","UTF-8","SJIS");
	
	var_dump($SPECIAL_CHAR_MAP);
	
	  function bsm_conv_special_chars($dml_flag,$data,$target_obj = null){
      if($target_obj == null) {
          $target_obj = unserialize(SPECIAL_CHAR_TARGET_OBJ);
      }else{
          $target_obj = array_merge($target_obj,unserialize(SPECIAL_CHAR_TARGET_OBJ));
      }
      foreach($target_obj as $k => $v){
          $change_data[$k] = $data[$k];
      }
      $change_data = str_replace(unserialize(FROM_SPECIAL_CHAR_ARR),unserialize(TO_SPECIAL_CHAR_ARR),$change_data);
      foreach($change_data as $k => $v){
          $data[$k] = $v;
      }
      return $data;
  }
?>


