<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//$registro=mysql_query("SELECT * FROM productos WHERE id_prod=$id");

?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM activos WHERE codar='$id' ");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="100" >Detalle :<?php echo $f['descripcion']; ?></td></tr>
<tr><td width="100" >U.Med :<?php echo $f['umed']; ?></td></tr>
<tr><td width="100" >Precio :<?php echo $f['pvp']; ?></td></tr>
<tr><td width="100" >Observacion :<?php echo $f['observ']; ?></td></tr>

<tr><td width="100"><?php	echo '<img src="'.$f['foto'].'" width="150" heigth="200"/>';?></td></tr>
<?php } ?>
</table>





<!--?> -->

