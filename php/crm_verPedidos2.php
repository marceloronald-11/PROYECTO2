<?php
if (!isset($_SESSION)) {session_start();}
$_SESSION['detalle'] = array();
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
<tr><td width="70%" class="fa6"><h2>NOTA DE VENTAS</h2></td><td align="left" class="fa5"> La Paz-Bolivia</td></tr> 
</table>

<table  border="0"  WIDTH="100%" class="border">
<tr><td>No Orden :</td><td align="left"><?php echo $nordenx;?></td></tr>
<tr><td>Fecha :</td><td align="left"><?php echo $fe2;?></td></tr>
<tr><td>Sr(es) :</td><td align="left"><?php echo $afavorx;?></td>
<td>Vendedor:</td><td align="left"><?php echo $nombusu;?></td></tr>

</table>
<?php
$roww = mysqli_query($conexion,"SELECT * FROM movimdet WHERE norden='$norden' ORDER BY codar ASC");
?>

<?php
	$tt1=0;
	$ant=0;
	$cantx=0;
while ($row22 = mysqli_fetch_array($roww)) {
	$tt1=$row22['subtot'];
	$pre2=$row22['pvp'];

	$ant2=$row22['codar'];
	if($ant2==$ant){
		$cantx+=$row22['cant'];
		$st1=$cantx*$pre2;
		$_SESSION['detalle'][$ant2] = array('id'=>$ant2, 'descripcion'=>$row22['descripdt'],'cant'=>$cantx,'precio'=>$pre2,'total'=>$st1);		
		
	}else{
		
		$cantx=$row22['cant'];
		$st1=$cantx*$pre2;
		$_SESSION['detalle'][$ant2] = array('id'=>$ant2, 'descripcion'=>$row22['descripdt'],'cant'=>$cantx,'precio'=>$pre2,'total'=>$st1);	
	}
	$ant=$row22['codar'];
?>

<?php } ?>
	
<table border="1"  WIDTH="100%" class="tablita" >
<tr class="raya"><td align="center">CANT.</td><td align="center">DETALLES</td ><td align="center">P.UNIT.</td><td align="center">SUBTOTAL</td></tr>
<?php if(count($_SESSION['detalle'])>0){?>
<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$total += $det['cant'];
	    	?>
<tr ><td WIDTH="5%" align="center" class="tablita"><?php echo $det['cant'];?></td><td WIDTH="30%" class="tablita"><?php echo $det['descripcion'];?></td><td WIDTH="7%" align="right" class="tablita"><?php echo number_format($det['precio'],2);?></td><td WIDTH="10%" align="right" class="tablita"><?php echo number_format($det['total'],2);?></td>
</tr>
	        <?php }?>

<?php }else{?>
	<div class="panel-body"> No existen Registros</div>
<?php }?>

<tr><td colspan="4"><a href="crm_rep_pedido2.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar "> SALIR</a></td></tr>	
</table>
