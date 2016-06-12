<?php
class IndexAction extends Action {
	public function index() {
		$this -> show('欢迎使用易得网数据同步接口！', 'utf-8');
	}

	public function wsdl() {
		require_once 'JJWS.php';
		ini_set('soap.wsdl_cache_enabled', '0');
		//关闭WSDL缓存
		//打开WSDL
		if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
			$url = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['PHP_SELF'] . '?wsdl';
			$servidorSoap = new SoapServer($url);
			$servidorSoap -> setClass('JJWS');
			$servidorSoap -> handle();
		} else {
			require ('SoapDiscovery.class.php');
			//			require_once 'SoapDiscovery.class.php';
			// 创建WSDL
			$disco = new SoapDiscovery('JJWS', 'JJWS');
			header("Content-type: text/xml");
			if (isset($_SERVER['QUERY_STRING']) && strcasecmp($_SERVER['QUERY_STRING'], 'wsdl') == 0) {
				echo $disco -> getWSDL();
			} else {
				echo $disco -> returnWSDL();
			}
		}
	}
function client2() {
	$client2 = new SoapClient("http://113.240.250.159:9272/integralservice/services/traderQueryService?wsdl");
	return $client2;
}
//	权益金消费接口	
function client3() {
	$client3 = new SoapClient("http://113.240.250.159:9272/integralservice/services/fundService?wsdl");
	return $client3;
}
function client() {
	$client = new SoapClient("http://113.240.250.159:9272/integralservice/services/IntegralService?wsdl");
	return $client;
}
//	public function client() {
//		require_once 'fun.php';
//		require_once 'EncodeDecode.php';
//		echo "trader->".decode("7sy0LGS3MywEArNrRbcJqA==");
//		echo "<br/>";
//echo "integral->".decode("iJK7FKTnqe8=");
//echo "<br/>";
//echo "serialNo->".decode("hmVU4zI11P9A7x50DxyYO8YTuSoN6ZZdMHtPLUTFlJM=");
//echo "<br/>";
//echo "ip->".decode("hM/ATyQwCSlItab0EGd2Gg==");
				$client = client();
		//		$client = new SoapClient("http://42.48.85.238:8290/integralservice/services/traderQueryService?wsdl");
//		$client = new SoapClient("http://42.48.85.238:8290/integralservice/services/IntegralService?wsdl");
		//		$client3 = new SoapClient("http://42.48.85.238:8290/integralService/services/IntegralService?wsdl");
						$userData['serialNo'] = encode("81237570336");
			//			$userData['trader'] = encode($data['trader']);
			//			$userData['integral'] = encode($data['integral']);
						$result = $client -> queryCurrent($data);
						$as = objectToArray($result);
						$as = objectToArray(json_decode(decode($as['return'])));
						dump($as);
			//			$alert = $as['MSG'];

			//			$userData['serialNo'] = "201510081444285887569457";
			//			$userData['trader'] = "81250010001";
			//			$userData['integral'] = "270";
			//			jifenfanhui($userData);
			//
			//			$sTime = "2015-10-09 00:00:01";
			//			$eTime = "2015-10-09 23:59:59";
			//			$data['startDateTime'] = encode($sTime);
			//			$data['endDateTime'] = encode($eTime);
			//			$result = $client -> getConsumeList($data);
			//			$as = objectToArray($result);
			//			$as = objectToArray(json_decode(decode($as['return'])));
			//						dump($as);
//			dump($_SESSION['uss']);
//			echo "<hr>";
//			dump($_SESSION['bss']);
//			echo "<hr>";
//			dump($_SESSION['ass']);
//			echo "<hr>";
//			$aa = $_SESSION['c'];
//			echo "<hr>";
//			$a['serialNo'] = encode($aa['serialNo']);
//			$a['trader'] = encode($aa['trader']);
//			$a['integral'] = encode($aa['integral']);
//			dump($a);
//			dump($aa);
			//			dump(decode("6GzU3o+ygK/eIfOBqceugn0DIwkzkOXosZTklZ71iOk6Oevo8QIO5ZfVNjy3UNjzw8vsfEfyuWo="));
			//			$xsNum=count($as);//湘商客户端指定时间内总消费记录数;
			//			$m=M('order');
			//			$ta=strtotime($sTime);
			//			$tb= strtotime($eTime);
			//			$arr=$m->where("orderTime>=$ta and orderTime<=$tb")->select();
			//			$eNum=count($arr);
			////			dump($arr);
			////			dump($as);
			//			$xsNo="0,";
			//			for($s=0;$s<$xsNum;$s++){
			//				$xsNo.=$as[$s]['SERIALNO'].",";
			//				}
			////			echo $xsNo;
			//			for($i=0;$i<$eNum;$i++){
			//				$fg=$arr[$i]['orderNo'];
			//				$a=strpos($xsNo,$fg,1)."<br>";
			////				$d=explode($fg,$xsNo);
			////				echo "ed".$arr[$i]['orderNo']."<br>";
			////				echo "xs".$d[$s]['SERIALNO']."<br>";
			//
			//				if($a>0){
			//						$yData[$i]=$arr[$i];
			//					}else{
			//						$nData[$i]=$arr[$i];
			//				}
			//			}
			//

			//
			//			dump($yData);
			//			echo "<hr>";
			//			dump($nData);
			//			echo "湘商客户端共查询到".$xsNum."条相关记录，E得网查询到".$eNum."条记录";
			//
			//
			//
			//

			//			echo "<script>alert('$alert')</script>";

	}

}
