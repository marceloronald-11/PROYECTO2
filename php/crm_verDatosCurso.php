<?php
include('conexion.php');

$codalu3= $_POST['codalum1'];
$codarea3 = $_POST['codarea1'];


$registro = mysqli_query($conexion,"SELECT * FROM cursoalumno WHERE codalum='$codalu3' AND codarea='$codarea3' ");

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Codigo</td>
			                <td width="8%" align="center">Fecha Caduca</td>
							<td width="8%" align="center">Acciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							
							<td>'.$registro2['codigocurr'].'</td>
							<td>'.$registro2['fechacurr'].'</td>

							<td align="center"> <a href="javascript:eliminaCurso('.$registro2['codcurr'].','.$registro2['codalum'].','.$registro2['codarea'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Curso"></a></td>
							</tr>';
						  	}
echo '<tr><td colspan="4"><a href="crm_participantes.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar"> SALIR</a></td>
</tr>';
echo '</table>';
?>