<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

//$registro = mysqli_query($conexion,"SELECT * FROM cursoalumno WHERE codarea='$id' ");
$registro = mysqli_query($conexion,"SELECT * FROM cursoalumno AS cu LEFT JOIN alumno AS al ON cu.codalum=al.codalum WHERE cu.codarea='$id' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered  titi">
<tr>
			                <td width="15%">Funcionario</td>
			                <td width="15%">Codigo</td>
			                <td width="15%">Fecha Caduca</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
        <td>'.$registro2['nombrealum'].'</td>
        <td>'.$registro2['codigocurr'].'</td>
        <td>'.$registro2['fechacurr'].'</td>
      </tr>';
	}
echo '<tr><td colspan="4"><a href="crm_reporteAreas.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar"> SALIR</a></td>';
echo '</table>';
?>