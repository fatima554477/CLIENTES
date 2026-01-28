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
//print_r($_POST);
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "altaeventos";
	$tables="06usuarios";
	

$CUENTRA_MAESTRA = isset($_POST["CUENTRA_MAESTRA"])?$_POST["CUENTRA_MAESTRA"]:""; 
$nommbrerazon = isset($_POST["nommbrerazon"])?$_POST["nommbrerazon"]:""; 
$C_NOMBRE_COMERCIAL_EMPRESA = isset($_POST["C_NOMBRE_COMERCIAL_EMPRESA"])?$_POST["C_NOMBRE_COMERCIAL_EMPRESA"]:""; 
$usuario = isset($_POST["usuario"])?$_POST["usuario"]:""; 
$contrasenia = isset($_POST["contrasenia"])?$_POST["contrasenia"]:""; 
$email = isset($_POST["email"])?$_POST["email"]:""; 
$rfc = isset($_POST["rfc"])?$_POST["rfc"]:""; 
$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:""; 

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"CUENTRA_MAESTRA"=>$CUENTRA_MAESTRA,
"nommbrerazon"=>$nommbrerazon,
"C_NOMBRE_COMERCIAL_EMPRESA"=>$C_NOMBRE_COMERCIAL_EMPRESA,
"usuario"=>$usuario,
"contrasenia"=>$contrasenia,
"email"=>$email,
"rfc"=>$rfc,
"validaLISTADO"=>$validaLISTADO,

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
        top: 40px; /* Altura del primer encabezado */
        background: #e2f2f2;
        z-index: 9;
    }
</style>
<div style="max-height: 600px; overflow-y: auto;">
	 <table class="table table-striped table-bordered">   
	 
	
		<thead>
            <tr>
<th style="background:#c9e8e8"></th>


<?php 
if($database->plantilla_filtro($nombreTabla,"CUENTRA_MAESTRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CUENTRA MAESTRA</th>
<?php } ?>
<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE FISCAL DEL CLIENTE</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"C_NOMBRE_COMERCIAL_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE COMERCIAL DEL CLIENTE</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"rfc",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">RFC DEL CLIENTE</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">USUARIO DEL CLIENTE</th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">EMAIL DEL CLIENTE</th>
<?php } ?>


<?php if($database->variablespermisos('','LISTA_CLIENTES ','modificar')=='si'){ ?>
<th style="background:#c9e8e8">MODIFICAR</th>

<?php } ?>
<?php if($database->variablespermisos('','LISTA_CLIENTES ','borrar')=='si'){ ?>
<th style="background:#c9e8e8;text-align:center">BORRAR</th>

<?php } ?>

            </tr>
            <tr>
<td style="background:#c9e8e8"></td>

<?php  
if($database->plantilla_filtro($nombreTabla,"CUENTRA_MAESTRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="CUENTRA_MAESTRA_1" value="<?php 
echo $CUENTRA_MAESTRA; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="nommbrerazon_1" value="<?php 
echo $nommbrerazon; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"C_NOMBRE_COMERCIAL_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="C_NOMBRE_COMERCIAL_EMPRESA_1" value="<?php 
echo $C_NOMBRE_COMERCIAL_EMPRESA; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"rfc",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="rfc_1" value="<?php 
echo $rfc; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="usuario_1" value="<?php 
echo $usuario; ?>"></td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="email_1" value="<?php 
echo $email; ?>"></td>
<?php } ?>
<?php if($database->variablespermisos('','LISTA_CLIENTES ','modificar')=='si'){ ?>
<td style="background:#c9e8e8"></td>
<?php } ?>
<?php if($database->variablespermisos('','LISTA_CLIENTES ','borrar')=='si'){ ?>
<td style="background:#c9e8e8"></td>
<?php } ?>



            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){?>
		 <tr <?php echo $IDDD; ?>>
		 						<td>
  <input type="checkbox" 
       class="checkbox"
       data-id="<?php echo $row['IDDD'];?>"
       style="transform: scale(1.1); cursor: pointer;"
       onchange="
         const fila = this.closest('tr');
         const id = this.getAttribute('data-id');

         if (this.checked) {
           fila.classList.add('fila-seleccionada');
           localStorage.setItem('checkbox_' + id, 'checked');
         } else {
           fila.classList.remove('fila-seleccionada');
           localStorage.removeItem('checkbox_' + id);
         }
       ">
<style>
  /* pinta toda la fila (todas las celdas) */
  tr.fila-seleccionada > td{
    background: #ffe08a !important;   /* el color que quieras */
  }
</style>
</td>
		


<?php if($database->plantilla_filtro($nombreTabla,"CUENTRA_MAESTRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td style="text-align:center">
    <?php echo strtoupper($row['CUENTRA_MAESTRA']); ?>
</td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?>


<td style="text-align:center">
<a href="clientes.php?idc=<?php echo $row["IDDD"]; ?>"><?php echo $row["C_NOMBRE_FISCAL_RS_EMPRESA"]; ?></a>
</td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"C_NOMBRE_COMERCIAL_EMPRESA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['C_NOMBRE_COMERCIAL_EMPRESA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"rfc",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['rfc'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"usuario",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['usuario'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"email",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['email'];?></td>
<?php } ?>



<td>
<?php if($database->variablespermisos('','LISTA_CLIENTES ','modificar')=='si'){ ?>
<button type="button" class="btn btn-info btn-xs view_LC" id="<?php echo $row["IDDD"]; ?>">MODIFICAR</button><?php } ?>
</td>


			<?php if($database->variablespermisos('','LISTA_CLIENTES ','borrar')=='si'){ ?>
			<td>
<input type="button" name="view" value="BORRAR" id="<?php echo $row['IDDD']; ?>" class="btn btn-info btn-xs view_BORRARLC" />
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
