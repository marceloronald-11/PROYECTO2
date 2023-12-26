<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA


$registro = mysqli_query($conexion,"SELECT * FROM creditosgym AS cre JOIN clientes AS cli ON cre.idcli=cli.idcli 
WHERE nombre LIKE '%$dato%' ORDER BY nombre ASC");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="25%">Fecha </th>
			                <th width="15%">Nombre</th>
			                <th width="10%">No Orden</th>
			                <th width="15%">Tipo</th>
							<th width="5%">Total</th>
							<th width="5%">Saldo</th>
			                <th width="15%" align="center">Opcion</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['fechagym'].'</td>
							<td>'.$registro2['nombre'].'</td>
							<td>'.$registro2['nordengym'].'</td>
							<td>'.$registro2['gm'].'</td>
							<td>'.$registro2['totalcr'].'</td>
							<td>'.$registro2['saldocr'].'</td>
							<td><a href="javascript:VerCaja('.$registro2['nordengym'].');"><img src="../recursos/caja.png" data-toggle="tooltip" title="Ver No Orden"></a> 
							<a href="javascript:PagoDeuda('.$registro2['nordengym'].');"><img src="../recursos/pagos.png" data-toggle="tooltip" title="Pagar"></a>
							<a href="javascript:PagoMes('.$registro2['nordengym'].');"><img src="../recursos/pagos.png" data-toggle="tooltip" title="Ver Pagos"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>