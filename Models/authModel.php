<?php 

//1.- se require (conexion y repsuestas)
require_once 'conexion.php';
require_once 'respuestas.php';

//2.- crmaos una clase
class AuthM  extends Conexion{

//3.- creamos un metod login public
	public function login($json){
		//4creamos instancia de respuestas
		$_respuesta = new Respuesta;
		$datos = json_decode($json,true);

		if (!isset($datos['usuario']) || !isset($datos['password'])) {
			//error en los campos enviado
			return $_respuesta->error_400();
 		}else{
			//todo esta bien
			$usuario= $datos["usuario"];
			$pasword= $datos["password"];//es el ke nos envia el usuario

			$pasword=parent::encriptar($pasword);
			$datos  = $this->obtnerDAtosUsuario($usuario);

				if ($datos) {
					//verificar la contraseña es igual
					if ($pasword == $datos[0]['Password']) {
 						//si el usuario es activo crea el tocken
 						if ($datos[0]['Estado'] == "Activo") {
 							//crea el token
 							$verificar = $this->insertarTocken($datos[0]['UsuarioId']);
 							if ($verificar) {
 								//si se guardo
 								$result=$_respuesta->response;
 								$result["results"]=array(
 									"token"=>$verificar
 								);
  							return  $result;								
								
 							}else{
 								//error al guardar
 							return $_respuesta->error_500("Error interno,No hemos podido guardar"); 								
 							}
 						}else{
 							//el usuario esta inactivo
 							return $_respuesta->error_200("El usuario esta inactivo");
  						}

					}else{
						//la contraseña no es igual
						return $_respuesta->error_200("El pasword es invalido");
					}
					//si existe el usuairo
				}else{
					//no existe el usuario
					return $_respuesta->error_200("El usuario : '$usuario' no existe");
				}
			}
	}


//aki s enabnda los errores


private function obtnerDAtosUsuario($correo){
	$query  = "SELECT UsuarioId,Password,Estado FROM usuarios  WHERE Usuario = '$correo' ";
	$datos  = parent::obtenerDatos($query);
	if (isset($datos[0]["UsuarioId"])) {
		return $datos;
	}else{
		return 0;
	}
}
private function insertarTocken($userid){
	$val  = true;
	$token= bin2hex(openssl_random_pseudo_bytes(16,$val));
	$date = date("Y-m-d H:i");
	$estado = "Activo";
	$query  = "INSERT INTO usuarios_token(UsuarioId,Token,Estado,Fecha) VALUES('$userid','$token','$estado','$date')";
	$verificar = parent::nonQuery($query);
	if ($verificar) {
		return $token;
	}else{
		return false;
	}
}


 



















//muestra tabla de pacientes
	public function obtenerPAcientes(){
		$query = "SELECT * FROM pacientes";
		$datos = parent::obtenerDatos($query);
	return $datos;		
	}


//inserta paciente
	public function insertaPAciente(){
		$query = "INSERT INTO pacientes (DNI) value('14')";
		$insert = parent::nonQuery($query);
		return $insert;
	}


}














 ?>