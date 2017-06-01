<?php
//require("Lite.php");
require_once('Output.php'); 
define("MemcacheLite_TMP_DIR","./caches");
//http://blog.chinaunix.net/uid-271318-id-2452002.html  documentation
//http://pear.php.net/package/Cache_Lite/docs
class MemcacheLite {
    var $cache_lite;
    var $sql;
	//var $outputdata;
    function MemcacheLite ($sql) {
        $this->sql = "";
        $this->sql = md5($sql);
        $this->cache_lite = new Cache_Lite(
								array('cacheDir' => MemcacheLite_TMP_DIR
									,'caching' => 'true' //  启用 caching
									,'hashedDirectoryLevel' => 1  //设置hash目录结构分层. 0 代表 "没有hash目录结构", 1 代表 "使用一层目录", 2 代表 "两层"... 只有在有很多的cache文件时。这个选项才可以加速cache_lite。只有进行具体的测试才可以帮助你找到适合的值. 也许, 1 或 2 是一个好的开始.
									,'automaticSerialization' => 'true' // 启用  自动序列化 (它用于直接存储不为字符串的数据，但是它会比较慢)
									,'automaticCleaningFactor' => 200  // 启用 自动清除进程. 当一个新的cache文件写入的时候，自动清除进程销毁太旧的 (用一个给定的生命周期) cache 文件. 0 代表 "没有cache自动清除", 1 代表 "系统的 cache 清除" (slow), x>1 意味着 "当x 次cache 写入时。随机自动 清除  1 次". 一个20到200之间的值也许是好的开始.
									,'lifeTime' => 160));       //  Cache以秒为单位的生命周期
		$this->cache_output = new Cache_Lite_Output();
    }

    function get_data () {
		
        if (!($res = $this->cache_lite->get($this->sql))){
            return false;
        }
        $this->memCacheDestruct();
        return $res;
    }

    function save_data ($data_array) {
        $this->cache_lite->save($data_array,$this->sql);
        $this->memCacheDestruct();
    }

    function memCacheDestruct () {
        unset($this->cache_lite);
    }
		
}
?>