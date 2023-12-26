<?php
include('conexion.php');

$id = $_POST['id'];


?>

<table width="300" border="1" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM articulos WHERE codar=$id");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="100" >Producto :<?php echo $f['descripar']; ?></td></tr>
<tr><td width="100" >U.Med.:<?php echo $f['codigoba']; ?></td></tr>

<tr><td width="100"><?php	echo '<img src="'.$f['fotoar'].'" width="300" heigth="300"/>';?></td></tr>
<?php } ?>
</table>





<!--?> -->

