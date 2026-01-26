<?php
/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
                               
                               
*/

define("__ROOT1__", dirname(dirname(__FILE__)));
	include_once (__ROOT1__."/../includes/error_reporting.php");
	include_once (__ROOT1__."/../listaproveedores/class.epcinnLP.php");
	include_once (__ROOT1__."/../includes/convertirma.php");
     
	
	class orders extends accesoclase {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->db();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	public function todos_productosservicios($id){
		$conn = $this->db();
		$productosservicios = 'select * from 02otrosproveedores where idRelacion = "'.$id.'" ';
		$query=mysqli_query($conn,$productosservicios);
			while($row_productos = mysqli_fetch_array($query,MYSQLI_ASSOC)){
				 $PRODUCTO_O_SERVICIO_9 .= $row_productos['PRODUCTO_O_SERVICIO_9'].'<br>';
			}
		return $PRODUCTO_O_SERVICIO_9;
	}
	
	
	
      public function contactospro($id){
    $conn = $this->db();

    // Traemos solo el último registro (mayor id) de ese proveedor
    $sql = "SELECT NOMBRE_CONTACTO_PROVEE
            FROM 02contactosprovee
            WHERE idRelacion = '".mysqli_real_escape_string($conn, $id)."'
            ORDER BY id DESC
            LIMIT 1";

    $query = mysqli_query($conn, $sql);
    $resultado = '';

    if($row = mysqli_fetch_assoc($query)){
        $resultado  = $row['NOMBRE_CONTACTO_PROVEE'];

    }

    return $resultado;
}


        public function contactoCELpro($id){
    $conn = $this->db();

    // Traemos solo el último registro (mayor id) de ese proveedor
    $sql = "SELECT CEL_CONTACTO_PROVEE
            FROM 02contactosprovee
            WHERE idRelacion = '".mysqli_real_escape_string($conn, $id)."'
            ORDER BY id DESC
            LIMIT 1";

    $query = mysqli_query($conn, $sql);
    $resultado = '';

    if($row3 = mysqli_fetch_assoc($query)){
        $resultado  = $row3['CEL_CONTACTO_PROVEE'];

    }

    return $resultado;
}


public function convenionuevo($id) {
    $conn = $this->db();

    $sql = "SELECT CONVENIO_PROVEEDOR
            FROM 02metodopago
            WHERE idRelacion = '" . mysqli_real_escape_string($conn, $id) . "'
            ORDER BY id DESC
            LIMIT 1";

    $resultado = "<span style='color:#b0b0b0;'>SIN INFORMACIÓN</span>"; // gris clarito

    if ($query = mysqli_query($conn, $sql)) {
        if ($row = mysqli_fetch_assoc($query)) {
            $valorConvenio = isset($row['CONVENIO_PROVEEDOR']) ? trim(strtoupper($row['CONVENIO_PROVEEDOR'])) : '';

            if ($valorConvenio === 'SI') {
                $resultado = 'SI';
            } elseif ($valorConvenio === 'NO') {
                $resultado = 'NO';
            }
        }
    }

    return $resultado;
}






	public function datos_convenio($idRelacion){
		$conn = $this->db();
		$variable2 = "select * from 02metodopago where idRelacion = '".$idRelacion."' and CONVENIO_PROVEEDOR  = 'SI'  ";
		$query2 = mysqli_query($conn,$variable2);
		$row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC);
		return $row2;
	}






	
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		
		$sWhere="  ";
$sWhere2="";$sWhere3="";if($search['nommbrerazon']!=""){
$sWhere2.="  02usuarios.nommbrerazon LIKE '%".$search['nommbrerazon']."%' OR ";}


if($search['P_NOMBRE_FISCAL_RS_EMPRESA']!=""){
$sWhere2.="  02direccionproveedor1.P_NOMBRE_FISCAL_RS_EMPRESA LIKE '%".$search['P_NOMBRE_FISCAL_RS_EMPRESA']."%' OR ";}

if($search['CONVENIO_PROVEEDOR']!=""){
$valorConvenio = $this->mysqli->real_escape_string($search['CONVENIO_PROVEEDOR']);
$sWhere2.="  EXISTS (SELECT 1 FROM 02metodopago WHERE 02metodopago.idRelacion = 02usuarios.id AND 02metodopago.CONVENIO_PROVEEDOR LIKE '%".$valorConvenio."%') OR ";}

if($search['P_RFC_MTDP']!=""){
$sWhere2.="02direccionproveedor1.P_RFC_MTDP LIKE '%".$search['P_RFC_MTDP']."%' OR ";}

if($search['usuario']!=""){
$sWhere2.="02usuarios.usuario LIKE '%".$search['usuario']."%' OR ";}

if($search['contrasenia']!=""){
$sWhere2.="02usuarios.contrasenia LIKE '%".$search['contrasenia']."%' OR ";}

if($search['email']!=""){
$sWhere2.="02usuarios.email LIKE '%".$search['email']."%' OR ";}


if($search['P_TELEFONO_1_EMPRESA']!=""){
$sWhere2.="02direccionproveedor1.P_TELEFONO_1_EMPRESA LIKE '%".$search['P_TELEFONO_1_EMPRESA']."%' OR ";}

if($search['CIUDAD_SERVICIO']!=""){
$sWhere2.="02productosservicios.CIUDAD_SERVICIO LIKE '%".$search['CIUDAD_SERVICIO']."%' OR ";
}
//print_r($_POST);

if($search['PAIS_SERVICIO']!=""){
$sWhere2.="02productosservicios.PAIS_SERVICIO LIKE '%".$search['PAIS_SERVICIO']."%' OR ";
}
//print_r($_POST);
                                                                     
if($search['PCONTACTADO_POR']!=""){
$sWhere2.="02productosservicios.PCONTACTADO_POR LIKE '%".$search['PCONTACTADO_POR']."%' OR ";
}
//print_r($_POST);

if($search['PRODUCTO_O_SERVICIO_9']!=""){
//$sWhere2.="02otrosproveedores.PRODUCTO_O_SERVICIO_9 LIKE '%".$search['PRODUCTO_O_SERVICIO_9']."%' OR ";
}
//print_r($_POST); 02otrosproveedores


IF($sWhere2!=""){
				$sWhere22 = substr($sWhere2,0,-3);
			$sWhere3  = ' where ( '.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = '';	
		}
     $tables = '
                02usuarios
                left join 02direccionproveedor1 ON 02usuarios.id = 02direccionproveedor1.idRelacion
                left join 02productosservicios ON 02usuarios.id = 02productosservicios.idRelacion
                /* left join  02otrosproveedores ON 02usuarios.id = 02otrosproveedores.idRelacion */ ';
                //02usuario.id
                $sWhere3.="order by nommbrerazon asc";
		$sql="SELECT $campos,02usuarios.id as IDDDDDD FROM  $tables $sWhere $sWhere3 LIMIT  $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT * FROM $tables $sWhere $sWhere3 ";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
}
?>