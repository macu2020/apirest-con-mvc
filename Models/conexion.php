<?php 

require_once "config.php";
class Conexion{

	//1.- creamos 7 propiedades privadas
	private $driv;
	private $host;
	private $base;
	private $user;
	private $pass;
	private $port;
	private $conex;

//2.- cremaos un cosntructor de la clase
	function __construct(){
  			$this->driv = DRIV;
			$this->host = HOST;
			$this->base = BASE;
			$this->user = USER;
			$this->pass = PASS;
			$this->port = PORT;
		try {
				
		$dhbp= $this->driv.":host=".$this->host."; dbname=".$this->base."; port".$this->port;
		$this->conex = new PDO($dhbp,$this->user,$this->pass);
		$basecone= $this->conex;
		$basecone->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$basecone->exec('set names utf8');
		//echo "comexion correct macuri";	
		return $basecone;
		} catch (Exception $e) {
				die("ERROR en : ".$e->getMessage());
		}
	}

 


//3.- para obtener datos
	protected function  obtenerDatos($sqlquery){
		$mostrar = $this->conex->prepare($sqlquery);
		$mostrar->execute();
		$mostrar->setFetchMode(PDO::FETCH_ASSOC);
		$resultarray = array();
		foreach ($mostrar as $key) {
			$resultarray[]=$key;
		}
		return $resultarray;
	}

//4.- para guardar datos devulve filas afectadas
	protected function nonQuery($sqlquery){
		$results = $this->conex->prepare($sqlquery);
		$results->execute();
		$count =  $results->rowCount();
		return $count;
	}

//INSERT POST
//5.- para guardar devuleve el ultimo id guardado
	protected function nonQueryId($sqlquery){
		$results = $this->conex->prepare($sqlquery);
		$results->execute();
		$count = $results->rowCount();
		if ($count  >= 1) {
			return $this->conex->lastInsertId();
		}else{
			return 0;
		}
	}	

	//metodo para encriptar lacontraseña
	protected function encriptar($string){
		return md5($string);
	}

}
















 ?>