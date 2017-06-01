<?php 

	mb_convert_encoding($_REQUEST['name'], 'EUC-JP', 'UTF-8');
	var_dump($_REQUEST);
	echo "xx".get_magic_quotes_gpc()."xx";
	echo phpinfo();
	?>
	
	