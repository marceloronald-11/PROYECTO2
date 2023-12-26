<?php
include('conexion.php');

$aarea = $_POST['aarea'];

//COMPROBAMOS QUE LAS FECHAS EXISTAN

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM movimtot WHERE tmm='$aarea' ");

//$re=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th>No Orden</th>
			                <th>Fecha</th>
			                <th>Nombre del Cliente</th>
			                <th>Area</th>

			                <th>Opciones</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['norden'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['tmm'].'</td>

							<td align="center"> <a href="javascript:mostrarIngreso('.$registro2['norden'].');" > <img src="../recursos/impresora2.png" data-toggle="tooltip" title="Imprimir Nota"></a></td>
						  </tr>';


	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>