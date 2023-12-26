<?php 
//@session_start();
if (!isset($_SESSION)) {session_start();}
?>
<?php if(count($_SESSION['detalle'])>0){?>
	<table  class="table table-bordered ltam">
	        <tr>
				<td align="center">Cant</td>	            
                <td align="center">Descripcion</td>
	            <td align="center">Codigo</td>
	            <td align="center">U.Med.</td>
	            <td align="center">Neto</td>

				<td>Opcion</td>
	        </tr>
	    <tbody>



	    	<?php 
	    	$total = 0;
	    	foreach($_SESSION['detalle'] as $det){ 
			//$total += $det['subtotal'];
			if ($det['id']==0){$nw='Nuevo';}else{$nw='';}
	    	?>
	        <tr>
	        	<td><?php echo $det['cant'];?></td>
                <td><?php echo $det['descrip'];?></td>
	            <td align="center"><?php echo $det['cod'];?></td>
	            <td align="center"><?php echo $det['ume'];?></td>
	            <td align="center"><?php echo $det['pn'];?></td>

	            <td><button type="button" class="btn btn-sm btn-success eliminar-detalle" id="<?php echo $det['cod'];?>"><span class="glyphicon glyphicon-remove data-toggle="tooltip" title="Eliminar Item" "></span></button></td>
	        </tr>
	        <?php }?>
	    </tbody>
	</table>
<?php }else{?>
<div class="panel-body"> Sin Registros</div>
<?php }?>

<!--<script type="text/javascript" src="../libs/ajax1.js"></script> -->
<script src="../js/33_java_devo.js"></script>