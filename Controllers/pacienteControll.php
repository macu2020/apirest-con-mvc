<?php 

require_once '../Models/pacienteModel.php';


$_model = new PacienteM;
switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
	//muestra lista de paginacion de paciente
		if (isset($_GET["page"])) {
			$pagina = $_GET["page"];
		    $paginacionPaciente=$_model->listaPAcientes(1);
		    header ("Content-Type:application/json"); 		
		    echo json_encode($paginacionPaciente);
		    http_response_code(200);
		}else if(isset($_GET['id'])){
			$pacienteid =$_GET['id'];
			$datosPAciente = $_model->obtenerPciente($pacienteid);
			header ("Content-Type:application/json"); 		
			echo json_encode($datosPAciente);
		    http_response_code(200);			
		}
 		break;

	case 'POST':
//1.- rcivimos los datos enviados
	$postBody = file_get_contents("php://input");
//2.- enviamos los datos al manejador
	$datosArray = $_model->guardar($postBody);
//3.-devolvemos una respuesta
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
//1.- rcivimos los datos enviados
	$postBody = file_get_contents("php://input");
//2.- enviamos los datos al manejador
	$datosArray=$_model->update($postBody);
//3.-devolvemos una respuesta
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
	case 'DELETE':


$headers = getallheaders();

if (isset($headers["token"]) && isset($headers["pacienteId"])) {
 //recivmos los datos enviado por elheder
	$send = [
		"token" => $headers["token"],
		"pacienteId"=>$headers["pacienteId"]
	];
	$postBody =  json_encode($send);

 }else{
//recivimos los datos enviados
 	$postBody = file_get_contents("php://input");
}


//1.- rcivimos los datos enviados
	//$postBody = file_get_contents("php://input");
//2.- enviamos los datos al manejador
	$datosArray=$_model->delete($postBody);
//3.-devolvemos una respuesta
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
	default:
 		http_response_code(405);
		$error= $_respuesta->error_405();
		echo json_encode($error);
		break;
}









 ?>