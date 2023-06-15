<?php 
	include_once("../model/HttpResponse.class.php");
	include_once("./IHttpRequestService.interface.php");
	
	class CurlHttpRequestService implements IHttpRequestService{
		
		function get( $url, $params = array(), $headers = array() ){
			$url .= empty($params)? "" : "?".http_build_query($params);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');	
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
			curl_setopt($ch,CURLOPT_TIMEOUT, 20);
			$response = new HttpResponse( curl_exec ($ch),
				curl_getinfo($ch, CURLINFO_HTTP_CODE),
			);
			curl_close($ch);
			return $response;
		}
		
		function post( $url, $body = array(), $headers = array() ){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));           
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
			curl_setopt($ch,CURLOPT_TIMEOUT, 20);
			$response = new HttpResponse( curl_exec ($ch),
				curl_getinfo($ch, CURLINFO_HTTP_CODE),
			);
			curl_close($ch);
			return $response;
		}
	}
?>