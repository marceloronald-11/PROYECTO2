<?php
//include('conexion.php');
if (!isset($_SESSION)) {session_start();}
$codsucss=$_SESSION['codsuc'];
$id_usux=$_SESSION['id_usu'];

include('../php/conexion.php');
$proceso= $_POST['pro'];

$idarx= $_POST['idper'];
$nombar = $_POST['nomar'];


$fecha = date('Y-m-d');
var_dump ($_POST);

switch($proceso){
	case 'Registro':
			
			mysqli_query($conexion,"INSERT INTO cargo (detcargo)VALUES ('$nombar')");
		
	break;
	
	case 'Editar':
		
		mysqli_query($conexion,"UPDATE cargo SET detcargo ='$nombar' WHERE codcargo = '$idarx'");


	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$registro = mysqli_query($conexion,"SELECT * FROM cargo ");

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%">Cargo</td>
							<td width="15%">Opciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td><a href="javascript:editarCar('.$registro2['codcargo'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['detcargo'].'</a></td>
							<td> <a href="javascript:eliminaCar('.$registro2['codcargo'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Area"></a></td>
						  </tr>';
	}
	

echo '</table>';
?>