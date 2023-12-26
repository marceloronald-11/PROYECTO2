<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idar'];
$proceso = $_POST['pro'];
$nomhe = $_POST['nomarea'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO areas (detarea)VALUES('$nomhe')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE areas SET detarea='$nomhe' WHERE codarea = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM areas");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Detalle</td>

<td width="10%">Acciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td>'.$registro2['detarea'].'</td>

        <td><a href="javascript:editarAr('.$registro2['codarea'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
        </td>
      </tr>';
	}
echo '</table>';
?>