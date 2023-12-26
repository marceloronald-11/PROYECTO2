<?php
include('../php/conexion.php');
$idsuc = $_POST['idsuc'];
$proceso = $_POST['pro'];
$dessuc = $_POST['dessuc'];
$dirsuc = $_POST['dirsuc'];
$dpto = $_POST['dpto'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO sucursal (nombresuc,direccsuc,coddep)VALUES('$dessuc','$dirsuc','$dpto')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE sucursal SET nombresuc='$dessuc',direccsuc='$dirsuc',coddep='$dpto' WHERE codsuc = '$idsuc'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM sucursal");
$registro = mysqli_query($conexion,"SELECT * FROM sucursal AS su LEFT JOIN departamento AS de ON su.coddep=de.coddep");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	<tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Direccion</td>
			                <td width="9%">Departamento</td>
			                <td width="15%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['direccsuc'].'</td>
							<td>'.$registro2['descripdepto'].'</td>

							<td><a href="javascript:editarSuc('.$registro2['codsuc'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminaSuc('.$registro2['codsuc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>