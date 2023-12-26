<?php
//include('conexion.php');
//if (!isset($_SESSION)) {session_start();}
//$codsucss=$_SESSION['codsuc'];
//$id_usux=$_SESSION['id_usu'];
require_once('codigo_control.class.php');

include('../php/conexion.php');
$proceso= $_POST['pro'];

$nautox= $_POST['nauto'];
$nfax = $_POST['nfa'];
$nittx = $_POST['nitt'];
$fex = $_POST['fe'];
$impox = $_POST['impo'];
$llax = $_POST['lla'];
$codix = $_POST['codi'];

$fecha = date('Y-m-d');
//var_dump ($_POST);

$fe1=str_replace('-', '', $fex);
$imm=round(str_replace(',', '.', $impox), 0);
//echo $fe1.'<br>';
//echo $imm.'<br>';

//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
			$CodigoControl = new CodigoControl( 
					$nautox,//autorizacion
					$nfax,//No factura
					$nittx, // NIt CI
					str_replace('-', '', $fex), // cambia la fecha 2007/08/10 a 20070810  ..fecha
					round(str_replace(',', '.', $impox), 0), // cambia , a . y redondea el importe de la factura 208.95 a 209
					$llax //llave
			
			);
			
			$generado=$CodigoControl->generar();
			if($generado==$codix){echo $generado.'<br><br>'.' OK';}else{echo $generado.'<br><br>'.' Error Revise';}
			
			
		
		
		
		
	break;
	
	case 'Editar':
		
	//	mysqli_query($conexion,"UPDATE clasificacion SET descripcla ='$descla' WHERE codcla = '$idarx'");

	break;
}


//echo $generado;
?>