<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//mysqli_query($conexion,"DELETE FROM alumno WHERE codalum = '$id'");

mysqli_query($conexion,"DELETE FROM documentos WHERE codalum = '$id'");
mysqli_query($conexion,"UPDATE alumno SET ndoc ='0' WHERE codalum = '$id'");
//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM alumno AS al LEFT JOIN departamento AS dp ON al.coddep=dp.coddep");
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
			                <td width="18%" align="center">Nombre</td>
			                <td width="9%" align="center">No Carnet</td>
			                <td width="10%" align="center">Telf/Cel</td>
			                <td width="10%" align="center">Correo</td>
			                <td width="10%" align="center">Departamento</td>
							
			                <td width="10%" align="center">No Docum.</td>
							
							<td width="12%" align="center">Acciones//</td>

			            </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
	
		echo '<tr>
							<td><a href="javascript:editarCli('.$registro2['codalum'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombrealum'].'</a></td>
							<td>'.$registro2['cialum'].'</td>
							<td>'.$registro2['telfalum'].'</td>
							<td>'.$registro2['emailalum'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							
<td align="center" ><span class="badge bag"><a href="javascript:VerDocumentoss('.$registro2['codalum'].');" data-toggle="tooltip" title="Ver Documentos" >'.$registro2['ndoc'].'</a> </span> <a href="javascript:SubirDoc3('.$registro2['codalum'].');" ><img src="../recursos/anadir.png" data-toggle="tooltip" title="Añadir Area"></a></td>
							
							
							<td align="center">   <a href="javascript:eliminaCli('.$registro2['codalum'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a></td> 
						  </tr>';
	}
echo '</table>';
?>