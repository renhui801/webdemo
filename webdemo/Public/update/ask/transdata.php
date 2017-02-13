<?php
$ac_code = $dir;
//查参数找type
$sql = "select * from args where ac_code='$ac_code'";
//echo $sql;
$res = mysql_query($sql);
$rows = array();
while($row = mysql_fetch_array($res)){
	$rows[] = $row;
}
//精确查一次
$findequal = 0;
foreach($rows as $row){
	$key1 = $row['key1'];
	$val1 = $row['val1'];
	$key2 = $row['key2'];
	$val2 = $row['val2'];
	//参数值首字符串匹配
	if((!$key1 || $key1 && $_GET[$key1] == $val1 ) && (!$key2 || $key2 && $_GET[$key2] == $val2) ){
		//echo 'eee';exit;
		$type = $row['transtype'];
		$url = $row['url'];
		$rm = (int) $row['number'];
		$arg_id = $row['id'];
		$findequal = 1;
		break;
	}
}
//如果精确的没匹配到，就模糊查一次
if(!$findequal){
	foreach($rows as $row){
		$key1 = $row['key1'];
		$val1 = $row['val1'];
		$key2 = $row['key2'];
		$val2 = $row['val2'];
		//参数值首字符串匹配
		if((!$key1 || $key1 && stripos($_GET[$key1],$val1)===0 ) && (!$key2 || $key2 && stripos($_GET[$key2],$val2)===0) ){
			//echo 'eee';exit;
			$type = $row['transtype'];
			$url = $row['url'];
			$rm = (int) $row['number'];
			$arg_id = $row['id'];
			break;
		}
	}
}
if(!$type){
	$qs = $_SERVER['QUERY_STRING'];
	$geturl = $url.'?'.$qs;
	$sql = "insert into records (`url`,`res`,`is_rm`,`create_time`,`transtype`,logtext,create_day,arg_id,ac_code) 
		values('$geturl','nomatch','10','".time()."','nomatch','','".date('Y-m-d')."','0','".$ac_code."')";
	mysql_query($sql);
	exit('access dennid');
}


$retry = 5;
$count = getCountByArg($arg_id);
$countRm = getCountRmByArg($arg_id);

$qs = $_SERVER['QUERY_STRING'];
$geturl = $url.'?'.$qs;

$tourl = $url.'?'.$qs;

$return = 'rm';
$is_rm = 1;
$logtext = '';
$sendCount = getSendCountByArg($arg_id);
//echo $sendCount;
//echo $rm;
if($sendCount < $rm){
	while($retry>0){
		$return = file_get_contents($tourl);
		$logtext = $return;
		if(strtolower(trim($return))=='ok'){
			$is_rm = 0;
			break;
		}else{
			$return = 'notsend';
			$is_rm = 2;
			$retry--;
		}
	}
}
$sql = "insert into records (`url`,`res`,`is_rm`,`create_time`,`transtype`,logtext,create_day,arg_id,ac_code) 
		values('$geturl','$return','$is_rm','".time()."','$type','".mysql_escape_string($logtext)."','".date('Y-m-d')."','$arg_id','$ac_code')";
//echo $sql;
$res = mysql_query($sql);
//var_dump($res);
if($res && ($is_rm==0 || $is_rm==1)){
	echo 'ok';
}else{
	echo 'error';
}
?>