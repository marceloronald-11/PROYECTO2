<?php
include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$descri = $_POST['descri'];
$cant = $_POST['cant'];
$umed = $_POST['umed'];
$est = $_POST['est'];
$nordenaba = $_POST['nordenaba'];

$observ = $_POST['observ'];
$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
$fechaii= date("Y-m-d", strtotime($fei) );
switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO abastedet (codigo,descripcion,fecha_ing,umed,stockmin,observ,cod_clasificacion,cod_proveedor,codest,codcompra)VALUES('$cod','$descri','$fechaii', '$umed', '$stm', '$observ','$cla','$coprov','$est','$comp')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE abastedet SET  aprob='$est',observab = '$observ' WHERE cod_abastedet = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM abastedet WHERE nordenaba='$nordenaba'");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered letritas">
  			            <tr><td align="center" colspan="5">A CONTINUACIO DETALLE DE SOLICITUD</td></tr>
	<tr><td align="center" colspan="5">PARA SU APROBACION</td></tr>
			            <tr>
			                <th width="50%">Detalle</th>
			                <th width="6%">Cant.</th>
							<th width="7%">U.Med.</th>
							<th width="7%">Estado</th>
							<th width="15%">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['detalle'].'</td>
							<td>'.$registro2['cant'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['aprob'].'</td>

							<td> <a href="javascript:editarAprob('.$registro2['cod_abastedet'].');" class="glyphicon glyphicon-thumbs-up tam" data-toggle="tooltip" title="Decidir Aprobacion"></a> <a href="javascript:eliminarSolicita('.$registro2['cod_abastedet'].');" class="glyphicon glyphicon-remove-circle tam" data-toggle="tooltip" title="Eliminar Registro"></a> </td>
						  </tr>';
	}
echo '</table>';
?>