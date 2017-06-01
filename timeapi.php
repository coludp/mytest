<?php 
$cul = "http://picture.goobike.com/010/0100001/J/0100001B3016031900308.jpg";
$curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);//?取内容url
        curl_setopt($curl,CURLOPT_HEADER,1);//?取http?信息
        curl_setopt($curl,CURLOPT_NOBODY,1);//不返回html的body信息
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);//返回数据流，不直接?出
        curl_setopt($curl,CURLOPT_TIMEOUT,30); //超???，?位秒
        curl_exec($curl);
        $rtn= curl_getinfo($curl,CURLINFO_STARTTRANSFER_TIME);
        curl_close($curl);
        echo $rtn;
?>


