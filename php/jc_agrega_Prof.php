<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idprof'];
$proceso = $_POST['pro'];
$nomhe = $_POST['nomprof'];
$cohh = $_POST['coprof'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO profesiones (detprofesion,codigopf)VALUES('$nomhe','$cohh')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE profesiones SET detprofesion='$nomhe',codigopf='$cohh' WHERE codpf = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM profesiones");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Detalle</td>
<td width="7%">Codigo</td>

<td width="10%">Acciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
		<td>'.$registro2['detprofesion'].'</td>
		<td>'.$registro2['codigopf'].'</td>

		<td><a href="javascript:editarPf('.$registro2['codpf'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
		 </td>
	  </tr>';
	}
echo '</table>';
?>