<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];
$nomsuc=$_SESSION['nomb_suc'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
//$nnor = $_POST['nnor'];
$feac = $_POST['feac'];
$feent = $_POST['feent'];
$hoent = $_POST['hoent'];
$nor = $_POST['nor'];
$clienn = $_POST['clienn'];
$dircli = $_POST['dircli'];
$telcli = $_POST['telcli'];
$salcli = $_POST['salcli'];
$impocli= $_POST['impocli'];
$obcli = $_POST['obcli'];
$condu = $_POST['condu'];
$vei = $_POST['vei'];
$ssuc = $_POST['ssuc'];
$feent = $_POST['feent'];

$nnorx = mysqli_query($conexion,"SELECT * FROM codnu");
while($nn = mysqli_fetch_array($nnorx)){
$nnor=$nn['nordenrec']+1;
}

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
$fea= date("Y-m-d", strtotime($feac) );
$fee= date("Y-m-d", strtotime($feent) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO transporte (codvh,id_per,id_usu,fechaact,fechaentre,norden,nordensuc,horaentre,clientetra,direcctra,telftra,totaltra,saldotra,observtra,codsuc,solicito)
		VALUES ('$vei','$condu','$id_usux','$fea','$fee','$nnor','$nor','$hoent','$clienn','$dircli','$telcli','$impocli','$salcli','$obcli','$ssuc','$nomsuc')");
		
		mysqli_query($conexion,"UPDATE codnu SET nordenrec ='$nnor' ");
		
		
	break;
	
	case 'Editar':
		
		//mysqli_query($conexion,"UPDATE clasificacion SET descripcla ='$descla' WHERE codcla = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro = mysqli_query($conexion,"SELECT * FROM transporte  AS tr JOIN sucursal
	AS su ON tr.codsuc=su.codsuc WHERE tr.cdtra='' ");


echo '<table class="table table-striped table-condensed table-hover titi">
        	<tr>
			                <td>No Orden</td>
			                <td>Fecha</td>
			                <td>Cliente</td>
			                <td>Direccion</td>
			                <td>Fecha Ent.</td>
			                <td>Hora Ent.</td>
			                <td>Dest.Sucursal</td>
			                <td>Solicito</td>
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
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['solicito'].'</td>

							<td> <a href="javascript:ImprimeTra('.$registro2['codtra'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Ver Solicitud"></a></td>
						  </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>