
<?php

				//require_once("conexion/conexion.php");
				include('conexion.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script src="../assets/js/jquery-2.1.4.min.js"></script>

</head>

<body>


<script type="text/javascript">
$(function () {
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Worlds largest cities per 2017'
  },
  subtitle: {
    text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
  },
  xAxis: {
    type: 'category',
    labels: {
      rotation: -45,
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Population (millions)'
    }
  },
  legend: {
    enabled: false
  },
  tooltip: {
    pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
  },
  series: [{
    name: 'Population',
    data: [
			<?php
//$sql=mysql_query("select * from deudas order by monto_deudor desc");
$sql1 = mysqli_query($conexion,"SELECT * FROM ventasgrafi ");

while($ress=mysqli_fetch_array($sql1)){			
?>			
			[<?php echo $ress['impoventa']; ?>],
			 //['Shanghai', 24.2],
		
<?php
}
?>			
    ],
    dataLabels: {
      enabled: true,
      rotation: -90,
      color: '#FFFFFF',
      align: 'right',
      format: '{point.y:.1f}', // one decimal
      y: 10, // 10 pixels down from the top
      style: {
        fontSize: '13px',
        fontFamily: 'Verdana, sans-serif'
      }
    }
  }]
});

});

</script>






<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>









</body>
</html>
