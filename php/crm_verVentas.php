<?php
include('conexion.php');

$norden = $_POST['id'];//norden

$row = mysqli_query($conexion,"SELECT * FROM movimtot AS mv LEFT JOIN usuarios AS u On mv.id_usu=u.id_usu WHERE mv.norden='$norden'");
$ttt=0.00;
while ($row2 = mysqli_fetch_array($row)) {
$nordenx=$row2['norden'];
$afavorx=$row2['afavor'];
$nombusu=$row2['nomb_usu'];

$ttt=$ttt+$row2['totimporte'];
$fe2= date("d-m-Y", strtotime($row2['fechato']) );
}

?>
<table  border="1"  WIDTH="100%" >
<tr><td width="70%" class="fa6"><h2>NOTA DE VENTA</h2></td><td align="left" class="fa5"> POLYTEX</td></tr> 
</table>

<table  border="0"  WIDTH="100%" class="border">
<tr><td>No Orden :</td><td align="left"><?php echo $nordenx;?></td></tr>
<tr><td>Fecha :</td><td align="left"><?php echo $fe2;?></td></tr>
<tr><td>Sr(es) :</td><td align="left"><?php echo $afavorx;?></td>
<td>Vendedor:</td><td align="left"><?php echo $nombusu;?></td></tr>

</table>
<?php
$roww = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$norden'");
?>
<table border="1"  WIDTH="100%" class="tablita" >
<tr class="raya"><td align="center">CANT.</td><td align="center">DETALLES</td ><td align="center">P.UNIT.</td><td align="center">SUBTOTAL</td></tr>
<?php
	$tt=0;
	$impue=0;	
while ($row22 = mysqli_fetch_array($roww)) {
	$tt+=$row22['subtot'];
?>
<tr ><td WIDTH="5%" align="center" class="tablita"><?php echo $row22['cant'];?></td>
<td><a href="javascript:editarCli('<?php echo $row22['codt'];?>');" data-toggle="tooltip" title="Elegir"><?php echo $row22['descripdt'];?></a></td>
	<td WIDTH="7%" align="right" class="tablita"><?php echo $row22['precio'];?></td>
	<td WIDTH="10%" align="right" class="tablita"><?php echo $row22['subtot'];?></td>

</tr>
<?php	
}
	$impue=($tt*0.13);
?>
<tr><td colspan="3" align="center">Total </td><td align="right"><?php echo number_format($ttt,2);?></td></tr>	
</tr>	
	
<tr><td colspan="4"><a href="crm_devVentas.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar "> SALIR</a></td></tr>	
</table>	




