<?php 

	class EnlacesM{



		public static function enlacesModel($enlace){

			if ($enlace == "inicio" ||
                $enlace == "blog"   ||
                $enlace == "salir"		) {
				$modelo = "Views/Frontend/".$enlace.".php";

			}else if($enlace == "index"){
				$modelo = "Views/Frontend/inicio.php";
			}else{
				$modelo ="Views/Frontend/inicio.php";
			}
			return $modelo;


		}





	}










 ?>