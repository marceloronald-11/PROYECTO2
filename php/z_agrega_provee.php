<?php
include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$nomb = $_POST['nomb'];
$direcc = $_POST['direcc'];
$telf = $_POST['telf'];
$email = $_POST['email'];
$ci = $_POST['ci'];
$observ = $_POST['observ'];

$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
//$fechaii= date("Y-m-d", strtotime($fei) );
switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO proveedor (nombre,direccion,telf,email,observ,ci)VALUES('$nomb','$direcc','$telf','$email','$observ','$ci')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE proveedor SET nombre = '$nomb', direccion = '$direcc',telf = '$telf', email = '$email', observ = '$observ' , ci = '$ci' WHERE codpv = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM proveedor ORDER BY codpv ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="20%">Nombre</th>
			                <th width="20%">Direccion</th>
							<th width="10%">No Carnet</th>
			                <th width="10%">Telefono</th>
			                <th width="15%">E-mail </th>
			                <th width="15%">Observ.</th>
							<th width="5%">Imagen</th>
			                <th width="10%">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['direccion'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['telf'].'</td>
							<td>'.$registro2['email'].'</td>
							<td>'.$registro2['observ'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarProvee('.$registro2['codpv'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
							 <a href="javascript:eliminarProvee('.$registro2['codpv'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codpv'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codpv'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
echo '</table>';
?>