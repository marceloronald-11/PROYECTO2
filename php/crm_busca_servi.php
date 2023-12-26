<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla WHERE ar.descripar LIKE '%$dato%' ");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="20%">Producto</td>
			                <td width="10%">Grupo</td>
			                <td width="9%">U.Med</td>
			                <td width="9%">Precio</td>
			                <td width="9%">Saldo</td>
							<td width="9%">Detalles</td>
			                <td width="5%">Imagen</td>
							<td width="15%">Opciones</td>

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td><a href="javascript:editarPer('.$registro2['codar'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['descripar'].'</a></td>
							<td>'.$registro2['descripcla'].'</td>
							
							<td>'.$registro2['umed'].'</td>
							<td>'.$registro2['pvp'].'</td>
							<td>'.$registro2['saldo'].'</td>

							<td>'.$registro2['observar'].'</td>
							<td><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>
							<td> <a href="javascript:eliminaPer('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>