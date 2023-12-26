<?php
if (!isset($_SESSION)) {session_start();}
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

mysqli_query($conexion,"DELETE FROM planpagos WHERE codplan = '$id'");

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$codclixx = $_SESSION['codclises'];
$codsolixx =$_SESSION['codsolises'];
$fecha = date('Y-m-d');
?>
<div class="container">
  <h2>Generando Plan de Pagos</h2>
  <p>Cooperativa Maya</p>
  <form class="form-inline" id="formularioPlan" onsubmit="return agregaRegPlan();">
	  
<input type="hidden"  id="proplan"  name="proplan" value="Registro">
	  <input type="hidden"  id="codclixx"  name="codclixx" value="<?php echo $codclixx;?>" >
	  <input type="hidden"  id="codsolixx"  name="codsolixx" value="<?php echo $codsolixx;?>" >	  
	  
	  
	  
    <div class="form-group">
      <label class="sr-only" for="fechax">Fecha:</label>
      <input type="date" class="form-control" id="fechax"  placeholder="Fecha"  name="fechax">
    </div>
	  
    <div class="form-group">
      <label class="sr-only" for="capìtalx">Capital:</label>
      <input type="text" class="form-control" id="capitalx" placeholder="Capital"  name="capitalx">
    </div>
    <div class="form-group">
      <label class="sr-only" for="interesx">Interes:</label>
      <input type="text" class="form-control" id="interesx" placeholder="Interes" name="interesx">
    </div>
     <div class="form-group">
      <label class="sr-only" for="pwd">Cargos:</label>
      <input type="text" class="form-control" id="cargosx" placeholder="Cargos" name="cargosx">
    </div>
    <div class="form-group">
      <label class="sr-only" for="garantiax">Garantia:</label>
      <input type="text" class="form-control" id="garantiax" placeholder="Garantia" name="garantiax">
    </div>
  <div id="mensajeplan"></div>
    <button type="submit" class="btn btn-default">Añadir</button>
  </form>
</div>





<?php
$registro = mysqli_query($conexion,"SELECT * FROM planpagos AS pla LEFT JOIN clientes AS cli ON pla.codcli=cli.codcli WHERE pla.codcli='$codclixx' AND pla.codsoli='$codsolixx' ");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered titi">
			            <tr>
					            <td align="center" width="9%">Fecha</td>
					            <td align="center" width="5%">Capital</td>
					            <td align="center" width="5%">Interes</td>
					            <td align="center" width="5%">Cargos</td>			
								<td align="center" width="5%">Garantia</td>
								<td align="center" width="5%">Cuota</td>
								<td align="center" width="5%">Saldo</td>
								<td align="center" width="5%">Acciones</td>
					        </tr>';
$totcap=0;
$totinter=0;
$totcargo=0;
$totgara=0;
$totcuota=0;
$totcap=0;
$totsaldo=0;
$totcuota=0;
$sw=0;
	while($registro2 = mysqli_fetch_array($registro)){
		$fexx= date("d-m-Y", strtotime($registro2['fechaplan']) );
		$totcap+=$registro2['capital'];
if($sw==0){			
	$inicial=$registro2['saldo'];
	$sw=1;
	$ant=$inicial;
}else{
$totcuota=$registro2['capital']+$registro2['interes']+$registro2['cargos']+$registro2['garantia'];
$inicial=$ant-$registro2['capital'];
$ant=$inicial;
}
		
		echo '<tr>
							<td align="center">'.$fexx.'</td>
							<td align="right">'.$registro2['capital'].'</td>
							<td align="right">'.$registro2['interes'].'</td>
							<td align="right">'.$registro2['cargos'].'</td>
							<td align="right">'.$registro2['garantia'].'</td>
							<td align="right">'.$totcuota.'</td>
							<td align="right">'.$inicial.'</td>

							<td align="center"> <a href="javascript:eliminaPlan('.$registro2['codplan'].');" ><img src="../recursos/borrar.png" data-toggle="tooltip" title="Eliminar"></a></td>
						  </tr>';
	}
echo '<tr><td>Totales</td><td align="right">'.number_format($totcap,2).'</td></tr>';
echo '<tr><td colspan="4"><a href="crm_plan.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Retornar "> SALIR</a></td></tr>'.'  ';

echo '</table>';
?>