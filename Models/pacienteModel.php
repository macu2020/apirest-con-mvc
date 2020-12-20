<?php 
//1.- se require (conexion y repsuestas)
require_once 'conexion.php';
require_once 'respuestas.php';

		$_respuesta = new Respuesta;
class PacienteM extends Conexion{

		private $table   = "pacientes";
		private $paccid  = "";
		private $pacdni  = "";
		private $pacnom  = "";
		private $pacdir  = "";
		private $codpost = "";
		private $pacgen  = "";
		private $pactel  = "";
		private $fechnac = "0000-00-00";
		private $pacorre = "";
		//para el token
		private $token ="";
		//para imagen
		private $imagen ="";
//6ff5e6cd57555e89a162bde8ad32442a

//metodo para ver 100 pacientes
	public function listaPAcientes($pagina = 1){
		$inicio  = 0;
		$cantidad= 4;
		if ($pagina > 1) {
			$inicio = ($cantidad * ($pagina-1)) +1;
			$cantidad = $cantidad * $pagina;
		}
		$query = "SELECT PacienteId, Nombre, DNI, Telefono, Correo FROM ".$this->table." limit $inicio,$cantidad";
		$datos = parent::obtenerDatos($query);
		return $datos;
	}



	public function obtenerPciente($id){
		$query = "SELECT * FROM ".$this->table." WHERE PacienteId = '$id' ";
		return parent::obtenerDatos($query);
	}


	public function guardar($json){
		$_respuesta = new Respuesta;
		$datos = json_decode($json,true);

//para el token
		if (!isset($datos["token"])) {
			return $_respuesta->error_401();
		}else{
			$this->token = $datos["token"];
			$arrayToken = $this->buscarToken();
			if ($arrayToken) {
		if (!isset($datos['nombre']) || !isset($datos['dni']) || !isset($datos['correo'])) {
			return $_respuesta->error_400();
		}else{
			$this->pacnom  = $datos['nombre'];
			$this->pacdni  = $datos['dni'];
			$this->pacorre = $datos['correo'];
			if (isset($datos['telefono'])) {$this->pactel  = $datos['telefono']; }     
			if (isset($datos['direccion'])) {$this->pacdir  = $datos['direccion']; }     
			if (isset($datos['codigoPostal'])) {$this->codpost  = $datos['codigoPostal']; }     
			if (isset($datos['genero'])) {$this->pacgen  = $datos['genero']; }     
			if (isset($datos['fachaNacimiento'])) {$this->fechnac  = $datos['fachaNacimiento']; } 
	//para imagen
			if (isset($datos['imagen'])) {
				$resp = $this->procesarImagen($datos['imagen']);
				$this->imagen = $resp;
			}  

			$resp = $this->insertarPaciente();
			if ($resp) {
			  $respuesta = $_respuesta->response;
			  $respuesta["results"]= array("pacienteID"=> $resp);
			  return $respuesta;
			}else{
				return $_respuesta->error_500();

			}
		}
//fin del token				
			}else{
				return $_respuesta->error_401("El token que envio es invalido o a caducado");
			}
		}


	}

	private function insertarPaciente(){
		$query = "INSERT INTO " .$this->table." (DNI, Nombre, Direccion, CodigoPostal, Telefono, Genero, FechaNacimiento, Correo,Imagen) VALUES 
			('".$this->pacdni."','".$this->pacnom."','".$this->pacdir."','".$this->codpost."','".$this->pactel."','".$this->pacgen."','".$this->fechnac."','". $this->pacorre ."','".$this->imagen."')";
		$resp = parent::nonQueryId($query);
		if ($resp) {
			return $resp;
		}else{
			return 0;
		}
	}







	public function update($json){
		$_respuesta = new Respuesta;
		$datos = json_decode($json,true);

//para el token
		if (!isset($datos["token"])) {
			return $_respuesta->error_401();
		}else{
			$this->token = $datos["token"];
			$arrayToken = $this->buscarToken();
			if ($arrayToken) {
	
	//sivalido token
					if (!isset($datos['pacienteId']) ) {
						return $_respuesta->error_400();
					}else{
						$this->paccid  = $datos['pacienteId'];			
						if (isset($datos['nombre'])) {$this->pacnom  = $datos['nombre']; }     
						if (isset($datos['dni'])) {$this->pacdni  = $datos['dni']; }     
						if (isset($datos['correo'])) {$this->pacorre  = $datos['correo']; }     
						if (isset($datos['telefono'])) {$this->pactel  = $datos['telefono']; }     
						if (isset($datos['direccion'])) {$this->pacdir  = $datos['direccion']; }     
						if (isset($datos['codigoPostal'])) {$this->codpost  = $datos['codigoPostal']; }     
						if (isset($datos['genero'])) {$this->pacgen  = $datos['genero']; }     
						if (isset($datos['fachaNacimiento'])) {$this->fechnac  = $datos['fachaNacimiento']; }  
						$resp = $this->updatePaciente();
						if ($resp) {
						  $respuesta = $_respuesta->response;
						  $respuesta["results"]= array("pacienteID"=> $this->paccid);
						  return $respuesta;
						}else{
							return $_respuesta->error_500();
						}
					}
	//fin de validotoken			
			}else{
				return $_respuesta->error_401("El token que envio es invalido o a caducado");
			}
		}	
	}



	private function updatePaciente(){
		$query = "UPDATE  " . $this->table. " SET nombre ='".$this->pacnom."',Direccion ='".$this->pacdir."', DNI ='".$this->pacdni."',CodigoPostal ='".$this->codpost."', telefono= '".$this->pactel."', Genero = '".$this->pacgen."', FechaNacimiento ='".$this->fechnac."', Correo= '".$this->pacorre."' WHERE  PacienteId = '".$this->paccid."'";
		$resp = parent::nonQuery($query);
			if ($resp >= 1) {
				return $resp;
			}else{
				return 0;
			}
		}


	

	public function delete($json){
		$_respuesta = new Respuesta;
		$datos = json_decode($json,true);

//para el token
		if (!isset($datos["token"])) {
			return $_respuesta->error_401();
		}else{
			$this->token = $datos["token"];
			$arrayToken = $this->buscarToken();
			if ($arrayToken) {
					if (!isset($datos['pacienteId']) ) {
						return $_respuesta->error_400();
					}else{
						$this->paccid  = $datos['pacienteId'];			
						$resp = $this->eliminarPaciente();
						if ($resp) {
						  $respuesta = $_respuesta->response;
						  $respuesta["results"]= array("pacienteID"=> $this->paccid);
						  return $respuesta;
						}else{
							return $_respuesta->error_500();

						}
					}	
//fin del toke				
			}else{
				return $_respuesta->error_401("El token que envio es invalido o a caducado");
			}
		}



	
	}
	private function eliminarPaciente(){
		$query = "DELETE FROM ".$this->table." WHERE PacienteId= '".$this->paccid ."'";
		$resp = parent::nonQuery($query);
		if ($resp >= 1) {
			return $resp;
		}else{
			return 0;
		}

	}



	//para buscar el toke
	private function buscarToken(){
		$query = "SELECT TokenId, UsuarioId, Estado FROM usuarios_token WHERE Token = '".$this->token. "' AND Estado = 'Activo'";
		$resp = parent::obtenerDatos($query);
		if ($resp) {
			return $resp;
		}else{
			return 0;
		}
	}

	//ver si eltoken esta activo
	private function actualizarToken($tokenid){
		$date  = date("Y-m-d H:i");
		$query = "UPDATE usuarios_token SET Fecha = '$date' WHERE TokenId = '$tokenid' ";
		$resp = parent ::nonQuery($query);
		if ($resp >= 1) {
			return $resp;
		}else{
			return 0;
		}

	}


	//para la imagen
	private function procesarImagen($img){
		//1.- creamos un folder 
		$direccion = dirname(__DIR__)."\Views\Assets\\";
		$partes = explode(";base64,",$img);
		$extension = explode('/',mime_content_type($img))[1];
		$imagen_base64= base64_decode($partes[1]);
		$file = $direccion . uniqid() . "." .$extension;
		file_put_contents($file,$imagen_base64);
		$nuevadireccion = str_replace("\\", "/", $file);
		//aki s epuede recortar la imagen
		return $nuevadireccion;
 	}



}








 ?>