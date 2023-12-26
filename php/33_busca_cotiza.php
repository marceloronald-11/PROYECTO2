<?php
if (!isset($_SESSION)) {session_start();}

include('conexion.php');

$dato = $_POST['dato'];
$codde=$_SESSION['depto'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM activos WHERE descripcion LIKE '%$dato%' AND coddep='$codde'");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th>Codigo</th>
			                <th>Descripcion</th>
			                <th>Saldo</th>
							<th>Imagen</th>
			                <th >Opciones</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.$registro2['existencia'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:editarProducto('.$registro2['codar'].');" class="glyphicon glyphicon-shopping-cart"></a> <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>