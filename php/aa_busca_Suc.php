<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM sucursal AS su JOIN tiposucursal AS ts ON su.codtisuc=ts.codtisuc WHERE su.nombresuc LIKE '%$dato%' ");



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	  <tr>
			                <td width="15%">Sucursal</td>
			                <td width="15%">Direccion</td>
			                <td width="15%">Tipo</td>
							<td width="15%">Habilitado</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombresuc'].'</td>
							<td>'.$registro2['direccsuc'].'</td>
							<td>'.$registro2['descriptisuc'].'</td>
							<td>'.$registro2['estadosuc'].'</td>
							

							<td align="center"><a href="javascript:editarSuc('.$registro2['codsuc'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarSuc('.$registro2['codsuc'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							   </td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>