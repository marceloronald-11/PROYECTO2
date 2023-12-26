<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];


include('conexion.php');
$id = $_POST['idper'];
$proceso = $_POST['pro'];
$descri = $_POST['descri'];
$cod = $_POST['cod'];
$umed = $_POST['umed'];
$stm = $_POST['stm'];
$fei = $_POST['fei'];
$coprov = $_POST['coprov'];
$cla = $_POST['cla'];
$pneto = $_POST['pnet'];
$ppvp = $_POST['pvp'];


//$est = $_POST['est'];
//$comp = $_POST['comp'];
$observ = $_POST['observ'];

//$marca = $_POST['marca'];
//$modelo = $_POST['modelo'];
//$serial = $_POST['serial'];
//$codigo = $_POST['codigo'];
//$cant = $_POST['cant'];
$cantt=1;
$fecha = date('Y-m-d');
//VERIFICAMOS EL PROCESO
$fechaii= date("Y-m-d", strtotime($fei) );
switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO activos (codigo,descripcion,fecha_ing,umed,stockmin,observ,codcla,codpv,pneto,pvp,coddep)VALUES
		('$cod','$descri','$fechaii', '$umed', '$stm', '$observ','$cla','$coprov','$pneto','$ppvp','$coddepx')");
	break;
	
	case 'Edicion':
		mysqli_query($conexion,"UPDATE activos SET descripcion = '$descri', codigo = '$cod',fecha_ing = '$fechaii', umed = '$umed',
		 stockmin = '$stm' , observ = '$observ', codcla='$cla', codpv='$coprov', pneto='$pneto', pvp='$ppvp' WHERE codar = '$id'");
	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM activos WHERE coddep='$coddepx' ORDER BY codar ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
  			             <tr>
			                <th width="15%">Descripcion</th>
			                <th width="5%">Codigo</th>
							<th width="10%">Fecha Ing.</th>
			                <th width="3%">U.Med.</th>
			                <th width="5%">Precio</th>
			                <th width="5%">Stock Min.</th>
			                <th width="5%">Saldo</th>
							<th width="3%">Imagen</th>
			                <th width="7%">Opcion</th>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_ing'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['stockmin'].'</td>
							<td>'.$registro2['existencia'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
							 <a href="javascript:eliminarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codar'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
echo '</table>';
?>