
<?php

if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
date_default_timezone_set('America/La_Paz');

$date22 = time(); // formato unix 
$fefor= date("d-m-Y(H:i:s)", $date22); //formateando el UNIX
$horax=substr($fefor,11,8);



$fecha = date('Y-m-d');



//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location:../index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuarios'){
//		header('Location: a_usuario.php');
//	}else{
//		$usuarios=$_SESSION['usuario'];
//		$id_usu= $_SESSION['id_usu'];
//		$nombre_u= $_SESSION['nomb_usu'];
//		//$coddepx= $_SESSION['depto'];
//		$idper=$_SESSION['id_per'];
//			//	$nomdepto=$_SESSION['nomdepto'];
//
//	}
//}


require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
//$re = $objProducto->getpersonas($idper);
//		foreach($re as $usu):
//			$fotito= $usu['foto'];
////			$id_usu= $usu['id_usu'];
////			$codde=$usu['coddep'];
//		endforeach;
//
//// $foto = $objProducto->getById($id);
////$depto = $objProducto->getdeptounico($coddepx);
//$umx = $objProducto->getUmed();
$provx = $objProducto->getProveedor();
$grupox = $objProducto->getClasifica();
$gsuc = $objProducto->getSucursalxfa();

//$grupx2 = $objProducto->getGrupo();

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>ADMIN</title>
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
<script src="../js/myjavaVentasCon.js"></script>
<script src="../js/jquery.numeric.js"></script>
<!-- JS JAVAS PERSONALIZADO -->

<style type="text/css">
	.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #006;
}
.tipe {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #b33c0d;
}
	.tihead {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #006;
}


	ul.ui-autocomplete {
    z-index: 1100;
}

 </style>
</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4 hidden-xs" style="background-color:white;"> 
        <table class="table"><tr><td align="left"><img src="../recursos/login.png" class="img-responsive" width="50px" height="50px" alt="lebrai"></td>
        </tr></table>
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h4>VENTAS SUCURSAL</h4></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4 " style="background-color:white;">
<table border="0" width="100%" class="table tihead"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u.'<br>'.'('.$nombresuc.')'; ?>
</td></tr>
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
      <a class="navbar-brand" href="z_inicio1.php">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
<!--        <li class="active"><a href="z_inicio1.php"><span class="glyphicon glyphicon-home"></span> Salir</a></li>
-->      </ul>
    <form class="navbar-form navbar-left">

      <div class="input-group ">
        <div class="input-group-btn ">
			<input type="date" class="form-control" id="diabus" name="diabus" value="<?php echo $fecha;?>"   placeholder="Fecha"> </div>
      </div>
      


      <div class="input-group ">
        <div class="input-group-btn ">
								<select name="cosuc" id="cosuc" class="form-control" >
								 		<option value="0">Ninguno</option>
										<?php foreach($gsuc as $dato1):?>
										<option value="<?php echo $dato1['codsuc']?>"><?php echo $dato1['nombresuc']?></option>
										<?php endforeach;?>
								</select>
        </div>
      </div>



<!--      <div class="input-group">
        <input type="text" class="form-control" id="bs-prod" placeholder="Buscar Cliente">
        <div class="input-group-btn">
          <button class="btn btn-default" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
-->      
<hr class="hidden-lg hidden-md hidden-sm">
<!--      <button id="nuevo-producto" type="button" class="btn btn-warning  btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
      <a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">a PDF</a>
-->      <a target="_blank" href="javascript:ExcelVentas();" class="btn btn-success btn-sm">Exportar a Excel</a>
    
    </form>
      
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-off"></span> Cerrrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
</div>

<br>
    
<div class="row">    
    
<div class="col-sm-12 ">    
<div class="registros table-responsive" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>

</div> <!-- fin col-sm-12 -->
</div> <!-- fin row -->
 



</div> <!-- fin container -->
  




    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="ModalAnular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario Anular Factura</b></h4>
            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistroAnular();">
            <div class="modal-body">
					 <input type="hidden"   id="xnorden" name="xnorden" /> <!-- norden -->
					 <input type="hidden"   id="xcodsuc" name="xcodsuc" /> <!-- codto -->

                   	<input type="hidden" required readonly id="pro" name="pro"/>

                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="nofac">No Factura:</label>
						<div class="col-lg-4 col-md-4 col-xs-12">
						<input type="text" class="form-control" id="nofac" readonly name="nofac"  required placeholder="No Factura ">
						</div>
					</div>
                    
                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="fee">Fecha:</label>
						<div class="col-lg-4 col-md-4 col-xs-12">
						<input type="text" class="form-control" id="fee" readonly name="fee" value="<?php echo $fecha;?>"  >
						</div>
					</div>
                                                            
                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="nocli">Clientes:</label>
						<div class="col-lg-8 col-md-8 col-xs-12">
						<input type="text" class="form-control" id="nocli" readonly name="nocli"  required placeholder="Cliente ">
						</div>
					</div>


<!--                    <div class="form-group">
                    <label  class="control-label col-xs-3 titi" for="observ">Observaciones:</label>
                    <div class="col-lg-8 col-md-8 col-xs-12">
                    <textarea class="form-control" rows="3" id="observ"  name="observ" placeholder="Observaciones"></textarea>
                    </div>
                    </div>                
-->      </div>


                        	<div id="mensaje"></div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Anular" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    
  

    
    <!-- MODAL PARA EDITAR FACTURA CABECERA-->
    <div class="modal fade" id="ModalEditaFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario Edicion</b></h4>
            </div>
            <form id="formulario1" class="form-horizontal " onsubmit="return agregaRegistroFacc();">
            <div class="modal-body">
					 <input type="hidden"   id="xnorden1" name="xnorden1" /> <!-- norden -->
					 <input type="hidden"   id="xcodsuc1" name="xcodsuc1" /> <!-- codto -->

                   	<input type="hidden" required readonly id="pro1" name="pro1"/>

                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="nofac1">No Factura:</label>
						<div class="col-lg-4 col-md-4 col-xs-12">
						<input type="text" class="form-control" id="nofac1" readonly name="nofac1"  required placeholder="No Factura ">
						</div>
					</div>
                    
                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="fee1">Fecha:</label>
						<div class="col-lg-4 col-md-4 col-xs-12">
						<input type="text" class="form-control" id="fee1" readonly name="fee1" value="<?php echo $fecha;?>"  >
						</div>
					</div>
                                                            
                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="nocli1">Nombre Cliente:</label>
						<div class="col-lg-8 col-md-8 col-xs-12">
						<input type="text" class="form-control" id="nocli1"  name="nocli1"  required placeholder="Cliente ">
						</div>
					</div>

                    <div class="form-group">
						<label class="control-label col-xs-3 titi" for="nitcli1">Nit Cliente:</label>
						<div class="col-lg-8 col-md-8 col-xs-12">
						<input type="text" class="form-control" id="nitcli1"  name="nitcli1"  required placeholder="Nit Cliente ">
						</div>
					</div>

<!--                    <div class="form-group">
                    <label  class="control-label col-xs-3 titi" for="observ">Observaciones:</label>
                    <div class="col-lg-8 col-md-8 col-xs-12">
                    <textarea class="form-control" rows="3" id="observ"  name="observ" placeholder="Observaciones"></textarea>
                    </div>
                    </div>                
-->      </div>


                        	<div id="mensaje1"></div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Editar" class="btn btn-success" id="reg1"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi1"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    
  
        
            
                
                    
                            
</div> <!-- fin container -->

<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
