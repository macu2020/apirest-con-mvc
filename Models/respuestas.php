<?php 

class Respuesta{
	//1. creamos una propuedad public ern array asosicitro
	public $response=[
		"status"  => "ok",
		"results" => array()
	];

	//2.- creamos un metood public
	public function error_405(){
		$this->response['status']= "error";
		$this->response['results']=array(
			"cod_id" => '405',
			"messag" => "Metodo no permitido"
		);
		return $this->response;
	}

	public function error_200($valor= "Datos Incorrectos"){
		$this->response['status'] = "error";
		$this->response['results'] =array(
			"cod_id" => '200',
			"mesage" => $valor
		);
		return $this->response;
	}



public function error_400(){
	$this->response["status"]="error";
	$this->response["results"]=array(
		"cod_id" => '400',
		"mesage" => 'Datos enviados incompletos o conformato incorrectos'
	);
	return $this->response;
}

public function error_500($valor = "Error interno del servidor"){
	$this->response['status']= "error";
	$this->response['results']=array(
		"cod_id" => '500',
		"mesage" => $valor
	);
	return $this->response;
}



public function error_401($valor ="No autorizado"){
	$this->results['status']= "error";
	$this->results["results"]= array(
		"cod_id"=> "401",
		"mesage"=> $valor
	);
	return $this->results;
}



}





 ?>