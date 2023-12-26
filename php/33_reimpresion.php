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

<script src="../js/33_java_reimprime.js"></script>

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
		$nomdepto=$_SESSION['nomdepto'];
	//	$objusu= new	Producto(); //consulta a codnu
	//	$usuario= $objusu->getusu($usuarios);
	//	foreach($usuario as $usu):
	//		$nombre_u= $usu['nomb_usu'];
	//		$id_usu= $usu['id_usu'];
	//	endforeach;
	}
}
$objProducto = new Producto();
$paimprimir = $objProducto->getImprimirDevPer();

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
<div class="row titulo" style="background-color:#f4e385; color:#070707; "> 
		<div class="col-md-2" >
        <table class="table"><tr><td align="center"><img src="../recursos/login.png" class="img-responsive" width="60px" height="60px" alt="lebrai"></td>
         <td align="center"><h4><?php echo $nomdepto ; ?></h4></td></tr></table>
		</div>
        
		<div class="col-md-6">
            	<table class="table"><tr><td align="center"><h3>RE-IMPRESION DE NOTAS</h3></td></tr></table>
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
        <a href="../php/z_inicio1.php" class="btn btn-success btn-sm " role="button" aria-disabled="true" accesskey="s"><span class="glyphicon glyphicon-home"></span> <u>S</u>ALIR</a>
        		<br>
		</div>

</div>



<div class="row" > 
		

		<div class="col-md-5 fila1" style="background-color:#fcf8f8 ;">
		<center><h4>DATOS DE BUSQUEDA</h4></center>
       
        
        	 <form  class="form" id="formulario">
             
             <input type="hidden" class="form-control input-sm" id="oparea"  />
                    
         			<div class="col-md-9">
                  	<span class="help-block text-muted small-font" >  AREA :</span>
                 	 		<select name="opimpre" id="opimpre" class="form-control" >
                                <option value="0">Ninguno</option>
                                <option value="Inventario">INVENTARIO COMPRAS</option>
                                <option value="Orden">ORDEN DE COMPRAS</option>
                                <option value="Personal">ENTREGA MATERIAL AL PERSONAL</option>
                                <option value="PersonalDv">DEVOLUCION MATERIAL DEL PERSONAL</option>
                                <option value="Transferencia">TRANSFERENCIAS</option>


                            </select>
              		</div>
				
 

             </form>
                 <div id="resultados"></div>
                

		</div> <!-- FIN DE col-md-5 -->



		<div class="col-md-7 fila2" style="background-color:#fcf8f8;"> <!--B inicio DE col-md-5 -->
				<center><h4>Notas de Re-impresion</h4></center>

         		<div class="detalle-producto"></div>
				
        </div> <!--B FIN DE col-md-5 -->
        
        

</div> <!--fin row -->
        
<br>





</div> <!--fin container -->








<?php
$fecha = date('Y-m-d');
?>



<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
