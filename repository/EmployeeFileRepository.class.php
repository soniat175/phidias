<?php
require_once("../repository/IRepository.interface.php");
include_once("./FileRepository.class.php");
include_once("../dto/Employee.class.php");

class EmployeeFileRepository extends FileRepository{
	
	function __construct(){
		parent::__construct("../resources/employees.txt", true);
	}
	
	public function findAll(){
		$employees = array();
		foreach (parent::findAll() as $line){
			$fields = explode($this->delimiter, trim($line));
			array_push($employees, new Employee( $fields[0], $fields[1], $fields[2], $fields[3], $fields[4] ));	
		}
		return $employees;
	}
	
	public function findById( $id ){
		$fields = parent::findById( $id );
		if( !empty($fields) )
			return new Employee( $fields[0], $fields[1], $fields[2], $fields[3], $fields[4] );
		return null;
	}
}
?>