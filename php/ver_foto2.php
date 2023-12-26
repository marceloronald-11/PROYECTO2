<?php
include('conexion.php');

$id = $_POST['id'];

//ELIMINAMOS EL PRODUCTO

//$registro=mysql_query("SELECT * FROM productos WHERE id_prod=$id");

?>

<table width="300" border="1" align="center">
<?
$re=mysql_query("select * FROM productos WHERE id_prod=$id");

while($f=mysql_fetch_array($re)){ ?>

<tr><td width="150" ><? echo $f['nomb_prod']; ?></td></tr>
<tr><td width="150"><?	echo '<img src="'.$f['foto'].'" width="500" heigth="500"/>';?></td></tr>
<? } ?>
</table>





<!--?> -->

