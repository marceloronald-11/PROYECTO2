<?php
include('conexion.php');
//include('../php/conexion.php');
$iddx = $_POST['idele'];
$proceso = $_POST['pro'];
$nomx = $_POST['nomele'];
$codii = $_POST['codelei'];
$lb1x = $_POST['lb1'];// codcc
$ccosto1x = $_POST['ccosto1'];//codcciso
$lb2x = $_POST['lb2'];// codcc
$proccx = $_POST['procc1'];//codcciso
$lb3x = $_POST['lb3'];// codcc
$maqqx = $_POST['maqq1'];//codcciso

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO elemento (detelemento,codeliso,codcc,codcciso,codpro,codproiso,codmq,codmqiso)VALUES('$nomx','$codii','$lb1x','$ccosto1x','$lb2x','$proccx','$lb3x','$maqqx')");
	break;
	
	case 'Editar':
		//mysqli_query($conexion,"UPDATE elemento SET detmaquina='$nomx',codeliso='$codii',codcc='$lb1x',codcciso='$ccosto1x',codpro='$lb2x',codproiso='$proccx',codmq='$lb3x',codmqiso='$maqqx' WHERE codel = '$iddx' ");

		mysqli_query($conexion,"UPDATE elemento SET detelemento='$nomx' WHERE codel = '$iddx' ");


	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM elemento");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                        <td width="5%" align="center">Cod.Costo</td>  
                        <td width="5%" align="center">Cod.Proc.</td>
                        <td width="5%" align="center">Cod.Maq.</td>
                        <td width="5%" align="center">Cod.Elem.</td>

                        <td width="25%" align="center">Detallle</td>
		                <td width="10%" align="center">Opciones</td>
			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td align="center">'.$registro2['codcciso'].'</td>
        <td align="center">'.$registro2['codproiso'].'</td>
        <td align="center">'.$registro2['codmqiso'].'</td>
        <td align="center">'.$registro2['codeliso'].'</td>

        <td >'.$registro2['detelemento'].'</td>

		<td align="center"><a href="javascript:eliminaEle('.$registro2['codel'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a>
		</td>
						  </tr>';
	}
echo '</table>';
?>