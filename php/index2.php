<?php 
session_start();
$_SESSION['detalle'] = array();

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';

$objProducto = new Producto();
$resultado_producto = $objProducto->get();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carrito de Compras</title>

    <!-- Bootstrap -->
    <link href="../libs/css/bootstrap.css" rel="stylesheet">
    <script src="../libs/js/jquery.js"></script>
    <script src="../libs/js/jquery-1.8.3.min.js"></script>
    <script src="../libs/js/bootstrap.min.js"></script>
   	
    <script type="text/javascript" src="../libs/ajax.js"></script>
	
	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
  </head>

  <body>
 	<div class="container">
 		
 		<div class="page-header">
			<h1>Carrito de Compras con Base de datos</h1>
		</div>
 		<div class="row">
			<div class="col-md-4">	
				<div>Producto:
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
				<button type="button" class="btn btn-success btn-agregar-producto">Agregar</button>
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
			<div class="col-md-12 text-right">
				<!--<button type="button" class="btn btn-sm btn-default guardar-carrito">Guardar</button>-->
                <button type="button" class="btn btn-sm btn-default irmodal">FINALIZAR NOTA</button>
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
                    <h4 class="modal-title">REGISTRANDO DATOS DE LA NOTA</h4>
                </div>
                
                <div class="modal-body">
        			<div class="row">
                	<form class="form">
	           			<div class="col-md-10">
                			<div class="input-group">
                   			 <!--<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> -->
                    			<input type="text" class="form-control" placeholder="Nombre del cliente" id="encargado">
                			</div>
           				 </div>   
            		</form>                     
         			</div>               
                 </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">SALIR</button>
                    <button type="button" class="btn btn-primary guardar-carrito2 btn-lg">GUARDAR NOTA</button>
                </div>
            </div>
            
        </div>
      
 	</div>
</div>
    
    
  </body>
</html>
