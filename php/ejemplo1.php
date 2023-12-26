<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Probando Ajax</title>


<script src="../js/jquery.js"></script>
<script src="../js/jquery.numeric.js"></script>

              	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
				<script type="text/javascript" src="../js/script/jqueryui.js"></script>

<script src="../js/myjavaAjax.js"></script>

	 <!-- Alertity -->
    <link rel="stylesheet" href="../libs/js/alertify/themes/alertify.core.css" />
	<link rel="stylesheet" href="../libs/js/alertify/themes/alertify.bootstrap.css" id="toggleCSS" />
    <script src="../libs/js/alertify/lib/alertify.min.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


</head>

<body>
<div class="container-fluid"> <!--inicio container -->

<div class="row" > 
<div class="col-md-6 fila1" style="background-color:#00000;">
        	 <form  class="form-horizontal" id="formulario">
             
             	     <div class="row">
              			<div class="col-md-9">
                  		<span class="help-block text-muted small-font" > Detalle</span>
                  		<input type="text" class="form-control input-sm" id="buscar2" placeholder="Indique Detalle" />
              			</div>
					</div>

             	     <div class="row">
              			<div class="col-md-9">
                  		<span class="help-block text-muted small-font" > Cantidad</span>
                  		<input type="text" class="form-control input-sm" id="cant" placeholder="Cantidad" />
              			</div>
					</div>

			</form>
                 <div id="resultados"></div>
                 <br>

</div>
		<div class="col-md-6 fila2" style="background-color:#97e87b;">
				<center><h4>DETALLLE DE VENTA</h4></center>

         		<div class="detalle-producto"></div>
				
        </div>





</div>


<div class="row" > 

</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
