<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/listaproveedores/class.epcinnLP.php");


$proveedoresC = NEW accesoclase();

$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:"";
$borra_listadoP = isset($_POST["borra_listadoP"])?$_POST["borra_listadoP"]:"";




$DUPLICAR_servicios = isset($_POST["DUPLICAR_servicios"])?$_POST["DUPLICAR_servicios"]:"";
if($DUPLICAR_servicios=='DUPLICAR_servicios'){
	$DUPLICAR_id_servis = isset($_POST["DUPLICAR_id_servis"])?$_POST["DUPLICAR_id_servis"]:"";
	$proveedoresC->duplica($DUPLICAR_id_servis);
}

if($validaLISTADO == 'validaLISTADO'){
	//P_NOMBRE_FISCAL_RS_EMPRESA
$mandacorreo2 = isset($_POST["mandacorreo2"])?$_POST["mandacorreo2"]:"no";	
$usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
$nommbrerazon = isset($_POST["nommbrerazon"])?$_POST["nommbrerazon"]:"";
$P_NOMBRE_FISCAL_RS_EMPRESA = isset($_POST["P_NOMBRE_FISCAL_RS_EMPRESA"])?$_POST["P_NOMBRE_FISCAL_RS_EMPRESA"]:"";
$contrasenia = isset($_POST["contrasenia"])?$_POST["contrasenia"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$rfc = isset($_POST["rfc"])?$_POST["rfc"]:"";
$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:""; 
$id_empresa2 = isset($_POST["id_empresa2"])?$_POST["id_empresa2"]:""; 
	if( $usuario =="" or $nommbrerazon =="" or $id_empresa2 =="" or $rfc ==""){
	echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS CON *</p>";	
	}else{
	echo $proveedoresC->guardar_usuario2 ( $usuario , $nommbrerazon ,$P_NOMBRE_FISCAL_RS_EMPRESA, $contrasenia , $email, $rfc , $mandacorreo2, $id_empresa2);
	}

}

else{

}

$enviarLP = isset($_POST["enviarLP"])?$_POST["enviarLP"]:"";
if($enviarLP=='enviarLP'){
$mandacorreo = isset($_POST["mandacorreo"])?$_POST["mandacorreo"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$contrasenia = isset($_POST["contrasenia"])?$_POST["contrasenia"]:"";
$IPLP = isset($_POST["IPLP"])?$_POST["IPLP"]:"";

$P_NOMBRE_FISCAL_RS_EMPRESA = isset($_POST["P_NOMBRE_FISCAL_RS_EMPRESA"])?$_POST["P_NOMBRE_FISCAL_RS_EMPRESA"]:"";
$nommbrerazon = isset($_POST["nommbrerazon"])?$_POST["nommbrerazon"]:"";
$P_RFC_MTDP = isset($_POST["P_RFC_MTDP"])?$_POST["P_RFC_MTDP"]:"";
$usuario= isset($_POST["usuario"])?$_POST["usuario"]:"";

echo $proveedoresC->ACTUALIZA_LP($IPLP,$email,$contrasenia,$mandacorreo,$nommbrerazon,$P_NOMBRE_FISCAL_RS_EMPRESA,$P_RFC_MTDP ,$usuario);

}

 if($borra_listadoP == 'borra_listadoP' ){

$borra_LP = isset($_POST["borra_LP"])?$_POST["borra_LP"]:"";
	echo $proveedoresC->borra_listadoP($borra_LP);
}



?>