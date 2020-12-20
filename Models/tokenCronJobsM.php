<?php 
//1.- se require (conexion y repsuestas)
require_once 'conexion.php';
require_once 'respuestas.php';

class TokenM extends Conexion{

	public function actualizaToken($fecha){
		$query = "UPDATE usuarios_token SET Estado = 'Inactivo' WHERE Fecha < '$fecha' AND Estado = 'Activo'";
		$verificar = parent::nonQuery($query);
		if ($verificar > 0 ) {
			return 1;
		}else{
			return 0;
		}

	}





}











 ?>