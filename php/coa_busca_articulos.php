<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA
//$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN clasificacion AS cl ON ar.codcla=cl.codcla LEFT JOIN articulossuc AS ar2 ON ar.codar=ar2.codar LEFT JOIN proveedor AS pvv ON ar.codpv=pvv.codpv WHERE concat(ar.descripar,ar.codigo) LIKE '%$dato%' ");


$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN grupo  AS gru ON ar.codgru=gru.codgru LEFT JOIN marca AS mar ON ar.codmar=mar.codmar LEFT JOIN tipo AS ti ON ar.codti= ti.codti   WHERE concat(ar.descripar,ar.serie) LIKE '%$dato%'");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="12% align="center">Descripcion</td>
			                <td width="12%" align="center">Grupo</td>
			                <td width="7%" align="center">Marca</td>
			                <td width="7%" align="center">Tipo</td>
			                <td width="7%" align="center">Serie</td>
			                <td width="7%" align="center">Precio Vta</td>
			                <td width="7%" align="center">Precio Factura</td>
							
			                <td width="5%" align="center">Saldo</td>
			                <td width="5%" align="center">Stock Min.</td>
							
			                <td width="5%" align="center">Imagen</td>
							<td width="10%" align="center">Acciones</td>

			            </tr>';
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td><a href="javascript:editarPer('.$registro2['codar'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['descripar'].'</a></td>
							<td align="center">'.$registro2['detgrupo'].'</td>
							<td align="center">'.$registro2['detmarca'].'</td>
							<td align="center">'.$registro2['dettipo'].'</td>
							<td align="center">'.$registro2['serie'].'</td>
							<td align="right">'.$registro2['pvp'].'</td>
							<td align="right">'.$registro2['pneto'].'</td>
							
							<td align="center">'.$registro2['saldo'].'</td>';
		if($registro2['saldo']<=$registro2['stockmin']){
			echo '<td align="center" style="background-color:red; font-size:17px;color:white">'.$registro2['stockmin'].'</td>';
		}else{
			echo '<td align="center">'.$registro2['stockmin'].'</td>';
		}
		
							echo '
							
							<td align="center"><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="'.$registro2['fotoar'].'"width="30" height="30"> </a></td>
							<td align="center"> <a href="javascript:eliminaPer('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a> </a>
							 <a href="javascript:reportePDF('.$registro2['codar'].');" ><img src="../recursos/impresora.png" data-toggle="tooltip" title="Imprimir Ficha"></a> 
							 <a href="javascript:reportePDF2('.$registro2['codar'].');" ><img src="../recursos/qr.png" data-toggle="tooltip" title="Imprimir QR"></a> </td>
							
								
							
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>