<?php
include('conexion.php');

class Ajax{
public $buscador;
public function Buscar($a){
$registro = mysql_query("SELECT * FROM productos WHERE nomb_prod LIKE '%$a%' ORDER BY id_prod ASC");
while ($array=mysql_fetch_array($registro)){
 $resultado[]=$array['nomb_prod'];
}
	return $resultado;
}
}

$busqueda= new Ajax();
echo json_encode($busqueda->Buscar($_GET['term']));
?>