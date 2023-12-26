<?php
if (!isset($_SESSION)) {session_start();}
//		$_SESSION['usuario'] = 'admin';
//			$_SESSION['id_area'] = 'admin';
//		$_SESSION['id_usu'] = 1;
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';

if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location:../index.php');
}else{
	if($_SESSION['id_area'] == 'usuarios'){
		header('Location: a_usuario.php');
	}else{
		$usuarios=$_SESSION['usuario'];
		$objusu= new	Producto(); //consulta a codnu
		$usuario= $objusu->getusu($usuarios);
		foreach($usuario as $usu):
			$nombre_u= $usu['nomb_usu'];
			$id_usu= $usu['id_usu'];
			$codde=$usu['coddep'];
		endforeach;
	}
}


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">

<?php
//require_once '../Config/conexion.php';
//require_once '../Model/Productohabita.php';
//
//$objProducto = new Producto();
//$resultado_producto = $objProducto->getp();
//$buscareg = $objProducto->getreg();

//foreach($buscareg as $nnreg): 
//$nreg=$nnreg['nreg']+1;//echo $nreg;
//endforeach;

//$objusuarios = new Producto();
//$uusuarios = $objusuarios->getusuarios();
$objgrupos = new Producto();
//$grupos = $objgrupos->getgrupo();
$depto = $objgrupos->getdepto();


$objgrupos = new Producto();
//$grupos = $objgrupos->getgrupo();
$proveedor = $objgrupos->getprovee();



// $foto = $objProducto->getById($id);

?>
<title>MODULO ARTICULOS</title>
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

<script src="../js/myjavaart.js"></script>

<script src="../js/jquery.numeric.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#neto').numeric(".");
    $('#pvp').numeric("."); 
    $('#contiene').numeric("."); 

});
</script>

<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000;
}
.datt {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000;
}
body {
	background-image: url(../recursos/fondo_adm.jpg);
}
.col-md-2.menuu {
	background-color: #390;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #FFF;
	margin-top: 50px;
}
.row .col-md-4.administrador {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
	color: #309;
	padding-top: 35px;
}
.botoncitos {
	font-family: Arial, Helvetica, sans-serif;
	color: #FF0;
	font-size: 14px;
}

.nav.nav-tabs.navbar-inverse {
	color: #FFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>


</head>
<body>
<div class="container">
<div class="row">
<br>
<div class="col-md-4">
  <img src="../recursos/dmo.png" width="140" height="80">
</div> 
<div class="col-md-4 administrador">
  <center><?php echo 'BIENVENIDO :'.$nombre_u; ?></center>
  <center><h3>MODULOS DE ARTICULOS</h3></center>

</div> 

<div class="col-md-4">
  <img src="../recursos/administrador.png" align="right"  width="100" height="100">
</div> 
</div> <!-- cierrar row-->





<div class="row">
<div class="col-md-12">
<br>
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="active"><a href="../php/a_principal.php">SALIR</a></li>

      <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> EQUIPOS- ARTICULOS<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="aa_articulos.php">DATOS DEL ARTICULO</a></li>
                <li><a href="aa_ingresos_articulo.php">COMPRAS-INGRESOS</a></li>
                <li><a href="aa_reping_articulo.php">NOTAS DE COMPRA</a></li>
				<li><a href="aa_rep_articulo.php">REPORTES-KARDEX</a></li>

                <li class="divider"></li>
                <li><a href="b_provee_ceramica.php">PROVEEDOR</a></li>
                
            </ul>
        </li>
        
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> MOVIMIENTOS<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="aa_cotizacion.php">COTIZACION ALQUILER</a></li>

                <li><a href="aa_rep_cotiza.php">REPORTE COTIZACIONES</a></li>
                <li class="divider"></li>
                <li><a href="aa_proforma_genera.php">PROFORMAS ALQUILER</a></li>
                <li><a href="aa_proforma_genera2.php">PROFORMAS VENTAS</a></li>
                <li class="divider"></li>

                <li><a href="aa_rep_proforma.php"> CUENTAS-PAGOS</a></li>
                <li><a href="aa_rep_pagos.php">IMPRESION FINAL</a></li>
                <li class="divider"></li>
                <li><a href="aa_alquilerdev.php">DEVOLUCION-ALQUILER</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> REPORTES<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">REPORTE-1</a></li>
                <li><a href="#">REPORTE-2</a></li>
                <li><a href="#">REPORTE-3</a></li>

               <li class="divider"></li>
                <li><a href="#">REPORTE-4</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">USUARIOS <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="aa_usuarios.php">USUARIOS</a></li>
                <li><a href="logout.php">CERRAR SESION</a></li>
            </ul>
        </li>
        <li><a href="../index.php" >Iniciar Session</a></li>
    </ul>
</div>








    
</div>
</div> <!--fin row-->
<br>

<div class="row">
<div class="col-md-6">
   <div class="col-lg-7">
    <div class="input-group">
     <input type="text" class="form-control" placeholder="Buscar Articulo" id="bs-prod" >
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
  </div>

 
</div>
<div class="col-md-2">
<button type="button" class="btn btn-success" id="nuevo-producto">NUEVO</button>
<!-- combo cursos aca -->
</div>

<div class="col-md-4">

</div>

</div>




<div class="row">

<div class="col-md-12">
<div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div><!-- col 10-->
</div> <!-- fin de row ---->
    
    
    
    
    
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario de Datos</b></h4>
            </div>
            <form id="formulario" class="formulario form-horizontal" onsubmit="return agregaRegistro();">
            
<input type="text" required readonly id="id-prod" name="id-prod" style="visibility:hidden;height:5px;" >
<input type="text" class="form-control" id="pro" name="pro"  style="visibility:hidden;height:5px;">
           
			    
			    <div class="form-group">
        			<label class="control-label col-xs-4" for="codigo">CODIGO:</label>
                    <div class="col-xs-4">
        			<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo">
                    </div>
    			</div>
                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="descrip">DESCRIPCION:</label>
                    <div class="col-xs-6">
 				 		<textarea class="form-control" rows="2" id="descrip" name="descrip" placeholder="Descripcion"></textarea>
                  </div>
				</div>                


				<div class="form-group">
  						<label  class="control-label col-xs-4" for="neto">PRECIO NETO:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="neto" name="neto" placeholder="Precio Neto">
                  </div>
				</div>                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="pvp">PRECIO VENTA:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="pvp" name="pvp" placeholder="Precio Venta">
                  </div>
				</div>                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="umed">U-MEDIDA:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="umed" name="umed" placeholder="U-Medida">
                  </div>
				</div> 

   				<div class = "form-group">
      			<label for = "depto" class="control-label col-xs-4">DEPARTAMENTO:</label>
                <div class="col-xs-6">
					<select name="tdepto" id="tdepto" >
                    <option value="0">Ninguno</option>
						<?php foreach($depto as $deptox):?>
						<option value="<?php echo $deptox['coddep']?>"><?php echo $deptox['descripdepto']?></option>
						<?php endforeach;?>
					</select>

   				</div>
                </div>
                


				<div class = "form-group">
      			<label for = "usu" class="control-label col-xs-4">PROVEEDOR:</label>
                <div class="col-xs-6">
					<select name="tipo" id="tipo" >
                    <option value="0">Ninguno</option>
						<?php foreach($proveedor as $dato):?>
						<option value="<?php echo $dato['codprov']?>"><?php echo $dato['descripp']?></option>
						<?php endforeach;?>
					</select>

   				</div>
                </div>
        
                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="observ">OBSERVACIONES:</label>
                    <div class="col-xs-6">
 				 		<textarea class="form-control" rows="2" id="observ" name="observ" placeholder="Observaciones"></textarea>
                  </div>
				</div>                
                
           

               <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button> 
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/> 
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/><!--no hacen nada solo submit agregaregistro llama myjavahabite.js-->
              </div>
            
            </form>
           <div id="mensaje"></div>
           <div id="resultados"></div>
          </div> <!-- fin modal content -->

       	</div> <!-- fin modal-dialog -->
        
       
	</div> <!-- fin class modal fade -->
<!--- fin -->




<!-- ventana modal de la imagen -->
<div class="modal fade" id="modalfoto" data-backdrop="static", data-keyboard="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--header cabecera -->
				<div class="modal-header">
						<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">IMAGEN DEL DOCUMENTO</h4>
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
					<h4 class="modal-title">IMAGEN DEL DOCUMENTO</h4>
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

</div> <!-- container -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
