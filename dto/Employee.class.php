<?php
class Employee implements JsonSerializable{
	
	private $id;
	private $name;
	private $lastName;
	private $age;
	private $company;
	
	function __construct( $id, $name, $lastName, $age, $company ) {
		$this->id = $id;
		$this->name = $name;
		$this->lastName = $lastName;
		$this->age = $age;
		$this->company = $company;
	}
	
	public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>