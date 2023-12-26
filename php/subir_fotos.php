<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
 
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


</head>

<body>
<DIV Id="inic"><a href="../index2.html"> INICIO</a></DIV>
<DIV Id="FONDO">
<?
include('conexion.php');
?>


<DIV Id="listado">

<table width="950" border="0" align="center">
<tr id="CABECERA">
	<td width="10">Item</td><td width="150">DESCRIPCION</td>
    <td width="138">Imagen</td> <td with="20">OPCION</td>
 </tr>
<?
$re=mysql_query("select * FROM productos");
while($f=mysql_fetch_array($re)){ ?>
<tr id="datos" >
<td width="8" ><? echo $f['id_prod']; ?></td>
<td width="150" ><? echo $f['nomb_prod']; ?></td>
<td width="138"><?	echo '<img src="'.$f['foto'].'" width="150" heigth="150"/>'.'<br>';?></td>
<td width="20"><a href=../p_baja3.php?id=<? echo $f['id_prod'];?> >Eliminar</a></td>

</tr>
<? } ?>
</table>
<br />
<br />
<br />
<br />

</DIV>
<div Id="formu">
<form action="subir.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <fieldset>
    <legend>FORMULARIO DE PEDIDO L'GANS</legend>
    <p>
      <label for="nombre">DESCRIPCION:</label>
      <input name="nombre" type="text" id="nombre" size="70" />
    </p>
</fieldset>
  <fieldset>
      <legend>DETALLE</legend>
      <p>
        <label for="coment">COMENTARIO</label>
        <textarea name="coment" id="coment" cols="45" rows="5"></textarea>
      </p>
      <p>
        <label for="fechai">FECHA REGISTRO:</label>
        <input type="text" name="fechai" id="fechai" />
      </p>
      <p>
        <label for="fotoo">IMAGEN:</label>
        <input type="file" name="fotoo" id="fotoo" />
      </p>
      
    </fieldset>
  <p>
    <input type="submit" name="ENVIAR" id="ENVIAR" value="Enviar" />
  </p>
</form>
</div>

</DIV>



	<script src="../script/jquery.js"> </script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
