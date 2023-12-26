<?php
include('conexion.php');
date_default_timezone_set('America/La_Paz');

$dato = $_POST['dato']; //codsuc
$diax = $_POST['diax']; //codsuc
//var_dump ($_POST);
//EJECUTAMOS LA CONSULTA DE BUSQUEDA

//$registro = mysqli_query($conexion,"SELECT * FROM movimdet WHERE codsuc='$dato' ");

$registro= mysqli_query($conexion,"SELECT * FROM movimtot AS mt JOIN sucursal AS su ON mt.codsuc=su.codsuc WHERE mt.codsuc='$dato' AND 
fechato='$diax' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	  <tr>
			                <th>No Factura</th>
							<th>Fecha</th>
			                <th>Nombre del Cliente</th>
			                <th>Nit Cliente</th>
							<th>Importe</th>
							<th>Sucursal</th>
			                <th>Estado</th>
							<th>Opciones</th>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		$tp=$registro2['tmv'];
			if($tp=='X'){$est='ANULADO';}else{$est='';}
		
		echo '<tr>
							<td>'.$registro2['nfactura'].'</td>
							<td>'.$registro2['fechato'].'</td>
							<td>'.$registro2['afavor'].'</td>
							<td>'.$registro2['nitcliente'].'</td>
							<td>'.$registro2['totimporte'].'</td>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$est.'</td>

	<td> <a href="javascript:Verfactura('.$registro2['norden'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Ver Factura"></a>
	<a href="javascript:AnularFac('.$registro2['norden'].');" ><img src="../recursos/cancelarg.png" data-toggle="tooltip" title="Anular Factura"></a> <a href="javascript:editarFactura('.$registro2['norden'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Factura"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>