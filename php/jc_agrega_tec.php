<?php
//include('conexion.php');
include('../php/conexion.php');
$idhe = $_POST['idtec'];
$proceso = $_POST['pro'];
$nomhe = $_POST['nomtec'];
$cohh = $_POST['cotc'];
$hosus = $_POST['hosus'];
$misus = $_POST['misus'];
$diretec = $_POST['diretec'];
$teltec = $_POST['teltec'];
$celtec = $_POST['celtec'];

//var_dump ($_POST);
$fecha = date('Y-m-d');

switch($proceso){
	case 'Registro':
		mysqli_query($conexion,"INSERT INTO tecnicos (dettecnico,codigotec,horasus,minsus,direcctec,telftec,celulartec)VALUES('$nomhe','$cohh','$hosus','$misus','$diretec','$teltec','$celtec')");
	break;
	
	case 'Editar':
		mysqli_query($conexion,"UPDATE tecnicos SET dettecnico='$nomhe',codigotec='$cohh',horasus='$hosus',minsus='$misus',direcctec='$diretec',telftec='$teltec',celulartec='$celtec' WHERE codtec = '$idhe'");

	break;
}


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM tecnicos");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-bordered titi">
<tr>
                        <td width="5%">Codigo</td>
                        <td width="12%">Tecnico</td>
                        <td width="5%">Hora U$</td>
                        <td width="5%">Min U$</td>
                        <td width="15%">Direcion</td>
                        <td width="10%">Telefono</td>
                        <td width="10%">Celular</td>
		                <td width="5%">Acciones</td>

			            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
        <td>'.$registro2['codigotec'].'</td>
        <td>'.$registro2['dettecnico'].'</td>
        <td>'.$registro2['horasus'].'</td>
        <td>'.$registro2['minsus'].'</td>
        <td>'.$registro2['direcctec'].'</td>
        <td>'.$registro2['telftec'].'</td>
        <td>'.$registro2['celulartec'].'</td>

            <td><a href="javascript:eliminaTec('.$registro2['codtec'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar "></a>
             </td>
          </tr>';
	}
echo '</table>';
?>