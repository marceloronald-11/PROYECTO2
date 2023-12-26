
<?php
if (!isset($_SESSION)) {session_start();}

$_SESSION['detalle'] = array();


//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location:../index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuarios'){
//		header('Location: a_usuario.php');
//	}else{
//		$usuarios=$_SESSION['usuario'];
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
//		//$coddepx= $_SESSION['depto'];
//		$idper=$_SESSION['id_per'];
//			//	$nomdepto=$_SESSION['nomdepto'];
//
//	}
//}

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');


require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';
$objProducto = new Producto1();
$re = $objProducto->getUsuarios($id_usu);
		foreach($re as $usu):
			$fotito= $usu['fotousu'];
		endforeach;

$paimprimir = $objProducto->getImprimir();


$succ = $objProducto->getSucursal();
//		foreach($succ as $sucx):
//			$sucnom= $sucx['nombresuc'];
//		endforeach;



?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>Control</title>
<link rel="shortcut icon" href="../recursos/sisadal.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap + Jquery.js -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../js/script/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Bootstrap -->

<!-- Jquery-iu  JS CSS -->
    	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
		<script type="text/javascript" src="../js/script/jqueryui.js"></script>
<!-- Jquery-iu  JS CSS -->

<!-- Alertyfy -->
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>
<!-- Alertyfy -->

<!-- JS JAVAS PERSONALIZADO -->
<script src="../js/myjavaConfirm.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
	.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #006;
}

	ul.ui-autocomplete {
    z-index: 1100;
}

 .coli {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	color: #00C;
	border: 1px solid #006699;
	background-color: #FC9;
}
 .coli2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	border: 1px solid #006699;
}
 .coli3 {
    border: 1px solid  #333;
    padding: 5px;
    box-shadow: 3px 2px;
	border-radius: 10px;
 }
 
</style>
</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4 hidden-xs" style="background-color:white;"> 
        <table class="table"><tr><td align="left"><img src="../recursos/logintit.png" class="img-responsive" width="50px" height="50px" alt="raos"></td>
        </tr></table>
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h3>INGRESO SUCURSAL</h3></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4 hidden-xs" style="background-color:white;">
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u; ?>
</td>
</tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->



<div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="z_sucursal.php">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="si_EditOrdenes.php"><span class="glyphicon glyphicon-list-alt"></span> Detalle Ordenes de Pago</a></li>--> 

      </ul>
     
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-off"></span> Cerrrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="registros" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div> 

</div>  <!--!fin de col-sm-12 -->
</div> <!--!fin de row -->



</div> <!-- container row -->
  
<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
