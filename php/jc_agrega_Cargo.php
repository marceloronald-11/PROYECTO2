<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idcar'];
$proceso = $_POST['pro'];
$nomhe = $_POST['nomcar'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO cargo (detcargo)VALUES('$nomhe')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE cargo SET detcargo='$nomhe' WHERE codcargo = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM cargo");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
<td width="15%">Detalle</td>
<td width="7%">Codigo</td>

<td width="10%">Acciones</td>

</tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td>'.$registro2['detcargo'].'</td>

        <td><a href="javascript:editarCar('.$registro2['codcargo'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar "></a>
         </td>
      </tr>>
	  </tr>';
	}
echo '</table>';
?>