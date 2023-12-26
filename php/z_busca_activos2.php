<?php
if (!isset($_SESSION)) {session_start();}
$coddepx= $_SESSION['depto'];

include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM activos WHERE descripcion LIKE '%$dato%' AND coddep='$coddepx' ORDER BY codar ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
			                <th width="200">Descripcion</th>
			                <th width="100">Codigo</th>
							<th width="40">Fecha Ing.</th>
			                <th width="40">U.Med.</th>
			                <th width="90">Stock Min.</th>
			                <th width="60">Saldo</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripcion'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['fecha_ing'].'</td>
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['stockmin'].'</td>
							<td>'.$registro2['existencia'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:MostrarKardex('.$registro2['codar'].');" class="glyphicon glyphicon-list" data-toggle="tooltip" title="Editar Datos"></a>  <a href="javascript:mostrarfoto('.$registro2['codar'].');" class="glyphicon glyphicon-picture" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>