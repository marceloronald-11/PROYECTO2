<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idorden= $_POST['idorden'];
$descli = $_POST['descli'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
	//	mysqli_query($conexion,"INSERT INTO clasificacion (descripcla)VALUES ('$descla')");
	break;
	
	case 'Edicion':
		
		mysqli_query($conexion,"UPDATE movimtot SET cdpedd ='X' WHERE norden = '$idorden'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro= mysqli_query($conexion,"SELECT * FROM movimtot WHERE tipo='E' AND cdpedd='' ORDER BY norden DESC");


echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <th>No Orden</th>
			                <th>Fecha</th>
			                <th>Nombre del Cliente</th>
			                <th>Opciones</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
//	$tt=$tt+$registro2['totalcr'];
//	$tcr=$tcr+$registro2['saldocr'];

		echo '<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td> <a href="javascript:verTra('.$registro2['norden'].','.$registro2['codsuc'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Ver Detalle"></a>
							<a href="javascript:editarPed('.$registro2['norden'].');" ><img src="../recursos/entrega2.png" data-toggle="tooltip" title="Confirmar Entrega"></a></td>
						  </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>