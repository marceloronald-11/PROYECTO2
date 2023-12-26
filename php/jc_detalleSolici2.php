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
                <td align="center">U.med.</td>
	            <td align="center">Cant.</td>
				<td>Prioridad</td>

	        </tr>
	    </thead>
	    <tbody>
	    	<?php 

//$_SESSION['detalle'][$coddx] = array('codrep1'=>$codrepx,'codd1'=>$coddx,'detar1'=>$detarx, 'ume1'=>$umex, 'cantt1'=>$canttx, 'tpri1'=>$tprix);

	    	$itm = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			$itm += 1;
			$pri='';
			if($det['tpri1']=='AL'){ $pri='Alta';}
			if($det['tpri1']=='MD'){ $pri='Media';}
			if($det['tpri1']=='BJ'){ $pri='Baja';}

			?>
	        <tr>
                <td><?php echo $itm;?></td>
                <td><?php echo $det['codd1'];?></td>
	            <td><?php echo $det['detar1'];?></td>
	            <td align="center"><?php echo $det['ume1'];?></td>
	            <td align="center"><?php echo $det['cantt1'];?></td>
	            <td align="center"><?php echo $pri;?></td>
				
				<td align="center"><button type="button" class="btn btn-sm btn-danger lineaBorrar" id="<?php echo $det['detar1'];?>" subx="<?php echo $det['cantt1'];?>"><span class="glyphicon glyphicon-remove"></span></button></td>

	           
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
<script src="../js/myjavaSolici2.js"></script>

