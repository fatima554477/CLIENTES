<?php
	error_reporting(E_ALL); 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	require "controladorLP.php";


$connecDB = $proveedoresC->db();
$defaultWhere = " ";
if (!isset($_SESSION['where'])) {
        $_SESSION['where'] = $defaultWhere;
}
$item_per_page = 7;
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}
$position = (($page_number-1) * $item_per_page);

$BORRAR = ISSET($_POST["BORRAR"])?$_POST["BORRAR"]:'';
$BUSQUEDA = ISSET($_POST["BUSCAR"])?$_POST["BUSCAR"]:'';

if ($BUSQUEDA !== '') {
    $BUSQUEDA = mysqli_real_escape_string($connecDB, trim($BUSQUEDA));
}


if($BUSQUEDA !=''){

        $_SESSION['where'] = " and (P_RFC_MTDP LIKE '%".$BUSQUEDA."%' OR nommbrerazon  LIKE '%".$BUSQUEDA."%' ) ";

}
elseif($BORRAR!=''){
UNSET($_SESSION['where']);
$_SESSION['where'] = " ";

}




$results = mysqli_query($connecDB,$VARSQL)or die('ppppp2'.mysqli_error($connecDB));


$VARSQL1 = "select COUNT(*) as total from 
02usuarios, 02direccionproveedor1 WHERE
02usuarios.id = 02direccionproveedor1.idRelacion 

 ".$_SESSION['where']." ";

  
  $results1 = mysqli_query($connecDB,$VARSQL1)or die('ppppp1'.mysqli_error($connecDB));
$grantotal = mysqli_fetch_array($results1);

echo 'TOTAL DE REGISTROS: '.$grantotal['total'];
//output results from database
?>
     <table class="table table-striped table-bordered" style="width:100%" id="resetSB" name="resetSB">

	  
<tr style="text-align:center">
<th width="20%"style="background:#c9e8e8">NOMBRE COMERCIAL DEL  PROVEEDOR</th>
<th width="20%"style="background:#c9e8e8">RAZÓN SOCIAL DEL PROVEEDOR</th>
<th width="20%"style="background:#c9e8e8">RFC DEL PROVEEDOR</th>
<th width="20%"style="background:#c9e8e8">USUARIO DEL PROVEEDOR</th>
<th width="20%"style="background:#c9e8e8">EMAIL DEL PROVEEDOR</th>
<th width="20%"style="background:#c9e8e8">PRODUCTO O SERVICIO</th>
<th width="20%"style="background:#c9e8e8">NÚMERO TELÉFONICO<br> DEL PROVEEDOR</th>
<th width="20%"style="background:#c9e8e8">CIUDAD DONDE SE <br>OTORGA EL SERVICIO</th>
<th width="20%"style="background:#c9e8e8">PAÍS DONDE SE <br>OTORGA EL SERVICIO</th>
<th width="20%"style="background:#c9e8e8">CONTACTADO POR</th>
<th width="20%"style="background:#c9e8e8">REVISAR</th>
<th width="20%"style="background:#c9e8e8">MODIFICAR<br>EMAIL Y CONTRASEÑA</th>
</tr>
		
		
		<?php

while($row = mysqli_fetch_array($results))
{                                                                                           

	
	
	$CIUDAD_SERVICIO='';
	$resultadofetch = $proveedoresC->listadociudad($row['IDDD']);
	while($row1 = mysqli_fetch_assoc($resultadofetch) ){
		$CIUDAD_SERVICIO .= $row1['CIUDAD_SERVICIO'].'<br/>';
	}
		$PAIS_SERVICIO='';
	$resultadofetch = $proveedoresC->listadociudad($row['IDDD']);
	while($row2 = mysqli_fetch_assoc($resultadofetch) ){
		$PAIS_SERVICIO .= $row2['PAIS_SERVICIO'].'<br/>';
	}
		$PCONTACTADO_POR='';
	$resultadofetch = $proveedoresC->listadociudad($row['IDDD']);
	while($row3 = mysqli_fetch_assoc($resultadofetch) ){
		$PCONTACTADO_POR .= $row3['PCONTACTADO_POR'].'<br/>';
	}	
	
			$P_TELEFONO_1_EMPRESA='';
	$resultadofetch = $proveedoresC->listadotelefono($row['IDDD']);
	while($row4 = mysqli_fetch_assoc($resultadofetch) ){
		$P_TELEFONO_1_EMPRESA .= $row4['P_TELEFONO_1_EMPRESA'].'<br/>';
	}	
			$PRODUCTO_O_SERVICIO_9='';
	$resultadofetch = $proveedoresC->listadootrosproductosyserv($row['IDDD']);
	while($row5 = mysqli_fetch_assoc($resultadofetch) ){
		$PRODUCTO_O_SERVICIO_9 .= $row5['PRODUCTO_O_SERVICIO_9'].'<br/>';
	}		
	
	?>
<tr style='text-align:center'>

<td>
<a href="PROVEEDORES.php?idPROV=<?php echo $row["IDDD"]; ?>"><?php echo $row["nommbrerazon"]; ?></a>
</td>

<td ><?php echo $row["P_NOMBRE_FISCAL_RS_EMPRESA"]; ?></td>
<td ><?php echo $row["P_RFC_MTDP"]; ?></td>
<td ><?php echo $row["usuario"]; ?></td>
<td ><?php echo $row["email"]; ?></td>
<td ><?php echo $PRODUCTO_O_SERVICIO_9; ?></td>
<td ><?php echo $P_TELEFONO_1_EMPRESA; ?></td>
<td ><?php echo $CIUDAD_SERVICIO; ?></td>
<td ><?php echo $PAIS_SERVICIO; ?></td>
<td ><?php echo $PCONTACTADO_POR; ?></td>


<td ><a href="listaproveedores.php?id=<?php echo $row["IDDD"]; ?>"><?php echo $row["IDDD"]; ?></a></td>

<td >
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["IDDD"]; ?>" class="btn btn-info btn-xs view_LP" />
</td>

</tr>
      <?php
      }
      ?>
	  
     </table>



