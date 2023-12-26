<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
session_start();
$_SESSION['detalle'] = array();

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$resultado_producto = $objProducto->getp();
// $foto = $objProducto->getById($id);

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VENTAS 2016</title>
<link href="../css/estiloa.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#precio-uni').numeric(".");
    $('#precio-dis').numeric("."); 
    $('#nnota').numeric("."); 
    $('#cantidad').numeric("."); 

});
</script>

<script src="../js/myjava2016.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container-fluid">
<div class="row arriba">
	 <header>MODULO DE VENTAS</header>
</div>
<div class="row medio">
<h3 align="center" class="fecha">  <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "La Paz , ".$array[date("w")]." ".date("d-m-y"); ?> </h3>
</div>

<div class="row lad1"> <!--inicio lad1 -->
<section class="col-md-6">
                 

    <table border="0" align="center">
    
    	<tr>
        	<td width="500">Filtrar por Articulo:<input type="text" placeholder="Busca un producto por: Nombre" id="bs-prod"/></td>
            <!--<td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td> -->
<!--            <td width="100"><button id="nuevo-producto" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar a PDF</a></td> 
<td width="100"><button type="button" class="btn btn-success btn-agregar-producto" class="list-group-item active"><span class="glyphicon glyphicon-plus-sign"></span>..Agregar</button></td> -->
     	<td width="100"><a href="../php/ventas.php" class="list-group-item active "><span class="glyphicon glyphicon-home"></span> INICIO </a></td>

        </tr>
        
    </table>
<!--</section>-->
<div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</section>




<div class="panel panel-info col-md-6">
			 <div class="panel-heading">
		        <h1 class="panel-title">GENERANDO VENTAS...</h1><br>
                <button type="button" class="btn btn-sm btn-warning irmodal"><span class="glyphicon glyphicon-check"></span> CERRAR VENTA</button>
                <button type="button" class="btn btn-sm btn-danger limpiacarro"><span class="glyphicon glyphicon-remove"></span> CANCELAR VENTA</button>
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
				<div class="panel-body">No existen Articulos en Proceso</div>
				<?php }?>
			</div>
</div>

</div>

</div>





<!-- modal de CERRAR NOTA -->
<div id="myModal" class="modal fade bs-example-modal-lg" data-backdrop="static", data-keyboard="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">DATOS DEL CLIENTE</h4>
                    <br />
                     <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "La Paz , ".$array[date("w")]." ".date("d-m-y"); ?>
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
      							<input type="text" class="form-control" id="encargado" placeholder="Nombre del Proveedor"><br />
                                
    							<label for="nnota" class="col-sm-2 control-label">No Recibo:</label>
      							<input type="text" class="form-control" id="nnota" placeholder="No de Recibo">

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
<!-- FIN DE CERRAR NOTA -->

<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalfoto" data-backdrop="static", data-keyboard="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN DEL ARTICULO</h4>
				</div>
				<!--header cuerpo -->
					<div  id="espacio-foto"> </div>
				<!--header footer -->
				<div class="modal-footer">

					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
					
				</div>
			</div>
		</div>

</div>     
<!-- fin foto -->    
    
    
    
    
    
    
<!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->

<div class="container">
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>DATOS DEL ARTICULO</b></h4>
                                   <div id="mensaje"></div>  
            </div>
            
            <div class="modal-body">
            <form id="formulario" class="formulario "  onsubmit="return agregaRegistro();" > 
<input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" style="visibility:hidden;height:5px;" />
<input style="visibility:hidden;height:5px;" type="text" required="required" readonly="readonly" id="pro" name="pro"/>
<br/>
<label for="nombre" class="control-label">Nombre:</label>
<input class="form-control" type="text"  name="nombre" id="nombre"  readonly="readonly"/>
<label for="precion-dis" class="control-label">Precio Neto:</label>
<input  class="form-control" type="text"  name="precio-dis" id="precio-dis" readonly="readonly"/>
<label for="precion-uni" class="control-label">Precio Venta:</label>
<input class="form-control" type="text"  name="precio-uni" id="precio-uni" readonly="readonly" />
<label for="grupo" class="control-label">Grupo:</label>
<input class="form-control" type="text"   name="grupo" id="grupo" readonly="readonly"/>
<label for="codigo" class="control-label">Codigo:</label>
<input class="form-control" type="text"   name="codigo" id="codigo" readonly="readonly"/>
<label for="cantidad" class="control-label">Cantidad:</label>
<input class="form-control" type="text"    name="cantidad" id="cantidad" value="1" />
<br/>
<br/>
<br/>
           </form>	
 
            </div> <!--modal body-->
            
          

            <div class="modal-footer">
 
<button class="btn btn-warning btn-agregar-producto"><span class="glyphicon glyphicon-plus-sign"></span> Agregar a la Nota</button>            
            	<input style="visibility:hidden; height:5px;" type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input style="visibility:hidden; height:5px;" type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-success" data-dismiss="modal">CERRAR</button>
            </div>
            
          </div> <!--modal-content-->
        </div> <!--modal-dialog -->
        
        
	</div> <!--modal fade -->


</div> <!--fin container -->
<div class="row bajo"></div>

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
