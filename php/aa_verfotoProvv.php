<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//$registro=mysql_query("SELECT * FROM productos WHERE id_prod=$id");

?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM proveedor WHERE codpv=$id");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="100" >Proveedor :<?php echo $f['nombrepv']; ?></td></tr>
<tr><td width="100" >No Carnet:<?php echo $f['cipv']; ?></td></tr>

<tr><td width="100"><?php	echo '<img src="'.$f['fotopv'].'" width="300" heigth="300"/>';?></td></tr>
<?php } ?>
</table>





<!--?> -->

