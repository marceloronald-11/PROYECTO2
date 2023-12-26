<?php
//if (!isset($_SESSION)) {session_start();}
//$coddepx= $_SESSION['depto'];


include('conexion.php');
$proceso = $_POST['pro'];
$idcodx = $_POST['idcod'];


$dessx = $_POST['dess'];
$codix = $_POST['codi'];
$cntx = $_POST['cnt'];

//var_dump ($_POST);

$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
//$fechaii= date("Y-m-d", strtotime($fei) );
switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO articulos (descripar,codigoba,control) VALUES('$dessx','$codix','$cntx')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE articulos SET descripar = '$dessx', codigoba = '$codix', control = '$cntx' WHERE codar = '$idcodx'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$coddepx' ORDER BY codar ASC");
//
////CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
//
//echo '<table class="table table-striped table-condensed table-hover">
//  			             <tr>
//			                <th width="15%">Descripcion</th>
//			                <th width="5%">Codigo</th>
//							<th width="10%">Fecha Ing.</th>
//			                <th width="3%">U.Med.</th>
//			                <th width="5%">Precio</th>
//			                <th width="5%">Stock Min.</th>
//			                <th width="5%">Saldo</th>
//							<th width="3%">Imagen</th>
//			                <th width="7%">Opcion</th>
//			            </tr>';
//	while($registro2 = mysqli_fetch_array($registro)){
//		echo '<tr>
//							<td>'.$registro2['descripcion'].'</td>
//							<td>'.$registro2['codigo'].'</td>
//							<td>'.$registro2['fecha_ing'].'</td>
//							<td>'.$registro2['umed'].'</td>
//							<td>'.$registro2['pvp'].'</td>
//							<td>'.$registro2['stockmin'].'</td>
//							<td>'.$registro2['existencia'].'</td>
//							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
//							<td><a href="javascript:editarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
//							 <a href="javascript:eliminarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>
//							  <a href="javascript:mostrarfotocarga('.$registro2['codar'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a>
//							   <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
//						  </tr>';
//	}
//echo '</table>';
echo "";
?>