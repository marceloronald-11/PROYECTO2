
<?php
if (!isset($_SESSION)) {session_start();}

$_SESSION['detalle'] = array();

$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$nomdepto=$_SESSION['nomdepto'];
$id_usu=$_SESSION['id_usu'];
$codsuc=1;
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

date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');


require_once '../Config/conexion.php';
require_once '../Model/Producto1.php';
$objProducto = new Producto1();
$re = $objProducto->getUsuarios($id_usu);
		foreach($re as $usu):
			$fotito= $usu['fotousu'];
		endforeach;

$paimprimirvta= $objProducto->getImprimirvv();

$gsuc = $objProducto->getSucursalx();
//$fac = $objProducto->getdosificacion($codsuc);
//		foreach($fac as $ff):
//			$facactual= $ff['facnroactual'];
//			$nautoriza= $ff['facautorizacion'];
//			$nnit= $ff['nit'];
//			$llave= $ff['llave'];
//			$felim= $ff['facfechalim'];
//			$leyenda= $ff['leyenda'];
//			$cdfac= $ff['cdfac'];
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
<script src="../js/myjavaVentasfac.js"></script>
<script src="../js/jquery.numeric.js"></script>
<script src="../js_raos/validaoscar.js"></script>

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
.cab {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
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
<center><h3>VENTAS </h3></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4 hidden-xs" style="background-color:white;">
<table border="0" width="100%" class="table cab"><tr><td width="50%" align="right" class="hidden-xs"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="50px" height="50px"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u.'-Operador'.'<br>'.$nomdepto; ?>
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


<div class="row"><!-- row AA --> 
<div class="col-sm-6" style="background-color:white;"> 
 <div class="panel-group coli3">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse4">DETALLE DE VENTAS</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse in">
        <div class="panel-body">
        	 <form  class="form-horizontal" id="formulario">
             		<!--<input type="hidden" id="id-ser" name="id-ser"  />-->
<!--                    <input type="hidden" class="form-control input-sm" readonly id="saldo"  name="saldo" />
--><!--             		<input type="hidden" class="form-control input-sm" id="precio" placeholder="Precio"   />
-->             
 <input type="hidden" class="form-control" id="idcodx" />



     			<div class="row">

         			<div class="col-md-6">
                  	<span class="help-block text-muted small-font" >  Articulo:</span>
                 	 <input type="text" class="form-control input-md coli2" id="desart"  placeholder="Articulo"   />
              		</div>

         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  U.Med:</span>
                 	 <input type="text" class="form-control input-md coli2" id="um" readonly  placeholder="U.Medida"   />
              		</div>


         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Saldo:</span>
                 	 <input type="text" class="form-control input-md coli2" id="sal" readonly  placeholder="Saldo"   />
              		</div>

				</div>

     			<div class="row">

         			
<!--                   	<div class="col-md-6">
                  	<span class="help-block text-muted small-font" >  Precio :</span>
                        <input type="radio"  name="fare" CHECKED id="ci" value="ci">C/IVA
                        <input type="radio"  name="fare" id="si" value="si"> S/IVA 
                        <input type="radio"  name="fare" id="my" value="my"> MAYOR 
                	</div>
-->
                	
         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Cant:</span>
                 	 <input type="text" class="form-control input-md coli2" id="cant" onKeyPress="return solonumeros(event);"  placeholder="Cantidad"   />
              		</div>
                 	
                 	<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Precio :</span>
                 	 <input type="text" class="form-control input-md coli2" id="pneto" onKeyPress="return solonumeros(event);"  placeholder="Precio"   />
              		</div>



				</div>


             </form>
                 <div id="resultados"></div>  
        
        </div>
        <div class="panel-footer">
  <button type="button" class="btn btn-primary btn-agregar-producto2" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>gregar Item</button>
       
        </div>
      </div>
    </div>
  </div>
</div>


<div class="col-sm-6" style="background-color:white;"> 
  <div class="panel-group coli3">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"> ORDEN DE VENTA</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          	<form class="form-horizontal">
            <input type="hidden" readonly id="idusu" name="idusu" value="<?php echo $id_usu;?>">

                           
                                    
<!--<input type="hidden" readonly id="faact" name="faact" value="<?php //echo $facactual;?>">
<input type="hidden" readonly id="nauto" name="nauto" value="<?php //echo $nautoriza;?>">                                                      
<input type="hidden" readonly id="nnit" name="nnit" value="<?php //echo $nnit;?>">                                                      
<input type="hidden" readonly id="llavex" name="llavex" value="<?php //echo $llave;?>">                                                      
<input type="hidden" readonly id="felim" name="felim" value="<?php //echo $felim;?>">                                                      
<input type="hidden" readonly id="leye" name="leye" value="<?php //echo $leyenda;?>">                                                      
<input type="hidden" readonly id="cdf" name="cdf" value="<?php //echo $cdfac;?>">                                                      
-->                            
            	     <div class="row">


              			<div class="col-md-4">
                  		<span class="help-block text-muted small-font" > Fecha</span>
                  		<input type="date" class="form-control input-sm coli2" id="fecha" readonly  value="<?php echo $fecha;?>" placeholder="Fecha" />
              			</div>

              			<div class="col-md-8">
                  		<span class="help-block text-muted small-font" >Cliente Nombre </span>
                  		<input type="text" class="form-control input-sm coli2" id="respo" placeholder="Cliente Nombre" />
              			</div>
              			
					</div>


            	     <div class="row">
              			<div class="col-md-4">
                  		<span class="help-block text-muted small-font" > CI/Nit </span>
                  		<input type="text" class="form-control input-sm coli2"  id="nitv" onKeyPress="return solonumeros(event);"  placeholder="NIT" />
              			</div>
              			
                 		<div class="col-md-4">
                  		<span class="help-block text-muted small-font" >Sucursal </span>
								<select name="cosuc" id="cosuc" class="form-control" >
								 		<option value="0">Ninguno</option>
										<?php foreach($gsuc as $dato1):?>
										<option value="<?php echo $dato1['codsuc']?>"><?php echo $dato1['nombresuc']?></option>
										<?php endforeach;?>
								</select>
              			</div>
              			
              			<div class="col-md-4">
                  		<span class="help-block text-muted small-font " > Monto</span>
                  		<input type="text" readonly  class="form-control input-sm coli" value="0" id="mtt" />
              			</div>
              			
					</div>



          </form>
        
        </div>
        <div class="panel-footer"><button type="button" class="btn btn-success guardar-ventafac" accesskey="g"> <span class="glyphicon glyphicon-save"></span> <u>G</u>rabar Nota</button>
          <button type="button" class="btn btn-success limpiaNota" accesskey="n"> <span class="glyphicon glyphicon-remove"></span> A<u>n</u>ular Nota</button>
        </div>
        
      </div>
    </div>
  </div>
</div> <!---col-sm-6 -->

</div><!-- row AA -->



<div class="row-fluid"><!-- row bb --> 
 <div class="panel-group coli3">
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">DETALLE DE LA NOTA</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse table-responsive" >
        <div class="panel-body">
				<div class="detalle-producto"></div>
        </div>
        <!--<div class="panel-footer">Panel Footer</div>-->
      </div>
    </div>
  </div>
</div> <!-- row bb -->



<div class="row-fluid"><!-- row bb --> 
 <div class="panel-group coli3">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">IMPRESION DE VENTA</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse table-responsive">
        <div class="panel-body">
					<table class="table titi" width="100%">
					        <tr>
					            <td align="center">Sucursal</td>
					            <td align="center">Fecha</td>
					            <td align="center">No Factura</td>
					            <td align="center">Responsable</td>
					            <td align="center">Total Bs.-</td>
  					            <td align="center">Items</td>

					            <td>Opcion</td>
					        </tr>
					    <tbody>
					    	<?php 
					    	foreach($paimprimirvta as $dett2){ 
							$fexx= date("d-m-Y", strtotime($dett2['fechato']) );
					    	?>
					        <tr>
					        	<td width="15%" align="left"><?php echo $dett2['nombresuc'];?></td>
					        	<td width="20%" align="center"><?php echo $fexx;?></td>
					        	<td width="7%" align="center"><?php echo $dett2['nfactura'];?></td>
					        	<td width="15%" align="center"><?php echo $dett2['afavor'];?></td>
					            <td width="15%" align="center"><?php echo $dett2['totimporte'];?></td>
                              	 <td width="5%" align="center"><?php echo $dett2['itm'];?></td>

	<td align="center" width="5%"><a href="javascript:mostrarIngreso(<?php echo $dett2['norden']; ?>)"><img src="../recursos/impresora.png" data-toggle="tooltip" title="Impresion de Nota"></a></td>                               
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
        </div>
        <!--<div class="panel-footer">Panel Footer</div>-->
      </div>
    </div>
  </div>
</div> <!-- row bb -->


</div> <!-- container row -->
  
<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
