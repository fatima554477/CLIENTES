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
		
		
		
		
		
	
		
		
		
	public function listado2(){
		$conn = $this->db();

		$var = 'select *,02usuarios.id AS IDDD from 02usuarios left join 02direccionproveedor1 on 02usuarios.id = 02direccionproveedor1.idRelacion order by nommbrerazon asc';		
		
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
		<td><a href="PROVEEDORES.php?idPROV='.$row['IDDD'].'">'.$row['usuario'].'</a></td>
		<td>'.$row['nommbrerazon'].' '.$row['nommbrerazon'].'</td>
		<td>'.$row['P_NOMBRE_FISCAL_RS_EMPRESA'].' '.$row['P_NOMBRE_FISCAL_RS_EMPRESA'].'</td>
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

		$var = 'select *,02usuarios.id AS IDDD from 02usuarios left join 02direccionproveedor1 on 02usuarios.id = 02direccionproveedor1.idRelacion order by nommbrerazon asc';
		
		RETURN $query = mysqli_query($conn,$var);

		
	}	
	
	public function variablesusuario2($id){
		$conn = $this->db();
		
	    $var2 = 'select *,02usuarios.id AS IDDD from 02usuarios, 02direccionproveedor1 where 
		
		02usuarios.id = 02direccionproveedor1.idRelacion and 
		02usuarios.id = "'.$id.'" ';		
		
		$query = mysqli_query($conn,$var2);
		return $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	}

   
	public function listadociudad($idcc){
	$conn = $this->db();

	$variablequery = "select * from 02productosservicios where idRelacion = '".$idcc."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
	}
	public function listadotelefono($idt){
	$conn = $this->db();

	$variablequery = "select * from 02direccionproveedor1 where idRelacion = '".$idt."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
	}
	public function listadootrosproductosyserv($ID1){
		$conn = $this->db();

		$variablequery = "select * from 02otrosproveedores where idRelacion = '".$ID1."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
    }


	public function variableusuario2(){
		$conn = $this->db();
		$variablequery = "select * from 02usuarios where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_usuario2($idp){
		$conn = $this->db();
		$var1 = 'select id from 02usuarios where id =  "'.$idp.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	


	public function revisar_02direccionproveedor1($idp){
		$conn = $this->db();
		$var1 = 'select id from 02direccionproveedor1 where idRelacion =  "'.$idp.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	
	
	
	public function revisar_02USUARIO($usuario){
		$conn = $this->db();
		$var1 = 'select id from 02usuarios where usuario =  "'.$usuario.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}	

	public function revisar_02campo($tabla,$campo,$valor){
		$conn = $this->db();
		$var1 = 'select id from '.$tabla.' where '.$campo.' =  "'.$valor.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}	

	public function revisar_02TODOS($usuario,$nommbrerazon,$rfc,$P_NOMBRE_FISCAL_RS_EMPRESA){
		$conn = $this->db();
		$var1 = 'select *,02usuarios.id AS IDDD from  02usuarios, 02direccionproveedor1 WHERE 
		02usuarios.id = 02direccionproveedor1.idRelacion and 
		02usuarios.usuario= "'.$usuario.'" and
		02usuarios.nommbrerazon="'.$nommbrerazon.'" and 
		02direccionproveedor1.P_RFC_MTDP= "'.$rfc.'" and 
		02direccionproveedor1.P_NOMBRE_FISCAL_RS_EMPRESA= "'.$P_NOMBRE_FISCAL_RS_EMPRESA.'"
		';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['IDDD'];
	}


     public function PROVEEDOREMPRESA($IDRELACIONP,$IDRELACIONC){
               if($IDRELACIONC != ''){
               $conn = $this->db();
               $variablequery1 = "delete from 02empresarelacion where idRelacionP = '".$IDRELACIONP."' ";
               mysqli_query($conn,$variablequery1);

               $explotado = explode('or',$IDRELACIONC);
               $cuenta = count($explotado) - 1;
               for($rrr=0;$rrr<=$cuenta;$rrr++){
               $variablequery2 = "insert into 02empresarelacion(idRelacionP,idRelacionC)
               values('".$IDRELACIONP."','".$explotado[$rrr]."')";
               mysqli_query($conn,$variablequery2);
               }

               return "SI";
               }else{
               return "NO";
               }
       }

  

	public function guardar_usuario2 ($usuario , $nommbrerazon ,$P_NOMBRE_FISCAL_RS_EMPRESA, $contrasenia , $email , $rfc, $mandacorreo2, $id_empresa ){
		//02empresarelacion
	if( $mandacorreo2=='si'){
	if($this->ambiente()=='PROD'){
	$link_generado = 'https://epcinn.com/crm/sistemaPROD/?salir=1';
	}elseif($this->ambiente()=='PROD2'){
	$link_generado = 'https://epcinn.com/crm/sistemaPROD2/?salir=1';	
	}else{
	$link_generado = 'https://www.epcinn.com/pruebas/crm2/main-files/syn-ui/sistemaPRUEBAS/?salir=1';
	}
	}
	
	$conexion = new herramientas();
		$conn = $this->db();

	if($this->revisar_02TODOS($usuario,$nommbrerazon,$rfc,$P_NOMBRE_FISCAL_RS_EMPRESA)>=1){}else{
		if($usuario!=''){
		$existe1 = $this->revisar_02campo('02usuarios','usuario',$usuario);		
			if($existe1>=1){
				echo "EL *USUARIO CRM* DEL PROVEEDOR ESTÁ PREVIAMENTE INGRESADO.";
				exit;
			}		
		}
		if($nommbrerazon!=''){
		$existe1 = $this->revisar_02campo('02usuarios','nommbrerazon',$nommbrerazon);		
			if($existe1>=1){
				echo "EL *NOMBRE COMERCIAL DEL PROVEEDOR* ESTÁ PREVIAMENTE INGRESADO.";
				exit;
			}
		}			
if ($rfc != '') {
    // Eliminar espacios en blanco al inicio y al final
    $rfc = trim($rfc);

    // Permitir RFCs genéricos aun si ingresan con espacios
    if ($rfc != 'XAXX010101000' && $rfc != 'XEXX010101000') {
        $existe1 = $this->revisar_02campo('02direccionproveedor1', 'P_RFC_MTDP', $rfc);		
        if ($existe1 >= 1) {
            echo "EL * RFC DEL PROVEEDOR* ESTÁ PREVIAMENTE INGRESADO.";
            exit;
        }
    }
}

		
		
		if($P_NOMBRE_FISCAL_RS_EMPRESA!=''){
		$existe1 = $this->revisar_02campo('02direccionproveedor1','P_NOMBRE_FISCAL_RS_EMPRESA',$P_NOMBRE_FISCAL_RS_EMPRESA);	
			if($existe1>=1){
				echo "EL *RAZÓN SOCIAL* DEL PROVEEDOR ESTÁ PREVIAMENTE INGRESADO.";
				exit;
			}
		}
	}

	if( $mandacorreo2=='si'){
	//$embebida = array('../manuales/logo_epc.jpg' => 'ver' , '../manuales/munecos.jpg' => 'munecos');
	$adjuntos = array();
	$Subject = 'Favor de Completar el Formulario';
	//id_empresa
	$EMAILnombre = array($email=>$nommbrerazon .' ');
	//echo 'ppppppppppppppppppppp'.$id_empresa;
	$smtp = $conexion->array_smtp_ID($conn,$id_empresa);
	$idlogo = $smtp['idRelacion'];
	$logo = $conexion->variables_informacionfiscal_logo2_ID($conn,$idlogo);

	$embebida = array('../includes/archivos/'.$logo => 'ver', '../manuales/munecos.jpg' => 'munecos');

	$html = $this->html($link_generado,'Usuario: AdminPR_'.$usuario.' Password: '.$contrasenia);
	$conexion->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp );
	}
	
	
	
		$existe1 = $this->revisar_02USUARIO($usuario);
		$idwebc ='';
		
			if($existe1>=1){
		mysqli_query($conn, "update 02usuarios set
		PERMISOS = 'PROVEEDORES',
		usuario = '".$usuario."' , 
		nommbrerazon = '".$nommbrerazon."' ,
		contrasenia = '".$contrasenia."' ,
		email = '".$email."' where id = '".$existe1."' ; ") or die('P156'.mysqli_error($conn));
		//return "Actualizado" PERMISOS;
		$idwebc = $existe1;
		}else{
		mysqli_query($conn,"insert into 02usuarios (
		prefijo,
		usuario, nommbrerazon,
		contrasenia, email, PERMISOS) values (
		'AdminPR',
		'".$usuario."' , 
		'".$nommbrerazon."' , 
		'".$contrasenia."' , 
		'".$email."', 'PROVEEDORES'
		); ") or die('P160'.mysqli_error($conn));
		$idwebc = mysqli_insert_id($conn);
		//return "Ingresado";
		}
         

	
		$existe2 = $this->revisar_02direccionproveedor1($idwebc);		
		if($existe2>=1){

		

		mysqli_query($conn,"update 02direccionproveedor1 set 
		 P_RFC_MTDP = '".$rfc."' ,
		P_NOMBRE_COMERCIAL_EMPRESA = '".$nommbrerazon."',
			P_NOMBRE_FISCAL_RS_EMPRESA = '".$P_NOMBRE_FISCAL_RS_EMPRESA."' where idRelacion = '".$idwebc."' ; ") or die('P156'.mysqli_error($conn));
				if( $mandacorreo2=='si'){
		return "<P style='color:green; font-size:18px;'>INGRESADO Y CORREO ENVIADO</P>";
				}ELSE{
		return "<P style='color:green; font-size:18px;'>INGRESADO</P>";					
				}
		
		}else{
		/*NUENO AGREGA EMPRESA QUE PERTENECE EMPIEZA*/
		$this->PROVEEDOREMPRESA($idwebc,$id_empresa);
		/*FIN AGREGA EMPRESA QUE PERTENECE EMPIEZA*/			
		mysqli_query($conn,"insert into 02direccionproveedor1 
		( P_NOMBRE_COMERCIAL_EMPRESA, P_NOMBRE_FISCAL_RS_EMPRESA, idRelacion, P_RFC_MTDP) values 
		( '".$nommbrerazon."' ,'".$P_NOMBRE_FISCAL_RS_EMPRESA."' ,  '".$idwebc."','".$rfc."'  ); ") or die('P160'.mysqli_error($conn));
				if( $mandacorreo2=='si'){		
		return "<P style='color:green; font-size:18px;'>INGRESADO Y CORREO ENVIADO</P>";
				}ELSE{
		return "<P style='color:green; font-size:18px;'>INGRESADO</P>";					
				}
		}
	    

	
		
	}

        public function borra_listadoP($id){ 
		$conn = $this->db();  
		//papa
		$var1 = "DELETE FROM 02usuarios where id = '".$id."' "; 
		mysqli_query($conn,$var1) or die('P302'.mysqli_error($conn));

		$var2 = "DELETE FROM 02empresarelacion WHERE idRelacionP = '".$id."' ";
		mysqli_query($conn,$var2) or die('P305'.mysqli_error($conn));
		
		$var3 = "DELETE FROM `02productosservicios` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var3) or die('P308'.mysqli_error($conn));
		
		$var4 = "DELETE FROM `02otrosproveedores` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var4) or die('P311'.mysqli_error($conn));
		
	    $var5 = "DELETE FROM `02ligaproveedor` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var5) or die('P314'.mysqli_error($conn));
		
		$var7 = "DELETE FROM `02presentacionproduc` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var7) or die('P317'.mysqli_error($conn));
				
	    $var9 = "DELETE FROM `02DOCUMENTOSFISCALES` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var9) or die('P320'.mysqli_error($conn));
		


		
	    $var11 = "DELETE FROM `02otrosdocumentos` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var11) or die('P326'.mysqli_error($conn));
		
	    $var12 = "DELETE FROM `02metodopago` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var12) or die('P329'.mysqli_error($conn));
		
	    $var13 = "DELETE FROM `02direccionproveedor1` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var13) or die('P332'.mysqli_error($conn));
		
	    $var14 = "DELETE FROM `02contactosprovee` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var14) or die('P335'.mysqli_error($conn));
		
	    $var15 = "DELETE FROM `02DIROFICINASBODEGAS` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var15) or die('P338'.mysqli_error($conn));
		
		$var16 = "DELETE FROM `02DATOSBANCARIOS1` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var16) or die('P341'.mysqli_error($conn));
		
		$var17 = "DELETE FROM `02REFERENCIASCOMERCIALES1` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var17) or die('P344'.mysqli_error($conn));  
		
		
		RETURN 
		"<strong><P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P></strong>";

	}
	public function Listado_LP2($id){
	$conn = $this->db();
	$variablequery = "select *,02usuarios.id AS IDDD from 
	02usuarios, 02direccionproveedor1 WHERE
	02usuarios.id = 02direccionproveedor1.idRelacion and 02usuarios.id = '".$id."' ";
	return $arrayquery = mysqli_query($conn,$variablequery);
	}

	PUBLIC FUNCTION ACTUALIZA_LP($ID,$email,$contrasenia,$mandacorreo,$nommbrerazon,$P_NOMBRE_FISCAL_RS_EMPRESA,$P_RFC_MTDP ,$usuario){
	$conn = $this->db();
	
	$empresaquery = mysqli_query($conn, 'SELECT * FROM `02empresarelacion` where `02empresarelacion`.`idRelacionP` = "'.$ID.'" ') or die('P156'.mysqli_error($conn));
	$rowuem = mysqli_fetch_array($empresaquery);

        $nommbrerazon = trim($nommbrerazon);
        $P_NOMBRE_FISCAL_RS_EMPRESA = trim($P_NOMBRE_FISCAL_RS_EMPRESA);
        $P_RFC_MTDP = trim($P_RFC_MTDP);

        mysqli_query($conn, "update 02usuarios set
        contrasenia = '".$contrasenia."' ,
        email = '".$email."',
        nommbrerazon = '".$nommbrerazon."',
        usuario = '".$usuario."'
        where id = '".$ID."' ; ") or die('P156'.mysqli_error($conn));

	

        $direccionQuery = mysqli_query($conn, "select idRelacion from 02direccionproveedor1 where idRelacion = '".$ID."' ");
        if (mysqli_num_rows($direccionQuery) > 0) {
        mysqli_query($conn, "update 02direccionproveedor1 set
        P_NOMBRE_COMERCIAL_EMPRESA = '".$nommbrerazon."',
        P_NOMBRE_FISCAL_RS_EMPRESA = '".$P_NOMBRE_FISCAL_RS_EMPRESA."',
        P_RFC_MTDP = '".$P_RFC_MTDP."'
        where idRelacion = '".$ID."' ; ") or die('P156'.mysqli_error($conn));
        } else {
        mysqli_query($conn, "insert into 02direccionproveedor1 (
        idRelacion,
        P_NOMBRE_COMERCIAL_EMPRESA,
        P_NOMBRE_FISCAL_RS_EMPRESA,
        P_RFC_MTDP
        ) values (
        '".$ID."',
        '".$nommbrerazon."',
        '".$P_NOMBRE_FISCAL_RS_EMPRESA."',
        '".$P_RFC_MTDP."'
        ); ") or die('P156'.mysqli_error($conn));
        }



	$variablequery = "select * from 
	02usuarios WHERE 02usuarios.id = '".$ID."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$rowus = mysqli_fetch_array($arrayquery);
	
	$variablequery = "select * from 
	02usuarios WHERE 02usuarios.id = '".$ID."' ";
	$arrayquery = mysqli_query($conn,$variablequery);
	$rowus = mysqli_fetch_array($arrayquery);
	
	
	if($mandacorreo=='si'){
	if($this->ambiente()=='PROD'){
	$link_generado = 'https://epcinn.com/crm/sistemaPROD/?salir=1';
	}elseif($this->ambiente()=='PROD2'){
	$link_generado = 'https://epcinn.com/crm/sistemaPROD2/?salir=1';	
	}else{
	$link_generado = 'https://www.epcinn.com/pruebas/crm2/main-files/syn-ui/sistemaPRUEBAS/?salir=1';
	}
	
	$conexion = new herramientas();
		

	$Subject = 'Favor de Completar el Formulario';
	
	$EMAILnombre = array($email=>$nommbrerazon .' ');
	
	$smtp = $conexion->array_smtp_ID($conn,$rowuem['idRelacionC']);
	$idlogo = $smtp['idRelacion'];
	$logo = $conexion->variables_informacionfiscal_logo2_ID($conn,$idlogo);
	
	$embebida = array('../includes/archivos/'.$logo => 'ver','../manuales/munecos.jpg' => 'munecos');
	$adjuntos = array();
	

	$html = $this->html($link_generado,'Usuario: AdminPR_'.$usuario.' Password: '.$contrasenia);
	

	
	$conexion->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject ,$smtp);
			RETURN "ACTUALIZADO Y CORREO ENVIADO";
	}else{
		RETURN "ACTUALIZADO";
	}
	}
        public function duplica($id){
                $conn = $this->db();

                $id = (int)$id;

                $query = "select * from 02usuarios where id=".$id." limit 1 ";
                $queryejecuta = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($queryejecuta, MYSQLI_ASSOC);

                if(!$row){
                        echo "NO SE ENCONTRÓ EL PROVEEDOR";
                        return;
                }

                $usuario = mysqli_real_escape_string($conn, $row['usuario']);
                $nommbrerazon = mysqli_real_escape_string($conn, $row['nommbrerazon']);
                $contrasenia = mysqli_real_escape_string($conn, $row['contrasenia']);
                $email = mysqli_real_escape_string($conn, $row['email']);

                $insert = "insert into 02usuarios (
                prefijo,
                usuario,
                nommbrerazon,

                contrasenia,
                email,
                PERMISOS) values (
                'AdminPR',
                '".$usuario."' ,
                '".$nommbrerazon."' ,

                '".$contrasenia."' ,
                '".$email."',
                'PROVEEDORES'
                ); ";
                mysqli_query($conn,$insert) or die('P160'.mysqli_error($conn));
                $idwebc = mysqli_insert_id($conn);



//02direccionproveedor1

                $query2 = "select * from 02direccionproveedor1 where idRelacion=".$id." limit 1";
                $queryejecuta2 = mysqli_query($conn,$query2);
                $row2 = mysqli_fetch_array($queryejecuta2, MYSQLI_ASSOC);

                if($row2){
                        $nombreComercial = mysqli_real_escape_string($conn, $row2['P_NOMBRE_COMERCIAL_EMPRESA']);
                        $razonSocial = mysqli_real_escape_string($conn, $row2['P_NOMBRE_FISCAL_RS_EMPRESA']);
                        $rfc = mysqli_real_escape_string($conn, $row2['P_RFC_MTDP']);

                        mysqli_query($conn,"insert into 02direccionproveedor1 (
                P_NOMBRE_COMERCIAL_EMPRESA,
                P_NOMBRE_FISCAL_RS_EMPRESA,
                idRelacion,
                P_RFC_MTDP) values (
                '".$nombreComercial."' ,
                '".$razonSocial."' ,
                '".$idwebc."',
                '".$rfc."'
                ); ") or die('P160'.mysqli_error($conn));
                }

                echo  "PROVEEDOR DUPLICADO";




        }
	
	
	
	
	
	}

    


?>