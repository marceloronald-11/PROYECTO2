<?php
//include('conexion.php');
include('../php/conexion.php');
$idcla = $_POST['idcla'];
$proceso = $_POST['pro'];
$nomcla = $_POST['nomcla'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO clasificacion (descripcla)VALUES('$nomcla')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE clasificacion SET descripcla='$nomcla' WHERE codcla = '$idcla'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM clasificacion");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <td width="15%">Clasificacion</td>
			                <td width="15%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td>'.$registro2['descripcla'].'</td>
							<td><a href="javascript:editarCla('.$registro2['codcla'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminaCla('.$registro2['codcla'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
echo '</table>';
?>