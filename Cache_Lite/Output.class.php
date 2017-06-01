<?php 
require_once("Output.php");
define("MemcacheLite_TMP_DIR","./caches");
Class Output {
	var $output;
	var $options = array( 
		'cacheDir' => MemcacheLite_TMP_DIR
		,'caching' => 'true' //  启用 caching
		,'hashedDirectoryLevel' => 1  //设置hash目录结构分层. 0 代表 "没有hash目录结构", 1 代表 "使用一层目录", 2 代表 "两层"... 只有在有很多的cache文件时。这个选项才可以加速cache_lite。只有进行具体的测试才可以帮助你找到适合的值. 也许, 1 或 2 是一个好的开始.
		,'automaticSerialization' => 'true' // 启用  自动序列化 (它用于直接存储不为字符串的数据，但是它会比较慢)
		,'automaticCleaningFactor' => 200  // 启用 自动清除进程. 当一个新的cache文件写入的时候，自动清除进程销毁太旧的 (用一个给定的生命周期) cache 文件. 0 代表 "没有cache自动清除", 1 代表 "系统的 cache 清除" (slow), x>1 意味着 "当x 次cache 写入时。随机自动 清除  1 次". 一个20到200之间的值也许是好的开始.
		,'lifeTime' => 160
	); 
	function Output($page,$outputdata){
		$cache = new Cache_Lite_Output($this->options);
		if(!$cache->start($page)){
			echo $outputdata.time();
			$cache->end();
		}
	}
}
?>