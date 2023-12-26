<?php
include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$nomb = $_POST['nomb'];
$ci = $_POST['ci'];
$cod = $_POST['cod'];
$fenac = $_POST['fenac'];
$edad = $_POST['edad'];
$sex = $_POST['sex'];
$dire = $_POST['dire'];
$cel = $_POST['cel'];
$email = $_POST['email'];
$observ = $_POST['observ'];

//$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
$fnac= date("Y-m-d", strtotime($fenac) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO clientes (nombre,ci,codigo,fechanac,edad,direccion,cel,email,observcli,feing,sexo)VALUES('$nomb','$ci','$cod','$fnac', '$edad', '$dire', '$cel','$email','$observ',NOW(),'$sex')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE clientes SET nombre = '$nomb', ci = '$ci',codigo = '$cod', fechanac = '$fenac', edad = '$edad' , direccion = '$dire',cel='$cel', email='$email',observcli='$observ', sexo='$sex' WHERE idcli = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM clientes ORDER BY idcli ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="200">Cliente </th>
			                <th width="100">No Carnet</th>
			                <th width="100">Codigo</th>
							<th width="40">Ingreso</th>
			                <th width="40">Edad</th>
			                <th width="40">Sexo</th>
			                <th width="90">Telf/Cel.</th>
			                <th width="60">Observ.</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['feing'].'</td>
							<td>'.$registro2['edad'].'</td>
							<td>'.$registro2['sexo'].'</td>
							<td>'.$registro2['cel'].'</td>
							<td>'.$registro2['observcli'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarCliente('.$registro2['idcli'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a> <a href="javascript:eliminarActivo('.$registro2['idcli'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a> <a href="javascript:mostrarfotocarga('.$registro2['idcli'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a> <a href="javascript:mostrarfoto('.$registro2['idcli'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
echo '</table>';
?>