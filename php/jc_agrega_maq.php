<?php
include('conexion.php');
//include('../php/conexion.php');
$iddx = $_POST['idmak'];
$proceso = $_POST['pro'];
$nomx = $_POST['nommaq'];
$codii = $_POST['codmaqi'];
$lb1x = $_POST['lb1'];// codcc
$ccosto1x = $_POST['ccosto1'];//codcciso
$lb2x = $_POST['lb2'];// codcc
$proccx = $_POST['procc1'];//codcciso

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO maquina (detmaquina,codmqiso,codcc,codcciso,codpro,codproiso)VALUES('$nomx','$codii','$lb1x','$ccosto1x','$lb2x','$proccx')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE maquina SET detmaquina='$nomx' WHERE codmq = '$iddx' ");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM maquina");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                        <td width="5%" align="center">Cod.Costo</td>  
                        <td width="5%" align="center">Cod.Proc.</td>
                        <td width="5%" align="center">Cod.Maq.</td>

                        <td width="25%" align="center">Detallle</td>
		                <td width="10%" align="center">Opciones</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td align="center">'.$registro2['codcciso'].'</td>
        <td align="center">'.$registro2['codproiso'].'</td>
        <td align="center">'.$registro2['codmqiso'].'</td>

        <td >'.$registro2['detmaquina'].'</td>

		<td align="center"><a href="javascript:eliminaMaq('.$registro2['codmq'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
		</td>
						  </tr>';
	}
echo '</table>';
?>