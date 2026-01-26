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
<div id="respuestaLP_"></div>
 <form  id="listadoLPform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
	$row = mysqli_fetch_array($queryVISTAPREV);


     $output .= '

 
<tr>
<td width="50%"><label>NOMBRE COMERCIAL DEL  PROVEEDOR:</label></td>
<td width="50%"><input type="text" name="nommbrerazon" value="'.$row["nommbrerazon"].'"  style="width:100%"></td>
</tr>

 <tr>
<td width="50%"><label>NOMBRE FISCAL </label></td>
<td width="50%"><input type="text" name="P_NOMBRE_FISCAL_RS_EMPRESA" value="'.$row["P_NOMBRE_FISCAL_RS_EMPRESA"].'"  style="width:100%"></td>
</tr>

<tr>
<td width="50%"><label>USUARIO CRM:</label></td>
<td width="50%"><input type="text" name="usuario" value="'.$row["usuario"].'"  style="width:100%"></td>
</tr>
<tr>
<td width="50%"><label>RFC:</label></td>
<td width="50%"><input type="text" name="P_RFC_MTDP" value="'.$row["P_RFC_MTDP"].'"  style="width:100%"></td>
</tr>
 
<tr>
<td width="50%"><label>CONTRASEÑA:</label></td>
<td width="50%"><input type="text" name="contrasenia" value="'.$row["contrasenia"].'"  style="width:100%"></td>
</tr>  

<tr>
<td width="50%"><label>EMAIL:</label></td>
<td width="50%"><input type="text" name="email" value="'.$row["email"].'"  style="width:100%"></td>
</tr>  

	 <tr>  
            <td width="50%"><label>SOLO GUARDAR</label></td>  
            <td width="50%">
			<button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickLP">GUARDAR</button>
			
			<input type="hidden" value="enviarLP"  name="enviarLP"/>
			<input type="hidden" value="'.$row["IDDD"].'"  name="IPLP" id="IPLP"/>
			</td>  
        </tr>
		
		
	 <tr>  
            <td width="30%"><label>GUARDAR Y ENVIAR EMAIL</label></td>  
            <td width="70%">
			<button class="btn btn-sm btn-outline-success px-5"  type="button" id="clickLPE">GUARDAR Y ENVIAR EMAIL</button>

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
			if($.trim(data)=='Ingresado' || $.trim(data)=='ACTUALIZADO'){
					$('#dataModal').modal('hide');
					$.getScript(load(1));
					//$("#resetSB").load(location.href + " #resetSB");
					$("#respuestaLP_").html("<span id='ACTUALIZADO' >"+data+"</span>");
			}else if($.trim(data)=='ACTUALIZADO Y CORREO ENVIADO'){
					$("#respuestaLP_").html("<span id='ACTUALIZADO' >"+data+"</span>");
			}else{
					$("#respuestaLP_").html(data);
			}
		}  
	});
});

$("#clickLPE").click(function(){
	
	var formulario = $("#listadoLPform").serializeArray();
	formulario.push(
		{ name: "mandacorreo", value: 'si' }
	);
	
	$.ajax({
		url:'listaproveedores/controladorLP.php',
		method:"POST",
		data:formulario, 
		beforeSend:function(){  
			$('#respuestaLP_').html('cargando'); 
		}, 	
		success:function(data){
			if($.trim(data)=='Ingresado' || $.trim(data)=='ACTUALIZADO'){
					$('#dataModal').modal('hide');
					
				
					$("#respuestaLP_").html("<span id='ACTUALIZADO' >"+data+"</span>");
					
			}else if($.trim(data)=='ACTUALIZADO Y CORREO ENVIADO'){
					$("#respuestaLP_").html("<span id='ACTUALIZADO' >"+data+"</span>");
			}else{   
					$("#respuestaLP_").html(data);
			}
		}  
	});
});

	
});
		
	</script>