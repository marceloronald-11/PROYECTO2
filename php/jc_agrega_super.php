<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idspv'];
$proceso = $_POST['pro'];
$nomhe = $_POST['nomspv'];
$cohh = $_POST['cospv'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO supervisor (detsupervisor,codigospv)VALUES('$nomhe','$cohh')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE supervisor SET detsupervisor='$nomhe',codigospv='$cohh' WHERE codspv = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM supervisor");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Detalle</td>
<td width="7%">Codigo</td>

<td width="10%">Acciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
		<td>'.$registro2['detsupervisor'].'</td>
		<td>'.$registro2['codigospv'].'</td>

		<td><a href="javascript:editarSu('.$registro2['codspv'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
		 </td>
	  </tr>';
	}
echo '</table>';
?>