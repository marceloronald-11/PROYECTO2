<!doctype html>
<html>
<?php
include('conexion.php');
//		data:'id='+codclix+'&cdfile='+codfilex,

$id = $_POST['id'];//codcli
//$id2 = $_POST['cdfile'];//codfile
	
?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<style type="text/css">
	
.bag1 {
	font-family: Arial, Helvetica, sans-serif;
	background-color:#82E964;
	font-size: 20px;
	margin-right: 12px;
	color: #b33c0d;
	
}		

</style>        
        	
	
	
	
<head>
<meta charset="utf-8">
<title>adm</title>
 </head>

<body>

<table class="table" width="450px" border="0" >
<?php
$re=mysqli_query($conexion,"select * FROM alumno WHERE codalum='$id' ");

while($f=mysqli_fetch_array($re)){ ?>

<tr><td width="150" ><?php echo $f['nombrealum']; ?></td></tr>

<?php } ?>
</table>

<form action="crm_subirfotodocc.php" method="post" id="formulario" enctype="multipart/form-data">
	<input type="hidden" name="codcli3" class="form-control" value="<?php echo $id; ?>">
Detalle: <input type="text" name="dt" class="form-control" >	
 Buscar Imagen: <input type="file" name="file" class="form-control" >
<!--<input type="hidden" id="idprod" name="idprod" class="form-control"  value="<?php //echo $id2; ?>">-->
  <p>
    <input class="form-control" type="submit" name="ENVIAR" id="ENVIAR" value="Subir Imagen" />
  </p> 
 
 </form>
  <div id="respuesta"></div>




   	<script src="../js/jquery.js"> </script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
