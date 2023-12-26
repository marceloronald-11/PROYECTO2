<?php
//session_start();
if (!isset($_SESSION)) {session_start();}

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';

date_default_timezone_set('America/La_Paz'); 



$nousuario=$_SESSION['nomb_usu'];
$idper=$_SESSION['id_per'];
$id_usu=$_SESSION['id_usu'];


?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GYM</title>
<!--<link href="../css/estiloav.css" rel="stylesheet"> -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

              	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
				<script type="text/javascript" src="../js/script/jqueryui.js"></script>

<!--<script src="../js/myjavaEgreso.js"></script>
-->
<script src="../js/myjavaVentas.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style type="text/css">
    .tam {
	font-size: 26px;
	color: #f8ef05;
}
    .tamm {
	font-size: 11px;
	color: #151d67;
}
	ul.ui-autocomplete {
    z-index: 1100;
	}

    </style>
<script type="text/javascript">
$(document).ready(function(){
    $('#precio').numeric("."); 
    $('#cantidad').numeric("."); 
    $('#nitcli').numeric("."); 


	$('#buscar' ).focus();

});
    </script>






</head>

<body>
<?php
$_SESSION['detalle'] = array();



if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
	header('Location:../index.php');
}else{
	if($_SESSION['id_area'] == 'usuarios'){
		header('Location: a_usuario.php');
	}else{
		$usuarios=$_SESSION['usuario'];
	//	$objusu= new	Producto(); //consulta a codnu
	//	$usuario= $objusu->getusu($usuarios);
	//	foreach($usuario as $usu):
	//		$nombre_u= $usu['nomb_usu'];
	//		$id_usu= $usu['id_usu'];
	//	endforeach;
	}
}
$objProducto = new Producto();
$paimprimir = $objProducto->getImprimirE();

$nnota = $objProducto->getCodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordengym']+1;
		endforeach;


$re = $objProducto->getpersonas($idper);

		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;

$persona = $objProducto->getpersonass();
$area = $objProducto->getarea();


?>

<div class="container-fluid"> <!--inicio container -->
<br>
<div class="row titulo" style="background-color:#e6c010; color:#010100; "> 
		<div class="col-md-2" >
        <table class="table"><tr><td align="center"><img src="../recursos/logo2.jpg" class="img-responsive media-object registrar-cliente" alt="software hoteleria"></td></tr></table>
		</div>
        
		<div class="col-md-6">
            	<table class="table"><tr><td align="center"><h3>VENTAS VITRINA</h3></td></tr></table>
		</div>
        
		<div class="col-md-3">
        <br/>
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="45" height="45"/></td><td align="left">
<?php echo 'Usuario :'.$nousuario; ?>
</td></tr>
</table>        		<br>
		</div>
        
        <div class="col-md-1">
        <br/>
        <a href="../php/z_inicio1.php" class="btn btn-primary btn-sm " role="button" aria-disabled="true" accesskey="s"><u>S</u>ALIR</a>
        		<br>
		</div>

</div>



<div class="row" > 
		

		<div class="col-md-5 fila1" style="background-color:#fcf8f8 ;">
		<center><h4>DETALLE DE ARTICULOS</h4></center>
        	 <form  class="form-horizontal" id="formulario">
             		<input type="hidden" id="id-ser" name="id-ser" />
                    <input type="hidden" class="form-control input-sm" readonly id="saldo"  name="saldo" />
<!--             		<input type="hidden" class="form-control input-sm" id="precio" placeholder="Precio"   />
-->             
             	     <div class="row">
              			<div class="col-md-9">
                  		<span class="help-block text-muted small-font" > Detalle</span>
                  		<input type="text" class="form-control input-sm" id="buscando" placeholder="Buscar..." />
              			</div>
					</div>

     			<div class="row">

         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Precio:</span>
                 	 <input type="text" class="form-control input-sm" id="precio" readonly  placeholder="Precio"   />
              		</div>

         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  U.Med.:</span>
                 	 <input type="text" class="form-control input-sm" id="umed" readonly placeholder="U.Med."   />
              		</div>
                
              		<div class="col-md-3">
                  	<span class="help-block text-muted small-font" > Cant:</span>
                  	<input type="number" class="form-control input-sm" id="cantidad" placeholder="Cantidad" />
              		</div>

				</div>


     			<div class="row">


         			<div class="col-md-9">
                  	<span class="help-block text-muted small-font" >  Forma de Pago:</span>
                        <input type="radio"  name="tvv" CHECKED id="ctt" value="CT">CONTADO
                        <input type="radio"  name="tvv" id="crr" value="CR"> CREDITO 
              		</div>
				</div>

             </form>
                 <div id="resultados"></div>
                

		</div> <!-- FIN DE col-md-5 -->


<div class="col-md-2 fila1" style="background-color:#030110;">
        <br>
        <br>
        	<center>
            <table border="0" class="table" width="100%">
<tr><td align="center"><button type="button" class="btn btn-sm  btn-primary btn-agregar-producto2" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>GREGAR ITEM</button></td></tr>
<tr><td align="center"><button type="button" class="btn btn-sm btn-warning irmodal" accesskey="c"><span class="glyphicon glyphicon-check"></span> <u>C</u>ERRAR NOTA</button></td></tr>
<tr><td align="center"><button type="button" class="btn btn-sm btn-danger limpiacarroumsa" accesskey="n"><span class="glyphicon glyphicon-remove"></span> A<u>N</u>ULAR NOTA</button></td></tr>
     
            </table>
			</center>
        </div>


		<div class="col-md-5 fila2" style="background-color:#fcf8f8;">
				<center><h4>GENERANDO NOTA DE VENTA</h4></center>

         		<div class="detalle-producto"></div>
				
        </div>

</div> <!--fin row -->
        
<br>

<div class="row"> <!--inicio row D -->
		<div class="col-md-12 fila3">
        
        
            <div class="detalle-producto1" style="background-color:#0a0a0a; color:#CCC;"> 
<br>
            <center><h4>IMPRESIONES  PENDIENTES</h4>
					<table class="table " width="100%">
					        <tr>
					            <td align="center">Fecha</td>
					            <td align="center">No Orden</td>
					            <td align="center">Cliente</td>
					            <td align="center">Total Bs.-</td>
  					            <td align="center">No Items</td>

					            <td>Opcion</td>
					        </tr>
					    <tbody>
					    	<?php 
					    	foreach($paimprimir as $dett2){ 
					    	?>
					        <tr>
					        	<td width="13%" align="center"><?php echo $dett2['fecham'];?></td>
					        	<td width="10%" align="center"><?php echo $dett2['nordenmv'];?></td>
					            <td width="40%" align="center"><?php echo $dett2['afavor'];?></td>
					            <td width="15%" align="center"><?php echo $dett2['totimporte'];?></td>
                              	 <td width="40%" align="center"><?php echo $dett2['itm'];?></td>

	<td align="center" width="5%"><a href="javascript:mostrarIngreso(<?php echo $dett2['nordenmv']; ?>)" class=" glyphicon glyphicon-print tam" ></a></td>                               
					        </tr>
					        <?php }?>
					    </tbody>
					</table>
                  </center>  
            </div>
        
        
        
        
        
        
        </div>
</div> <!--fin row D-->





</div> <!--fin container -->








<?php
$fecha = date('Y-m-d');
?>


  <!-- Modal -->
  <div class="modal fade" id="myModal" data-backdrop="static" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">DATOS DEL REGISTRO</h4>
          <br />
          	<?php
				$array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
				echo "La Paz , ".$array[date("w")]." ".date("d-m-y");
			?>
        </div>
        
        <div class="modal-body">
        	<div class="row"><!-- row -->
          	<form class="form-horizontal">
            <input type="hidden" readonly id="idusu" name="idusu" value="<?php echo $id_usu;?>" >
                            
			<div class="form-group">
        		<label for="nnota" class="control-label col-xs-3">Nro:</label>
        		<div class="col-xs-3">
            	<input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nroing;?>" placeholder="Nro Recibo">
        		</div>
    		</div>  
            

            			<div class="form-group">
                            	<label for="fecha" class="control-label col-xs-3">Fecha:</label>
        						<div class="col-xs-4">
            					<input type="date" value="<?php echo $fecha;?>"  class="form-control" id="fecha" >
        						</div>
							</div>        
                            
            
				<div class="form-group">
   					<label for="nomcli" class="control-label col-xs-3">Cliente(a):</label>
      					<div class="col-xs-8">
          					<input type="text" class="form-control" id="nomcli" placeholder="Cliente">
       					</div>
				</div>        
<input type="hidden" class="form-control" id="iddcli" >
            
          
          
          
          </form>
          	</div> <!--fin row -->
          
          
          
        </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary guardar-egresos btn-sm" accesskey="g"><u>G</u>rabar Nota</button>

        </div>
      </div>
      
    </div>
  </div>


<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
