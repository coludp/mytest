<?php
/**
 * Tree 类
 * 功能 产生"树状"效果的HTML和JavaScript脚本
 * 使用方法 见测试例
 * 说明
 * 1、简化了原版本的默认属性的设置，增加此说明
 * 2、缩减了javaScript脚本
 **/
class Tree {
  var $data = array();
  var $tpl = '<table cellpadding=0 cellspacing=0 border=0 style="font-size:9pt">$块</table>';
  var $block = '<tr onClick="tree_onclick()" bs="$标识"><td>$主图标</td><td>$副图标 $文字</td></tr><tr style="display:$可见"><td background="$连线"></td><td value="$编号">$子树</td></tr>';

  // 节点图片
  var $连线I = "images/tree_I.gif";
  var $连线L = "images/tree_L.gif";
  var $连线T = "images/tree_T.gif";
  var $打开L = "images/OpenFolder_L.gif";
  var $打开T = "images/OpenFolder_T.gif";
  var $关闭L = "images/CloseFolder_L.gif";
  var $关闭T = "images/CloseFolder_T.gif";
  var $关闭  = "images/FolderClose.gif";
  var $打开  = "images/FolderOpen.gif";
  var $叶    = "images/icon-page.gif";

  var $bond = "数据加载中..."; // 动态加载子树时的提示串
  var $all = false; // 是否产生子树
  var $child_node_pos = 1; // 指示子节点出现的位置，js脚本使用。根据模板中"$子树"的位置指定。

  /**
   * Tree 构造函数
   * 说明 
   */
  function Tree() {
	if(func_num_args() > 0) {
		foreach(func_get_args() as $value)
			if(is_array($value))
				foreach($value as $k=>$v)
					$this->$k = $v;
			else {
				eval(eval("\$this->$value;"));
			}
	}
	$ar = $this->images;
	$this->images = array(
		array($this->连线L,$this->连线T,$this->叶),
		array($this->打开L,$this->打开T,$this->关闭,$this->打开),
		array($this->关闭L,$this->关闭T,$this->关闭,$this->打开),
		array("none",$this->连线I),
		);
	if(!is_array($this->bond))
		$this->bond = array("",$this->bond);
  }

  /**
   * table 方法
   * 功能 产生以表格方式组织的数据
   * 说明 主要用于调试
   */
  function table($format="",$head="") {
	if(count($this->data) <= 0) return $this->out = "";
	$out = "<table $format><tr>";
	if($head == "") {
		foreach($this->data as $v) break;
		$head = array_keys($v);
	}
	foreach($head as $v)
		$out .= "<th>$v</th>";
	$out .= "</tr>";
	foreach($this->data as $value) {
		$out .= "<tr>";
		foreach($head as $k)
			$out .= "<td>$value[$k]</td>";
		$out .= "</tr>";
	}
	return $this->out = "$out</table>";
  }

  /**
   * node_all 方法
   * 功能 根据模板构造全部数据
   */
  function node_all($id, $key=array("id","pid","text","link")) {
	$this->all = true;
	return $this->node($id,$key);
  }

  /**
   * index 方法
   * 功能 索引树
   * 说明 当直接引入数据时，数据的排列可能不符合程序的要求。本方法可以重新排列数据。
   */
  function index($start=0, $key=array("id","pid")) {
	$fun = create_function('$a,$b'
		,"if(\$a[$key[1]] == \$b[$key[1]]) return 0;"
		."return \$a[$key[1]] > \$b[$key[1]]?1:-1;");
	$out = array();
	foreach($this->data as $k=>$v) {
		if($v[$key[1]] == $start)
			$out[] = $v;
		else
			$this->insert($v,$out,$key);
	}
	return $this->data = $out;
  }

  /**
   * insert 方法
   * 功能 插入节点
   */
  function insert($value,$array="",$key=array("id","pid")) {
	if($array == "") $array =& $this->data;
	if(count($array) <= 0) {
		$array[] = $value;
		return true;
	}
	$k = $m = $n = 0;
	$ar = array();
	foreach($array as $t) {
		$k++;
		if($t[$key[0]] == $value[$key[1]]) $m = $k;
		if($t[$key[1]] == $value[$key[1]] || in_array($t[$key[1]],$ar)) {
			$n = $k;
			$ar[] = $t[$key[0]];
		}
	}
	$k = max($m,$n);
	if($k == 0) return false;
	$array = array_merge(array_slice($array,0,$k),array($value),array_slice($array,$k));
	$this->build($key);
	return true;
  }

  /**
   * javascript 方法
   * 功能 送出浏览器javascript脚本
   */
  function javascript() {
	static $key;
	if(! empty($key)) return;
	$key = 1; // 确保js脚本只输出一次
	echo <<< JS
<script>
function tree_onclick() {
  el = event.srcElement;
  switch(event.srcElement.tagName) {
	case "A":
	case "IMG":
		while(el.tagName != "TR") el = el.parentElement;
		break;
	default:
		return;
  }
  if(el.bs == 0) return; // bs=0 表示是叶节点; =1 为L接; >1 为T接
  var pos = el.rowIndex;
  var el1 = el.parentElement.rows[pos+1];
  if(el1.style.display == "block") {
	el1.style.display = "none";
	el.cells[0].children[0].src = (el.bs==1?"{$this->打开L}":"{$this->打开T}");
	if(el.cells[1]) if(el.cells[1].children[0]) el.cells[1].children[0].src = "{$this->关闭}";
  }else {
	el1.style.display = "block";
	el.cells[0].children[0].src = (el.bs==1?"{$this->关闭L}":"{$this->关闭T}");
	if(el.cells[1]) if(el.cells[1].children[0]) el.cells[1].children[0].src = "{$this->打开}";
  }
  el = el1.cells[{$this->child_node_pos}];
  if(el.innerHTML == bond) Tree_load.src = "?node="+el.value;
}
bond = "{$this->bond[1]}";
myload = 0;
function tree_load_end() { if(myload != 0) el.innerHTML = myload; }
</script>
<script id='Tree_load' src='' onreadystatechange='tree_load_end()'></script>
JS;
  }
  function find($id,$key=array("id","pid")) {
	foreach($this->data as $v)
		if($v[$key[1]] == $id) return true;
	return false;
  }

  /**
   * filter方法
   * 功能 返回$id的一级子集
   */
  function filter($id,$key=array("id","pid")) {
	$cmd = create_function('$var',"return(\$var[$key[1]]=='$id');");
	return array_filter($this->data,$cmd);
  }

  /**
   * build方法
   * 功能 计算各节点的一级子节点数，用附加的node_childs表示
   */
  function build($key=array("id","pid")) {
	foreach($this->data as $k=>$v) {
		$this->data[$k][node_childs] = count($this->filter($v[$key[0]]));
	}
  }

  /**
   * node 方法
   * 功能 根据模板构造指定节点数据
   */
  function node($id,$key=array("id","pid","text","link")) {
	$ar = $this->filter($id,$key);
	if(($n = count($ar)) == 0) return "";
	$块 = "";
	foreach($ar as $value) {
		$n--;
		$p = sign($value[node_childs]);
		$可见 = "none";//"block";
		$标识 = $p==0 ? $p : $p+$n;
		$主图标 = "<img src=\"{$this->images[$p][sign($n)]}\" align=absmiddle>";
		$副图标 = empty($this->images[$p][2]) ? "" : "<img src=\"{$this->images[$p][2]}\" align=absmiddle>";
		$文字 = empty($value[$key[3]]) ? $value[$key[2]] : "<a href=\"{$value[$key[3]]}\">{$value[$key[2]]}</a>";
		$连线 = $this->images[3][sign($n)];

		$编号 = $value[id];
		$子树 = $this->all ? $this->node($value[$key[0]],$key) : $this->bond[$p];
		$块 .= eval("return \"".AddSlashes($this->block)."\";");
	}
	return eval("return \"\n".AddSlashes($this->tpl)."\";");
  }

  /**
   * display 方法
   * 功能 显示
   */
  function display($type="node_all",$key=array("id","pid","text","link")) {
	switch($type) {
		case "table":
			$this->table();
			break;
		case "node_all":
			$this->out = $this->node_all(0,$key);
			break;
	}
	echo $this->out;
	$this->javascript();
  }
}

/*** 符号函数 ***/
if (! function_exists('sign')) {
  function sign($v) {
    if($v == 0) return 0;
    return abs($v)/$v;
  }
}
?>