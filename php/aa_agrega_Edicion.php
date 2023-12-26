<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$xnorden= $_POST['xnorden'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"UPDATE movimtot SET tmv ='X' WHERE norden = '$xnorden' ");
		
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
	
echo '</table>';
?>