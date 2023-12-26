<!DOCTYPE html>
<html lang="es">
<?php
include('conexion.php');
//include('ajax.php');

if (isset($_POST['buscar'])){
	$dato=$_POST['buscar'];
	
$registro = mysql_query("SELECT * FROM productos WHERE nomb_prod LIKE '%$dato%' ORDER BY id_prod ASC");


echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
			                <th width="200">Nombre</th>
			                <th width="100">Grupo</th>
							<th width="40">Precio Neto</th>
			                <th width="40">Precio Venta</th>
			                <th width="90">Codigo</th>
			                <th width="60">Registro</th>
							<th width="50">Imagen</th>
			                <th width="50">Opcion</th>
			            </tr>';
if(mysql_num_rows($registro)>0){
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['nomb_prod'].'</td>
							<td>'.$registro2['tipo_prod'].'</td>
							<td>'.number_format($registro2['precio_dist'],2).'</td>
							<td >'.number_format($registro2['precio_unit'],2).'</td>
							<td >'.$registro2['codigo'].'</td>
							<td>'.fechaNormal($registro2['fecha_reg']).'</td>
							<td>'."<img src=\"".$registro2['foto']."\" width=\"30\" height=\"30\"/>".'</td>
							<td><a href="javascript:editarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_prod'].');" class="glyphicon glyphicon-remove-circle"></a> <a href="javascript:mostrarfoto('.$registro2['id_prod'].');" class="glyphicon glyphicon-picture"></a></td>
				</tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
}else{
	echo "No se encontro datos....";	
}
?>


<head>
	<meta charset="UTF-8">
	<title>buscador</title>


	<!--pluging Jquery JS JSUI y css -->
    	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
		<script type="text/javascript" src="../js/script/jquery.js"></script>
		<script type="text/javascript" src="../js/script/jqueryui.js"></script>
	<!--fin pluging Jquery JS JSUI y css -->

<!-- pluging Bootstrap -->
   	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<!-- fin pluging Bootstrap -->    
<script>
	$('document').ready(function(){
		$('#buscar').autocomplete({
			source: 'ajax.php'//['hola','marite','britani']
		});
	});
</script>    

    
</head>
<body>
	<form action="buscar_ajax.php" method="post" >
		<label>Buscar:</label><input type="text" name="buscar" id="buscar" value="">
		<input type="submit" value="buscar">
	</form>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>