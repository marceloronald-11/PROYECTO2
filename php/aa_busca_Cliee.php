<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombrecli LIKE '%$dato%' ");



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	  <tr>
			                <td width="15%">Cliente</td>
			                <td width="11%" >Direccion</td>
			                <td width="9%" class="hidden-xs">No Carnet</td>
			                <td width="9%" class="hidden-xs">Nit</td>
							<td width="9%" class="hidden-xs">Telf/Cel.</td>
							<td width="10%" class="hidden-xs">Email</td>
			                <td width="7%" class="hidden-xs">Observacion</td>
							<td width="5%" class="hidden-xs">Imagen</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<td>'.$registro2['nombrecli'].'</td>
							<td class="hidden-xs">'.$registro2['direcccli'].'</td>
							<td class="hidden-xs">'.$registro2['cicli'].'</td>
							<td class="hidden-xs">'.$registro2['nitcli'].'</td>
							<td class="hidden-xs">'.$registro2['telfcli'].'</td>
							<td class="hidden-xs">'.$registro2['emailcli'].'</td>
							<td class="hidden-xs">'.$registro2['observcli'].'</td>
							<td class="hidden-xs">'."<img src=\"".$registro2['fotocli']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td align="center"><a href="javascript:editarCliee('.$registro2['codcli'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarCliee('.$registro2['codcli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codcli'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codcli'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>