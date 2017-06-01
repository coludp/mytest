
<?php
/***
Tree 类样例1
从数组读取数据，生成完整的树。
***/
error_reporting(0); 
include "tree_class.php";
$t = new tree;

$ar = array(
array(id=>1,pid=>0,text=>"PHP",link=>"#"),
array(id=>2,pid=>1,text=>"函数"),
array(id=>5,pid=>1,text=>"类"),
array(id=>3,pid=>0,text=>"ASP"),
array(id=>4,pid=>2,text=>"数组"),
array(id=>6,pid=>3,text=>"函数"),
array(id=>7,pid=>0,text=>"JSP1"),
array(id=>8,pid=>1,text=>"JSP2"),
array(id=>9,pid=>0,text=>"JSP3"),
array(id=>10,pid=>3,text=>"JSP3")
);

foreach($ar as $v) {
  $t->insert($v);
}

$t->display();
?>

例2
<?
/***
Tree 类样例2
从数据库读取数据，生成完整的树。

#
# 数据表的结构 `menu`
#

CREATE TABLE menu (
  id tinyint(4) NOT NULL default '0',
  name varchar(20) NOT NULL default '0',
  pid tinyint(4) NOT NULL default '0'
) TYPE=MyISAM;
***/

include "tree_class.php";
$t = new tree;

$conn = mysql_connect();
mysql_select_db("test");
$sql = "select * from menu"; 
$rs = mysql_query($sql);

while($row = mysql_fetch_row($rs)) {
  $t->insert(array(id=>$row[0], pid=>$row[2], text=>$row[1]));
}

$t->display();
?>
例3
<?php
/***
Tree 类样例3
从数据库读取数据，交互生成树。

#
# 数据表的结构 `menu`
#

CREATE TABLE menu (
  id tinyint(4) NOT NULL default '0',
  name varchar(20) NOT NULL default '0',
  pid tinyint(4) NOT NULL default '0'
) TYPE=MyISAM;
***/

include "tree_class.php";
$t = new tree("bond='等着瞧，哈哈...'");

$conn = mysql_connect();
mysql_select_db("test");
$sql = "select * from menu"; 
$rs = mysql_query($sql);

while($row = mysql_fetch_row($rs)) {
  $t->insert(array(id=>$row[0], pid=>$row[2], text=>$row[1]));
}

if(! isset($_GET['node'])) {
  $t->javascript();
  echo $t->node(0);
}else { // 分步加载时返回指定节点
  $s = $t->node($_GET['node']);
  $s = preg_replace("/\r?\n/","\\n",$s);
  echo "myload = '$s'";
}
?>
例4
<?php
/***
Tree 类样例4
从数据库读取数据，按日期型字段内容生成完整的树。

#
# 数据表的结构 `mydates`
#

CREATE TABLE mydates (
  id int(15) NOT NULL auto_increment,
  name varchar(20) NOT NULL default '',
  datetime datetime NOT NULL default '0000-00-00 00:00:00',
  contents text NOT NULL,
  outorin char(1) NOT NULL default '1',
  UNIQUE KEY id (id)
) TYPE=MyISAM;
***/

include "tree_class.inc.php";

$notebook = mysql_connect();
mysql_select_db("test");
$query_year = "SELECT
 YEAR(datetime),
 MONTH(datetime),
 DAYOFMONTH(datetime),
mydates.* FROM mydates order by datetime";
$rs = mysql_query($query_year, $notebook) or die(mysql_error());

$oy = $om = $od = 0;
while(list($y,$m,$d,$id) = mysql_fetch_row($rs)) {
  if($y > $oy) {
    $om = $od = 0;
    $oy = $y;
    $ar[] = array(id=>$y,pid=>0,text=>"{$y}年");
  }
  if($m > $om) {
    $od = 0;
    $om = $m;
    $ar[] = array(id=>sprintf("%d%02d",$y,$m),pid=>$y,text=>"{$m}月");
  }
  if($d > $od) {
    $od = $d;
    $ar[] = array(id=>sprintf("%d%02d%02d",$y,$m,$d),pid=>sprintf("%d%02d",$y,$m),text=>"{$d}日");
  }
}

$t = new tree;
foreach($ar as $v) {
  $t->insert($v);
}
$t->display();
?>
例5
<?php
/***
Tree 类样例5
从基类派生出目录类

把服务器端目录以树的形式显示。
***/

include "tree_class.inc.php";

class Tree_dir extends Tree {
  var $叶 = array(
"images/0.gif",
asp=>"images/asp.gif",
bmp=>"images/bmp.gif",
gif=>"images/gif.gif",
htm=>"images/htm.gif",
html=>"images/htm.gif",
ini=>"images/ini.gif",
inc=>"images/php.gif",
jpg=>"images/jpg.gif",
jpeg=>"images/jpeg.gif",
js=>"images/js.gif",
php=>"images/php.gif",
png=>"images/png.gif",
txt=>"images/txt.gif",
vbs=>"images/vbs.gif"
);

  var $code = '
$m = 0;
if(is_array($a)) {
$m += 1;
$a = strtoupper($a[name]);
}else
$a = strtoupper($a);
if(is_array($b)) {
$m = ($m+2)%3;
$b = strtoupper($b[name]);
}else
$b = strtoupper($b);
if($m > 0) return $m==1 ? -1 : 1;
if($a == $b) return 0;
return $a > $b ? $k : -$k;';

  /**
   * node 方法
   * 功能 根据模板构造指定节点数据
   */
  function node($id,$key=array("id","pid","text","link")) {
$ar = $this->dirtree_list($id);
if(($n = count($ar)) == 0) return "";
$块 = "";
foreach($ar as $k=>$value) {
$n--;
$p = is_array($value) ? 1:0;
$可见 = "none";//"block";
$标识 = $p==0 ? $p : $p+$n;
$主图标 = "<img src=\"{$this->images[$p][sign($n)]}\" align=absmiddle>";
if($p > 0)
$img = $this->images[$p][2];
else
if(!($img=$this->images[$p][2][strtolower(substr(strrchr($value,"."),1))]))
$img=$this->images[$p][2][0];

$副图标 = empty($this->images[$p][2]) ? "" : "<img src=\"$img\" align=absmiddle>";
$文字 = $p==0 ? $value : $value[name];
$连线 = $this->images[3][sign($n)];

$编号 = urlencode($p==0 ? $value : $value[path]);
$子树 = $this->all ? $this->node($value[$key[0]],$key) : $this->bond[$p];
$块 .= eval("return \"".AddSlashes($this->block)."\";");
}
return eval("return \"\n".AddSlashes($this->tpl)."\";");
  }
  function dirtree_list($path=".") {
$ar = array();
$d = dir($path);
while(($v=$d->read()) != null) {
$id = count($array);
if($v == "." || $v == "..")
continue;
$file = $d->path."/".$v;
if(is_dir($file))
$ar[] = array(name=>$v,path=>$file);
else
$ar[] = $v;
}
$d->close();
$cmd = create_function('$a,$b','$k = 1;'.$this->code);
usort($ar,$cmd);
return $ar;
  }
  /**
   * display 方法
   * 功能 显示
   */
  function display() {
if(! isset($_GET['node'])) {
$this->javascript();
echo $this->node(".");
}else { // 分步加载,返回指定节点
$fp=fopen("xzn.txt","w");
fwrite($fp,$_GET['node']);
$s = $this->node($_GET['node']);
$s = preg_replace("/\r?\n/","",$s);
fwrite($fp,$s);
fclose($fp);
echo "myload = '$s'";

}
  }
}

$t = new Tree_dir;
$t->display();
?>
例6
<?php
/***
Tree 类样例6
改变输出样式1
***/

include "tree_class.inc.php";
$t = new tree(
  '连线I = ""',
  '连线L = "images/icon-page.gif"',
  '连线T = "images/icon-page.gif"',
  '关闭L = "images/CloseFolder.gif"',
  '关闭T = "images/CloseFolder.gif"',
  '打开L = "images/OpenFolder.gif"',
  '打开T = "images/OpenFolder.gif"',
  '关闭  = ""',
  '打开  = ""',
  '叶    = ""'
  );
$ar = array(
array(id=>1,pid=>0,text=>"PHP",link=>"#"),
array(id=>2,pid=>1,text=>"函数"),
array(id=>5,pid=>1,text=>"类"),
array(id=>3,pid=>0,text=>"ASP"),
array(id=>4,pid=>2,text=>"数组"),
array(id=>6,pid=>3,text=>"函数"),
array(id=>7,pid=>0,text=>"JSP")
);

foreach($ar as $v) {
  $t->insert($v);
}

$t->display();
?>
例7
<?
/***
Tree 类样例7
改变输出样式2
***/

include "tree_class.inc.php";
$t = new tree(
  '页="images/icon-page.gif"',
  '连线L="images/icon-page.gif"',
  '连线T="images/icon-page.gif"',
  '打开L="images/icon-expandall.gif"',
  '打开T="images/icon-expandall.gif"',
  '关闭L="images/icon-closeall.gif"',
  '关闭T="images/icon-closeall.gif"',
  'child_node_pos = 0'); // child_node_pos 指示子节点出现的位置

  $t->tpl = '<table width=100% bgcolor=#EFEFEF cellpadding=0 cellspacing=1 border=0 style="font-size:9pt">$块</table>';
  $t->block = '<tr bgcolor=#DFDFDF onClick="tree_onclick()" bs=$标识><td>$主图标 $文字</td></tr><tr style="display:$可见"><td value="$编号">$子树</td></tr>';

$ar = array(
array(id=>1,pid=>0,text=>"PHP",link=>"#"),
array(id=>2,pid=>1,text=>"函数"),
array(id=>5,pid=>1,text=>"类"),
array(id=>3,pid=>0,text=>"ASP"),
array(id=>4,pid=>2,text=>"数组"),
array(id=>6,pid=>3,text=>"函数"),
array(id=>7,pid=>0,text=>"JSP")
);

foreach($ar as $v) {
  $t->insert($v);
}

$t->display();
?>