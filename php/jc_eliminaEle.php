<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM elemento WHERE codel = '$id'");

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