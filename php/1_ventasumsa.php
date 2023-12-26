<?php
//session_start();
if (!isset($_SESSION)) {session_start();}
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ACTIVOS INGRESOS</title>
<link href="../css/estiloav.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

              	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
				<script type="text/javascript" src="../js/script/jqueryui.js"></script>

<script src="../js/myjavaVentaUmsa.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

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

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';

date_default_timezone_set('America/La_Paz'); 


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


$objProducto = new Producto();
$nroreg = $objProducto->getreg();
		foreach($nroreg as $nroreg2):
			$nregg= $nroreg2['nreg']+1;
//			$id_usu= $usu['id_usu'];
		endforeach;
		
$desni = $objProducto->getsni();
		foreach($desni as $nr):
			$nfact= $nr['norden']+1;
			$nnit= $nr['nit'];
			$nautori= $nr['nautoriza'];
			$nllave= $nr['llave'];
			$nfecha= $nr['fecha_lim'];
		endforeach;		

$paimprimir = $objProducto->getarticulo();

?>

<div class="container-fluid"> <!--inicio container -->
<br>
<div class="row titulo" style="background-color:#6fd24d;"> 
		<div class="col-md-2" >
             	<img src="../recursos/logo1.png" class="img-responsive media-object registrar-cliente" alt="software hoteleria">
		</div>
        
		<div class="col-md-8">
            	<center><h2>VENTAS COMEDOR</h2></center>
		</div>
        
		<div class="col-md-2">
        <br/>
        <a href="../php/a_principal.php" class="btn btn-primary btn-lg " role="button" aria-disabled="true" accesskey="s"><u>S</u>ALIR</a>
        		<br>
		</div>
</div>



<div class="row" > 
		<div class="col-md-2 fila1" style="background-color:#191970;">
        <br>
        <br>
        	<center>
            <table border="0" class="table" width="100%">
<tr><td align="center"><button type="button" class="btn btn-sm  btn-primary btn-agregar-producto2" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>GREGAR ITEM</button></td></tr>
<tr><td align="center"><button type="button" class="btn btn-sm btn-warning irmodal" accesskey="c"><span class="glyphicon glyphicon-check"></span> <u>C</u>ERRAR VENTA</button></td></tr>
<tr><td align="center"><button type="button" class="btn btn-sm btn-danger limpiacarroumsa" accesskey="n"><span class="glyphicon glyphicon-remove"></span> A<u>N</u>ULAR VENTA</button></td></tr>
     
            </table>
			</center>
        </div>
        
        
        
        

		<div class="col-md-5 fila1" style="background-color:#c2ebb4 ;">
		<center><h4>ARTICULOS DISPONIBLES</h4></center>
        	 <form  class="form-horizontal" id="formulario">
             		<input type="text" id="id-ser" name="id-ser" style="visibility:hidden;height:5px;" size="5"/>
                    <input type="text" class="form-control input-sm" readonly id="saldo"  style="visibility:hidden;height:5px;" size="5"  />
             
             
             	     <div class="row">
              			<div class="col-md-9">
                  		<span class="help-block text-muted small-font" > Detalle</span>
                  		<input type="text" class="form-control input-sm" id="buscar" placeholder="Indique Detalle" />
              			</div>
					</div>

     			<div class="row">
                    
         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Precio:</span>
                 	 <input type="text" class="form-control input-sm" id="precio" placeholder="Precio"   />
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



             
             </form>
                 <div id="resultados"></div>
                 <br>

		</div> <!-- FIN DE col-md-5 -->




		<div class="col-md-5 fila2" style="background-color:#97e87b;">
				<center><h4>DETALLLE DE VENTA</h4></center>

         		<div class="detalle-producto"></div>
				
        </div>

</div> <!--fin row -->
        

<div class="row"> <!--inicio row D -->
		<div class="col-md-12 fila3">
        
        
            <div class="detalle-producto1" style="background-color:#6fd24d;"> 
            <br>
            <center><h4>IMPRESIONES  PENDIENTES</h4>
					<table class="table-bordered" width="70%">
					    <thead>
                        	
					        <tr>
					            <th align="center">Fecha</th>
					            <th>Cliente</th>
					            <th>Total Bs.-</th>
					            <th>Opcion</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    	foreach($paimprimir as $dett2){ 
					    	?>
					        <tr>
					        	<td width="13%"><?php echo $dett2['fechacot'];?></td>
					            <td width="40%"><?php echo $dett2['cliente'];?></td>
					            <td align="right" width="15%"><?php echo $dett2['totalbs'];?></td>
	<td align="center" width="5%"><a href="javascript:mostrarcotiza(<?php echo $dett2['norden'].','.$dett2['nfactura']; ?>)" class=" glyphicon glyphicon-print" ></a></td>                               
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
            <input type="text" readonly id="idusu" name="idusu" value="<?php echo $id_usu;?>" style="visibility:hidden;height:5px;">
                            
			<div class="form-group">
        		<label for="nnota" class="control-label col-xs-3">Nro:</label>
        		<div class="col-xs-3">
            	<input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nregg;?>" placeholder="Nro Recibo">
        		</div>
    		</div>  
            
               				<div class="form-group">
                            	<label for="nfac" class="control-label col-xs-3">N°Factura:</label>
        						<div class="col-xs-3">
            					<input type="text" value="<?php echo $nfact;?>"  class="form-control" id="nfac" >
        						</div>
							</div>        


            			<div class="form-group">
                            	<label for="fecha" class="control-label col-xs-3">Fecha:</label>
        						<div class="col-xs-4">
            					<input type="date" value="<?php echo $fecha;?>"  class="form-control" id="fecha" >
        						</div>
							</div>        
                            
				<div class="form-group">
   					<label for="nitcli" class="control-label col-xs-3">NIT:</label>
      					<div class="col-xs-4">
          					<input type="text" class="form-control" id="nitcli"   placeholder="Nit Cliente" >
       					</div>
				</div>        
            
				<div class="form-group">
   					<label for="nomcli" class="control-label col-xs-3">Señores(r):</label>
      					<div class="col-xs-8">
          					<input type="text" class="form-control" id="nomcli"  placeholder="Señores">
       					</div>
				</div>        

       <div class="form-group">
        <div class="col-xs-offset-4 col-xs-10">
            <div class="checkbox">
                <label><input type="checkbox"   id="facsino" >REMISION ?</label>
            </div>
        </div>
    </div>
                            
            
<input type="text" value="<?php echo $nnit;?>" style="display:none" class="form-control" id="nit"  placeholder="NIT">
<input type="text" value="<?php echo $nautori;?>"  style="display:none" class="form-control" id="nautoriza"  placeholder="N° Autorizacion">
<input type="text" value="<?php echo $nfecha;?>"  style="display:none" class="form-control" id="fechalim"  placeholder="Fecha limite"> 
<input type="text" value="<?php echo $nllave;?>"   style="display:none" class="form-control"  id="llave"  placeholder="llave">
           
            
          
          
          
          </form>
          	</div> <!--fin row -->
          
          
          
        </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary guardar-carrito3 btn-sm" accesskey="g"><u>G</u>rabar Venta</button>

        </div>
      </div>
      
    </div>
  </div>


<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
