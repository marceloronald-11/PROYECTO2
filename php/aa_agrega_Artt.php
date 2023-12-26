<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];
$areax=$_SESSION['id_area']; // admin si es ok sino no mostrar eliminar editar subir foto 

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
$darttx = $_POST['dartt'];
$coddx = $_POST['codd'];
$marx = $_POST['mar'];
$pci = $_POST['pci'];
$psix = $_POST['psi'];
$pmayx = $_POST['pmay'];
$compax = $_POST['compa'];

$cpvx = $_POST['cpv'];
$cclax = $_POST['ccla'];
$observx = $_POST['observ'];
$pnetx = $_POST['pnet'];
$umex = $_POST['ume'];
$stomx = $_POST['stom'];



$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO articulos (descripar,codigo, feingar, marca, preciva,presiva,premayor,compatible,codcla,codpv,observart,codsuc,pneto,umed,stockmin)VALUES
		('$darttx','$coddx','$fecha','$marx','$pci','$psix','$pmayx','$compax','$cclax','$cpvx','$observx','1','$pnetx','$umex','$stomx')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE articulos SET descripar ='$darttx',codigo='$coddx',marca='$marx',preciva='$pci',presiva='$psix',
		premayor='$pmayx',compatible='$compax',codcla='$cclax',codpv='$cpvx',observart='$observx',pneto='$pnetx',umed='$umex',stockmin='$stomx' WHERE codar = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM articulos AS ar JOIN proveedor AS pv ON 
	ar.codpv=pv.codpv JOIN clasificacion AS cl ON ar.codcla=cl.codcla JOIN sucursal AS su ON ar.codsuc=su.codsuc WHERE ar.codsuc='1' ");
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
	while($registro2 = mysqli_fetch_array($registro)){
//	$tt=$tt+$registro2['totalcr'];
//	$tcr=$tcr+$registro2['saldocr'];

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
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>