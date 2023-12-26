<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//$registro=mysql_query("SELECT * FROM productos WHERE id_prod=$id");

?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM personas WHERE id_per=$id");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="100" >Nombre :<?php echo $f['nombre']; ?></td></tr>
<tr><td width="100" >Telf/Cel :<?php echo $f['cel']; ?></td></tr>
<tr><td width="100" >No Carnet :<?php echo $f['ci']; ?></td></tr>
<tr><td width="100" >Direccion :<?php echo $f['direccion']; ?></td></tr>

<tr><td width="100"><?php	echo '<img src="'.$f['foto'].'" width="300" heigth="300"/>';?></td></tr>
<?php } ?>
</table>





<!--?> -->

