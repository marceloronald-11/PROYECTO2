<?php 
//@session_start();
if (!isset($_SESSION)) {session_start();}

?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table class="table table-bordered">
	    <thead>
	        <tr>
                <td>Item</td>
                <td>Codigo</td>
                <td>Descripcion</td>
                <td align="center">Cant.</td>
	            <td align="right">P.Unit.</td>
	            <td align="right">Costo U$</td>
	            <td align="right">Importe Bs.</td>
	            <td align="right">Stock</td>

	        </tr>
	    </thead>
	    <tbody>
	    	<?php 

//$_SESSION['detalle'][$detarx] = array('codrep1'=>$codrepx,'codd1'=>$coddx,'detar1'=>$detarx, 'peu'=>$peux, 'cantt1'=>$canttx, 'cost'=>$costx, 'sto'=>$stox, 'tca'=>$tcax, 'imbs'=>$imbsx);

	    	$itm = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$itm += 1;
			$pri='';
			$iimpo=$det['peu']*$det['cantt1'];
			?>
	        <tr>
                <td><?php echo $itm;?></td>
                <td><?php echo $det['codd1'];?></td>
	            <td><?php echo $det['detar1'];?></td>
	            <td align="center"><?php echo $det['cantt1'];?></td>
	            <td align="right"><?php echo $det['peu'];?></td>
                <td align="right"><?php echo $det['cost'];?></td>
                <td align="right"><?php echo $iimpo ;?></td>
                <td align="right"><?php echo $det['sto'];?></td>

	            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $det['detar1'];?>"><span class="glyphicon glyphicon-remove"></span></button></td>
	        </tr>
	        <?php }?>
	        <!-- <tr>
	        	<td colspan="5" class="text-right">Total</td>
	        	<td><?php //echo number_format($totalc,2);?></td>
	        	<td></td>
	        </tr> -->
	    </tbody>
	</table>
    <!-- <button type="button" class="btn btn-danger" id="btn-GuardaSoli">Guardar Nota</button> -->
<?php }else{?>
<div class="panel-body"> No hay Datos Agregados</div>
<?php }?>

<script src="../js_raos/myjavaVales2.js"></script>