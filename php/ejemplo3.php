<?php

				//require_once("conexion/conexion.php");
				include('conexion.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>farmacia</title>

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="../js/jquery.js"></script> -->
        <script src="../assets/js/jquery-2.1.4.min.js"></script>

		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Ventas del Año'
        },
        subtitle: {
            text: 'Sistema FAAR'
        },
        xAxis: {
            categories: [
<?php
//$sql=mysql_query("select * from deudas order by monto_deudor desc");
$sql = mysqli_query($conexion,"SELECT * FROM ventasgrafi order by codgrav asc");
while($res=mysqli_fetch_array($sql)){			
?>
			
			['<?php echo $res['mess'] ?>'],
			
<?php
}
?>
			
			],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Ventas (Bolivianos)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Bs.'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 200,
            floating: false,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'VENTAS',
            data: [
			<?php
//$sql=mysql_query("select * from deudas order by monto_deudor desc");
$sql1 = mysqli_query($conexion,"SELECT * FROM ventasgrafi ");

while($ress=mysqli_fetch_array($sql1)){			
?>			
			[<?php echo $ress['impocompra']; ?>],
		
<?php
}
?>			
			]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="../js/Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../js/Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo4.php">Ver ejemplo 4</a></center>
	</body>
</html>
