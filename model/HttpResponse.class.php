<?php
class HttpResponse implements JsonSerializable{
	
	private $statusCode;
	private $result;
	
	function __construct( $result, $statusCode ){
		$this->result = $result;
		$this->statusCode = $statusCode;
	}
	
	public function getStatusCode(){
		return $this->statusCode;
	}
	
	public function getResult(){
		return $this->result;
	}
	
	public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>