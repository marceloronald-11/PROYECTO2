<?php
$conexion=mysqli_connect("localhost","root","","bdnaabol") or die ("Error no Conecta". mysqli_error($conexion));
if (mysqli_connect_errno())
 {
  echo "Error de Conexion  MySQL: " . mysqli_connect_error();
  }
?>