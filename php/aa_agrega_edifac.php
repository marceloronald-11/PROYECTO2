<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro1'];

$xnorden1= $_POST['xnorden1'];
$xcodsux1= $_POST['xcodsuc1'];
$nofac1= $_POST['nofac1'];
$fee1= $_POST['fee1'];
$nocli1= $_POST['nocli1'];
$nitcli1= $_POST['nitcli1'];


$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		//// re generagr factura codigo control y qr y luego update los campos que corresponde
$red= mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden = '$xnorden1' ");
	while($rd = mysqli_fetch_array($red)){
		$fechatox=$rd['fechato']; //fecha2
		$nautorizax=$rd['nautoriza']; //fecha2
		$nfacturax=$rd['nfactura']; //fecha2
		$nitx=$rd['nit']; //fecha2
		$totimportex=$rd['totimporte']; //fecha2
		$nitclientex=$rd['nitcliente']; //fecha2
		$coddox=$rd['coddo']; //fecha2
		$controlx=$rd['control']; //fecha2
	}

$fechaqr= date("d-m-Y", strtotime($fechatox) );
		
include "../phpqrcode/qrlib.php";      
$ma=$controlx;
//QRcode::png($ma);
//$tempDir = EXAMPLE_TMP_SERVERPATH;
$tempDir = $ma;//codigocontrol;//nombre del archivo

$codeContents = $nitx.'|'.$nfacturax.'|'.$nautorizax.'|'.$fechaqr.'|'.$totimportex.'|'.$totimportex.'|'.$ma.'|'.$nitcli1;// contenido del codigo de control

//$fileName = 'qrcode_name.png';
$fileName = '.png';
$filename2 = '../Controller/'.$ma.'.png';
$pngAbsoluteFilePath = $tempDir.$fileName;
//$url = EXAMPLE_TMP_URLRELPATH.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath,'L', 4, 2); 

mysqli_query($conexion,"UPDATE movimtot SET afavor ='$nocli1',nitcliente='$nitcli1',qrfoto='$filename2' WHERE norden = '$xnorden1' ");





	break;
	
	case 'Editar':
		
//		mysqli_query($conexion,"UPDATE clientes SET nombrecli ='$despv',direcccli='$dire',telfcli='$cel',emailcli='$emma',cicli='$cii',
//		observcli='$observv',zona='$zna' WHERE codcli = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
//$registro= mysqli_query($conexion,"SELECT * FROM movimtot  ");
//
//echo '<table class="table table-striped table-condensed table-hover titi">
//        	<tr>
//			                <th>No Orden..</th>
//			                <th>No Factura</th>
//							<th>Fecha</th>
//			                <th>Nombre del Cliente</th>
//			                <th>Importe</th>
//							<th>Opciones</th>
//			            </tr>';
//	while($registro2 = mysqli_fetch_array($registro)){
//
//		echo '<tr>
//							<td>'.$registro2['norden'].'</td>
//							<td>'.$registro2['nfactura'].'</td>
//							<td>'.$registro2['fechato'].'</td>
//							<td>'.$registro2['afavor'].'</td>
//							<td>'.$registro2['totimporte'].'</td>
//
//	<td> <a href="javascript:Verfactura('.$registro2['norden'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Ver Factura"></a>
//	<a href="javascript:AnularFac('.$registro2['norden'].');" ><img src="../recursos/cancelarg.png" data-toggle="tooltip" title="Anular Factura"></a> <a href="javascript:editarFactura('.$registro2['norden'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Factura"></a></td>
//						  </tr>';
//	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
//echo '</table>';
?>