<?php
//if (!isset($_SESSION)) {session_start();}


include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM articulos WHERE codar = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM articulos  ORDER BY codar ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <td width="15%" class="hidden-xs-down" >Producto</td>
			                <td width="4%" >U.Med.</td>
							<td width="10%" >Contenido</td>
			                <td width="4%" >P.Neto</td>
							<td width="4%" >P.Venta</td>
							<td width="2%" >Control</td>
							<td width="10%" >Dolencia</td>
							<td width="9%" >Laboratorio</td>
							<td width="9%" >Clasificacion</td>
			                <td width="10%" align="center">Opcion</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripar'].'</td>
							<td >'.$registro2['umed'].'</td>
							<td >'.$registro2['contiene'].'</td>
							<td >'.$registro2['pneto'].'</td>
							<td >'.$registro2['pvp'].'</td>
							<td >'.$registro2['control'].'</td>
							<td >'.$registro2['dolencia'].'</td>
							<td >'.$registro2['codlab'].'</td>
							<td >'.$registro2['codcla'].'</td>';
							echo '<td><a href="javascript:editarProdu('.$registro2['codar'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a> 
							<a href="javascript:eliminaProd('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a></td>
						  </tr>';
	}
echo '</table>';
?>