<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];


include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM activos WHERE codar = '$id'");

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
							<td align="center">'.$registro2['existencia'].'</td>
							<td align="center">'."<img src=\"".$registro2['foto']."\" width=\"25\" height=\"50\"/>".'</td>	
							<td><a href="javascript:editarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Editar Datos"></a>
							 <a href="javascript:eliminarActivo('.$registro2['codar'].');" class="glyphicon glyphicon-remove-circle" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codar'].');" class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
echo '</table>';
?>