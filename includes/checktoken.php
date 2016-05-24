<?php 
	include('db.php');
	$checkquery = "SELECT 'AccessTime' FROM 'accesstoken' WHERE ID = 1";
	$result = mysql_query($checkquery);
	while ( $row = mysql_fetch_array ($result) ) {
		$token = $row['AccessTime'];
	}
	$times = strtotime("now") - strtotime($token);
	if($times > 3600){
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxec5e3018e413204d&secret=389dd6a3a7742ba0f24020fc25039ed9";
		$response_json = file_get_contents($url);
		$json_data = json_decode($response_json, true);
		$access_token = $json_data["access_token"];
		$updatequery = "UPDATE accesstoken SET AccessToken = '".$access_token."' WHERE ID = 1";
		$result = mysql_query($updatequery);
	}
 ?>