<?php
$connecDB = $proveedoresC->db();

$_SESSION['where'] = "  ";

//$get_total_rows = mysqli_fetch_array($results); //total records
$item_per_page = 13;
//break total records into pages
$pages = 500;


?>
<script type="text/javascript" src="inventario/js/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){
  $("#LISTADOform input[type='text']").on("input", function(){
    this.value = this.value.toUpperCase();
  });
});
</script>


<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar100" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar100" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;ALTA DE PROVEEDOR</p><div  id="mensajeLISTADO2"></div></div></strong>
	        <div id="target100" style="display:block;"  class="content2">
			
          <?php if($proveedoresC->variablespermisos('','listadoform','guardar')=='si'){ ?>
        <div class="card">
          <div class="card-body">
	<form class="row g-3 needs-validation was-validated" novalidate="" id="LISTADOform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<table table class="table table-striped table-bordered" style="width:100%"  >
<script>
  function actualizarValorusuario() {
    const src = document.getElementById("nommbrerazon");
    const dst = document.getElementById("usuario");
    const valor = (src.value || "").toUpperCase().trim();
    dst.value = valor;
    // Opcional: notificar a cualquier listener que dependa de 'input'
    if (window.jQuery) { jQuery(dst).trigger('input'); }
  }
</script>
			<div class="col-md-4">
                     <strong>
  <label for="validationCustom02" class="form-label">
    NOMBRE COMERCIAL: <span style="color: red; font-size: 22px;">*</span>
  </label>
</strong>
                     <input type="text" class="form-control" oninput="actualizarValorusuario()"id="nommbrerazon" value="<?php echo $nommbrerazon; ?>" required="" name="nommbrerazon">
                     <div class="valid-feedback">Bien!</div>
                    </div>
		 <div class="col-md-4">
        <strong><label for="validationCustom02" class="form-label">RAZÓN SOCIAL:</label></strong>
       <input type="text" class="form-control" id="P_NOMBRE_FISCAL_RS_EMPRESA" value="<?php echo strtoupper($P_NOMBRE_FISCAL_RS_EMPRESA); ?>" required="" name="P_NOMBRE_FISCAL_RS_EMPRESA">
       <div class="valid-feedback">Bien!</div>
                      </div>
				<div class="col-md-4">
                    <strong><label for="validationCustom02" class="form-label">RFC DEL PROVEEDOR:<span style="color: red; font-size: 22px;">*</span></label></strong>
                       <input type="text" class="form-control" id="validationCustom01" value="<?php echo $rfc ?>" required="" name="rfc">
                    <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                    <div class="col-md-4">
                      <strong> <label for="validationCustom02" class="form-label">USUARIO CRM:<span style="color: red; font-size: 22px;">*</span></label></strong>
						<div class="input-group mb-3">
                          <span class="input-group-text">AdminPR_</span> <input type="text" class="form-control" id="usuario" value="<?php echo strtoupper($usuario); ?>" required="" name="usuario"></div>
                          <div class="valid-feedback">Bien!</div>
                        </div>
			
                        <div class="col-md-4">
                        <strong> <label for="validationCustom02" class="form-label">CONTRASEÑA DEL PROVEEDOR: <button class="btn btn-primary" type="button" onclick="genPass();">GENERA PASSWORD</button></label></strong>
                          <input type="text" class="form-control" id="contrasenia" value="<?php echo $contrasenia; ?>" required=""  name="contrasenia" name="contrasenia" STYLE="text-transform: NONE;">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
						
                        <div class="col-md-4">
                        <strong><label for="validationCustom02" class="form-label">EMAIL DEL PROVEEDOR:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $email; ?>" required="" name="email">
                          <div class="valid-feedback">Bien!</div>
                        </div>

                       







                        <div class="col-md-4">
                          <strong><label for="validationCustom02" class="form-label">EMPRESA A LA QUE PERTENECE:<span style="color: red; font-size: 22px;">*</span></label></strong><br></br>
	<?php
$encabezado = '';

	$queryper = $proveedoresC->lista_empresacolaborador();

	$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="id_empresa2" required="" name="id_empresa2">

	<option value="">SELECCIONA UNA OPCIÓN</option>';

	/*linea para multiples colores*/

	$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");

	$num = 0;

	/*linea para multiples colores*/	

	while($row1 = mysqli_fetch_array($queryper))

	{

	/*linea para multiples colores*/

	if($num==8){$num=0;}else{$num++;}

	/*linea para multiples colores*/		

	$select='';

	if($ide==$row1['id']){$select = "selected";};



	$option .= '<option style="background: #'./*linea para multiples colores*/$fondos[$num]./*linea para multiples colores*/'" '.$select.' value="'.$row1['id'].'">'.$row1['NFE_INFORMACION'].'</option>';

	}

	echo $encabezado.$option.'</select>';			

	?>
                        </div>













    
       <input type="hidden" value="validaLISTADO" name="validaLISTADO"/>
      


		
          <tr>       
       <th>
	                


<button class="btn btn-sm btn-outline-success px-5"   type="button" id="enviarLISTADO">GUARDAR</button><?php } ?>

   <?php if($proveedoresC->variablespermisos('','listadoform','email')=='si'){ ?>

<button class="btn btn-sm btn-outline-success px-5"   type="button" id="enviarLISTADOYENVIARCORREO">GUARDAR Y ENVIAR CORREO</button><?php } ?>


<div id="mensajeLISTADO"/></th></tr>
                
                   
                    </table>
					
				
					
					
					
					

	</form>						 
</div>
</div>
</div>


	   
			  
			  