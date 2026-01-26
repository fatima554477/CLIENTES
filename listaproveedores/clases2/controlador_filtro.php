<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	include(__ROOT1__."/../includes/convertirma.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08listap1filtroDes`, 08altaeventosfiltroPLA WHERE 08listap1filtroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "listadop";
	$tables="02usuarios,02direccionproveedor1,02productosservicios,02otrosproveedores";
	

$nommbrerazon = isset($_POST["nommbrerazon"])?$_POST["nommbrerazon"]:""; 
$P_NOMBRE_FISCAL_RS_EMPRESA = isset($_POST["P_NOMBRE_FISCAL_RS_EMPRESA"])?$_POST["P_NOMBRE_FISCAL_RS_EMPRESA"]:""; 
$P_RFC_MTDP = isset($_POST["P_RFC_MTDP"])?$_POST["P_RFC_MTDP"]:""; 
$usuario = isset($_POST["usuario"])?$_POST["usuario"]:""; 
$contrasenia = isset($_POST["contrasenia"])?$_POST["contrasenia"]:""; 
$email = isset($_POST["email"])?$_POST["email"]:""; 
$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:""; 
$P_TELEFONO_1_EMPRESA = isset($_POST["P_TELEFONO_1_EMPRESA"])?$_POST["P_TELEFONO_1_EMPRESA"]:""; 
$CIUDAD_SERVICIO = isset($_POST["CIUDAD_SERVICIO"])?$_POST["CIUDAD_SERVICIO"]:""; 
$PAIS_SERVICIO = isset($_POST["PAIS_SERVICIO"])?$_POST["PAIS_SERVICIO"]:""; 
$PCONTACTADO_POR = isset($_POST["PCONTACTADO_POR"])?$_POST["PCONTACTADO_POR"]:""; 
$PRODUCTO_O_SERVICIO_9 = isset($_POST["PRODUCTO_O_SERVICIO_9"])?$_POST["PRODUCTO_O_SERVICIO_9"]:""; 


$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"nommbrerazon"=>$nommbrerazon,
"P_NOMBRE_FISCAL_RS_EMPRESA"=>$P_NOMBRE_FISCAL_RS_EMPRESA,
"P_RFC_MTDP"=>$P_RFC_MTDP,
"usuario"=>$usuario,
"email"=>$email,
"P_TELEFONO_1_EMPRESA"=>$P_TELEFONO_1_EMPRESA,
"CIUDAD_SERVICIO"=>$CIUDAD_SERVICIO,
"PAIS_SERVICIO"=>$PAIS_SERVICIO,
"PCONTACTADO_POR"=>$PCONTACTADO_POR,
"PRODUCTO_O_SERVICIO_9"=>$PRODUCTO_O_SERVICIO_9,


 "per_page"=>$per_page,
	"query"=>$query,
	"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
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
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">NOMBRE COMERCIAL DE LA EMPRESA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"P_NOMBRE_FISCAL_RS_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;"> NOMBRE FISCAL DE LA  EMPRESA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"P_RFC_MTDP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">RFC</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">CONTACTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">CEL DEL CONTACTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">EMAIL</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CONVENIO_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">HAY CONVENIO?</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CONVENIO_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">CONVENIO</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"PRODUCTO_O_SERVICIO_9",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">PRODUCTO  PRINCIPAL<br> DEL PROVEEDOR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"P_TELEFONO_1_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">TELEFONO PRINCIPAL<br> DEL PROVEEDOR</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"CIUDAD_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">CIUDAD DONDE SE <br>OTORGA EL SERVICIO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"PAIS_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">PAÍS DONDE SE <br>OTORGA EL SERVICIO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"PCONTACTADO_POR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center; text-transform: uppercase;">CONTACTADO POR</th>
<?php } ?>


          <th style="background:#c9e8e8;text-align:center"></th>
          <th style="background:#c9e8e8;text-align:center"></th>




<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>-->
<?php  
if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="nommbrerazon_2" value="<?php 
echo $nommbrerazon; ?>">--></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"P_NOMBRE_FISCAL_RS_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="P_NOMBRE_FISCAL_RS_EMPRESA_2" value="<?php 
echo $P_NOMBRE_FISCAL_RS_EMPRESA; ?>">--></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"P_RFC_MTDP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="P_RFC_MTDP_2" value="<?php 
echo $P_RFC_MTDP; ?>">--></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="usuario_2" value="<?php 
echo $usuario; ?>">--></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="usuario_2" value="<?php 
echo $usuario; ?>">--></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="email_2" value="<?php 
echo $email; ?>">--></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="email_2" value="<?php 
echo $email; ?>">--></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="email_2" value="<?php 
echo $email; ?>">--></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"PRODUCTO_O_SERVICIO_9",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PRODUCTO_O_SERVICIO_9_1_2" value="<?php 
echo $PRODUCTO_O_SERVICIO_9; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"P_TELEFONO_1_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="P_TELEFONO_1_EMPRESA_2" value="<?php 
echo $P_TELEFONO_1_EMPRESA; ?>">--></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"CIUDAD_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="CIUDAD_SERVICIO_2" value="<?php 
echo $CIUDAD_SERVICIO; ?>">--></td>
<?php } ?>                                                
<?php  
if($database->plantilla_filtro($nombreTabla,"PAIS_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="PAIS_SERVICIO_2" value="<?php 
echo $PAIS_SERVICIO; ?>">--></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"PCONTACTADO_POR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="PCONTACTADO_POR_2" value="<?php 
echo $PCONTACTADO_POR; ?>">--></td>
<?php } ?>

<?php /*if($database->variablespermisos('','REVISARpro ','modificar')=='si'){ ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"REVISAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><!--<input type="text" class="form-control" id="nommbrerazon_2" value="<?php 
echo $nommbrerazon; ?>">--></td>
<?php } ?>
<?php } */?>



	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){
			//$P_NOMBRE_COMERCIAL_EMPRESA = $database->P_NOMBRE_COMERCIAL_EMPRESA($row['IDDDDDD']);			
			$direccionproveedor1 = $database->direccionproveedor1($row['IDDDDDD']);
			$productosservicios = $database->productosservicios($row['IDDDDDD']);
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

<?php  if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><a href="PROVEEDORES.php?idPROV=<?php echo $row["IDDDDDD"]; ?>"><?php echo $row["nommbrerazon"]; ?></a></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"P_NOMBRE_FISCAL_RS_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($direccionproveedor1['P_NOMBRE_FISCAL_RS_EMPRESA']); ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"P_RFC_MTDP",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($direccionproveedor1['P_RFC_MTDP']);?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_PROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($query_contactos); ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"TELEFONO_CONTACPROVEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($query_contactoCEL); ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['email']);?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"CONVENIO_PROVEEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($datos_convemio); ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"convenio",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;">
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
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"PRODUCTO_O_SERVICIO_9",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($row['PRODUCTO_O_SERVICIO_9']); ?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"P_TELEFONO_1_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($direccionproveedor1['P_TELEFONO_1_EMPRESA']);?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"CIUDAD_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($productosservicios['CIUDAD_SERVICIO']);?></td>
<?php } ?>                                           

<?php  if($database->plantilla_filtro($nombreTabla,"PAIS_SERVICIO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($productosservicios['PAIS_SERVICIO']);?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"PCONTACTADO_POR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><?php echo strtoupper($productosservicios['PCONTACTADO_POR']);?></td>
<?php } ?>

<?php /*if($database->variablespermisos('','REVISARpro ','modificar')=='si'){ ?>
<?php  if($database->plantilla_filtro($nombreTabla,"REVISAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center;"><a href="listaproveedores.php?id=<?php echo $row["IDDDDDD"]; ?>"><?php echo $row["nommbrerazon"]; ?></a></td>
<?php } ?>
<?php } */?>




<?php /*termina copiar y terminaA5*/ ?>
			<td>
<?php if($database->variablespermisos('','listadoP ','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row['IDDDDDD']; ?>" class="btn btn-info btn-xs view_LP" />
<?php } ?>
			</td>




<?php if($database->variablespermisos('','listadoDUPLI ','modificar')=='si'){ ?>
			<td>
<input type="button" name="view" value="DUPLICAR" id="<?php echo $row['IDDDDDD']; ?>" class="btn btn-info btn-xs view_DUPLICAR" />
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
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
