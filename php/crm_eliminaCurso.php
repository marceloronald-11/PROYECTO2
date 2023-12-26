<?php
include('conexion.php');

$id = $_POST['id'];//codaa
$cdcli = $_POST['codal']; //codalum
$cdarea = $_POST['cdarea']; //codalum


//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM areaalumno WHERE codaa = '$id'");

mysqli_query($conexion,"DELETE FROM cursoalumno WHERE codcurr = '$id'");

mysqli_query($conexion,"UPDATE areaalumno SET ncursos=ncursos-1  WHERE codalum = '$cdcli' AND codarea='$cdarea'");
////UPDATE nro AREAS


//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM cursoalumno WHERE codalum='$cdcli' AND codarea='$cdarea' ");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

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