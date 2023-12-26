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
	 WHERE descripar LIKE '%$dato%' ");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
        	<tr>
			                <td width="15%">Producto</td>
			                <td width="4%" class="hidden-xs">Codigo</td>
			                <td width="4%" class="hidden-xs">U.Med.</td>
							<td width="7%" class="hidden-xs">Neto</td>
			                <td width="7%" class="hidden-xs">Pvp</td>
			                <td width="8%" class="hidden-xs">Proveedor</td>
			                <td width="9%" class="hidden-xs">Clasif.</td>
			                <td width="10%" class="hidden-xs">Sucursal</td>
			                <td width="7%" >Saldo</td>
			                <td width="15%" class="hidden-xs">Observ.</td>
							<td width="7%" class="hidden-xs" align="center">Imagen</td>
							<td width="5%" class="hidden-xs">Opciones</td>

			            </tr>';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							<td>'.$registro2['descripar'].'</td>
							<td class="hidden-xs">'.$registro2['codigo'].'</td>

							<td class="hidden-xs">'.$registro2['umed'].'</td>
							<td class="hidden-xs">'.$registro2['pnetoar'].'</td>
							<td class="hidden-xs">'.$registro2['pvpar'].'</td>
							<td class="hidden-xs">'.$registro2['nombrepv'].'</td>
							<td class="hidden-xs">'.$registro2['descripcla'].'</td>
							<td class="hidden-xs">'.$registro2['nombresuc'].'</td>
							<td align="center">'.$registro2['saldo'].'</td>

							<td class="hidden-xs">'.$registro2['observart'].'</td>
							<td align="center" class="hidden-xs">'."<img src=\"".$registro2['fotoar']."\" width=\"30\" height=\"30\"/>".'</td>';
							echo'<td align="center"><a href="javascript:mostrarfoto('.$registro2['codar'].');" ><img src="../recursos/imagen.png" data-toggle="tooltip" title="Ver Imagen"></a></td>
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>