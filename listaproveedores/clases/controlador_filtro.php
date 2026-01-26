<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


if (!isset($_SESSION)) { 
    session_start(); 
}
define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"]) && $_POST["action"] != NULL) ? $_POST["action"] : "";
if ($action == "ajax") {

    require(__ROOT6__."/class.filtro.php");
    include(__ROOT1__."/../includes/convertirma.php");
    $database = new orders();	

    $query = isset($_POST["query"]) ? $_POST["query"] : "";

    $DEPARTAMENTO = !empty($_POST["DEPARTAMENTO2"]) ? $_POST["DEPARTAMENTO2"] : "DEFAULT";	
    $nombreTabla = "SELECT * FROM `08listap1filtroDes`, 08altaeventosfiltroPLA WHERE 08listap1filtroDes.id = 08altaeventosfiltroPLA.idRelacion";
    $altaeventos = "listadop";
    $tables = "02usuarios,02direccionproveedor1,02productosservicios,02otrosproveedores,02metodopago";
    

    $nommbrerazon = isset($_POST["nommbrerazon"]) ? $_POST["nommbrerazon"] : ""; 
    $P_NOMBRE_FISCAL_RS_EMPRESA = isset($_POST["P_NOMBRE_FISCAL_RS_EMPRESA"]) ? $_POST["P_NOMBRE_FISCAL_RS_EMPRESA"] : ""; 
    $P_RFC_MTDP = isset($_POST["P_RFC_MTDP"]) ? $_POST["P_RFC_MTDP"] : ""; 
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : ""; 
    $contrasenia = isset($_POST["contrasenia"]) ? $_POST["contrasenia"] : ""; 
    $email = isset($_POST["email"]) ? $_POST["email"] : ""; 
    $validaLISTADO = isset($_POST["validaLISTADO"]) ? $_POST["validaLISTADO"] : ""; 
    $P_TELEFONO_1_EMPRESA = isset($_POST["P_TELEFONO_1_EMPRESA"]) ? $_POST["P_TELEFONO_1_EMPRESA"] : ""; 
    $CIUDAD_SERVICIO = isset($_POST["CIUDAD_SERVICIO"]) ? $_POST["CIUDAD_SERVICIO"] : ""; 
    $PAIS_SERVICIO = isset($_POST["PAIS_SERVICIO"]) ? $_POST["PAIS_SERVICIO"] : ""; 
    $PCONTACTADO_POR = isset($_POST["PCONTACTADO_POR"]) ? $_POST["PCONTACTADO_POR"] : ""; 
    $PRODUCTO_O_SERVICIO_9 = isset($_POST["PRODUCTO_O_SERVICIO_9"]) ? $_POST["PRODUCTO_O_SERVICIO_9"] : ""; 
    $CONVENIO_PROVEEDOR = isset($_POST["CONVENIO_PROVEEDOR"]) ? $_POST["CONVENIO_PROVEEDOR"] : ""; 


    $per_page = intval($_POST["per_page"]);
    $campos = "*";
    //Variables de paginación
    $page = (isset($_POST["page"]) && !empty($_POST["page"])) ? $_POST["page"] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    
    $search = array(
        "nommbrerazon" => $nommbrerazon,
        "P_NOMBRE_FISCAL_RS_EMPRESA" => $P_NOMBRE_FISCAL_RS_EMPRESA,
        "P_RFC_MTDP" => $P_RFC_MTDP,
        "usuario" => $usuario,
        "email" => $email,
        "P_TELEFONO_1_EMPRESA" => $P_TELEFONO_1_EMPRESA,
        "CIUDAD_SERVICIO" => $CIUDAD_SERVICIO,
        "PAIS_SERVICIO" => $PAIS_SERVICIO,
        "PCONTACTADO_POR" => $PCONTACTADO_POR,
        "PRODUCTO_O_SERVICIO_9" => $PRODUCTO_O_SERVICIO_9,
        "CONVENIO_PROVEEDOR" => $CONVENIO_PROVEEDOR,
        "per_page" => $per_page,
        "query" => $query,
        "offset" => $offset
    );

    //consulta principal para recuperar los datos
    $datos = $database->getData($tables, $campos, $search);
    $countAll = $database->getCounter();
    $row = $countAll;
    
    if ($row > 0) {
        $numrows = $countAll;
    } else {
        $numrows = 0;
    }	
    $total_pages = ceil($numrows / $per_page);
	
	
    //Recorrer los datos recuperados
?>

<div class="clearfix">
    <?php 
        echo "<div class='hint-text'> ".$numrows." registros</div>";
        require __ROOT6__."/pagination.php"; //include pagination class
        $pagination = new Pagination($page, $total_pages, $adjacents);
        echo $pagination->paginate();
    ?>
</div>
<div class="table-responsive">
<style>
    thead tr:first-child th {
        position: sticky;
        top: 0;
        background: #c9e8e8;
        z-index: 10;
    }

    thead tr:nth-child(2) td {
        position: sticky;
        top: 60px; /* Altura del primer encabezado */
        background: #e2f2f2;
        z-index: 9;
    }
</style>
<div style="max-height: 600px; overflow-y: auto;">
<table class="table table-striped table-bordered" >	
    <thead>
        <tr>
            <th style="background:#c9e8e8"></th>
            <th style="background:#c9e8e8">#</th>

         <?php 
         if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE COMERCIAL DE LA EMPRESA</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_NOMBRE_FISCAL_RS_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center"> NOMBRE FISCAL DE LA  EMPRESA</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_RFC_MTDP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">RFC</th>
            <?php } 
			
            /*if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">USUARIO</th>
            <?php }*/
			if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CONTACTO</th>
            <?php } 
			      if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CEL DEL CONTACTO</th>
            <?php } 
			
            if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">EMAIL</th>
            <?php } 
		   if($database->plantilla_filtro($nombreTabla,"CONVENIO_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HAY CONVENIO?</th>
            <?php }
		  if($database->plantilla_filtro($nombreTabla,"convenio",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CONVENIO</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PRODUCTO_O_SERVICIO_9",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PRODUCTO  PRINCIPAL<br> DEL PROVEEDOR</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_TELEFONO_1_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TELEFONO PRINCIPAL<br> DEL PROVEEDOR</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"CIUDAD_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CIUDAD DONDE SE <br>OTORGA EL SERVICIO</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PAIS_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PAÍS DONDE SE <br>OTORGA EL SERVICIO</th>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PCONTACTADO_POR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CONTACTADO POR</th>
            <?php } ?>
          <th style="background:#c9e8e8;text-align:center"></th>
          <th style="background:#c9e8e8;text-align:center"></th>
          <th style="background:#c9e8e8;text-align:center"></th>
        </tr>
        <tr>
            <td style="background:#c9e8e8"></td>
            <td style="background:#c9e8e8"></td>
            <?php /*inicia copiar y pegar iniciaA4*/ ?>
            <!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>-->
            <?php  
            if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="nommbrerazon_1" value="<?php echo $nommbrerazon; ?>"></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_NOMBRE_FISCAL_RS_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="P_NOMBRE_FISCAL_RS_EMPRESA_1" value="<?php echo $P_NOMBRE_FISCAL_RS_EMPRESA; ?>"></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_RFC_MTDP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="P_RFC_MTDP_1" value="<?php echo $P_RFC_MTDP; ?>"></td>
            <?php } 

			if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_CONTACTO_PROVEE_1" value="<?php echo $NOMBRE_CONTACTO_PROVEE; ?>"></td>
            <?php }
			if($database->plantilla_filtro($nombreTabla,"TELEFONO_CONTACPROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="TELEFONO_CONTACPROVEE_1" value="<?php echo $TELEFONO_CONTACPROVEE; ?>"></td>
            <?php }
			
            if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="email_1" value="<?php echo $email; ?>"></td>
            <?php } 

if($database->plantilla_filtro($nombreTabla,"CONVENIO_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
             </br><td style="background:#c9e8e8">
				
			<select class="form-select mb-3" aria-label="Default select example" id="CONVENIO_PROVEEDOR_1" onchange="load(1);">
			<option value="">TODOS</option>
			<option value="SI" <?php if($_POST['CONVENIO_PROVEEDOR']=='SI'){echo 'selected';} ?>>SI</option>
			<option value="NO" <?php if($_POST['CONVENIO_PROVEEDOR']=='NO'){echo 'selected';} ?>>NO</option>
		
								
			</select>
</td>
<?php } 
if($database->plantilla_filtro($nombreTabla,"convenio",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="P_NOMBRE_FISCAL_RS_EMPRESA_2" value="<?php 
echo $convenio; ?>">--></td>
<?php }
			
			
            if($database->plantilla_filtro($nombreTabla,"PRODUCTO_O_SERVICIO_9",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_TELEFONO_1_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="P_TELEFONO_1_EMPRESA" value="<?php echo $P_TELEFONO_1_EMPRESA; ?>"></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"CIUDAD_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CIUDAD_SERVICIO" value="<?php echo $CIUDAD_SERVICIO; ?>"></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PAIS_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAIS_SERVICIO" value="<?php echo $PAIS_SERVICIO; ?>"></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PCONTACTADO_POR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PCONTACTADO_POR" value="<?php echo $PCONTACTADO_POR; ?>"></td>
            <?php } 
            if($database->variablespermisos('','listadoP ','modificar')=='si'){ ?>
                <td style="background:#c9e8e8"></td><?php } 
            if($database->variablespermisos('','listadoDUPLI ','ver')=='si'){ ?>
                <td style="background:#c9e8e8"></td><?php } 
            if($database->variablespermisos('','listadoP ','borrar')=='si'){ ?>
                <td style="background:#c9e8e8"></td><?php } ?>
				
        </tr>			
    </thead>
    <?php 	if ($numrows < 0) { ?>
        </table>
    <?php } else { ?>		
    <tbody>
    <?php
        $finales = 0;
       foreach ($datos as $key => $row) {
            $query_producots = $database->todos_productosservicios($row['IDDDDDD']);
            $query_contactos = $database->contactospro($row['IDDDDDD']);
            $query_contactoCEL = $database->contactoCELpro($row['IDDDDDD']);
            $datos_convenio = $database->datos_convenio($row['IDDDDDD']);
            $datos_convemio = $database->convenionuevo($row['IDDDDDD']);
  
            
    ?>
     		 <tr style="background:#FFFFFF">
		 						<td>
    <input type="checkbox" 
           class="checkbox"
           data-id="<?php echo $row['IDDDDDD'];?>" 
           style="transform: scale(1.1); cursor: pointer;" 
           onchange="
               const fila = this.closest('tr');
               const id = this.getAttribute('data-id');
               if (this.checked) {
                      fila.style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
                   localStorage.setItem('checkbox_' + id, 'checked');
               } else {
                   fila.style.filter = 'none';
                   localStorage.removeItem('checkbox_' + id);
               }">
</td>
            <td><?php echo $row["IDDDDDD"];?></td>
            <?php /*inicia copiar y pegar iniciaA5*/ ?>
            <!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>-->
            <?php if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><a href="PROVEEDORES.php?idPROV=<?php echo $row["IDDDDDD"]; ?>"><?php echo strtoupper($row['nommbrerazon']);?></a></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_NOMBRE_FISCAL_RS_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['P_NOMBRE_FISCAL_RS_EMPRESA']);?></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_RFC_MTDP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['P_RFC_MTDP']);?></td>
            <?php } 
            /*if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['usuario']);?></td>
            <?php } */
		if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($query_contactos); ?></td>
            <?php }
	   if($database->plantilla_filtro($nombreTabla,"TELEFONO_CONTACPROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($query_contactoCEL); ?></td>
            <?php }
            if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['email']);?></td>
            <?php }
			
				   if($database->plantilla_filtro($nombreTabla,"CONVENIO_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($datos_convemio); ?></td>
            <?php }
			
			
			
               if($database->plantilla_filtro($nombreTabla,"convenio",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;">
                    <?php
                        $linkConvenio = '';
                        if (!empty($datos_convenio) && !empty($datos_convenio['CONVENIO_DOPROVEEDOR'])) {
                            $archivoConvenio = htmlspecialchars($datos_convenio['CONVENIO_DOPROVEEDOR']);
                            $rutaConvenio = "includes/archivos/".$archivoConvenio;
                            $linkConvenio = "<a target='_blank' href='".$rutaConvenio."'>VISUALIZAR!</a><br>";
                        }
                        echo $linkConvenio;
                    ?>
                </td>
            <?php }
			
			
			
			
            if($database->plantilla_filtro($nombreTabla,"PRODUCTO_O_SERVICIO_9",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($query_producots); ?></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"P_TELEFONO_1_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['P_TELEFONO_1_EMPRESA']);?></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"CIUDAD_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['CIUDAD_SERVICIO']);?></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PAIS_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['PAIS_SERVICIO']);?></td>
            <?php } 
            if($database->plantilla_filtro($nombreTabla,"PCONTACTADO_POR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['PCONTACTADO_POR']);?></td>
            <?php } ?>
            <?php if($database->variablespermisos('','listadoP ','modificar')=='si'){ ?>
                <td>
                    <input type="button" name="view" value="MODIFICAR" id="<?php echo $row['IDDDDDD']; ?>" class="btn btn-info btn-xs view_LP" />
                </td>
            <?php } 
            if($database->variablespermisos('','listadoDUPLI','ver')=='si'){ ?>
                <td>
                    <input type="button" name="view" value="DUPLICAR" id="<?php echo $row['IDDDDDD']; ?>" class="btn btn-info btn-xs view_DUPLICAR" />
                </td>
            <?php } 
            if($database->variablespermisos('','listadoP ','borrar')=='si'){ ?>
                <td>
                    <input type="button" name="view" value="BORRAR" id="<?php echo $row['IDDDDDD']; ?>" class="btn btn-info btn-xs view_BORRARLP" />
                </td>
            <?php } ?>
        </tr>
    <?php
        $finales++;
        }	
    ?>
    </tbody>
    </table>
    </div>
    <div class="clearfix">
        <?php 
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
            echo $pagination->paginate();
        ?>
    </div>
    <?php
    }
}
?>