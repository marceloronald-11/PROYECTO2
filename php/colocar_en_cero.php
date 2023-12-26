<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Control</title>
<style type="text/css">
.caja {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	background-color: #FC6;
	padding: 5px;
	color: #FF0;
	height: 100px;
	width: 300px;
	margin-top: 150px;
	margin-right: 5px;
	margin-bottom: 5px;
	margin-left: 200px;
	text-decoration: none;
}
.caja a {
	color: #009;
	text-decoration: none;
	margin-top: 80px;
}
</style>
</head>

<body>
<?php
include('../php/conexion.php');

$sena = $_POST['sena'];

if ($sena=='del2023'){
//mysqli_query($conexion,"DELETE FROM articulos WHERE codsuc != '1'");
mysqli_query($conexion,"UPDATE alumno  SET nareas= 0 ");
mysqli_query($conexion,"UPDATE codnu  SET norden= 0 ,nrecibo= 0 ");

mysqli_query($conexion,"TRUNCATE TABLE areaalumno");
mysqli_query($conexion,"TRUNCATE TABLE cursoalumno");
//mysqli_query($conexion,"TRUNCATE TABLE alumno");


//echo "PROCESO CONCLUIDO......";
?>
<br>
<br>
<div class="caja">
<a href="crm_inicio1.php">SE COLOCO EN CERO TODOS LOS DATOS... RETORNAR AL MENU PRINCIPAL .......</a>
</div>
<?php
}else{
?>
<div class="caja">
<a href="crm_inicio1.php">PASSWORD INCORRECTO... RETORNAR AL MENU PRINCIPAL .......</a>
</div>

<?php	
	}
?>


</body>
</html>
