<?php 
	include_once("../model/HttpResponse.class.php");
	include_once("./IHttpRequestService.interface.php");
	
	class FGCHttpRequestService implements IHttpRequestService{
		
		function get( $url, $params = array(), $headers = array() ){
			$url .= empty($params)? "" : "?".http_build_query($params);
			$options = [
				'http' => [
					'method' => 'GET',
					'header' => implode("\\r\\n", $headers)
				]
			];
			return $this->send( $options, $url );
		}
		
		function post( $url, $body = array(), $headers = array() ){
			$options = [
				'http' => [
					'method' => 'POST',
					'header' => implode("\\r\\n", $headers),
					'content' => json_encode($body)
				]
			];
			return $this->send( $options, $url );
		}
		
		private function send( $options, $url ){
			$context = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
			$headersFormated = $this->parseHeaders($http_response_header);
			$statusCode = $headersFormated["reponse_code"];
			return new HttpResponse( $result, $statusCode );
		}
		
		private function parseHeaders( $headers ){
			$head = array();
			foreach( $headers as $k=>$v ){
				$t = explode( ':', $v, 2 );
				if( isset( $t[1] ) )
					$head[ trim($t[0]) ] = trim( $t[1] );
				else{
					$head[] = $v;
					if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#",$v, $out ) )
						$head['reponse_code'] = intval($out[1]);
				}
			}
			return $head;
		}
	}
?>