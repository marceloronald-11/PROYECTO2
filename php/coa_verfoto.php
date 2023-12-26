<!doctype html>
<html>
<?php
include('conexion.php');

$id = $_POST['id'];
?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<head>
<meta charset="utf-8">
<title>gym</title>
 </head>

<body>

<table class="table" width="300" border="0" align="center">
<?php
$re=mysqli_query($conexion,"select * FROM articulos WHERE codar='$id' ");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="150" ><?php echo $f['descripar']; ?></td></tr>
<tr><td width="150" align="center"><?php	echo '<img src="'.$f['fotoar'].'" width="300px" heigth="300px"/>';?></td></tr>
<?php } ?>
</table>

<form action="coa_subirfoto.php" method="post" id="formulario" enctype="multipart/form-data">
 Buscar Imagen: <input type="file" name="file" class="form-control" >
<input type="hidden" id="idprod" name="idprod" class="form-control"  value="<?php echo $id; ?>">
  <p>
    <input class="form-control" type="submit" name="ENVIAR" id="ENVIAR" value="Subir Imagen" />
  </p> 
 
 </form>
  <div id="respuesta"></div>




   	<script src="../js/jquery.js"> </script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
