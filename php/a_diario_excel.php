<?php
if (!isset($_SESSION)) {session_start();}

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=diario.xls");

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


<table border="0" WIDTH="100%">
<tr><td width="30%"> </td>
<td align="center">DETALLE DIARIO</td><td align="right">Kardex</td></tr>
</table>

<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="descrip">
<tr><th>&nbsp;nombre&nbsp;</th><th>Banco</th><th>No Cuenta </th><th>Saldo </th></tr>
<?php
while ($row2 = mysql_fetch_array($row)) {
?>
<tr ><td WIDTH="18%" > <?php echo $row2['nomb_usu'] ?> </td>
<td WIDTH="18%"> <?php echo $row2['nbanco'] ?></td><td WIDTH="10%"><?php echo $row2['ncta'] ?></td><td WIDTH="8%"> <?php echo number_format($row2['saldodia'],2) ?></td>';
</tr>
<?php } ?>
</table>
<br />

<?php
$fila = mysql_query("SELECT * FROM diario WHERE idbco='$dd' ");
$cero=0.00;
$saldoant=0.00;
$saldoa=0;
$sw=0;
$ti=0.00;
$te=0.00;
?>



<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="descrip">
<tr><th>&nbsp;Fecha&nbsp;</th><th>No Orden</th><th>Responsable</th><th>Detalle</th><th>Ingreso</th><th>Egreso</th><th>Saldo</th></tr>
<?php
while ($fila2 = mysql_fetch_array($fila)) {
	$fffe= date("d-m-Y", strtotime($fila2['fechadiario']) );
?>
<tr ><td WIDTH="8%" ><?php echo $fffe ?> </td><td WIDTH="8%" align="center"> <?php echo $fila2['nrecibo'] ?></td><td WIDTH="10%" align="center"> <?php echo $fila2['responsable'] ?></td><td WIDTH="10%" align="center"><?php echo $fila2['detalle'] ?></td>
<?php
if($fila2['tmv']=='ID'){
	$ti+=$fila2['importe'];
	if ($sw=0){$saldoa=$saldoant+$fila2['importe'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant+$fila2['importe'];$saldoant=$saldoa;}
?>
	<td WIDTH="9%" align="center"> <?php echo number_format($fila2['importe'],2) ?></td>
	<td WIDTH="9%" align="right"> </td>
<?php
}else{
	$te+=$fila2['importe'];

	if ($sw=0){$saldoa=$saldoant-$fila2['importe'];$saldoant=$saldoa;$sw=1;}else{$saldoa=$saldoant-$fila2['importe'];$saldoant=$saldoa;}
?>
	<td WIDTH="9%" align="right"> </td>
	<td WIDTH="9%" align="center"> <?php echo number_format($fila2['importe'],2) ?></td>

<?php } ?>


<td WIDTH="9%" align="right"> <?php echo number_format($saldoa,2) ?></td>

</tr>
	
<?php } ?>
</table>
<?php
$tt=$ti-$te;
?>
<br />
<table border="1" cellspacing="5" cellpadding="8%" WIDTH="100%" class="base">
<tr ><td align="right">Total Ingresos :</td><td><?php echo number_format($ti,2) ?></td><td align="right">Total Egresos :</td><td WIDTH="13%" ><?php echo number_format($te,2) ?></td><td align="right">Saldo :</td><td WIDTH="13%" ><?php echo number_format($tt,2) ?></td></tr>
</table>








</body>
</html>