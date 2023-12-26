<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM usuarios WHERE id_usu = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro = mysqli_query($conexion,"SELECT * FROM usuarios ");


//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover titi">
<tr>
<td width="15%">Nombre</td>
<td width="10%">Usuario</td>
<td width="10%">Password</td>
<td width="10%" class="hidden-xs">Acceso</td>
<td width="15%">Opciones</td>

</tr>';
	$tadm='';			

	while($registro2 = mysqli_fetch_array($registro)){
		if ($registro2['id_area']=='admin'){$tadm='Administrador';}
		if ($registro2['id_area']=='almac'){$tadm='Almacen';}
		if ($registro2['id_area']=='compra'){$tadm='Compras';}
		if ($registro2['id_area']=='gestor'){$tadm='Gestor Mantenim.';}

		// if ($registro2['id_area']=='mante'){$tadm='Mentenimiento';}
		// if ($registro2['id_area']=='conta'){$tadm='Contabilidad';}
		// if ($registro2['id_area']=='expor'){$tadm='Exportaciones';}
		// if ($registro2['id_area']=='produ'){$tadm='Produccion';}
		// if ($registro2['id_area']=='proce'){$tadm='Procesos';}
		// if ($registro2['id_area']=='contro'){$tadm='Control Cal.';}
		echo '<tr>
        <td>'.$registro2['nomb_usu'].'</td>
        <td>'.$registro2['usuario'].'</td>
        <td>'.$registro2['pass_usu'].'</td>
        <td class="hidden-xs">'.$tadm.'</td>
        
        <td><a href="javascript:editarUsuario('.$registro2['id_usu'].');" ><img src="../recursos/lapiz.png" data-toggle="tooltip" title="Editar Usuario"></a>
         <a href="javascript:eliminarUsux('.$registro2['id_usu'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar Usuario"></a></td>
      </tr>';
	}
echo '</table>';
?>