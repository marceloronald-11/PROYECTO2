<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idsol'];
$proceso = $_POST['pro'];
$nomsoli = $_POST['nomsoli'];
$coare = $_POST['are'];
$cocar = $_POST['carg'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO solicita (detsolicitante,codarea,codcargo)VALUES('$nomsoli','$coare','$cocar')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE solicita SET detsolicitante='$nomsoli',codarea='$coare',codcargo='$cocar' WHERE codsoli = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM solicita AS sol LEFT JOIN areas AS ar ON sol.codarea=ar.codarea LEFT JOIN cargo AS ca ON sol.codcargo=ca.codcargo");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Nombre</td>
<td width="15%">Area</td>
<td width="15%">Cargo</td>
<td width="10%">Acciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td>'.$registro2['detsolicitante'].'</td>
        <td>'.$registro2['detarea'].'</td>
        <td>'.$registro2['detcargo'].'</td>

        <td><a href="javascript:editarHe('.$registro2['codsoli'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
         <a href="javascript:eliminaHe('.$registro2['codsoli'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar"></a></td>
      </tr>';
	}
echo '</table>';
?>