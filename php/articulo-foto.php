<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$resultado_producto = $objProducto->getp();
// $foto = $objProducto->getById($id);

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ARTICULOS 2015</title>
<link href="../css/estiloo.css" rel="stylesheet">
<!--<script src="../js/jquery.numeric.js"></script>-->
<script src="../js/jquery.js"></script>
<script src="../js/myjavafoto.js"></script>

<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script><br />

</head>
<body>

<header>IMAGENES DE ARTICULOS </header>
    <section>
                 

    <table border="0" align="center">
    
    	<tr>
        	<td width="335">FILTRAR PRODUCTO:<input type="text" placeholder="Busca un producto por Nombre" id="bs-prod"/></td>
           <td width="100"><a href="../php/ventas.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> INICIO </a></td>
        <!--    <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td>
            <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>-->
        </tr>
        
    </table>
</section>
<div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>

</center>
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Producto</b></h4>
            </div>
<!--           <form id="formulario" class="formulario" onsubmit="return agregaRegistro();"> -->
        <!--    <form   method="post" enctype="multipart/form-data"  id="formulario" class="formulario" onsubmit="return agregaRegistro();"> -->
             <form id="formulario" enctype="multipart/form-data" class="formulario" onsubmit="return agregaRegistro();">
            
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
        <td colspan="2"><input type="text" required="required"  id="id-prod" name="id-prod" style="visibility:hidden;height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                    	<td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    
                    
                    
                <tr>  
				<td>Tipo:</td>
				<td><select name="tipo" id="tipo" >
					<option value="0">Seleccione un Proveedor</option>
					<?php foreach($resultado_producto as $producto):?>
						<option value="<?php echo $producto['id_prov']?>"><?php echo $producto['nombre']?></option>
					<?php endforeach;?>
				</select></td>
                </tr>
				                    
    
                    
                    <tr>
                    	<td>Precio Neto: </td>
                        <td><input type="text" required="required" name="precio-uni" id="precio-uni" /></td>
                    </tr>
                    <tr>
                    	<td>Precio de Venta: </td>
                        <td><input type="text"  required="required" name="precio-dis" id="precio-dis"/></td>
                    </tr>
                    
             <!--       <input class="decimal-2-places" type="text" /> -->
                    
                    
                    <tr>
                    	<td>Marca: </td>
                        <td><input type="text"  required="required" name="marca" id="marca"/></td>
                    </tr>                    
                    <tr>
                    	<td>Modelo: </td>
                        <td><input type="text"  required="required" name="modelo" id="modelo"/></td>
                    </tr>  
                    <tr>
                    	<td>Serial: </td>
                        <td><input type="text"  required="required" name="serial" id="serial"/></td>
                    </tr>                      
                    <tr>
                    	<td>Codigo: </td>
                        <td><input type="text"  required="required" name="codigo" id="codigo"/></td>
                    </tr>  
                    <tr>
                    	<td>Cantidad: </td>
                        <td><input type="text"  required="required"  readonly="readonly" name="cant" id="saldo" value=1 /></td>
                    </tr>  
                  <tr>
                    	<td>Imagen: </td>
                        <td><input type="file" name="file" id="foto"></td>
                    </tr>                      
                    
                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                </table>
            </div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
        
        
</div>
<!--- fin -->
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
					<div class="modal-body" id="espacio-foto" class="img-responsive">
                    
                    </div>
				<!--header footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
				</div>
			</div>
		</div>
</div>
<!-- fin foto -->
</body>
</html>
