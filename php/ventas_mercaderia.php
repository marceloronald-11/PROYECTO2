<?php 
session_start();
$_SESSION['detalle'] = array();

require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';

$objProducto = new Producto1();
$resultado_producto = $objProducto->get();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MODULO DE VENTAS</title>

    <!-- Bootstrap -->
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  	<script src="../js/jquery.js"> </script>
    <script type="text/javascript" src="../libs/ajax1.js"></script>
	
	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
  </head>

  <body>
 	<div class="container">
 		
 		<div class="page-header">
			<h1>MODULO DE VENTAS</h1>
            	<div class="row">
            		<div id="salir" class="col-md-2">
                    <a href="../php/ventas.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> INICIO </a>
            		</div>
            	</div>
            
            
            
		</div>
 		<div class="row">
			<div class="col-md-4">	
				<div>Elegir un Producto:
				<select name="cbo_producto" id="cbo_producto" class="col-md-2 form-control">
					<option value="0">Seleccione un producto</option>
					<?php foreach($resultado_producto as $producto):?>
						<option value="<?php echo $producto['id_prod']?>"><?php echo $producto['nomb_prod']?></option>
					<?php endforeach;?>
				</select>
				</div>
			</div>
			<div class="col-md-2">
				<div>Cantidad:
				  <input id="txt_cantidad" name="txt_cantidad" type="text" class="col-md-2 form-control" placeholder="Ingrese cantidad" autocomplete="off" />
				</div>
			</div>
			<div class="col-md-2">
				<div style="margin-top: 19px;">
				<button type="button" class="btn btn-success btn-agregar-producto" class="list-group-item active"><span class="glyphicon glyphicon-plus-sign"></span>..Agregar</button>
				</div>
			</div>
		</div>
		
		<br>
		<div class="panel panel-info">
			 <div class="panel-heading">
		        <h3 class="panel-title">Productos</h3>
		      </div>
			<div class="panel-body detalle-producto">
				<?php if(count($_SESSION['detalle'])>0){?>
					<table class="table">
					    <thead>
					        <tr>
					            <th>Descripci&oacute;n</th>
					            <th>Cantidad</th>
					            <th>Precio</th>
					            <th>Subtotal</th>
					            <th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	foreach($_SESSION['detalle'] as $k => $detalle){ 
					    	?>
					        <tr>
					        	<td><?php echo $detalle['producto'];?></td>
					            <td><?php echo $detalle['cantidad'];?></td>
					            <td><?php echo $detalle['precio'];?></td>
					            <td><?php echo $detalle['subtotal'];?></td>
					            <td><button type="button" class="btn btn-sm btn-danger eliminar-producto" id="<?php echo $detalle['id'];?>">Eliminar</button></td>
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
				<?php }else{?>
				<div class="panel-body"> No hay productos agregados</div>
				<?php }?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<!--<button type="button" class="btn btn-sm btn-default guardar-carrito">Guardar</button>-->
                <button type="button" class="btn btn-sm btn-warning irmodal">CERRAR NOTA</button>
			</div>
		</div>
 	</div>
    
    
     <!--MODAL VENTANA --->       
<div class="container">       
   <div id="myModal" class="modal fade bs-example-modal-lg" data-backdrop="static", data-keyboard="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">DATOS DEL CLIENTE</h4>
                </div>
                
                <div class="modal-body">
                
        			<div class="row">
                	<form class="form">
	           			<!--<div class="col-md-12"> 
                			<div class="form-group">
                   			 <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> 
                    			<input type="text" class="form-control" placeholder="Nombre del cliente" id="encargado">
                			</div> -->
                            
                            <div class="form-group">
    							<label for="inputEmail3" class="col-sm-2 control-label">Sr(a):</label>
						    	<div class="col-sm-10">
      							<input type="text" class="form-control" id="encargado" placeholder="Encargado">
						    	</div>
							</div>
            		</form>                     
                    </div>  
         			<!--</div>  -->
                                 
                 </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">SALIR</button>
                    <button type="button" class="btn btn-primary guardar-carrito2 btn-lg">GUARDAR NOTA</button>
                </div>
            </div>
            
        </div>
      
 	</div>





</div>
    
 	<script src="../bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
