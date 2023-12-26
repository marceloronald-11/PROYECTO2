<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombre LIKE '%$dato%' OR ci LIKE '%$dato%' OR codigo LIKE '%$dato%' ORDER BY nombre ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="25%">Cliente </th>
			                <th width="15%">No Carnet</th>
			                <th width="10%">Codigo</th>
			                <th width="15%">Observ.</th>
							<th width="5%">Imagen</th>
			                <th width="15%" align="center">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['ci'].'</td>
							<td>'.$registro2['codigo'].'</td>
							<td>'.$registro2['observcli'].'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td><a href="javascript:VerCaja('.$registro2['idcli'].');"><img src="../recursos/caja.png" data-toggle="tooltip" title="Caja Movimientos"></a> 
							<a href="javascript:PagoMes('.$registro2['idcli'].');"><img src="../recursos/pagos.png" data-toggle="tooltip" title="Pagos Mensuales"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>