<?php
class ErrorMsg implements JsonSerializable{
	
	private $errorCode;
	private $errorMessage;
	
	function __construct( $errorCode, $errorMessage ){
		$this->errorCode = $errorCode;
		$this->errorMessage = $errorMessage;
	}
	
	public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>