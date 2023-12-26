<?php
if (!isset($_SESSION)) {session_start();}
$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 
$codsucx=$_SESSION['codsuc'];

include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

//$registro = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombre LIKE '%$dato%' OR ci LIKE '%$dato%' OR codigo LIKE '%$dato%' ORDER BY nombre ASC");

$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN proveedor AS pv ON 
	ar.codpv=pv.codpv JOIN clasificacion AS cl ON ar.codcla=cl.codcla JOIN sucursal AS su ON ar.codsuc=su.codsuc
	 WHERE descripar LIKE '%$dato%' AND ar.codsuc='1' ");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	  <tr>
			                <td width="10%">Articulo</td>
			                <td width="5%" class="hidden-xs">Marca</td>
			                <td width="5%" class="hidden-xs">Codigo</td>
							<td width="5%" class="hidden-xs">Pr.Neto</td>
							<td width="5%" class="hidden-xs">Pr.c/Iva</td>
			                <td width="5%" class="hidden-xs">Pr.s/Iva</td>
			                <td width="5%" class="hidden-xs">Pr.Mayor</td>
			                <td width="10%" class="hidden-xs">Compatibilidad</td>
			                <td width="8%" class="hidden-xs">Proveedor</td>
			                <td width="9%" class="hidden-xs">Clasif.</td>
			                <td width="10%" class="hidden-xs">Sucursal</td>
							<td width="5%" class="hidden-xs">Imagen</td>
			                <td width="35%" align="center">Opcion</td>
			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripar'].'</td>
							<td class="hidden-xs">'.$registro2['marca'].'</td>
							<td class="hidden-xs">'.$registro2['codigo'].'</td>
							<td class="hidden-xs">'.$registro2['pneto'].'</td>
							<td class="hidden-xs">'.$registro2['preciva'].'</td>
							<td class="hidden-xs">'.$registro2['presiva'].'</td>
							<td class="hidden-xs">'.$registro2['premayor'].'</td>
							<td class="hidden-xs">'.$registro2['compatible'].'</td>
							<td class="hidden-xs">'.$registro2['nombrepv'].'</td>
							<td class="hidden-xs">'.$registro2['descripcla'].'</td>
							<td class="hidden-xs">'.$registro2['nombresuc'].'</td>
							<td class="hidden-xs">'."<img src=\"".$registro2['fotoar']."\" width=\"30\" height=\"30\"/>".'</td>';
							echo '<td align="center">';
							if($areax=='admin'){
							 echo'
							 <a href="javascript:eliminarProducto('.$registro2['codar'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
							  <a href="javascript:mostrarfotocarga('.$registro2['codar'].');" ><img src="../recursos/subir.png" data-toggle="tooltip" title="Subir Imagen"></a>';
							}

							echo '<a href="javascript:editarArtiss('.$registro2['codar'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Registro"></a> 
							<a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>