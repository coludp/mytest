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

// 1.上传到服务器，pics-uplown ，对上传代码base转码， 最好不用保存到服务器然后显示， （如果必须保存需要删除）
// D:/web/jQuery/jquery-1.9.1.js

?>
<script src="ImageMin.js"></script>
<script src="ImagePreview.js"></script>
<table width="100%" height="42" border="0" cellpadding="0" cellspacing="0">
  <form action="ajax.php" method="post"  name="imgform" enctype="multipart/form-data">
  <tr>
    <td width="350">	<input type="file" name="upfile" id="idFile">
  	<input type="submit" name="upimg" value="上传"/></td>
	<td><img id="idImg" /></td>
  </tr>
  </form> 
</table>
<script>
var ip = new ImagePreview( $$("idFile"), $$("idImg"), {
	maxWidth: 40, maxHeight: 40, action: ""
});
ip.img.src = ImagePreview.TRANSPARENT;
ip.file.onchange = function(){ ip.preview(); };
</script>
