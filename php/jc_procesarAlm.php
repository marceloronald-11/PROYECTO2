<?php
if (!isset($_SESSION)) {session_start();}
$nombre_u=$_SESSION['nomb_usu'];
$fotito=$_SESSION['fotousu'];
$nombresuc=$_SESSION['nomb_suc'];
$codsucx=$_SESSION['codsuc'];
$area=$_SESSION['id_area'];
$idusu=$_SESSION['id_usu'];
include('conexion.php');

//$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO
$cb= mysqli_query($conexion,"SELECT * FROM cabecera  ");
while($cbb = mysqli_fetch_array($cb)){
   $versionx= $cbb['version'];
   $coddocx= $cbb['coddoc'];
   $fedoc= $cbb['fechacab'];

}


$dat= mysqli_query($conexion,"SELECT * FROM codnu  ");
while($ddx = mysqli_fetch_array($dat)){
   $nordenx= $ddx['nordensol']+1;
}

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS
$reg= mysqli_query($conexion,"SELECT * FROM repuesto WHERE saldomin=5  ");

while($rex = mysqli_fetch_array($reg)){
   $codrepx= $rex['codrep'];
   $umedx= $rex['umed'];
   $detrepu= $rex['detrepuesto'];
   $codigox= $rex['codigo'];
   $preciodtx= $rex['costo'];
   $saldox= $rex['saldo'];
   $saldominx= $rex['saldomin'];


   mysqli_query($conexion,"INSERT INTO solicituddet2 (codrep,detrepdt,codigo,umed,norden,preciodt,saldodt,saldomindt)VALUES('$codrepx','$detrepu','$codigox','$umedx','$nordenx','$preciodtx','$saldox','$saldominx')");

}


 mysqli_query($conexion,"INSERT INTO solicitudtot2 (norden,afavor,id_usu,coddoc,versionn,fechasol,tmm)VALUES('$nordenx','$nombre_u','$idusu','$coddocx','$versionx','$fedoc','Proceso')");

mysqli_query($conexion,"UPDATE codnu SET nordensol ='$nordenx' ");

?>