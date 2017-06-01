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
//          佛曰:


function is_img($file)
{
    if (!(file_exists($file) && ($fp=fopen($file, "rb")))) return false;

    $head = fread($fp, 8);
    fclose($fp);

    if ($head === "\x89PNG\x0d\x0a\x1a\x0a")
        return 'png';
    elseif (substr($head, 0, 2) === "\xff\xd8")
        return 'jpg';
    elseif (preg_match('/^GIF8[79]a/', $head))
        return 'gif';

    return false;
}
$pic = "./test.jpg";

is_img($pic);



?>


