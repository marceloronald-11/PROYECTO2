<!doctype html>
<html>
<?
include('../php/conexion.php');

$cero=0;


?>
<head>
<meta charset="utf-8">
<title>ARTICULOS TOTAL VENTAS</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
<div class="container">
<? $re=mysql_query("SELECT * FROM productos "); ?>
<table class="table table-striped table-bordered">
	<h3>REPORTE TOTAL DE ARTICULOS</h3>
<tr>
	<th>Detalle del Articulo</th>
	<th>Marca</th>
	<th>Modelo</th>
	<th>No Serie</th>
	<th>Grupo</th>
	<th>Precio</th>
	<th>Fecha Reg</th>

</tr>
<? while($f=mysql_fetch_array($re)){ ?>
<tr>
        <td width="150" align="left" class="active"><?php echo $f['nomb_prod']; ?></td>
        <td width="100" align="left" class="active"><?php echo $f['marca']; ?></td>
        <td width="100" align="left" class="active"><?php echo $f['modelo']; ?></td>
        <td width="100" align="left" class="active"><?php echo $f['serial']; ?></td>
        <td width="100" align="left" class="active"><?php echo $f['modelo']; ?></td>
        <td width="100" align="left" class="active"><?php echo $f['precio_unit']; ?></td>
        <td width="100" align="left" class="active"><?php echo $f['fecha_reg']; ?></td>
 </tr>
	
<? } ?>
</table>
</div>
</body>
</html>

