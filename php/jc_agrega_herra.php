<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idhe'];
$proceso = $_POST['pro'];
$nomhe = $_POST['nomhe'];
$cohh = $_POST['cohh'];
$copvv = $_POST['cpvv'];
$mqhora = $_POST['mqhora'];
$mqmin = $_POST['mqmin'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO herramientas (detherramienta,codigohe,codpv,maqhora,maqmin)VALUES('$nomhe','$cohh','$copvv','$mqhora','$mqmin')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE herramientas SET detherramienta='$nomhe',codigohe='$cohh',codpv='$copvv',maqhora='$mqhora',maqmin='$mqmin' WHERE codhe = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM herramientas AS he LEFT JOIN proveedor AS pv ON he.codpv=pv.codpv");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                            <td width="5%">Codigo</td>
                            <td width="20%">Detalle</td>
			                <td width="10%">Proveedor</td>
			                <td width="8%">MaqHora</td>
			                <td width="8%">MaqMin</td>
			                <td width="5%">Acciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
		<td>'.$registro2['codigohe'].'</td>
		<td>'.$registro2['detherramienta'].'</td>
		<td>'.$registro2['nombrepv'].'</td>
		<td>'.$registro2['maqhora'].'</td>
		<td>'.$registro2['maqmin'].'</td>

		<td><a href="javascript:editarHe('.$registro2['codhe'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></td>
	  </tr>';
	}
echo '</table>';
?>