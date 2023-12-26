<!doctype html>
<html>
<head>
<?php
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$resultado_producto = $objProducto->getp();

$categoria=$objProducto->getCategoria();


?>

<meta charset="utf-8">
<title>Almacenes</title>
<link href="../css/estiloo.css" rel="stylesheet">
    	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
		<script type="text/javascript" src="../js/script/jquery.js"></script>
		<script type="text/javascript" src="../js/script/jqueryui.js"></script>
        
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>


<!-- pluging Bootstrap -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<style type="text/css">
.alto {
	height: 100px;
}
.btn.btn-primary.btn-sm.iconito {
	margin-top: 40px;
	margin-left: 30px;
}
</style>

<script src="../js/myjava.js"></script>
<script src="../js/jquery.numeric.js"></script>

</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-2 alto" style="background-color:black;">
<img src="../recursos/logo-demo.jpg" width="70" height="70">
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-7 alto" style="background-color:red;">
<h4>MODULO DE ARTICULOS</h4>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-3 alto" style="background-color:black;">

<a href="../php/ventas.php" class="btn btn-primary btn-sm iconito"><span class="glyphicon glyphicon-plus"></span> INICIO</a>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<div class="row"> 
<div class="col-sm-2" style="background-color:white;">
<br>
<div class="btn-group-vertical">
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Articulos</a>
<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Edicion de Datos</a>
<a href="#" class="btn btn-primary">Compras</a>
<a href="#" class="btn btn-primary">Ventas</a>
<a href="#" class="btn btn-primary">Reportes</a>
<a href="#" class="btn btn-primary">Grupos</a>
<a href="#" class="btn btn-primary">Usuarios</a>
</div>

</div> <!-- fin col-sm-2 -->


<div class="col-sm-10" style="background-color:white;">
    <section>
                 

    <table border="0" align="center" class="table-condensed" width="100%">
    
    	<tr>
        	<td width="30%">BUSCAR ARTICULO:<input type="text" placeholder="Buscar Articulo" id="bs-prod"/></td>
        	<td width="50%"></td>
        
           <td width="10%">
<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">Exportar a PDF</a>           
           </td>
   		<td width="10%"><button id="nuevo-producto" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></td>

        </tr>
        
    </table>
</section>
<div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    
    
    
</div>
 <!-- fin col-sm-10 -->
</div> <!-- fin row -->



<div class="row"> 
<div class="col-sm-12" style="background-color:green;">
pie
</div> <!-- fin col-sm-2 -->

</div> <!-- fin row -->
  

  <!-- Modal -->
  <div class="modal fade" id="registra-producto" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FORMULARIO ARTICULO</h4>
        </div>

<form id="formulario" class="formulario form-horizontal" onsubmit="return agregaRegistro();">
        
        <div class="modal-body">
            
		<input type="hidden" required readonly id="id-prod" name="id-prod" >
		<input type="hidden" class="form-control" id="pro" name="pro">
			    
                <div class="form-group">
        			<label class="control-label col-xs-3" for="codigo">Articulo:</label>
                    <div class="col-xs-8">
        			<input type="text" class="form-control" name="nombre" id="nombre" required placeholder="Descripcion Articulo">
                    </div>
    			</div>

   				<div class = "form-group">
      			<label for = "depto" class="control-label col-xs-3">Categoria:</label>
                <div class="col-xs-8">
					<select name="tipo" id="tipo" class="form-control" >
                    <option value="0">Ninguno</option>
						<?php foreach($categoria as $datcat):?>
                        <option value="<?php echo $datcat['id_cat']?>"><?php echo $datcat['descripcat']?></option>
						<?php endforeach;?>
					</select>
   				</div>
                </div>

   				<div class = "form-group">
      			<label for = "cat" class="control-label col-xs-3">Proveedor:</label>
                <div class="col-xs-8">
					<select name="tipo" id="tipo" class="form-control" >
                    <option value="0">Ninguno</option>
						<?php foreach($resultado_producto as $producto):?>
                        <option value="<?php echo $producto['id_prov']?>"><?php echo $producto['nombre']?></option>
						<?php endforeach;?>
					</select>
   				</div>
                </div>


                <div class="form-group">
        			<label class="control-label col-xs-3" for="codigo">Precio Venta:</label>
                    <div class="col-xs-8">
        			<input type="text" class="form-control" name="precio-dis" id="precio-dis" placeholder="Descripcion Articulo">
                    </div>
    			</div>

                <div class="form-group">
        			<label class="control-label col-xs-3" for="codigo">Precio Neto:</label>
                    <div class="col-xs-8">
        			<input type="text" class="form-control" name="precio-uni" id="precio-uni" placeholder="Descripcion Articulo">
                    </div>
    			</div>
                <div class="form-group">
        			<label class="control-label col-xs-3" for="codigo">Grupo:</label>
                    <div class="col-xs-8">
        			<input type="text" class="form-control" name="grupo" id="grupo" placeholder="Descripcion Articulo">
                    </div>
    			</div>
                
                <div class="form-group">
        			<label class="control-label col-xs-3" for="stock">Saldo Minimo:</label>
                    <div class="col-xs-8">
        			<input type="text" class="form-control" name="salmin" id="salmin" placeholder="Saldo Minimo">
                    </div>
    			</div>
                
                
                
                <div class="form-group">
        			<label class="control-label col-xs-3" for="codigo">Codigo:</label>
                    <div class="col-xs-8">
        			<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Descripcion Articulo">
                    </div>
    			</div>


		

        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button> 
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/> 
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
        </div>

</form>
        
      </div>
      
    </div>
  </div>
  
<!-- fin modal --->


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
					<div class="modal-body img-responsive" id="espacio-foto"> </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
					
				</div>
			</div>
		</div>

</div>     
<!-- fin foto -->

<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalcargafoto" data-backdrop="static", data-keyboard="true">

		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN DEL ARTICULO</h4>
				</div>
				<!--header cuerpo -->
					<div class="modal-body img-responsive" id="espacio-carga" >
                    
                    </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
				</div>
			</div>
		</div>
</div>
<!-- fin foto -->    
    
</div> <!-- fin container -->

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
