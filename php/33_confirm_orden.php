<?php
//session_start();
if (!isset($_SESSION)) {session_start();}

$_SESSION['detalle'] = array();
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';


if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location:../index.php');
}else{
	if($_SESSION['id_area'] == 'usuarios'){
		header('Location: a_usuario.php');
	}else{
		$usuarios=$_SESSION['usuario'];
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
		$coddepx= $_SESSION['depto'];
		$nomdepto=$_SESSION['nomdepto'];
	}
}

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">

<?php

//$objProducto = new Producto();
//$buscareg = $objProducto->getreg();
//
//
//foreach($buscareg as $nnreg): 
//
//$nreg=$nnreg['nreg']+1;
//endforeach;
//
//$objgrupos = new Producto();
//$grupos = $objgrupos->getgrupo();




?>
<title>Inventarios</title>
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

<script src="../js/33_myjavaordenar.js"></script>

<script src="../js/jquery.numeric.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#precio').numeric(".");
    $('#precio-dis').numeric("."); 
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
	font-size: 12px;
	color: #000;
}
body {
	background-image: url(../recursos/fondo_adm.jpg);
}
.col-md-2.menuu {
	background-color: #c72a7b;
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
</style>


</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
        <table class="table"><tr><td align="left"><img src="../recursos/login.png" class="img-responsive" width="60px" height="60px" alt="lebrai"></td>
         <td align="left"><h4><?php echo $nomdepto ; ?></h4></td></tr></table>
</div> 
<div class="col-md-4 administrador">
  <center><?php echo 'BIENVENIDO :'.$nombre_u; ?></center>
  <center><h3>CONFIRMACION DE TRANSFERENCIA</h3></center>

</div> 

<div class="col-md-4">
  
</div> 
</div> <!-- cierrar row-->






<div class="row">
<div class="col-md-12">
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="active"><a href="../php/z_inicio1.php">SALIR</a></li>

        <li><a href="../index.php" >Iniciar Session</a></li>
    </ul>
</div>

</div> <!-- md 12 -->
</div> <!-- fin row -->



<br>
<br>









<div class="row">

<div class="col-sm-6">
 <!--Buscar :<input type="text" placeholder="Nro Orden o Cliente" id="bs-prod"/>-->
 <table class="table table-striped table-condensed table-hover">
 <tr><td width="30%"></td><td width="40%">ORDENES DE COMPRA</td><td width="30%"></td></tr>
 </table>
<div class="registross" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div><!-- col 10-->


<div class="col-sm-6">
 <!--Buscar :<input type="text" placeholder="Nro Orden o Cliente" id="bs-prod"/>-->
 <table class="table table-striped table-condensed table-hover">
 <tr><td width="15%">Orden:<input type="text" readonly  id="nordenxx" class="form-control" /></td>
 <td align="center" width="55%">DETALLE DE LA ORDEN DE COMPRAS</td>
 <td align="right" width="30%"> <button type="button" id="ConfiOrden" class="btn btn-danger btn-sm">CONFIRMAR ORDEN</button></td></tr>
 </table> 
<div class="registross" id="agrega-registros2"></div>
    <center>
        <ul class="pagination" id="pagination2"></ul>
    </center>
</div><!-- col 10-->



</div> <!-- fin de row ---->
   
 

</div> <!-- container -->


    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Edicion Datos</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />

                   	<input type="hidden" required readonly id="pro" name="pro"/>
                   	<input type="hidden" required readonly id="nordenx" name="nordenx"/>

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="descrip">Descripcion:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="descri" readonly name="descri" required placeholder="Descripcion ">
                    </div>
    			</div>

			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="fac">No Factura:</label>
                    <div class="col-xs-4">
        			<input type="text" class="form-control" id="fac" name="fac" required placeholder="No Factura">
                    </div>
    			</div>


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pvp">Cantidad:</label>
                    <div class="col-xs-3">
        			<input type="text" class="form-control" id="cant" name="cant" required placeholder="Precio Venta">
                    </div>
    			</div>


                        	<div id="mensaje"></div>
            </div>

            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal --> 





<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
