<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" onclick="load2(1);" id="mostrar4" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar4" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO LISTA DE PROVEEDORES (SOLO BUSCA POR PRODUCTOS O SERVICIOS)</p></strong></div>


<div  id="mensajefiltro">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
 </div>
							
	        <div id="target4" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader2" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="30%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_page" onchange="load2(1);">

        <option value="7"  <?php if($_REQUEST['per_page']=='7')  echo 'selected'; ?>>7</option>
        <option value="10" <?php if($_REQUEST['per_page']=='10') echo 'selected'; ?>>10</option>
        <option value="15" <?php if($_REQUEST['per_page']=='15') echo 'selected'; ?>>15</option>
        <option value="20" <?php if($_REQUEST['per_page']=='20') echo 'selected'; ?>>20</option>
        <option value="50" <?php if($_REQUEST['per_page']=='50') echo 'selected'; ?>>50</option>
        <option value="100"<?php if($_REQUEST['per_page']=='100')echo 'selected'; ?>>100</option>
        <option value="20000"<?php if($_REQUEST['per_page']=='20000')echo 'selected'; ?>>TODOS</option>
	</select>
</td>


<td width="30%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="load2(1);" >BUSCAR</button>
</td>

<td width="30%" align="center" style="text-transform: uppercase;">
	<span>PLANTILLA</span>
	<?php
	$encabezado = '';$option='';
	$queryper = $proveedoresC->desplegablesfiltro('listadop','');
	$encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required="" onchange="load2(1);" style="text-transform: uppercase;">
	<option value="">SELECCIONA UNA OPCIÓN</option>';

	$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
	$num = 0;

	while($row1 = mysqli_fetch_array($queryper))
	{
		if($num==8){$num=0;}else{$num++;}

		$select='';
		if($_SESSION['DEPARTAMENTO']==$row1['nombreplantilla']){$select = "selected";}

		$option .= '<option style="background:#'.$fondos[$num].'; text-transform: uppercase;" '.$select.' value="'.$row1['nombreplantilla'].'">'.$row1['nombreplantilla'].'</option>';
	}
	echo $encabezado.$option.'</select>';			
	?>
</td>


</tr>
</table>
		<div class="datos_ajax2">
		</div>
  
<!--aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "clases2/script.filtro.php";
?>