<?php
include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$nomb = $_POST['nomb'];

//$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
$fnac= date("Y-m-d", strtotime($fenac) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO departamento (descripdepto)VALUES('$nomb')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE departamento SET descripdepto = '$nomb' WHERE coddep = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM departamento ORDER BY coddep ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="30%">Departamento </th>
			                <th width="15%">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripdepto'].'</td>
							<td><a href="javascript:editarCliente('.$registro2['coddep'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
							 <a href="javascript:eliminarActivo('.$registro2['coddep'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a> </td>
						  </tr>';
	}
echo '</table>';
?>