<?php
	include_once("./model/HttpResponse.class.php");
	include_once("./service/IHttpRequestService.interface.php");
	include_once("./service/CurlHttpRequestService.class.php");
	include_once("./service/FGCHttpRequestService.class.php");
	
	$connection = new CurlHttpRequestService();
	$url = "http://localhost:81/PruebaTecnica/api/EmployeeApi.php";
	$headers = array();
	$response = $connection->get( $url, array("id"=>"1069716479") );
	echo "EMPLEADO POR IDENTIFICACION:";
	echo  $response->getResult();
	
	$connection = new FGCHttpRequestService();
	$url = "http://localhost:81/PruebaTecnica/api/EmployeeApi.php/1069716479";
	$headers = array();
	$response = $connection->get( $url );
	echo "TODOS LOS EMPLEADOS:";
	echo  $response->getResult();
?>