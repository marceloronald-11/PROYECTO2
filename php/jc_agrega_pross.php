<?php
include('conexion.php');
//include('../php/conexion.php');
$iddx = $_POST['idpros'];
$proceso = $_POST['pro'];
$nomx = $_POST['nompros'];
$codii = $_POST['codprosi'];
$lb1x = $_POST['lb1'];// codcc
$ccosto1x = $_POST['ccosto1'];//codcciso

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO proceso (detproceso,codproiso,codcc,codcciso)VALUES('$nomx','$codii','$lb1x','$ccosto1x')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE proceso SET detproceso='$nomx' WHERE codpro = '$iddx' ");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM proceso");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                        <td width="5%" align="center">Cod.Costo</td>  
                        <td width="5%" align="center">Cod.Proc.</td>
						<td width="25%" align="center">Detallle</td>
		                <td width="10%" align="center">Opciones</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td align="center">'.$registro2['codcciso'].'</td>
        <td align="center">'.$registro2['codproiso'].'</td>
        <td >'.$registro2['detproceso'].'</td>

		<td align="center"><a href="javascript:eliminaPross('.$registro2['codpro'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
		</td>
						  </tr>';
	}
echo '</table>';
?>