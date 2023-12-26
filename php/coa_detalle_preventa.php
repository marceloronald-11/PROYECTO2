<?php 
if (!isset($_SESSION)) {session_start();}
?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="table table-bordered  tamm">
	    <thead>
	        <tr>
	            <td>Producto</td>
	            <td>Cantidad</td>
	            <td>U.Med.</td>
	            <td>Precio</td>
				<td>Subtotal</td>
	            <td align="center">Eliminar</td>
	        </tr>
	    </thead>
	    <tbody>

	    	<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$total += $det['subtot'];
	    	?>
	        <tr>
	        	<td><?php echo $det['desscri'];?></td>
	            <td><?php echo $det['cantx'];?></td>
	            <td><?php echo $det['umedx'];?></td>
				
	            <td><?php echo number_format($det['precio'],2);?></td>
				<td ><?php echo number_format($det['subtot'],2);?></td>
	            <td align="center"><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $det['nro'];?>" subx="<?php echo $det['subtot'];?>"><span class="glyphicon glyphicon-remove"></span></button></td>
	        </tr>
	        <?php }?>
	        <tr>
	        	<td colspan="4" class="text-right">Total</td>
	        	<td><?php echo number_format($total,2);?></td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
<input type="button"  value="Registrar Pedido" class="btn btn-info btn-lg btnGuardarVta titu"/>
<?php }else{?>
<div class="panel-body"> No existen Registros....</div>
<?php }?>

<script src="../js_raos/myjavaCoaPreventa.js"></script>