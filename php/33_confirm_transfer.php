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

<script src="../js/33_myjavaconfirmar.js"></script>

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
.subir {
	font-size: 22px;
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
<div class="registross" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div><!-- col 10-->


<div class="col-sm-6">
 <!--Buscar :<input type="text" placeholder="Nro Orden o Cliente" id="bs-prod"/>-->
<div class="registross" id="agrega-registros2"></div>
    <center>
        <ul class="pagination" id="pagination2"></ul>
    </center>
</div><!-- col 10-->



</div> <!-- fin de row ---->
   
 

</div> <!-- container -->


<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
