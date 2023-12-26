
<?php
if (!isset($_SESSION)) {session_start();}
date_default_timezone_set('America/La_Paz'); ///1 otro: date_default_timezone_set(‘America/La_Paz’);
$nousuario=$_SESSION['nomb_usu'];
$idper=$_SESSION['id_per'];
$idusu=$_SESSION['id_usu'];

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$re = $objProducto->getpersonas($idper);

		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;

//disiplina
$disi = $objProducto->getDisiplina();
$disi2 = $objProducto->getDisiplina();
$ttipo= $objProducto->getTipoo();
//codnu
$norden = $objProducto->getCodnu();
		foreach($norden as $no):
			$nordenx= $no['nordengym']+1;
		endforeach;


//estado
//$estado = $objProducto->getestado();
//compra
//$compra = $objProducto->getcompra();


// $foto = $objProducto->getById($id);

?>
<!doctype html>
<html>
<head>


<meta charset="utf-8">
<title>GyM</title>
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


<style type="text/css">
.titi {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
</style>
<script src="../js/myjavapagos.js"></script>
<script src="../js/jquery.numeric.js"></script>

</head>

<body>
<div class="container-fluid">
<div class="row"> 

<div class="col-sm-4" style="background-color:white;">
<img src="../recursos/logo2.jpg" width="150" height="70">
 </div> 
<!-- fin col-sm-2 -->
<div class="col-sm-4 tit" style="background-color:white;">
<center><h3>DEUDAS GIMNASIO</h3></center>
</div> <!-- fin col-sm-2 -->
<div class="col-sm-4" style="background-color:white;">
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="45" height="50"/></td><td align="left">
<?php echo 'Usuario :'.$nousuario; ?>
</td></tr>
</table>
</div> <!-- fin col-sm-2 -->
</div> <!--!fin de row -->

<br>

<div class="row"> 
<div class="col-sm-2" style="background-color:white;">

<div class="btn-group-vertical">
<a href="z_inicio1.php" class="btn btn-primary"> <span class="glyphicon glyphicon-home"></span> Salir</a>
<a href="../index.php" class="btn btn-primary"> <span class="glyphicon glyphicon-off"></span> Cerrar Session</a>

</div>

</div> <!-- fin col-sm-2 -->


<div class="col-sm-10" style="background-color:white;">
	<table border="0" width="100%" class="table">
    <tr><td width="90%">
    <div class="input-group col-xs-6">
     <input type="text" class="form-control" placeholder="Clientes" id="bs-prod" >
      <span class="input-group-btn">
        <button class="btn btn-secondary" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
	</td>
    <td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
<!--				     	<a target="_blank" href="javascript:reportexcelPDF();" class="btn btn-success btn-sm">Exportar a Excel</a>
-->                    </div>
    			</div>
	</td>    

<td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
				     	<!--<a target="_blank" href="javascript:reportePDF();" class="btn btn-danger btn-sm">Exportar a PDF</a>-->
                    </div>
    			</div>
	</td>    
    
    <td>
    		    <div class="input-group col-xs-3">
                    <div class="col-xs-3">
<!--				     	<button id="nuevo-producto" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
-->                    </div>
    			</div>
	</td></tr>
    </table>
<div class="registros" id="agrega-registros" style="width:100%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
</div> <!-- fin col-sm-10 -->

 
</div> <!-- fin row -->



</div> <!-- fin row -->
  




    <!-- MODAL PARA CLIENTES CON REGISTRO EN LA BASE DE DATOS-->
    <div class="modal fade" id="registra-personas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>MOVIMIENTOS GIMNASIO</b></h4>
              <h4 align="left" class="fecha">  <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "La Paz, ".$array[date("w")]." ".date("d-m-y"); ?> </h4>

            </div>
            <form id="formulario" class="form-horizontal " onsubmit="return agregaRegistro();">
            <div class="modal-body">
					 <input type="hidden"   id="idper" name="idper" />
					

                   	<input type="hidden" required readonly id="pro" name="pro"/>
                   	<input type="hidden" id="idu" name="idu" value="<?php echo $idusu;?>" />

					
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="nnota">No Recibo:</label>
                    <div class="col-xs-5">
        			<input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nordenx;?>" required placeholder="No Recibo ">
                    </div>
    			</div>


			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="cli">Cliente:</label>
                    <div class="col-xs-9">
        			<input type="text" class="form-control" id="cli" name="cli" readonly required placeholder="Cliente">
                    </div>
    			</div>
                
      

<div class = "form-group">
<label for = "usu" class="control-label col-xs-3 titi">Disiplina :</label>
 <div class="col-xs-5">
<select name="cla" id="cla" class="form-control" >
 <option value="0">Ninguno</option>
	<?php foreach($disi as $dato1):?>
<option value="<?php echo $dato1['coddisi']?>"><?php echo $dato1['descripdici']?></option>
	<?php endforeach;?>
	</select>
</div>
</div>



<div class="form-group">
<label class="control-label col-xs-3 titi" for="tmv">Transaccion :</label>
 <div class="col-xs-9">
<input type="radio"  name="tmv" CHECKED id="CT" value="CT">Contado
<input type="radio"  name="tmv" id="CR" value="CR"> Credito 
 </div>
</div>

                
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pre">Importe :</label>
                    <div class="col-xs-5">
        			<input type="text" class="form-control" id="pre" name="pre" required placeholder="Importe">
                    </div>
    			</div>
                



                    		<div class="form-group">
  								<label  class="control-label col-xs-3 titi" for="observ">Observaciones:</label>
                		    	<div class="col-xs-9">
 				 					<textarea class="form-control" rows="3" id="observ" required name="observ" placeholder="Observaciones"></textarea>
                     			</div>
							</div>                
       

                        	<div id="mensaje"></div>
            </div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
<!--                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/> -->
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    








    <!-- MODAL PARA PAGOS MENSUALES GYM-->
    <div class="modal fade" id="registra-mes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>FORMULARIO de PAGOS</b></h4>
              <h4 align="left" class="fecha">  <?php $array=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
echo "La Paz, ".$array[date("w")]." ".date("d-m-y"); ?> </h4>

            </div>
            <form id="formulario1" class="form-horizontal " onsubmit="return agregaRegistroPago();">
            <div class="modal-body">
					 <input type="hidden"   id="idclii" name="idclii" />
					 <input type="hidden"   id="saldo" name="saldo" />
                   	<input type="hidden" required readonly id="pro1" name="pro1"/>
                   	<input type="hidden" id="idu1" name="idu1" value="<?php echo $idusu;?>" />
					
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="nnota1">No Recibo:</label>
                    <div class="col-xs-5">
        			<input type="text" class="form-control" readonly id="nnota1" name="nnota1" required placeholder="No Recibo ">
                    </div>
    			</div>
               
			    <div class="form-group">
        			<label class="control-label col-xs-3 titi" for="pre1">Importe Bs.-</label>
                    <div class="col-xs-5">
        			<input type="text" class="form-control" id="pre1" name="pre1" required placeholder="Importe">
                    </div>
    			</div>
                
                        	<div id="mensaje1"></div>
            </div>
<?php            
//$obj = json_decode($json1);
//echo $obj.nombre;
?>
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
<!--                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/> -->
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
        
        
</div>

<!--- fin modal -->    

  
    
</div> <!-- fin container -->

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
