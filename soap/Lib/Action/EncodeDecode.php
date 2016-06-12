<?php
class TripleDES {
	public static function genIvParameter() {
		return mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_TRIPLEDES,MCRYPT_MODE_CBC), MCRYPT_RAND);
	}

	private static function pkcs5Pad($text, $blocksize) {
	    $pad = $blocksize - (strlen($text) % $blocksize); // in php, strlen returns the bytes of $text
	    return $text . str_repeat(chr($pad), $pad);
	}

	private static function pkcs5Unpad($text) {
	    $pad = ord($text{strlen($text)-1});
	    if ($pad > strlen($text)) return false;
	    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
	    return substr($text, 0, -1 * $pad);
	}

	public static function encryptText($plain_text, $key, $iv) {
	    $padded = TripleDES::pkcs5Pad($plain_text, mcrypt_get_block_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_CBC));
		return mcrypt_encrypt(MCRYPT_TRIPLEDES, $key, $padded, MCRYPT_MODE_CBC, $iv);
	}

	public static function decryptText($cipher_text, $key, $iv) {
	    $plain_text = mcrypt_decrypt(MCRYPT_TRIPLEDES, $key, $cipher_text, MCRYPT_MODE_CBC, $iv);
	    return TripleDES::pkcs5Unpad($plain_text);
	}
};

/**/
function encode($str) {
	//$iv = TripleDES::genIvParameter();
	//base64位解密向量
	$iv = base64_decode("HnsbbmohRX0=");
	//print "\$iv=$iv\n";
	//加密对象
	$plain_text= $str;
	//base64位解密密钥
	$key= base64_decode("O16Jwi8qxLZMN2IxI3oVJb+YCDgWVMgj");
	//根据加密对象+密钥+向量生成数据再进行base64位加密
	$cipher_text = base64_encode(TripleDES::encryptText($plain_text, $key, $iv));
	//打印
	return $cipher_text;
	//根据已base64位加密对象+密钥+向量进行解密
}


function decode($str) {
	//$iv = TripleDES::genIvParameter();
	//base64位解密向量
	$iv = base64_decode("HnsbbmohRX0=");
	//print "\$iv=$iv\n";
	//加密对象
	$cipher_text= $str;
	//base64位解密密钥
	$key= base64_decode("O16Jwi8qxLZMN2IxI3oVJb+YCDgWVMgj");
	//根据加密对象+密钥+向量生成数据再进行base64位加密
	$plain_text = TripleDES::decryptText(base64_decode($cipher_text), $key, $iv);
	return $plain_text;
}


?>