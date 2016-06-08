<?php
require_once ("fun.php");
/**
 * @package JJWS
 * @author E得同步接口
 * @access public
 **/
class JJWS {

	/**
	 *
	 * @return string
	 **/

	function regUser($data) {
		require_once 'fun.php';
		require_once 'EncodeDecode.php';
		$da=decode($data);
		$a = explode("|",$da);

		$account = $a[0];
		$realName = $a[1];
		$cardType = $a[2];
		$cardNum = $a[3];
		$password = md5(substr($cardNum, -6));
		$participateDe = $a[4];
		$contact = $a[5];
		$companyPhone = $a[6];
		$phone = $a[7];
		$email = $a[8];
		$zip = $a[9];
		$companyFax = $a[10];
		$address = $a[11];

		//返回省份ID
		$Pro = $a[12];
		$Pro = substr($Pro, 0, 7);
		$dqa = dq($Pro);
		$ProId = $dqa['cityId'];
		//返回城市ID
		$city = $a[13];
		$city = substr($city, 0, 7);
		$dqa = dq($city);
		$cityId = $dqa['cityId'];
		//返回区县ID
		$county = $a[14];
		$county = substr($county, 0, 7);
		$dqa = dq($county);
		$countyId = $dqa['cityId'];

		$type = $a[15];

		$m = M('user');
		$where = array();
		$where['account'] = $account;
		$where['realName'] = $realName;
		$where['province'] = $ProId;
		$where['county'] = $countyId;
		$where['cityId'] = '';
		$where['city'] = '';
		$where['password'] = $password;
		$where['cardType'] = $cardType;
		$where['participateDe'] = $participateDe;
		$where['companyContact'] = $contact;
		$where['companyPhone'] = $companyPhone;
		$where['phone'] = $phone;
		$where['email'] = $email;
		$where['zip'] = $zip;
		$where['regTime'] = time();
		$where['companyFax'] = $companyFax;
		$where['address'] = '';
		$where['source'] = '1';
		$checkData = havedata("user", "$account");
		if ($checkData == "1") {
			if(!empty($account) && !empty($realName) && !empty($cardNum)){
			$as = $m -> add($where);
			}else{
				$flag = 'FLAG:0';
			}
			if ($as) {
				$flag = 'FLAG:1';
			} else {
				$flag = 'FLAG:0';
			}
		} else {
			$flag = 'FLAG:0';
		}
		$flag=encode($flag);
		return $flag;
	}

	function getProductList($limit = '1') {
		$sql = mysql_query("SELECT * FROM j_product limit $limit");
		while ($row = mysql_fetch_array($sql)) {

			$proid = $row['id'];
			$speciSql = mysql_query("select * from j_speci_value where productId='$proid'");
			while ($rs = mysql_fetch_array($speciSql)) {

				$rss = array_keys($rs);
				for ($i = 1; $i < count($rs); $i++) {
					if (!empty($rs[$i - 1])) {
						$speciClass = $rss[$i * 2 - 1];
						if ($speciClass == 'num') {
							$speciName = '数量';
						} else if ($speciClass == 'price') {
							$speciName = '价格';
						} else if ($speciClass == 'id') {
							$speciName = '规格ID';
						} else if ($speciClass == 'productId') {
							$speciName = '产品ID';
						} else if ($speciClass == 'classId') {
							//							$speciClassSql = mysql_query("select * from j_product_class where id='$speciClass' limit 1");
							$m = M('product_class');
							$arr = $m -> where(array('id' => '$speciClass')) -> limit(1) -> select();
							while ($arr) {
								$speciName = "分类名称/ID:" . $rsClass['className'];
								$className = $rsClass['className'];
							}

						} else {
							$speciClassSql = mysql_query("select * from j_speci_class where filedName='$speciClass' limit 1");
							while ($rsClass = mysql_fetch_array($speciClassSql)) {
								$speciName = $rsClass['speciClassName'];
							}
						}
						$speci .= $speciName . "=" . $rs[$i - 1] . "|";

					}
				}

			}

			$as .= "分类名称:" . $className . "|分类ID:" . $row['classId'] . "|产品ID:" . $row['id'] . "|产品名称:" . $row['title'] . "|市场价格:" . $row['price'] . "|E得默认价格:" . $row['ePrice'] . "|货号:" . $row['huohao'] . "|虚拟库存:" . $row['stock'] . "|实际库存:" . $row['s_stock'] . "|单位:" . $row['unit'] . "|默认重量:" . $row['weight'] . "|缩略图:" . $row['smallPic'] . "|品牌:" . $row['brand'] . "|产品大图:" . $row['bigPic'] . "|相册:" . $row['album'] . "|简介:" . $row['smallText'] . "|商品描述:" . $row['proText'] . "|规格(:" . $speci . ")";
		}

		return json_encode($as);
	}

}
