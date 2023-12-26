<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM solicitudes AS so LEFT JOIN clientes AS cl ON so.codcli=cl.codcli WHERE cl.nombrecli LIKE '%$dato%' AND so.aprobado='SI' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20">Nombre</td>
			                <td width="8%">No Carnet</td>
			                <td width="5%">Sexo</td>
			                <td width="9%">Registro</td>
			                <td width="12%">Direccion</td>
			                <td width="10%">Telf/Cel</td>
			                <td width="12%">Correo</td>
							<td width="10%">Observaciones</td>
			                <td width="3%">Imagen</td>
							<td width="12%">Acciones</td>

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td>'.$registro2['nombrecli'].'</td>
							<td>'.$registro2['montosolicita'].'</td>
							<td>'.$registro2['cuantopaga'].'</td>

							<td>'.$registro2['cadatiempo'].'</td>
							<td>'.$registro2['invertira'].'</td>
							<td>'.$registro2['nombreref'].'</td>
							<td>'.$registro2['telfref'].'</td>
							<td>'.$registro2['celref'].'</td>

							<td><a href="javascript:mostrarfoto('.$registro2['codsoli'].');" ><img src="'.$registro2['fotocli'].'"width="30" height="30"> </a></td>
							<td> <a href="javascript:VerPlanPagos('.$registro2['codsoli'].','.$registro2['codcli'].');" ><img src="../recursos/detalles.png" data-toggle="tooltip" title="Crear Plan Pagos"></a> </td> 
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>