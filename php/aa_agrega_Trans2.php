<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz');

$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro2'];

$codx= $_POST['codx'];
//$nnor = $_POST['nnor'];
//$feac = $_POST['feac'];
$feent2 = $_POST['feent2'];
$hoent2 = $_POST['hoent2'];
$salcli2 = $_POST['salcli2'];
$obcli2 = $_POST['obcli2'];

//$nnorx = mysqli_query($conexion,"SELECT * FROM codnu");
//while($nn = mysqli_fetch_array($nnorx)){
//$nnor=$nn['nordenrec']+1;
//}

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fea= date("Y-m-d", strtotime($feac) );
$fee= date("Y-m-d", strtotime($feent2) );

switch($proceso){
	case 'Registro':
//		mysqli_query($conexion,"INSERT INTO transporte (codvh,id_per,id_usu,fechaact,fechaentre,norden,nordensuc,horaentre,clientetra,direcctra,telftra,totaltra,saldotra,observtra,codsuc)
//		VALUES ('$vei','$condu','$id_usux','$fea','$fee','$nnor','$nor','$hoent','$clienn','$dircli','$telcli','$impocli','$salcli','$obcli',$ssuc)");
//		
//		mysqli_query($conexion,"UPDATE codnu SET nordenrec ='$nnor' ");
		
		
	break;
	
	case 'Edicion':
		
		mysqli_query($conexion,"UPDATE transporte SET cdtra ='X',fechadejo='$fee',horadejo='$hoent2',observtra2='$obcli2' WHERE codtra = '$codx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro = mysqli_query($conexion,"SELECT * FROM transporte WHERE cdtra='' ");


echo '<table class="table table-striped table-condensed table-hover titi">
        	<tr>
			                <td>No Orden</td>
			                <td>Fecha</td>
			                <td>Cliente</td>
			                <td>Direccion</td>
			                <td>Fecha Ent.</td>
			                <td>Hora Ent.</td>

			                <td colspan="2" align="center">Opciones</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
//	$tt=$tt+$registro2['totalcr'];
//	$tcr=$tcr+$registro2['saldocr'];

		echo '<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['fechaact'].'</td>
							<td>'.$registro2['clientetra'].'</td>
							<td>'.$registro2['direcctra'].'</td>
							<td>'.$registro2['fechaentre'].'</td>
							<td>'.$registro2['horaentre'].'</td>
							<td> <a href="javascript:ImprimeTra('.$registro2['codtra'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Ver Solicitud"></a>
 </td><td><a href="javascript:EditaTra('.$registro2['codtra'].');" ><img src="../recursos/confirm.png" data-toggle="tooltip" title="Registrar Informe"></a>
							</td>
						  </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>