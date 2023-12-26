<html>
    <head>
        <title>GRAFICO COMPRAS</title>
        <meta charset="UTF-8">
        <!--<script type="text/javascript" src="js/jquery.js"></script> -->
        <script src="../js/jquery.js"></script>
        <!--<script type="text/javascript" src="js/chartJS/Chart.min.js"></script>-->
        <script type="text/javascript" src="../js/chartJS/Chart.min.js"></script>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    </head>
    <style>
        .caja{
	margin: auto;
	max-width: 250px;
	padding: 20px;
	border: 1px solid #c6bebe;
	background-color: #a0d5ba;
	color: #891cde;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: auto;
            margin-top: 40px;
            width: 1000px;
        }
 
    </style>
<body> 

<div class="container">
	  <br>
      <br>
        <div id="lado1" class="row">     
		<h3> GRAFICO DE COMPRAS </h3>    
        <div class="caja col-md-2">
            <select onChange="mostrarResultados(this.value);">
                <?php
                    for($i=2014;$i<2026;$i++){
                        if($i == 2015){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                ?>
            </select>
            <br>
            <br>
            <br>
            <br>
        <div><a href="../php/ventas.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> INICIO </a></div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <img src="../recursos/store.jpg" class="img-responsive">

        </div>
         
		
        <div class="col-md-10">
        <div class="resultados"><canvas id="grafico"></canvas></div>
       	<script src="../bootstrap/js/bootstrap.min.js"></script>
		</div>
        
        </div>
</div>
    </body>
    
    
    
<script>
            $(document).ready(mostrarResultados(2015));  
                function mostrarResultados(año){
                    $.ajax({
                        type:'POST',
                        url:'../controller/procesar.php',
                        data:'año='+año,
                        success:function(data){

                            var valores = eval(data);

                            var e   = valores[0];
                            var f   = valores[1];
                            var m   = valores[2];
                            var a   = valores[3];
                            var ma  = valores[4];
                            var j   = valores[5];
                            var jl  = valores[6];
                            var ag  = valores[7];
                            var s   = valores[8];
                            var o   = valores[9];
                            var n   = valores[10];
                            var d   = valores[11];
                                
                            var Datos = {
                                    labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    datasets : [
                                        {
                                            fillColor : 'rgba(15,14,200,0.6)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data : [e, f, m, a, ma, j, jl, ag, s, o, n, d]
                                        }
                                    ]
                                }
                                
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                        }
                    });
                    return false;
                }
    </script>
</html>