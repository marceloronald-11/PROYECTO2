<!doctype html>
<html>
<?
include('../php/conexion.php');

$cero=0;

//$re=mysql_query("SELECT * FROM productos WHERE productos.id_per='$cero'");

//while($f=mysql_fetch_array($re)){
//	echo $f['nomb_prod'].$f['fecha_reg'].$f['marca'].'<br>';
//	}
?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<head>
<meta charset="utf-8">
<title>REPORTE VENTAS</title>
</head>

<body>
<div class="container">
<br>

<?
$re=mysql_query("SELECT * FROM productos INNER JOIN personal ON personal.id_per = productos.id_per");
?>
<table class="table table-striped table-bordered">
	<h3>Reporte de Articulo </h3>
<tr>
	<th>Nombre Funcionario</th>
	<th>Articulo Asignado</th>
	<th>Cargo</th>
	<th>Entrega</th>
	<th>Marca</th>
	<th>Serial</th>
	<th>Codigo</th>
	<th align="center">Grupo</th>

</tr>
<? while($f=mysql_fetch_array($re)){ ?>
	<tr>
        <td width="150" align="left" class="active" ><?php echo $f['nombre']; ?></td>
        <td width="150" align="left" class="active"><?php echo $f['nomb_prod']; ?></td>
        <td width="30" align="left" class="active"><?php echo $f['cargo']; ?></td>
        <td width="80" align="left" class="active"><?php echo $f['fecha_reg']; ?></td>
        <td width="70" align="left" class="active"><?php echo $f['marca']; ?></td>
        <td width="70" align="left" class="active"><?php echo $f['serial']; ?></td>
        <td width="70" align="left" class="active"><?php echo $f['codigo']; ?></td>
        <td width="70" align="left" class="active"><?php echo $f['tipo_prod']; ?></td>


    </tr>
<?	
	}
?>
 </table>	
</div>
   	<script src="../js/jquery.js"> </script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



