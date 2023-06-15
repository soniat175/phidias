<?php
	require_once("../repository/IRepository.interface.php");
	require_once("../repository/FileRepository.class.php");
	require_once("../repository/EmployeeFileRepository.class.php");
	
	class EmployeeService{
		
		private $repository;
		
		public function __construct(){
			$this->repository = new EmployeeFileRepository();
		}
		
		public function getAllEmployees(){
			return $this->repository->findAll();
		}
		
		public function getEmployeeById( $id ){
			return $this->repository->findById($id);
		}
	}
?>