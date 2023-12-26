<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idar'];
$despv = $_POST['despv'];
$cii = $_POST['cii'];
$dire = $_POST['dire'];
$emma = $_POST['emma'];
$observv = $_POST['observv'];
$cel = $_POST['cel'];

$fecha = date('Y-m-d');
//var_dump ($_POST);
//VERIFICAMOS EL PROCESO
//$fee= date("Y-m-d", strtotime($fepag) );

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO proveedor (nombrepv,direccpv, telfpv, emailpv, cipv,observpv)VALUES
		('$despv','$dire','$cel','$emma','$cii','$observv')");
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE proveedor SET nombrepv ='$despv',direccpv='$dire',telfpv='$cel',emailpv='$emma',cipv='$cii',
		observpv='$observv' WHERE codpv = '$idarx'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
	$registro = mysqli_query($conexion,"SELECT * FROM proveedor ");


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
	while($registro2 = mysqli_fetch_array($registro)){
//	$tt=$tt+$registro2['totalcr'];
//	$tcr=$tcr+$registro2['saldocr'];

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
	
//    echo '<tr><td colspan="4">Totales...</td><td align="right">'.number_format($tt,2).'</td><td align="right">'.number_format($tcr,2).'</td></tr>';
	
echo '</table>';
?>