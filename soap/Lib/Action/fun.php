<?php
//返回地区ID和名字
$flagT = "FLAG:1";
$flagF = "FLAG:0";
function dq($Province) {
	//	return $Province;
	$sql = mysql_query("select * from j_city where cityName like '$Province' limit 1");
	while ($row = mysql_fetch_array($sql)) {
		$dqa = array();
		$dqa['cityId'] = $row['cityId'];
		$dqa['cityName'] = $row['cityName'];
		return $dqa;
	}
}

//检查OTC同步过来的会员资料是否存在
function havedata($table, $account) {
	$sql = mysql_query("SELECT * FROM $table where account = '$account'");
	$row = mysql_fetch_array($sql);
	if ($row == '') {
		$flag = "1";
	} else {
		$flag = "0";
	}
	return $flag;
}

//返回列表数据
function pageList($limit = "1") {
	$sql = mysql_query("SELECT title,id,price,ePrice,brand,classId,smallPic,smallText,proText FROM j_product limit $limit");
	while ($row = mysql_fetch_array($sql)) {
		$as .= $row['id'] . ":" . $row['title'] . ":" . $row['price'] . ":" . $row['ePrice'] . ":" . $row['brand'] . ":" . $row['classId'] . ":" . $row['smallPic'] . ":" . $row['smallText'] . ":" . $row['proText'] . ":" . "<hr>";
	}
	return $as;
}
function objectToArray($e){
    $e=(array)$e;
    foreach($e as $k=>$v){
        if( gettype($v)=='resource' ) return;
        if( gettype($v)=='object' || gettype($v)=='array' )
            $e[$k]=(array)objectToArray($v);
    }
    return $e;
}




		
?>
