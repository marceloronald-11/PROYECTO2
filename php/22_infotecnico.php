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
<title>OTES</title>
<!--<link href="../css/estiloav.css" rel="stylesheet"> -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

              	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
				<script type="text/javascript" src="../js/script/jqueryui.js"></script>

<script src="../js/1_java_info.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style type="text/css">
    .ltam {
	font-size: 9px;
	
}
ul.ui-autocomplete {
    z-index: 1100;
}

    .btnTecnico {
	margin-top: 6px;
	margin-right: 0px;
	margin-bottom: 5px;
	margin-left: 0px;
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
$paimprimir = $objProducto->getImprimir();

$nnota = $objProducto->getcodnu();
		foreach($nnota as $nro):
			$nroing= $nro['nordenmv']+1;
		endforeach;


$re = $objProducto->getpersonas($idper);

		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;
		
$prov = $objProducto->getproveedor();
$clasi = $objProducto->getclasifica();
$fecha = date('Y-m-d');
?>



<div class="container-fluid"> <!--inicio container -->
<br>
<div class="row titulo" style="background-color:#ab8cc8; color:#070707; "> 
		<div class="col-md-2" >
        <table class="table"><tr><td align="center"><!--<img src="../recursos/logo1.png" class="img-responsive media-object registrar-cliente" alt="lebrai">--></td></tr></table>
		</div>
        
		<div class="col-md-6">
            	<table class="table"><tr><td align="center"><h3>Modulo: COMPRAS</h3></td></tr></table>
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
        <a href="../php/z_inicio1.php" class="btn btn-warning btn-sm " role="button" aria-disabled="true" accesskey="s"><span class="glyphicon glyphicon-home"></span> <u>S</u>ALIR</a>
        		<br>
		</div>

</div>



<div class="row" > 
		

		<div class="col-md-5 fila1" style="background-color:#fcf8f8 ;">
		<center><h4>FORMULARIO DE REGISTRO</h4></center>
				              <input type="hidden" required readonly id="codtec" name="codtec"/>

<table border="0" width="80%" class="table">
<tr> <td align="right">No Nota :</td><td width="60%"><input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nroing;?>" placeholder="Nro Recibo"></td></tr>
<tr> <td align="right">Fecha :</td><td><input type="date" value="<?php echo $fecha;?>"  class="form-control" id="fecha" ></td></tr>
<tr> <td align="right">Encargado:</td><td><input type="text" class="form-control" id="encarga" placeholder="Encargado"></td></tr>
</table>
                
                
       
        
        	 <form  class="form-horizontal" id="formulario">
              <input type="hidden"  id="idusu" name="idusu" value="<?php echo $id_usu;?>" >
             
			      	<input type="text" required readonly id="codar" name="codar"/>
                  



     			<div class="row">
         			<div class="col-md-8">
                  	<span class="help-block text-muted small-font" >Descripcion:</span>
                 	 <input type="text" class="form-control input-sm" id="descrip"  placeholder="Descripcion"   />
              		</div>
         			<div class="col-md-2">
                  	<span class="help-block text-muted small-font" >Codigo:</span>
                 	 <input type="text" class="form-control input-sm" id="cod" placeholder="Codigo"   />
              		</div>
         			<div class="col-md-2">
                  	<span class="help-block text-muted small-font" >U.Med:</span>
                 	 <input type="text" class="form-control input-sm" id="ume"  placeholder="U.Med."   />
              		</div>
                    
                    
                    
                    
				</div>
				
                <div class="row">
         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Cant.</span>
                 	 <input type="text" class="form-control input-sm" id="cant" placeholder="Cant."  />
              		</div>

         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Precio Neto</span>
                 	 <input type="text" class="form-control input-sm" id="pn" placeholder="Neto"  />
              		</div>

         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Precio Venta:</span>
                 	 <input type="text" class="form-control input-sm" id="pv" placeholder="Venta"  />
              		</div>

         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Stock Min:</span>
                 	 <input type="text" class="form-control input-sm" id="stm" placeholder="Stock"  />
              		</div>
             	</div>

     			<div class="row">
         			<div class="col-md-6">
                  	<span class="help-block text-muted small-font" > Proveedor:</span>
					<select name="coprov" id="coprov" class="form-control" >
                    <option value="0">Ninguno</option>
						<?php foreach($prov as $dato):?>
						<option value="<?php echo $dato['codpv']?>"><?php echo $dato['nombre']?></option>
						<?php endforeach;?>
					</select>
              		</div>

         			<div class="col-md-6">
                  	<span class="help-block text-muted small-font" >Clasificacion:</span>
					<select name="cla" id="cla" class="form-control" >
                    <option value="0">Ninguno</option>
						<?php foreach($clasi as $dato1):?>
						<option value="<?php echo $dato1['codcla']?>"><?php echo $dato1['descripcla']?></option>
						<?php endforeach;?>
					</select>
              		</div>
				</div>
                <div class="row">
         			<div class="col-md-12">
                  	<span class="help-block text-muted small-font" > Observaciones</span>
                 	 <textarea class="form-control" rows="2" id="observ" required name="observ" placeholder="Observaciones"></textarea>
              		</div>
             	</div>




             </form>
                 <div id="resultados"></div>
                
<div><button type="button" class="btn btn-sm  btn-primary btnTecnico" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>GREGAR ITEM</button></div>
		</div> <!-- FIN DE col-md-5 -->



		<div class="col-md-5 fila2" style="background-color:#fcf8f8;"> <!--B inicio DE col-md-5 -->
				<center><h4>Nota de Ingreso</h4></center>

         		<div class="detalle-producto"></div>
				
        </div> <!--B FIN DE col-md-5 -->
        
        

		<div class="col-md-2 fila1" style="background-color:#030110;"> <!-- INICIO DE col-md-2 -->
        	<center>
            <table border="0" class="table" width="100%">

<!--<tr><td align="center"><button type="button" class="btn btn-sm  btn-primary btnTecnico" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>GREGAR ITEM</button></td></tr>
--><!--<tr><td align="center"><button type="button" class="btn btn-sm btn-warning irmodal" accesskey="c"><span class="glyphicon glyphicon-check"></span> <u>C</u>ERRAR INFORME</button></td></tr>
--><tr><td align="center"><button type="button" class="btn btn-sm btn-danger limpiacarroumsa" accesskey="n"><span class="glyphicon glyphicon-remove"></span> A<u>N</u>ULAR NOTA</button></td></tr>
<tr><td align="center"><button type="button" class="btn btn-success guardaring btn-sm" accesskey="g"><span class="glyphicon glyphicon-save"></span> <u>G</u>RABAR NOTA</button></td></tr>
     
            </table>
			</center>
        </div> <!-- FIN DE col-md-2 -->        

</div> <!--fin row -->
        
<br>

<div class="row"> <!--inicio row D -->
		<div class="col-md-12 fila3">
        
        
            <div class="detalle-producto1" style="background-color:#8a59b9; color:#040007;"> 
<br>
            <center><h4>IMPRESIONES  PENDIENTES DE INFORMES TECNICOS</h4>
					<table class="table " width="100%">
					        <tr>
					            <td align="center">Fecha</td>
					            <td align="center">No Orden</td>
					            <td align="center">Encargado</td>
  					            <td align="center">No Items</td>

					            <td>Opcion</td>
					        </tr>
					    <tbody>
					    	<?php 
					    	foreach($paimprimir as $dett2){ 
							$fffe= date("d-m-Y", strtotime($dett2['fechato']) );
					    	?>
					        <tr>
					        	<td width="13%" align="center"><?php echo $fffe;?></td>
					        	<td width="10%" align="center"><?php echo $dett2['norden'];?></td>
					            <td width="40%" align="center"><?php echo $dett2['afavor'];?></td>
                              	 <td width="40%" align="center"><?php echo $dett2['itm'];?></td>

	<td align="center" width="5%"><a href="javascript:mostrarIngreso(<?php echo $dett2['norden']; ?>)" class=" glyphicon glyphicon-print tam" ></a></td>                               
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



<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
