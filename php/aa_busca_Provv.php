<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM proveedor WHERE nombrepv LIKE '%$dato%' ");



//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	 <tr>
			                <td width="15%">Proveedor</td>
			                <td width="11%" >Direccion</td>
			                <td width="9%" class="hidden-xs">No Carnet</td>
			                <td width="9%" class="hidden-xs">Telf/Cel.</td>
							<td width="10%" class="hidden-xs">Email</td>
			                <td width="7%" class="hidden-xs">Observacion</td>
							<td width="5%" class="hidden-xs">Imagen</td>
							<td width="10%" class="hidden-xs">Opciones</td>

			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['nombrepv'].'</td>
							<td class="hidden-xs">'.$registro2['direccpv'].'</td>
							<td class="hidden-xs">'.$registro2['cipv'].'</td>
							<td class="hidden-xs">'.$registro2['telfpv'].'</td>
							<td class="hidden-xs">'.$registro2['emailpv'].'</td>
							<td class="hidden-xs">'.$registro2['observpv'].'</td>
							<td class="hidden-xs">'."<img src=\"".$registro2['fotopv']."\" width=\"30\" height=\"30\"/>".'</td>	
							<td align="center"><a href="javascript:editarProvvs('.$registro2['codpv'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a>
							 <a href="javascript:eliminarProvv('.$registro2['codpv'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codpv'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>
							   <a href="javascript:mostrarfoto('.$registro2['codpv'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>