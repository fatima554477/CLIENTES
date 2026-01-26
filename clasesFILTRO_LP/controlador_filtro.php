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
	 <table class="table table-striped table-bordered" >	
		<thead>
            <tr>

<?php /*inicia copiar y pegar iniciaA3*/ ?>

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



<th style="background:#c9e8e8">MODIFICAR</th>
<?php if($database->variablespermisos('','DATOSL_CLIENTES ','borrar')=='si'){ ?>
<th style="background:#c9e8e8;text-align:center">BORRAR</th>

<?php } ?>
<!--
<?php 
if($database->plantilla_filtro($nombreTabla,"validaLISTADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">validaLISTADO</th>
<?php } ?>
-->
<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr>

<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>--><?php  
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

<td style="background:#c9e8e8"></td>
<?php if($database->variablespermisos('','DATOSL_CLIENTES ','borrar')=='si'){ ?>
<td style="background:#c9e8e8"></td>
<?php } ?>
<!--
<?php  
if($database->plantilla_filtro($nombreTabla,"validaLISTADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="validaLISTADO_1" value="<?php 
echo $validaLISTADO; ?>"></td>
<?php } ?>
<?php /*termina copiar y terminaA4*/ ?>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
-->

            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){?>
		<tr style="text-align:center">

<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>-->

<?php  if($database->plantilla_filtro($nombreTabla,"nommbrerazon",$altaeventos,$DEPARTAMENTO)=="si"){ ?>


<td style="text-align:center"><?php //echo $row['nommbrerazon'];?>
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

<a href="<?php echo 'listadoclientes.php'.'?idc='. $row["IDDD"]; ?>"><?php echo $row["IDDD"]; ?></a>
</td>

	<!--
<?php  if($database->plantilla_filtro($nombreTabla,"validaLISTADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['validaLISTADO'];?></td>
<?php } ?>
<?php /*termina copiar y terminaA5*/ ?>
		<td>
<?php if($database->variablespermisos('','ALTA_EVENTOS','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["IDDD"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosmodifica" />			
<?php } ?>
			</td>-->
			<?php if($database->variablespermisos('','DATOSL_CLIENTES ','borrar')=='si'){ ?>
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
