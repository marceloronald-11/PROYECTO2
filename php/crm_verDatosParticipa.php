<?php
include('conexion.php');

$id = $_POST['id'];


$registro = mysqli_query($conexion,"SELECT * FROM areaalumno WHERE codalum='$id' ");

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="15%" align="center">Area**</td>
			                <td width="8%" align="center">No Cursos</td>
							<td width="8%" align="center">Opciones</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
							
							<td>'.$registro2['detarea2'].'</td>
<td align="center" ><span class="badge bag"><a href="javascript:VerCursos('.$registro2['codalum'].','.$registro2['codarea'].');" data-toggle="tooltip" title="Ver Cursos" >'.$registro2['ncursos'].'</a></span> <a href="javascript:anadircurso('.$registro2['codaa'].');" ><img src="../recursos/anadir.png" data-toggle="tooltip" title="Añadir Cursos"></a></td>							
							
							<td align="center">  <a href="javascript:eliminaDocu('.$registro2['codaa'].','.$registro2['codalum'].','.$registro2['codarea'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Area"></a></td>
							</tr>';
						  	}
echo '<tr><td colspan="4"><a href="crm_participantes.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar"> SALIR</a></td>
</tr>';
echo '</table>';
?>