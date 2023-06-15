<?php
include_once("../dto/ErrorMsg.class.php");
include_once("../service/HttpResponseService.class.php");

require_once("../repository/IRepository.interface.php");
require_once("../repository/FileRepository.class.php");
require_once("../repository/EmployeeFileRepository.class.php");
include_once("../service/EmployeeService.class.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Allow: GET, POST, PUT, DELETE");

switch($_SERVER['REQUEST_METHOD']){
	case "GET":
		if( !isset($_GET["id"]) ){
			$employeeService = new EmployeeService();
			$employees = $employeeService->getAllEmployees();
			HttpResponseService
				::status(200)
					->body($employees);
		}else{
			if( !ctype_digit($_GET["id"]) ){
				HttpResponseService
					::status(400)
						->body( new ErrorMsg(400, "PathVariable id isn't valid") );
			}
			$employeeService = new EmployeeService();
			$employee = $employeeService->getEmployeeById( $_GET["id"] );
			if($employee){
				HttpResponseService
					::status(200)
						->body($employee);
			}else{
				HttpResponseService
					::status(404)
						->body();
			}
		}
	break;
	default:
		HttpResponseService
			::status(405)
				->body( new ErrorMsg(405, "Request {$_SERVER['REQUEST_METHOD']} Method Not Supported") );
	break;
}