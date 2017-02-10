# Usage:
# $url = "quareal.ru";
# echo get_protocol_v1($url);

function getDomainProtocol($url){
	$protoArr = array("https","http");
	foreach($protoArr as $proto){
		$gUrl = sprintf("%s://%s",$proto,$url);
		if($curl = curl_init()) {
			curl_setopt($curl, CURLOPT_URL, $gUrl);
			curl_setopt($curl, CURLOPT_TIMEOUT, 15); 
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
			curl_setopt($curl, CURLOPT_FAILONERROR, true); 
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
			curl_exec($curl);
			$errNumb = curl_errno($curl);
			curl_close ($curl);
			if($errNumb == 0){
				return $gUrl;
			}
		}else echo "ERROR INIT CURL!<br/>\r\n";
			$errNumb = 0;
	}
	return sprintf("http://%s",$url);
}
