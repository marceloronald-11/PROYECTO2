<?php 
if (!isset($_SESSION)) {session_start();}
?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="table table-bordered tamm">
	    <thead>
	        <tr>
	            <td>Descripci&oacute;n</td>
	            <td align="center" >Cantidad</td>
	            <td align="center">Unidad</td>
	            <td align="center">Precio</td>
				<td align="center">Subtotal</td>
	            <td align="center">Acciones</th>
	        </tr>
	    </thead>
	    <tbody>
     

	    	<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$total += $det['subtotal'];
	    	?>
	        <tr>
	        	<td><?php echo $det['descripcion'];?></td>
	            <td align="center"><?php echo $det['cantidad'];?></td>
	            <td align="center"><?php echo $det['umed'];?></td>

	            <td align="right"><?php echo number_format($det['precio'],2);?></td>
				<td  align="right"><?php echo number_format($det['subtotal'],2);?></td>

	            <td align="center"><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $det['id'];?>" subx="<?php echo $det['subtotal'];?>"><span class="glyphicon glyphicon-remove"></span></button></td>
	        </tr>
	        <?php }?>
	        <tr>
	        	<td colspan="4" class="text-right">Total</td>
	        	<td align="right"><?php echo number_format($total,2);?></td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
<?php }else{?>
<div class="panel-body"> No existen Registros</div>
<?php }?>

<script src="../js_raos/myjavaVentasfac.js"></script>