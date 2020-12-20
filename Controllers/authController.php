<?php 

require_once '../Models/authModel.php';

$_model = new AuthM;
 
switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		$resul=  $_model->obtenerPAcientes();
 		print_r(json_encode($resul,true));
  
		break;
	
	case 'POST':

//1.-recibir datos
$postBody = file_get_contents("php://input");

//2.- enviamoos datos al model
$datosArray= $_model->login($postBody);
 
// $macur= $datosArray["status"];

//3.- resokvemnos una respuesta
header ("Content-Type:application/json"); 		
if ($datosArray["status"]  == "error" ){
	$responseCode= $datosArray["results"];
	 http_response_code($datosArray["results"]["cod_id"]);
	 echo json_encode($responseCode);
}else{
	http_response_code(201);
	echo json_encode($datosArray);

}
 		break;

	case 'PUT':
		//$resul=  $_model->obtenerPAcientes();
	$macuri =file_get_contents("php://input");
	$result =$_model->login($macuri);
		print_r(json_encode($result,true));
		break;	


	case 'DELETE':
		//$resul=  $_model->obtenerPAcientes();
		print_r(json_encode("es delete"));
		break;
		default:
		 
		break;
}



 ?>