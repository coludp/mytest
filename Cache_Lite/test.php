<?php 
//require_once("MemcacheLite.class.php");
require_once("Output.class.php");
ini_set ('memory_limit', '1024M') ;

function condb(){
	$dbhost = "localhost";
	$dbname = "test";
	$dbport = "5432";
	$dbuser = "postgres";
	$dbpassword = "123456";
	
	$conn_string ="host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpassword" ; 
	
	$dbconn = pg_connect($conn_string);
	if ($dbconn) {
		
	}else{
		echo "链接失败";
	}
	return $dbconn;
  // pg_close($dbconn);
}
$conn = condb();
$sql = "select * from test_cache limit 13000";
//$memcache = new MemcacheLite($sql);

//$cache =new Cache_Lite_Output($sql); 

//$result_object_array = $memcache->get_data();

//if( !$result_object_array ) {
echo "reload.<br/>";
    //DBから取得してみます
    $result = pg_query ( $conn, $sql );
    if( pg_result_error( $result ) != "" || $result === FALSE){
        // エラー掲出
        $this->_putSqlErrLog($sql);
        echo -1;
    }

    //キャッシュするため、配列に変換して保存する
    $count = pg_num_rows( $result );
    for ( $i = 0; $i < $count; $i++ ) {
          $result_object_array[$i] = pg_fetch_object( $result, $i );
    }

    //キャッシュに保存する
   // $memcache->save_data($result_object_array);
//}
echo "<pre>";
function getMillisecond() {
list($t1, $t2) = explode(' ', microtime());
return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}

//var_dump($result_object_array);
$testarr = array();
echo $time1 = getMillisecond();
echo "<br/>";
$i=0;
$a = "";
foreach($result_object_array as $k=>$v){
	foreach($v as $key => $value){
		$a .= $value."<br/>";
	}
}
$outputcache = new Output("test1",$a);
//$outputcache->output_data("test1");

echo $time2 = getMillisecond() ;
echo "<br/>";
echo $time2-$time1; 
 pg_close($conn);
?>