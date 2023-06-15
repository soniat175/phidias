<?php
class HttpResponseService{
	
	function __construct( $code, $response ){
		http_response_code($code);
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
		exit();
	}
	
	public static function status( $code ){
		return new BodyResponse( $code );
	}
}

class BodyResponse{
	
	private $code;
	function __construct( $code ){
		$this->code = $code;
	}
	
	function body( $response = null ){
		return new HttpResponseService( $this->code, $response? $response: new stdClass() );
	}
}
?>