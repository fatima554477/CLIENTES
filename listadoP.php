<?php
/*$connecDB = $proveedoresC->db();

$_SESSION['where'] = "  ";

$get_total_rows = mysqli_fetch_array($results); //total records
$item_per_page = 20;
//break total records into pages
$pages = 500;
*/

?>
<!--<script type="text/javascript" src="inventario/js/jquery-1.11.2.min.js"></script>-->
<!--
<script type="text/javascript">
$(document).ready(function() {
	
	$("#results").load("listadoclientes/fetch_pagesLP.php");  //initial page number to load
	
	$(".pagination").bootpag({
	   total: <?php echo $pages; ?>,
	   page: 1,
	   maxVisible: 5 
	}).on("page", function(e, num){
		e.preventDefault();
		$("#results").prepend('<div class="loading-indication"><img src="inventario/ajax-loader.gif" /> Cargando datos...</div>');
		$("#results").load("listadoclientes/fetch_pagesLP.php", {'page':num});
	});

});

</script>

<link href="inventario/css/style2.css" rel="stylesheet" type="text/css">-->

<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar9" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar9" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;DATOS DEL CLIENTE</p><div  id="mensajeLISTADO"></div></div></strong>
	        <div id="target9" style="display:block;"  class="content2">
    
        <div class="card">
          <div class="card-body">
	<form class="row g-3 needs-validation was-validated" novalidate="" id="LISTADOform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	  
	<table table class="table table-striped table-bordered" style="width:100%"  >
	
	
						<div class="col-md-4">
                         <strong> <label for="validationCustom02" class="form-label">NOMBRE FISCAL O RAZÓN SOCIAL DEL CLIENTE:</label></strong>
                          <input type="text" class="form-control" id="validationCustom02" value="<?php echo $nommbrerazon; ?>" required="" name="nommbrerazon">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						<div class="col-md-4">
                         <strong> <label for="validationCustom02" class="form-label">NOMBRE COMERCIAL CLIENTE:</label></strong>
                          <input type="text" class="form-control" id="validationCustom02" value="<?php echo $C_NOMBRE_COMERCIAL_EMPRESA; ?>" required="" name="C_NOMBRE_COMERCIAL_EMPRESA">
                          <div class="valid-feedback">Bien!</div>
                        </div>

                        <!--<div class="col-md-4">
                        <strong> <label for="validationCustom02" class="form-label">USUARIO CRM:</label></strong>
						<div class="input-group mb-3">
                          <span class="input-group-text">AdminPR_</span> <input type="text" class="form-control" id="validationCustom02" value="<?php echo $usuario; ?>" required="" name="usuario"></div>
						  
                          <div class="valid-feedback">Bien!</div>
                        </div>-->


                        <div class="col-md-4">
                        <strong> <label for="validationCustom02" class="form-label">USUARIO CRM:</label></strong>
						<div class="input-group mb-3">
                          <span class="input-group-text">AdminCL_</span>
                          <input type="text" class="form-control" id="validationCustom02" value="<?php echo $usuario; ?>" required="" name="usuario"></div>
                          <div class="valid-feedback">Bien!</div>
                        </div>
			
                        <div class="col-md-4">
                        <strong> <label for="validationCustom02" class="form-label">CONTRASEÑA DE LA EMPRESA 1: <button class="btn btn-primary" type="button" onclick="genPass();">GENERA PASSWORD</button></label></strong>
                          <input type="text" class="form-control" id="contrasenia" value="<?php echo $contrasenia; ?>" required=""  name="contrasenia" name="contrasenia" STYLE="text-transform: NONE;">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
						
                        <div class="col-md-4">
                        <strong><label for="validationCustom02" class="form-label">EMAIL DE LA EMPRESA :</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $email; ?>" required="" name="email">
                          <div class="valid-feedback">Bien!</div>
                        </div>

                        <div class="col-md-4">
                        <strong><label for="validationCustom02" class="form-label">RFC DE LA EMPRESA 1:</label></strong>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $rfc ?>" required="" name="rfc">
                          <div class="valid-feedback">Bien!</div>
                        </div>

                          <div class="valid-feedback">Bien!</div>
                        </div>
						
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">EMPRESA A LA QUE PERTENECE:</label><br></br>
				 <span id="desplegadoreset">
	<?php
	$encabezado = '';
	$queryper = $proveedoresC->lista_empresacliente();
	$encabezado = '<select class="form-select mb-3" aria-label="Default select example" id="id_empresa" required="" name="id_empresa">
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
	if($id_empresaRIAL==$row1['id']){$select = "selected";};

	$option .= '<option style="background: #'./*linea para multiples colores*/$fondos[$num]./*linea para multiples colores*/'" '.$select.' value="'.$row1['id'].'">'.$row1['NFE_INFORMACION'].'</option>';
	}
	echo $encabezado.$option.'</select>';			
	?>
			</span>
                        </div>
    
       <input type="hidden" value="validaLISTADO" name="validaLISTADO"/>
      

        
          <tr >  
		  
       <th>
	                

 <?php if($proveedoresC->variablespermisos('','DATOSL_CLIENTES','guardar')=='si'){ ?>
<button class="btn btn-success px-5"  type="button" id="enviarLISTADO">SOLO GUARDAR</button>
</th><?php } ?>



<?php if($proveedoresC->variablespermisos('','enviaremail','ver')=='si'){ ?>  
<td> <button class="btn btn-primary px-5"  type="button" id="enviarLISTADOENVIARCORREO">GUARDAR Y  ENVIAR POR EMAIL</button>
<?php } ?>
</td>
</tr>
                
                   
                    </table>
					
					</form>
					
					
	
	
                    <table>
                    <tr>
                

                 
                  </tr>
                    </table>
					

						 
</div>
</div>
</div>



  
 

	  
			  
	<!--		  
			  
<BR/>
<BR/>
<hr/>

<DIV style="display:block;"  class="content2 scroll">	
<form class="searchbar" id="buscaform">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        <INPUT style="widt: 300px;" TYPE="TEXT" NAME="BUSCAR" value="<?php echo $_POST['BUSCAR']; ?>"/>
<INPUT class="btn btn-sm btn-primary px-5" TYPE="button" VALUE="BUSCAR"  id="clickbuscar"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<SPAN id="BORRAR" CLASS="BORRAR"><strong>BORRAR FILTRO</strong></SPAN>
</form>	  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <a href="<?php echo $_SERVER['PHP_SELF'].'?limpia=limpia'; ?>">LIMPIAR FILTRO</a>		
<br />
<div id="resetpaginador">
<div class="pagination"></div>
</div>  
<div class="table-responsive">
<br />	

<div id="results"></div>

</div>
</div>
	-->		  
			 	  