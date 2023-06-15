<?php
interface IHttpRequestService{
	
	public function get( $url, $params, $headers );
		
	public function post( $url, $body, $headers );
}
?>