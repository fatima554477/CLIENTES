<div id="content">

			<hr/>
			 <strong> <P class="mb-0 text-uppercase">
<img src="includes/contraer51.png" id="mostrar9" style="cursor:pointer;"/>
<img src="includes/contraer61.png" id="ocultar9" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;AGREGAR NUEVO PROVEEDOR</P><div  id="mensajeLISTADO"></div></strong>
 
	        <div id="target9" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">


	<form class="row g-3 needs-validation was-validated" novalidate="" id="LISTADOform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
					  
						<!--`id`, `usuario`, `nommbrerazon`, `contrasenia`, `email`, `idRelacion`-->

						
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">RAZON SOCIAL CRM:</label>
                          <input type="text" class="form-control" id="validationCustom02" value="<?php echo $nommbrerazon; ?>" required="" name="nommbrerazon">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
	                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">USUARIO CRM:</label>
                          AdminPR_<input type="text" class="form-control" id="validationCustom02" value="<?php echo $usuario; ?>" required="" name="usuario">
                          <div class="valid-feedback">Bien!</div>
                        </div>					
						
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">CONTRASEÑA DE LA EMPRESA 1:</label>
                          <input type="password" class="form-control" id="validationCustom01" value="<?php echo $contrasenia; ?>" required="" name="contrasenia" STYLE="text-transform: NONE;">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
						
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">EMAIL DE LA EMPRESA :</label>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $email; ?>" required="" name="email">
                          <div class="valid-feedback">Bien!</div>
                        </div>
						
						
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">rfc :</label>
                          <input type="text" class="form-control" id="validationCustom01" value="<?php echo $rfc; ?>" required="" name="rfc">
                          <div class="valid-feedback">Bien!</div>
                        </div>

                      </div>
                        </div>
 
 
<input type="hidden" name="validaLISTADO" value="validaLISTADO"/>
 
 
 
                  <div> 
                          
	<div style="float:left;" border="solid 1px #000;">
	<button class="btn btn-primary" type="button" id="enviarLISTADO">ENVIAR</button>
	</div>
                         
	<div style="float:right">
	<div class="col-12">
	<button class="button" type="reset">BORRAR</button></div>
	</div>
	</div>
                            
 
 
                         </form>  
						 
                          </div>
						   </div>
						