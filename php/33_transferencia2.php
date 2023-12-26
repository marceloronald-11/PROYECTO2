<?php
//session_start();
if (!isset($_SESSION)) {session_start();}

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
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
		$coddepx= $_SESSION['depto'];
		$idper=$_SESSION['id_per'];
	}
}

//$nousuario=$_SESSION['nomb_usu'];
//$idper=$_SESSION['id_per'];
//$id_usu=$_SESSION['id_usu'];


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inventario</title>
<!--<link href="../css/estiloav.css" rel="stylesheet"> -->
<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

              	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
				<script type="text/javascript" src="../js/script/jqueryui.js"></script>

<script src="../js/33_java_trans2.js"></script>

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
    .ttam {
	font-size: 11px;
	}

    .subir {
	size: 20px;
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
		$id_usu= $_SESSION['id_usu'];
		$nombre_u= $_SESSION['nomb_usu'];
		$coddepx= $_SESSION['depto'];
		$idper=$_SESSION['id_per'];
		$nomdepto=$_SESSION['nomdepto'];
	}
}
$objProducto = new Producto();
$paimprimir = $objProducto->getImprimirPPer();

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
$buscadepto = $objProducto->getdepto();


$fecha = date('Y-m-d');
?>



<div class="container-fluid"> <!--inicio container -->
<br>
<div class="row titulo" style="background-color:#ab8cc8; color:#070707; "> 
		<div class="col-md-2" >
        <table class="table"><tr><td align="center"><img src="../recursos/login.png" class="img-responsive" width="60px" height="60px" alt="lebrai"></td>
         <td align="center"><h4><?php echo $nomdepto ; ?></h4></td></tr></table>
		</div>
        
		<div class="col-md-6">
            	<table class="table"><tr><td align="center"><h3>Modulo: TRANSFERENCIAS</h3></td></tr></table>
		</div>
        
		<div class="col-md-3">
        <br/>
<table border="0" width="100%" class="table"><tr><td width="50%" align="right"> <img src="<?php echo $fotito; ?>"  class="img-circle" width="45" height="45"/></td><td align="left">
<?php echo 'Usuario :'.$nombre_u; ?>
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
		<center><h4>FORMULARIO DE ENTREGA</h4></center>
				              <input type="hidden" required readonly id="iidper" name="iidper"/>
                                <input type="hidden"  id="clasemov" name="clasemov" value="Transferencia" >

<table border="0" width="80%" class="table">
<tr> <td align="right">No Nota :</td><td width="60%"><input type="text" class="form-control" readonly id="nnota" name="nnota" value="<?php echo $nroing;?>" placeholder="Nro Recibo"></td></tr>
<tr> <td align="right">Fecha :</td><td><input type="date" value="<?php echo $fecha;?>"  class="form-control" id="fecha" ></td></tr>

<tr> <td align="right">Transferencia al Depto:</td><td>
					<select  class = "form-control"  name="iidepto" id="iidepto">
						<?php
							echo '<option selected="selected" disabled="disabled">Departamento</option>';
							foreach($buscadepto as $nn): 
							echo '<option value="'.$nn['coddep'].'">'.$nn['descripdepto'].'</option>';
							endforeach;
							?>
					</select>
</td></tr>

<tr> <td align="right">Encargado:</td><td><input type="text" class="form-control" id="encarga" placeholder="Encargado"></td></tr>

</table>

               
              <input type="hidden"  id="coddepx" name="coddepx" value="<?php echo $coddepx;?>" >
        	 <form  class="form-horizontal" id="formulario">
              <input type="hidden"  id="idusu" name="idusu" value="<?php echo $id_usu;?>" >
             
                  
<input type="hidden" class="form-control input-sm" id="cod" placeholder="Codigo"   />
<input type="hidden" class="form-control input-sm" id="ume"  placeholder="U.Med."   />
<input type="hidden" class="form-control input-sm" id="pn" placeholder="Neto"  />
<input type="hidden" class="form-control input-sm" id="pv" placeholder="Venta"  />
<input type="hidden" class="form-control input-sm" id="stm" placeholder="Stock"  />
<input type="hidden" class="form-control input-sm" id="coprov" placeholder="codproveedor"  />
<input type="hidden" class="form-control input-sm" id="cla" placeholder="cod clase"  />
<!--<input type="text" class="form-control input-sm" id="saldoex" placeholder="saldo"  />
-->

     			<div class="row">
         			<div class="col-md-7">
                  	<span class="help-block text-muted small-font" >Descripcion:</span>
                 	 <input type="text" class="form-control input-sm" id="descrip"  placeholder="Descripcion"   />
              		</div>
           			<div class="col-md-2">
                  	<span class="help-block text-muted small-font" >  Saldo:</span>
                 	 <input type="text" class="form-control input-sm" readonly id="saldoex" />
              		</div>
                    
         			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Cant.</span>
                 	 <input type="text" class="form-control input-sm" id="cant" placeholder="Cant."  />
              		</div>
                    
                    
				</div>
				
 

     			
                <div class="row">
         			<div class="col-md-9">
                  	<span class="help-block text-muted small-font" > Observaciones</span>
                 	 <textarea class="form-control" rows="2" id="observ" required name="observ" placeholder="Observaciones"></textarea>
              		</div>

           			<div class="col-md-3">
                  	<span class="help-block text-muted small-font" >  Codigo:</span>
                 	 <input type="text" class="form-control input-sm" readonly id="codar" />
              		</div>

             	</div>




             </form>
                 <div id="resultados"></div>
                
<div>
<button type="button" class="btn btn-primary btn-sm btn-agregar-producto"><span class="glyphicon glyphicon-plus-sign"></span> AGREGAR A LA NOTA</button>

<!--<button type="button" class="btn btn-sm  btn-primary btnPersonal" accesskey="a"><span class="glyphicon glyphicon-plus-sign"></span> <u>A</u>GREGAR ITEM</button> -->
<button type="button" class="btn btn-sm  btn-danger LimpiaForm" accesskey="a"><span class="glyphicon glyphicon-remove-sign"></span> <u>L</u>impiar Formulario</button>
</div>

</div>		 <!-- FIN DE col-md-5 -->



		<div class="col-md-5 fila2" style="background-color:#fcf8f8;"> <!--B inicio DE col-md-5 -->
				<center><h4>Nota de Entrega</h4></center>

         		<div class="detalle-producto"></div>
				
        </div> <!--B FIN DE col-md-5 -->
        
        

		<div class="col-md-2 fila1" style="background-color:#030110;"> <!-- INICIO DE col-md-2 -->
        	<center>
            <table border="0" class="table" width="100%">
<tr><td align="center"><button type="button" class="btn btn-primary guardar-transf btn-sm"><span class="glyphicon glyphicon-floppy-save"></span> Guardar Transferencia</button>    </td></tr>
<tr><td align="center"><button type="button" class="btn btn-sm btn-danger limpiacarroumsa" accesskey="n"><span class="glyphicon glyphicon-remove"></span> A<u>N</u>ULAR NOTA</button></td></tr>
<!--<tr><td align="center"><button type="button" class="btn btn-success guardaPerso btn-sm" accesskey="g"><span class="glyphicon glyphicon-floppy-save"></span> <u>G</u>RABAR NOTA</button></td></tr>
-->

            </table>
			</center>
        </div> <!-- FIN DE col-md-2 -->        

</div> <!--fin row -->
        
<br>

<div class="row"> <!--inicio row D -->
		<div class="col-md-12 fila3">
        
        
            <div class="detalle-producto1" style="background-color:#8a59b9; color:#040007;"> 
<br>
            <center><h4>IMPRESIONES  DE NOTAS PENDIENTES</h4>
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
