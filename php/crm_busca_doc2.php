<?php
include('conexion.php');

$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion,"SELECT * FROM alumno AS al LEFT JOIN departamento AS dp ON al.coddep=dp.coddep WHERE concat(al.nombrealum,al.telfalum) LIKE '%$dato%' ");

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
$tadm='';
if(mysqli_num_rows($registro)>0){
	while($registro2 = mysqli_fetch_array($registro)){

		echo '<tr>
							<td><a href="javascript:editarCli('.$registro2['codalum'].');" data-toggle="tooltip" title="Editar Datos">'.$registro2['nombrealum'].'</a></td>
							<td>'.$registro2['cialum'].'</td>
							<td>'.$registro2['telfalum'].'</td>
							<td>'.$registro2['emailalum'].'</td>
							<td>'.$registro2['descripdepto'].'</td>
							
<td align="center" ><span class="badge bag"><a href="javascript:VerDocumentoss('.$registro2['codalum'].');" data-toggle="tooltip" title="Ver Documentos *" >'.$registro2['ndoc'].'</a> </span> <a href="javascript:SubirDoc3('.$registro2['codalum'].');" ><img src="../recursos/anadir.png" data-toggle="tooltip" title="Añadir Area"></a></td>
							
							
							<td align="center">   <a href="javascript:eliminaCli('.$registro2['codalum'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Registro"></a></td> 
						  </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>