<?php 

	require_once "Models/conexion.php";

	//$cnex= new Conexion();
	
	require_once 'Models/EnlacesModels.php';
	require_once 'Controllers/EnlacesControllers.php';

	require_once 'Controllers/TemplateController.php';

	$template= new TemplateC();

	$template->templateController();

 ?>