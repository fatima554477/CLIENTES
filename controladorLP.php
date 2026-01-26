<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/listadoclientes/class.epcinnLP.php");


$proveedoresC = NEW accesoclase();

$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:"";
$borra_listadoC = isset($_POST["borra_listadoC"])?$_POST["borra_listadoC"]:"";

	

if($validaLISTADO == 'validaLISTADO'){
	
$usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
$C_NOMBRE_COMERCIAL_EMPRESA = isset($_POST["C_NOMBRE_COMERCIAL_EMPRESA"])?$_POST["C_NOMBRE_COMERCIAL_EMPRESA"]:"";
$nommbrerazon = isset($_POST["nommbrerazon"])?$_POST["nommbrerazon"]:"";
$contrasenia = isset($_POST["contrasenia"])?$_POST["contrasenia"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$rfc = isset($_POST["rfc"])?$_POST["rfc"]:"";
$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:""; 
$mandacorreo2A = isset($_POST["mandacorreo2A"])?$_POST["mandacorreo2A"]:""; 
$id_empresa = isset($_POST["id_empresa"])?$_POST["id_empresa"]:""; 
	if($nommbrerazon ==""){
	echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";	
	}else{
	echo $proveedoresC->guardar_usuario2 ( $usuario , $nommbrerazon ,$C_NOMBRE_COMERCIAL_EMPRESA, $contrasenia , $email, $rfc, $mandacorreo2A, $id_empresa );
	}
	

}


 if($borra_listadoC == 'borra_listadoC' ){

$borra_LC = isset($_POST["borra_LC"])?$_POST["borra_LC"]:"";
	echo $proveedoresC->borra_listadoC($borra_LC);
}




?>