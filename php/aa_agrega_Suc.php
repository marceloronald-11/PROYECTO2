<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
$dessuc = $_POST['dessuc'];
$dirsuc = $_POST['dirsuc'];
$est = $_POST['est'];
$tisu = $_POST['tisu'];
//$observv = $_POST['observv'];
//$cel = $_POST['cel'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );
//$nroSucursales = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM sucursal  WHERE codtisuc=1 "));


switch($proceso){
	case 'Registro':
		if($tisu==1){
			$nroSucursales = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM sucursal  WHERE codtisuc=1 "));
			
		if ($nroSucursales==0){
		mysqli_query($conexion,"INSERT INTO sucursal (nombresuc,direccsuc,estadosuc,codtisuc)VALUES ('$dessuc','$dirsuc','$est','$tisu')");
		}
		
		}else{
			
			mysqli_query($conexion,"INSERT INTO sucursal (nombresuc,direccsuc,estadosuc,codtisuc)VALUES ('$dessuc','$dirsuc','$est','$tisu')");
		}
		
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE sucursal SET nombresuc ='$dessuc',direccsuc='$dirsuc', estadosuc='$est'  WHERE codsuc = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro = mysqli_query($conexion,"SELECT * FROM sucursal  AS su JOIN tiposucursal AS ts ON su.codtisuc=ts.codtisuc  ");


echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Direccion</td>
			                <td width="15%">Tipo</td>
							<td width="15%">Habilitado</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
//	$tt=$tt+$registro2['totalcr'];
//	$tcr=$tcr+$registro2['saldocr'];

		echo '<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['direccsuc'].'</td>
							<td>'.$registro2['descriptisuc'].'</td>
							<td>'.$registro2['estadosuc'].'</td>

							<td align="center"><a href="javascript:editarSuc('.$registro2['codsuc'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarSuc('.$registro2['codsuc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>