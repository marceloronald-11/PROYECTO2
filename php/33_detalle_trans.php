<?php 
//@session_start();
if (!isset($_SESSION)) {session_start();}

?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="table ttam">
	    <thead>
	        <tr>
	            <th>Codigo</th>
	            <th>Descripci&oacute;n</th>
	            <th>Cant.</th>
	            <th>Precio</th>

				<th>Subtotal</th>

	            <th></th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 
			
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$total += $det['precio']*$det['cantidad'];
	    	?>
	        <tr>
	            <td><?php echo $det['codigo'];?></td>
	        	<td><?php echo $det['descripcion'];?></td>
	            <td><?php echo $det['cantidad'];?></td>
	            <td><?php echo number_format($det['precio'],2);?></td>

				<td align="right"><?php echo number_format($det['subtotal'],2);?></td>

	            <td><button type="button" class="btn btn-sm btn-danger eliminar-item" id="<?php echo $det['id'];?>"><span class="glyphicon glyphicon-remove"></span></button></td>
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
<div class="panel-body"> No hay Datos Agregados</div>
<?php }?>

<!--<script type="text/javascript" src="../libs/ajax1.js"></script> -->
<script src="../js/33_java_trans2.js"></script>