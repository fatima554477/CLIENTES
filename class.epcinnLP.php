<?php
/*
clase EPC INNOVA
CREADO : 10/OCTUBRE/2022
TESTER
PROGRAMER

*/

	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";
	require __ROOT3__."/includes/error_reporting.php";	

	class accesoclase extends colaboradores{
		
		
		
		
		
	public function lista_empresacliente(){
	$conn = $this->db();
	$variablequery = "select * from 03datosdelaempresa";
	return $arrayquery = mysqli_query($conn,$variablequery);		
	}
		
		
		
		
		
		
		
		
		
	public function listado2($idc){
		$conn = $this->db();
/*						<!--`id`, `usuario`, `nommbrerazon`, `contrasenia`, `email`, `idRelacion`-->*/
		$var = 'select *,06usuarios.id AS IDDD from 06usuarios, 06direccionclientes where 
		
		06usuarios.id = 06direccionclientes.idRelacion 
		
		order by 06usuarios.id desc';
		
		$query = mysqli_query($conn,$var);
		echo "<table class='table mb-0 table-striped'><tr>
		<td>usuario</td>
		<td>NOMBRE COMERCIAL</td>
		<td>RAZÓN SOCIAL</td>
		<td>RFC</td>
		<td>EMAIL</td>
		<td>Masiva</td>

		</tr>";
		while($row = mysqli_fetch_array($query)){
			echo '<tr>
		<td><a href="clientes.php?idc='.$row['IDDD'].'">'.$row['usuario'].'</a></td>
		<td>'.$row['nommbrerazon'].' '.$row['nommbrerazon'].'</td>
		<td>'.$row['C_NOMBRE_COMERCIAL_EMPRESA'].'</td>
		<td>'.$row['rfc'].'</td>
		<td>'.$row['email'].'</td>
		<td>
		<a href="'. $_SERVER['PHP_SELF']. '?idr1='.$row['id1'].'" target="_blank"><img src="includes/descargar.png"/></a></td>
		</tr>';
		}
		echo "</table>";		
	}	

	public function listado3(){
		$conn = $this->db();
/*						<!--`id`,nommbrerazon `usuario`, `nommbrerazon`, `contrasenia`, `email`, `idRelacion`-->*/
		$var = 'select *,06usuarios.id AS IDDD from 06usuarios, 06direccionclientes where 
		
		06usuarios.id = 06direccionclientes.idRelacion 
		
		order by nommbrerazon asc';
		
		RETURN $query = mysqli_query($conn,$var);

		
	}	
	
	public function variablesusuario2($id){
		$conn = $this->db();
		$var = 'select * from 06usuarios
		where id='.$id.' order by id desc ';
		
		$var2 = 'select *,06usuarios.id AS IDDD from 06usuarios, 06direccionclientes where 
		
		06usuarios.id = 06direccionclientes.idRelacion  and
		06usuarios.id = "'.$id.'"
		
		order by 06usuarios.id desc';		
		
		$query = mysqli_query($conn,$var2);
		return $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	}



	public function listadootrosproductosyserv($IDC){
		$conn = $this->db();

		$variablequery = "select * from 06otrosproveedores where idRelacion = '".$IDC."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

/* BORRAR */
	  /* public function Listado_subefacturaDOCTOS($ID){ $conn = $this->db(); $variablequery = "select * from 02SUBETUFACTURADOCTOS where idRelacion = '".$_SESSION['idPROV']."' and idTemporal = '".$ID."'  order by id desc "; return $arrayquery = mysqli_query($conn,$variablequery); }*/

/* OTROS PRODUCTOS O SERVICIOS QUE OFRECE EL PROVEEDOR*/

	public function variableusuario2(){
		$conn = $this->db();
		$variablequery = "select * from 06usuarios where idRelacion = '".$_SESSION['idc']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_usuario2($idc){
		$conn = $this->db();
		$var1 = 'select id from 06usuarios where id =  "'.$idc.'" ';
		$query = mysqli_query($conn,$var1) or die('120'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
    
	
	        public function borra_listadoC ($id){ 
		$conn = $this->db();  
		//papa
		$var1 = "DELETE FROM 06usuarios where id = '".$id."' "; 
		mysqli_query($conn,$var1) or die('P165'.mysqli_error($conn));

		$var2 = "DELETE FROM 06direccionclientes WHERE idRelacion = '".$id."' ";
		mysqli_query($conn,$var2) or die('P168'.mysqli_error($conn));
		
		$var3 = "DELETE FROM `06metodopago` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var3) or die('P171'.mysqli_error($conn));
		
		$var4 = "DELETE FROM `06datosbancarios` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var4) or die('P174'.mysqli_error($conn));
		
	    $var5 = "DELETE FROM `06contactos` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var5) or die('P177'.mysqli_error($conn));
		
		$var7 = "DELETE FROM `06direccionbodegas` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var7) or die('P180'.mysqli_error($conn));
				
	    $var9 = "DELETE FROM `06clientede` WHERE `idRelacionC` = '".$id."' ";
		mysqli_query($conn,$var9) or die('P183'.mysqli_error($conn));
			
	    $var11 = "DELETE FROM `06documentofiscal` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var11) or die('P44'.mysqli_error($conn));
		
	    $var12 = "DELETE FROM `06presentacioncliente` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var12) or die('P44'.mysqli_error($conn));
		
	    $var13 = "DELETE FROM `06productosyservicios` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var13) or die('P195'.mysqli_error($conn));
		
	    $var14 = "DELETE FROM `06ligadeclientes` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var14) or die('P198'.mysqli_error($conn));
		
	    $var15 = "DELETE FROM `06otrodocumento` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var15) or die('P201'.mysqli_error($conn));
		
		$var16 = "DELETE FROM `06contratos` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var16) or die('P204'.mysqli_error($conn));
		
		$var17 = "DELETE FROM `06referencias` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var17) or die('P207'.mysqli_error($conn));  
		
		
		RETURN 
		"<strong><P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P></strong>";

	}

	public function revisar_02direccionproveedor1($idc){
		$conn = $this->db();
		$var1 = 'select id from 06direccionclientes where idRelacion =  "'.$idc.'" ';
		$query = mysqli_query($conn,$var1) or die('130'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	

	public function revisar_02metodopago($id){
		$conn = $this->db();
		$var1 = 'select id from 06direccionclientes where idRelacion =  "'.$id.'" ';
		$query = mysqli_query($conn,$var1) or die('139'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	
	public function revisar_02USUARIO($usuario){
		$conn = $this->db();
		$var1 = 'select id from 06usuarios where usuario =  "'.$usuario.'" ';
		$query = mysqli_query($conn,$var1) or die('148'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}	

	public function revisar_06empresapertenece($conn,$idBUSCACLIENTE){
		$var1 = 'select idRelacionP from 06clientede where idRelacionP =  "'.$idBUSCACLIENTE.'" ';
		$query = mysqli_query($conn,$var1) or die('155'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['idRelacionP'];
	}
	
	
	
    	public function revisar_02campo($tabla,$campo,$valor){
		$conn = $this->db();
		$var1 = 'select id from '.$tabla.' where '.$campo.' =  "'.$valor.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	
		public function revisar_02TODOS($usuario,$nommbrerazon,$rfc,$C_NOMBRE_FISCAL_RS_EMPRESA,$C_NOMBRE_COMERCIAL_EMPRESA){
		$conn = $this->db();
		$var1 = 'select *,06usuarios.id AS IDDD from  06usuarios, 06direccionclientes WHERE 
		06usuarios.id = 06direccionclientes.idRelacion and 
		06usuarios.usuario= "'.$usuario.'" and
		06usuarios.nommbrerazon="'.$nommbrerazon.'" and 
		06direccionclientes.P_RFC_MTDP= "'.$rfc.'" and 
		06direccionclientes.C_NOMBRE_COMERCIAL_EMPRESA= "'.$C_NOMBRE_COMERCIAL_EMPRESA.'" and 
		06direccionclientes.C_NOMBRE_FISCAL_RS_EMPRESA= "'.$C_NOMBRE_FISCAL_RS_EMPRESA.'"
		';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['IDDD'];
	}
	
	
	public function variableEmpresa($idc){
		$conn = $this->db();
		$var1 = 'select idRelacionP, idRelacionC from 06clientede where idRelacionP =  "'.$idc.'" ';
		$query = mysqli_query($conn,$var1) or die('162'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		
		$eMPESARIAL = 'SELECT * FROM 03datosdelaempresa WHERE id = "'.$row['idRelacionC'].'" ';
		$QUERYeMPESARIAL = mysqli_query($conn,$eMPESARIAL) or die('165'.mysqli_error($conn));
		$roweMPESARIAL = mysqli_fetch_array($QUERYeMPESARIAL, MYSQLI_ASSOC);
		return $roweMPESARIAL['id'];
	}


	public function guardar_usuario2 ($usuario , $nommbrerazon ,$C_NOMBRE_COMERCIAL_EMPRESA, $contrasenia , $email , $rfc, $mandacorreo2A, $id_empresa ){

	if($mandacorreo2A=='si'){
	if($this->ambiente()=='PROD'){
	$link_generado = 'https://epcinn.com/crm/sistemaPROD/?salir=1';
	}
	elseif($this->ambiente()=='PROD2'){
	$link_generado = 'https://epcinn.com/crm/sistemaPROD2/?salir=1';
	}else{
	$link_generado = 'https://www.epcinn.com/pruebas/crm2/main-files/syn-ui/sistemaPRUEBAS/?salir=1';
	}
	}
	
	
    	$conexion = new herramientas();
		$conn = $this->db();

	if($this->revisar_02TODOS($usuario,$nommbrerazon,$rfc,$C_NOMBRE_FISCAL_RS_EMPRESA,$C_NOMBRE_COMERCIAL_EMPRESA)>=1){}else{
		if($usuario!=''){
		$existe1 = $this->revisar_02campo('06usuarios','usuario',$usuario);		
			if($existe1>=1){
				echo "<strong><P style='color:red; font-size:20px;'>EL *USUARIO* ESTÁ PREVIAMENTE INGRESADO</P></strong>";
			}		      
		}
		if($C_NOMBRE_COMERCIAL_EMPRESA!=''){
		$existe1 = $this->revisar_02campo('06direccionclientes','C_NOMBRE_COMERCIAL_EMPRESA',$C_NOMBRE_COMERCIAL_EMPRESA);		
			if($existe1>=1){
				echo "<strong><P style='color:red; font-size:20px;'>EL *NOMBRE COMERCIAL DEL CLIENTE* ESTÁ PREVIAMENTE INGRESADO</P></strong>";
				exit;
			}
		}			
		if($rfc!=''){
		$existe1 = $this->revisar_02campo('06direccionclientes','P_RFC_MTDP',$rfc);		
			if($existe1>=1){
				echo "<strong><P style='color:red; font-size:20px;'>EL *RFC DEL CLIENTE* ESTÁ PREVIAMENTE INGRESADO</P></strong>";
				exit;
			}
		}
		if($P_NOMBRE_FISCAL_RS_EMPRESA!=''){
		$existe1 = $this->revisar_02campo('06direccionclientes','C_NOMBRE_FISCAL_RS_EMPRESA',$P_NOMBRE_FISCAL_RS_EMPRESA);	
			if($existe1>=1){
				echo "<strong><P style='color:red; font-size:20px;'>EL *RFC DEL CLIENTE* ESTÁ PREVIAMENTE INGRESADO</P></strong>";
				exit;
			}
		}
	}
	

	
		$conn = $this->db();	
		$existe1 = $this->revisar_02USUARIO($usuario);
		$idlc ='';





			if($existe1>=1){
		mysqli_query($conn, "update 06usuarios set
		prefijo = 'AdminCL' ,
		PERMISOS = 'CLIENTES',
		usuario = '".$usuario."' , 
		nommbrerazon = '".$nommbrerazon."' , 
		contrasenia = '".$contrasenia."' , 
		email = '".$email."' where id = '".$existe1."' ; ") or die('P156'.mysqli_error($conn));
		//return "Actualizado";
		$idlc = $existe1;
		}else{
		mysqli_query($conn,"insert into 06usuarios (
		prefijo,
		usuario, nommbrerazon, 
		contrasenia, email, PERMISOS) values ( 
		'AdminCL' ,
		'".$usuario."' , '".$nommbrerazon."' , 
		'".$contrasenia."' , '".$email."', 'CLIENTES'
		); ") or die('P160'.mysqli_error($conn));
		$idlc = mysqli_insert_id($conn);
		//return "Ingresado";
		}







/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/
	$existe_06empresapertenece = $this->revisar_06empresapertenece($conn,$idlc);
	if($existe_06empresapertenece>=1){	
	$query1 = "update 06clientede set 
	idRelacionC = '".$id_empresa."'
	where idRelacionP = '".$existe1."' ;  ";
	mysqli_query($conn,$query1) or die ('230'.mysqli_error($conn));
	// '<span style="color:green; font-size:20px;">Actualizado</span>';
	}else{
	$query = "insert into 06clientede (
	idRelacionP,  idRelacionC
	) values ( 
	'".$existe1."','".$id_empresa."' );";
	mysqli_query($conn,$query) or die('237'.mysqli_error($conn));
	// '<span style="color:green; font-size:20px;">Ingresado</span>';
	}
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/

/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/
	$empresa="";
		$query5 = 'SELECT NFE_INFORMACION FROM 
		`03datosdelaempresa` WHERE 
		03datosdelaempresa.id = "'.$id_empresa.'" ';
		$results5 = mysqli_query($conn,$query5) or die( mysqli_error($conn));
		$row5 = mysqli_fetch_array($results5);/**/
		$empresa=$row5['NFE_INFORMACION'];
/**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**//**/


	if($mandacorreo2A=='si'){
	$conexion = new herramientas();
	//$embebida = array('../manuales/logo_epc.jpg' => 'ver' , '../manuales/munecos.jpg' => 'munecos');
	$adjuntos = array();
	$Subject = 'Favor de Completar el Formulario';
	$EMAILnombre = array($email=>$nommbrerazon .' ');
	$html = $this->html($link_generado,'Usuario: AdminCL_'.$usuario.' Password: '.$contrasenia,$empresa);
	$smtp = $conexion->array_smtp_ID($conn,$id_empresa);
	$idlogo = $smtp['idRelacion'];
	$logo = $conexion->variables_informacionfiscal_logo2_ID($conn,$idlogo);
	
	$embebida = array('../includes/archivos/'.$logo => 'ver', '../manuales/munecos.jpg' => 'munecos');	
	
	$conexion->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject ,$smtp);
	}


	/*if($mandacorreo=='si'){
	$embebida = array('../includes/archivos/'.$logo => 'ver');
	echo '<span style="color:green; font-size:20px;text-transform: uppercase;">ACTUALIZADO Y '.$conexion->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp).'</span>';
	}else{
	echo '<span style="color:green; font-size:20px;">ACTUALIZADO </span>';		
	}*/











	
			$existe3 = $this->revisar_02metodopago($idlc);	
			if($existe3>=1){
		mysqli_query($conn,"update 06direccionclientes set 
		P_RFC_MTDP = '".$rfc."',
		C_NOMBRE_COMERCIAL_EMPRESA = '".$C_NOMBRE_COMERCIAL_EMPRESA."'
		where idRelacion = '".$idlc."' ; ") or die('P156'.mysqli_error($conn));
		//return "Actualizado 06usuarios, 06metodopago, 06direccionclientes"; C_NOMBRE_COMERCIAL_EMPRESA

		}else{
		mysqli_query($conn,"insert into 06direccionclientes 
		( P_RFC_MTDP, C_NOMBRE_COMERCIAL_EMPRESA, idRelacion) values 
		( '".$rfc."' ,  '".$C_NOMBRE_COMERCIAL_EMPRESA."',  '".$idlc."' ); ") or die('P160'.mysqli_error($conn));

		//return "Ingresado";
		}		

	
		$existe2 = $this->revisar_02direccionproveedor1($idlc);		
		if($existe2>=1){
		mysqli_query($conn,"update 06direccionclientes set 
		C_NOMBRE_FISCAL_RS_EMPRESA = '".$nommbrerazon."',
		C_NOMBRE_COMERCIAL_EMPRESA  = '".$C_NOMBRE_COMERCIAL_EMPRESA."'
		where idRelacion = '".$idlc."' ; ") or die('P156'.mysqli_error($conn));
	if($mandacorreo2A=='si'){
		return "<P style='color:green; font-size:18px;'>ACTUALIZADO Y CORREO ENVIADO</P>";
	}else{
		return "<P style='color:green; font-size:18px;'>ACTUALIZADO</P>";	
	}
		}else{
		mysqli_query($conn,"insert into 06direccionclientes 
		( C_NOMBRE_FISCAL_RS_EMPRESA, C_NOMBRE_COMERCIAL_EMPRESA, idRelacion) 
		values 
		( '".$nommbrerazon."' , '".$C_NOMBRE_COMERCIAL_EMPRESA."',  '".$idlc."' ); ") or die('P160'.mysqli_error($conn));
	if($mandacorreo2A=='si'){
		return "<P style='color:green; font-size:18px;'>INGRESADO Y CORREO ENVIADO</P>";
	}else{
		return "<P style='color:green; font-size:18px;'>INGRESADO</P>";
	}
	


	
	
		
		}		
	}

	}




?>