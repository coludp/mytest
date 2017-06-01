<?php 


	
	 define('TO_SPECIAL_CHAR_ARR',serialize(array('mm', 'cm', 'km', 'mg', 'kg', 'cc', 'm^2', 'No.', 'K.K.', 'TEL',
                                              'ミリ', 'キロ', 'センチ', 'メートル', 'グラム', 'トン', 'アール', 'ヘクタール',
                                              'Ｌ', 'ワット', 'カロリー', 'ドル', 'セント', 'パーセント', 'ミリバール', 'ページ',
                                              '上', '中', '下', '左', '右', '(株)', '(有)', '(代)',
                                              '明治', '大正',  '昭和',  '平成',
                                              'I' , 'II',  'III',  'IV',  'V' ,  'VI',  'VII', 'VIII', 'IX', 'X',
                                              'Σ', 'Δ', '∫',
                                              '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16',
                                               '17', '18', '19', '20', '"', ',,')));
											   
define('TO_SPECIAL_CHAR_SJIS_ARR',serialize(array
('\x87\x69','\x87\x70','\x87\x71','\x87\x72','\x87\x73','\x87\x74','\x87\x75','\x87\x82','\x87\x83','\x87\x84',
'\x87\x5f','\x87\x60','\x87\x61','\x87\x62','\x87\x63','\x87\x64','\x87\x65','\x87\x66',
'\x87\x67','\x87\x68','\x87\x69','\x87\x7a','\x87\x6b','\x87\x6c','\x87\x6d','\x87\x6e',
'\x87\x85','\x87\x86','\x87\x87','\x87\x88','\x87\x89','\x87\x8a','\x87\x8b','\x87\x8c',
'\x87\x8d','\x87\x8e','\x87\x8f','\x87\x7e',
'\x87\x55','\x87\x56','\x87\x57','\x87\x58','\x87\x59','\x87\x5a','\x87\x5b','\x87\x5c','\x87\x5d',
'\x87\x94','\x87\x99','\x87\x93',
'\x87\x40','\x87\x41','\x87\x42','\x87\x43','\x87\x44','\x87\x45','\x87\x46','\x87\x47','\x87\x48','\x87\x49','\x87\x4a','\x87\x4b','\x87\x4c','\x87\x4d','\x87\x4e','\x87\x4f',
'\x87\x50','\x87\x51','\x87\x52','\x87\x53','\x87\x80','\x87\x81'
)));


	var_dump(TO_SPECIAL_CHAR_SJIS_ARR);
	/usr/sa_api/current/web/test/bike-entrydata.test.php
	
	header("Content-type: application\json; charset=sjis");
	$_3 = "竇｢";
	$__3 ="IIIIII";
	echo "\x87\x56";
	exit;
	echo "\xe3\x80\x9d\x2c\x2c\x849";
	exit;
	$special_char_from_arr = (unserialize(FROM_SPECIAL_CHAR_ARR));
	$special_char_to_arr = (unserialize(TO_SPECIAL_CHAR_ARR));
	$prev_regex_enc=mb_regex_encoding();
var_dump($special_char_from_arr);
	 mb_regex_encoding('UTF-8');
	
	
	$test = "隗停・";
	echo "xxxx";
	echo mb_convert_encoding($special_char_from_arr[40],"EUC-JP","SJIS");
	echo "xxx";
	
?>







