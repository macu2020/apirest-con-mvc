<?php 


class EnlacesC{

	public function enlaceController(){
		if (isset($_GET['action'])) {
			$enlace= $_GET['action'];
		}else{
			$enlace = "index";

		}
		$respuesta= EnlacesM::enlacesModel($enlace);
		include $respuesta;
	}




}








 ?>