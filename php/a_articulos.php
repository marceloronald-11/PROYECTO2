<!doctype html>
<html>
<head>
<?php
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$resultado_producto = $objProducto->getp();
// $foto = $objProducto->getById($id);

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
<script src="../js/myjava.js"></script>
<script src="../js/jquery.numeric.js"></script>

</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4" style="background-color:black;">
<img src="../recursos/logo-demo.jpg" width="70" height="70">
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:red;">
<h4>MODULO DE ARTICULOS</h4>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4" style="background-color:black;">
<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">Exportar a PDF</a>
<a href="../php/ventas.php" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> INICIO</a>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<div class="row"> 
<div class="col-sm-2" style="background-color:blue;">

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
                 

    <table border="1" align="center" class="table-condensed" width="100%">
    
    	<tr>
        	<td width="300">BUSCAR ARTICULO:<input type="text" placeholder="Busca un producto por: Nombre o Grupo" id="bs-prod"/></td>
        
           
     	<td width="100"><button id="nuevo-producto" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span> Nuevo</button></td>

        </tr>
        
    </table>
</section>
<div class="registros" id="agrega-registros" style="width:100%;"></div>
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
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Producto</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
  <td colspan="2"><input type="text"   id="id-prod" name="id-prod" readonly style="visibility:hidden;height:5px;"/></td>
                    </tr>
                    
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required readonly id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                    	<td>Nombre: </td>
                        <td><input type="text" required name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    
                    
                    
                <tr>  
				<td>Proveedor:</td>
				<td><select name="tipo" id="tipo" required class="form-control">
					<option value="0">Seleccione un Proveedor</option>
					<?php foreach($resultado_producto as $producto):?>
						<option value="<?php echo $producto['id_prov']?>"><?php echo $producto['nombre']?></option>
					<?php endforeach;?>
				</select></td>
                </tr>
                    <tr>
                    	<td>Precio Neto: </td>
                        <td><input type="text"  required name="precio-dis" id="precio-dis"/></td>
                    </tr>
                    <tr>
                    	<td>Precio Venta: </td>
                        <td><input type="text" required name="precio-uni" id="precio-uni" /></td>
                    </tr>
                    <tr>
                    	<td>Grupo : </td>
                        <td><input type="text"  required name="grupo" id="grupo"/></td>
                    </tr>
                    
             <!--       <input class="decimal-2-places" type="text" /> -->
                    
                    
                   <!-- <tr>
                    	<!--<td>Marca: </td>
                        <td><input type="text"  required="required" name="marca" id="marca" style="visibility:hidden; height:5px;" /></td>
                    </tr>-->                    
                    <!--<tr>
                    	<!--<td>Modelo: </td>
                        <td><input type="text"  required="required" name="modelo" id="modelo" style="visibility:hidden; height:5px;"/></td>
                    </tr> --> 
                    <!--<tr>
                    	<td>Serial: </td>
                        <td><input type="text"  required="required" name="serial" id="serial" style="visibility:hidden; height:5px;"/></td>
                    </tr>-->                      
                    <tr>
                    	<td>Codigo: </td>
                        <td><input type="text"  required="required" name="codigo" id="codigo"/></td>
                    </tr>  
                    <!--    <tr>
                	<td>Cantidad: </td> 
                        <td><input type="text"  required="required"  readonly="readonly" name="cant" id="saldo" value=0 style="visibility:hidden; height:5px;" /></td>
                    </tr>  -->
                    
                    
                    
                                        

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

<!--- fin modal -->    

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

    
    
</div> <!-- fin container -->

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
