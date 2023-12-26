<?php
//if (!isset($_SESSION)) {session_start();}
session_start();
$coddepx= $_SESSION['depto'];

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=articulos.xls");

$dd = $_GET['codbco']; 

$iduu=$_SESSION['id_usu'];

	include('../php/conexion.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gas</title>



</head>
<body>
<?php
$row = mysql_query("SELECT * FROM bancos WHERE idbco='$dd'");
?>
<table border="0" WIDTH="100%" class="arriba">
<tr><td></td>
<td align="center" class="profo">Reporte de Articulos</td><td align="center"  width="40%">Software<br>Inventarios</td></tr>
</table>


<br>
<table border="1"  WIDTH="100%" class="tamletra">
<tr><th>Nro</th><th>&nbsp;Descripcion&nbsp;</th><th>Codigo</th><th>Ficha Ing.</th><th>U.Med.</th><th>P.Neto</th>
<th>P.Venta.</th><th>Saldo</th><th>Observacion</th></tr></table>

<table border="1"  WIDTH="100%" class="tamletra">

<?php
$it=0;
$row = mysqli_query($conexion,"SELECT * FROM activos AS ac JOIN departamento AS dp ON ac.coddep=dp.coddep WHERE ac.coddep='$coddepx' ");
while ($row2 = mysqli_fetch_array($row)) {
$it=$it+1;
$ndepto=$row2['descripdepto'];
?>
<tr ><td WIDTH="3%" align="center"> <?php echo $it ?></td><td WIDTH="18%" align="left"><?php echo $row2['descripcion'] ?></td>
<td WIDTH="8%" align="left"><?php echo $row2['codigo'] ?></td><td WIDTH="8%" align="left"> <?php echo $row2['fecha_ing'] ?></td>
<td WIDTH="4%" align="left"><?php echo $row2['umed'] ?></td><td WIDTH="8%" align="right"><?php echo $row2['pneto'] ?></td>
<td WIDTH="8%" align="right"><?php echo $row2['pvp'] ?></td><td WIDTH="9%" align="center"><?php echo $row2['existencia'] ?></td>
<td WIDTH="10%" align="left"><?php echo $row2['observart'] ?></td>

<?php } ?>

</table>
<table>  <tr><td>Depto: </td><td><?php  echo $ndepto ?></td></tr></table>




</body>
</html>