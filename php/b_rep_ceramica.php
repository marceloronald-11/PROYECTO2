<?php
if (!isset($_SESSION)) {session_start();}
		$_SESSION['usuario'] = 'admin';
			$_SESSION['id_area'] = 'admin';
		$_SESSION['id_usu'] = 1;
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

<script src="../js/myjavajarepcerramica.js"></script>

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
  <img src="../recursos/logo1.jpg" width="120" height="120">
</div> 
<div class="col-md-4 administrador">
  <?php echo 'BIENVENIDO :'.$nombre_u; ?>
</div> 

<div class="col-md-4">
  <img src="../recursos/administrador.png" align="right"  width="100" height="100">
</div> 
</div> <!-- cierrar row-->


<div class="row">
<div class="col-md-12">
<header>REPORTES DE CERAMICA</header>
</div> <!-- col 12 -->
</div> <!-- cierrar row-->



<div class="row">
<div class="col-md-12">
<br>
<div class="bs-example">
    <ul class="nav nav-tabs  navbar-inverse">
        <li class="active"><a href="#">MENU</a></li>
        <li><a href="a_principal.php"><span class="glyphicon glyphicon-user"></span> SALIR</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> CERRAR SESION</a></li>


    </ul>
</div>

    
</div>
</div> <!--fin row-->
<br>





<div class="row">
<div class="col-md-10">
</div>
<div class="col-md-2">
<button type="button" class="btn btn-danger imprimePdf">A PDF</button>
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
<input type="text" class="form-control" id="pro" name="pro"  style="visibility:hidden;height:5px;" readonly>
           
			    
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
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="contiene">CONTENIDO:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="contiene" name="contiene" placeholder="Contiene m2">
                  </div>
				</div>                
                               
                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="formato">FORMATO:</label>
                    <div class="col-xs-6">
 				 		<input type="text" class="form-control" id="formato" name="formato" placeholder="Formato">
                  </div>
				</div>                

				<div class="form-group">
  						<label  class="control-label col-xs-4" for="pei">PEI:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="pei" name="pei" placeholder="PEI">
                  </div>
				</div>                

				<div class="form-group">
  						<label  class="control-label col-xs-4" for="calibre">CALIBRE:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="calibre" name="calibre" placeholder="Calibre">
                  </div>
				</div>                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="tono">TONO:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="tono" name="tono" placeholder="TONO">
                  </div>
				</div>                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="color">COLOR:</label>
                    <div class="col-xs-6">
 				 		<input type="text" class="form-control" id="color" name="color" placeholder="COLOR">
                  </div>
				</div>                


				<div class = "form-group">
      			<label for = "tipor" class="control-label col-xs-4">TIPO:</label>
                <div class="col-xs-6">
					<select name="tipor" id="tipor" >
                    <option>PISO</option>
					<option>REVESTIMIENTO</option>
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
  						<label  class="control-label col-xs-4" for="cfac">CON FACTURA %:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="cfac" name="cfac" placeholder="CON FACTURA">
                  </div>
				</div>                
				<div class="form-group">
  						<label  class="control-label col-xs-4" for="sfac">SIN FACTURA %:</label>
                    <div class="col-xs-3">
 				 		<input type="text" class="form-control" id="sfac" name="sfac" placeholder="SIN FACTURA">
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
