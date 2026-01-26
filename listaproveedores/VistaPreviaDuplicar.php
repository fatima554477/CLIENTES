<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorLP.php";
//ECHO $identioficador;
//EXIT;
$conexion = NEW accesoclase();
$queryVISTAPREV = $conexion->Listado_LP2($identioficador);
 $output .= '
 <style type="text/css">
 #ACTUALIZADO{
color:green;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}
  #ERROR{
color:red;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}
</style>
<div id="respuestaLP_2"><strong>ESTAS USANDO LA OPCION DUPLICAR.</strong></div>
<div id="respuestaLP_"></div>
 <form  id="listadoLPform"> 
      <div class="table-responsive">  
           <table class="table table-bordered" style="background-color: #d8f8ff;" >';
	$row = mysqli_fetch_array($queryVISTAPREV);


     $output .= '
<tr>
<td width="50%"><label>NOMBRE COMERCIAL DEL  PROVEEDOR:</label></td>
<td width="50%">'.$row["nommbrerazon"].'</td>
</tr>  

<tr>
<td width="50%"><label>RAZÓN SOCIAL DEL PROVEEDOR:</label></td>
<td width="50%">'.$row["P_NOMBRE_FISCAL_RS_EMPRESA"].'</td>
</tr>  



<tr>
<td width="50%"><label>USUARIO CRM:</label></td>
<td width="50%">AdminPR_'.$row["usuario"].'</td>
</tr>  


<tr>
<td width="50%"><label>RFC:</label></td>
<td width="50%">'.$row["P_RFC_MTDP"].'</td>
</tr>  
 

	 <tr>  
            <td width="50%"><label>SOLO GUARDAR</label></td>  
            <td width="50%">
			<button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickLP">DUPLICAR</button>
			
			<input type="hidden" value="DUPLICAR_servicios"  name="DUPLICAR_servicios"/>
			<input type="hidden" value="'.$row["IDDD"].'"  name="DUPLICAR_id_servis" id="DUPLICAR_id_servis"/>
			</td>  
        </tr>
		
		
	 <tr>  
            <td width="30%"><label>¿ESTÁS SEGURO DE USAR ESTA OPCIÓN?</label></td>  
            <td width="70%">


			</td>  
        </tr>		
		
		
     ';

    $output .= '</table></div>

	</form>';
    echo $output;
}
//
?>

<script>
	$(document).ready(function(){
$("#clickLP").click(function(){
	var formulario = $("#listadoLPform").serializeArray();
	formulario.push(
		{ name: "mandacorreo", value: 'no' }
	);
	$.ajax({
		url:'listaproveedores/controladorLP.php',
		method:"POST",
		data:formulario, 
		beforeSend:function(){  
			$('#respuestaLP_').html('cargando'); 
		}, 	
		success:function(data){
			if($.trim(data)=='PROVEEDOR DUPLICADO' || $.trim(data)=='ACTUALIZADO'){
					$('#dataModal').modal('hide');
	$.getScript(load(1));
					$("#respuestaLP_").html("<span id='ACTUALIZADO' >"+data+"</span>");
			}else{
					$("#respuestaLP_").html(data);
			}
		}  
	});
});
});
</script>