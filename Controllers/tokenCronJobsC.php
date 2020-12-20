<?php 

require_once '../Models/tokenCronJobsM.php';
$_token = new TokenM;
$fecha= date('Y-m-d H:i');
echo $_token->actualizaToken($fecha);









 ?>