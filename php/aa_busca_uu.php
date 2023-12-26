<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nomb_usu LIKE '%$dato%' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
 			            <tr>
			                <th width="15%">Nombre</th>
			                <th width="10%">Usuario</th>
			                <th width="10%">Password</th>
			                <th width="10%" class="hidden-xs">Acceso</th>
			                <th width="15%">Sucursal</th>

			                <th width="15%">Opciones</th>

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Administrador';}
		if ($registro2['id_area']=='operador'){$tadm='Sucursal';}
		

		echo '<tr>
							<td>'.$registro2['nomb_usu'].'</td>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['pass_usu'].'</td>
							<td class="hidden-xs">'.$tadm.'</td>
							<td>'.$registro2['nomb_suc'].'</td>
							
							<td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
							 <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>