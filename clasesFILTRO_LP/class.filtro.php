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
	include_once (__ROOT1__."/../listadoclientes/class.epcinnLP.php");

	
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
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	public function getData($tables,$campos,$search){
		$tables1='06direccionclientes';
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		
		$sWhere=" ";
		$sWhere2="";$sWhere3="";
		
		
if($search['nommbrerazon']!=""){
$sWhere2.="  $tables1.C_NOMBRE_FISCAL_RS_EMPRESA LIKE '%".TRIM($search['nommbrerazon'])."%' and ";}


if($search['C_NOMBRE_COMERCIAL_EMPRESA']!=""){
	
$sWhere2.="  $tables1.C_NOMBRE_COMERCIAL_EMPRESA LIKE '%".TRIM($search['C_NOMBRE_COMERCIAL_EMPRESA'])."%' and ";}

if($search['usuario']!=""){	
$sWhere2.="  $tables.usuario LIKE '%".TRIM($search['usuario'])."%' and ";}
if($search['contrasenia']!=""){
$sWhere2.="  $tables.contrasenia LIKE '%".TRIM($search['contrasenia'])."%' and ";}
if($search['email']!=""){
$sWhere2.="  $tables.email LIKE '%".TRIM($search['email'])."%' and ";}
if($search['rfc']!=""){
$sWhere2.="  $tables1.P_RFC_MTDP LIKE '%".TRIM($search['rfc'])."%' and ";}
if($search['validaLISTADO']!=""){
$sWhere2.="  $tables.validaLISTADO LIKE '%".TRIM($search['validaLISTADO'])."%' and ";}
IF($sWhere2!=""){
	
	$sWhere22 = substr($sWhere2,0,-4);
	$sWhere3  = '
	on 06usuarios.id = 06direccionclientes.idRelacion where ('.$sWhere22.' ) ';
		}ELSE{
		$sWhere3  = '
		on 06usuarios.id = 06direccionclientes.idRelacion ';	
		}
		/*P_RFC_MTDP
		select *,06usuarios.id AS IDDD from 
06usuarios, 06direccionclientes WHERE 06usuarios.id = 06direccionclientes.idRelacion  

select *,06usuarios.id AS IDDD from 
06usuarios left join 06direccionclientes on 06usuarios.id = 06direccionclientes.idRelacion  

SELECT * FROM 01informacionpersonal order by 01informacionpersonal.id desc LIMIT 0,5 
		
		*/
		$sWhere3.="order by nommbrerazon asc";
		$sql="SELECT $campos 
		,06usuarios.id AS IDDD
		,06direccionclientes.P_RFC_MTDP AS rfc
		FROM  $tables left join $tables1 $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos 
		,06usuarios.id AS IDDD 
		,06direccionclientes.P_RFC_MTDP AS rfc
		FROM  $tables left join $tables1 $sWhere $sWhere3 ";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
		
		
		
		$sWhere3.="  order by $tables.id desc ";
		$sql="SELECT $campos 
		,06usuarios.id AS IDDD
		,06direccionclientes.C_NOMBRE_COMERCIAL_EMPRESA AS C_NOMBRE_COMERCIAL_EMPRESA
		FROM  $tables left join $tables1 $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos 
		,06usuarios.id AS IDDD 
		,06direccionclientes.C_NOMBRE_COMERCIAL_EMPRESA AS C_NOMBRE_COMERCIAL_EMPRESA
		FROM  $tables left join $tables1 $sWhere $sWhere3 ";
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
