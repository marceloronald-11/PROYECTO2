<?php
date_default_timezone_set('America/La_Paz');
$fecha = date('Y-m-d');

	include('conexion.php');
	//require_once '../Config/conexion.php';
	$paginaActual = 1; //$_POST['partida'];
	$codtx = $_POST['codtx'];
	$codarx = $_POST['codarx'];
	$codsucx = $_POST['codsucx'];
	$nordx = $_POST['nordx'];
	
// recupero campo codigo
$re= mysqli_query($conexion,"SELECT * FROM articulos WHERE codar='$codarx' ");
while($ree = mysqli_fetch_array($re)){
	$codigoxx=$ree['codigo'];
	$descriparx=$ree['descripar'];
	$umedx=$ree['umed'];
	$pnetoarx=$ree['pnetoar'];
	$pvparx=$ree['pvpar'];
	$codclax=$ree['codcla'];
	$codpvx=$ree['codpv'];
	$observartx=$ree['observart'];
	$stockminx=$ree['stockmin'];
	$fotoarx=$ree['fotoar'];
	$qrfotoarx=$ree['qrfotoar'];

}
///recupero nro orden correlativo
$ren= mysqli_query($conexion,"SELECT * FROM codnu ");
while($renn = mysqli_fetch_array($ren)){
	$nnox=$renn['nordenrec']+1;
}


//recupero la cantidad

$re1= mysqli_query($conexion,"SELECT * FROM transferdet WHERE codt='$codtx' ");
while($ree1 = mysqli_fetch_array($re1)){
	$cantx=$ree1['cant'];
}


//
$nrox = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM articulos WHERE codigo='$codigoxx' AND codsuc='$codsucx' "));

//mysqli_query($conexion,"UPDATE auxil SET dato1 ='$codsucx',dato2 ='$codigoxx'");

if ($nrox>0){
			mysqli_query($conexion,"UPDATE articulos SET saldo =saldo+'$cantx' WHERE codigo='$codigoxx' AND codsuc='$codsucx'"); //aumentar saldo porke eexiste
	}else{
	/// por si no existe el registro en sucursal se lo crea
		mysqli_query($conexion,"INSERT INTO articulos (codigo, descripar, umed, pnetoar, pvpar,feingar,codsuc,saldo,codcla,codpv,observart,stockmin,fotoar,qrfotoar)VALUES
		('$codigoxx','$descriparx','$umedx', '$pnetoarx', '$pvparx', '$fecha','$codsucx','$cantx','$codclax','$codpvx','$observartx','$stockminx','$fotoarx','$qrfotoarx')");
		
		$codarx=mysqli_insert_id($conexion); 
	}

mysqli_query($conexion,"UPDATE transferdet SET cdt ='X' WHERE codt='$codtx' "); // marca con X para que no se vea en el listado

// contar No item para ver si es igual No de marcado o Confirmados
$nroxx = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM transferdet WHERE norden='$nordx' AND cdt='X' "));

$be= mysqli_query($conexion,"SELECT * FROM transfertot WHERE norden='$nordx' ");
while($bee = mysqli_fetch_array($be)){
	$itmx=$bee['itm'];
	$nordenx=$bee['norden'];
	$totimportex=$bee['totimporte'];
	$fechatox=$bee['fechato'];
	$afavorx=$bee['afavor'];

}

if($nroxx==$itmx){ // si el no de Item = al de marcados colocar X en cd
mysqli_query($conexion,"UPDATE transfertot SET cd ='X' WHERE norden='$nordx' "); // marca con X para que no se vea en el listado
}
// Realizar registro de movimtot y movimdet para kardex de la sucursal
$nrok = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM movimtot WHERE norden='$nnox' ")); // verificamos si ya esta registrado la orden en movimtot
if($nrok>0){ // si el no de Item = al de marcados colocar X en cd
	mysqli_query($conexion,"UPDATE movimtot SET itm =itm+1 WHERE norden='$nnox' "); // incrementamos el item mas 1 de movimtot
}else{
// creamos el item en movimtot
mysqli_query($conexion,"INSERT INTO movimtot (fechato,tipo,norden,totimporte,afavor,itm, codsuc)VALUES
		('$fechatox','I','$nnox', '$totimportex', '$afavorx', '1','$codsucx')");
}

mysqli_query($conexion,"INSERT INTO movimdet (codar,codigo,descripdt,umed,cant,precio,subtot,norden,fechadt,tipo,codsuc,tmm)VALUES
		('$codarx','$codigoxx','$descriparx', '$umedx', '$cantx', '$pnetoarx','1','$nnox','$fechatox','I','$codsucx','ConfirSucursal')");

/// actualizo codnu
mysqli_query($conexion,"UPDATE codnu SET nordenrec ='$nnox' ");


    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM transferdet WHERE norden='$nordx' AND cdt='' "));
    $nroLotes = 100;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

//  	$registro = mysql_query("SELECT * FROM habita LIMIT $limit, $nroLotes ");
	
$registro= mysqli_query($conexion,"SELECT * FROM transferdet WHERE norden='$nordx' AND cdt='' LIMIT $limit, $nroLotes");

  	$tabla = $tabla.'<hr>';
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">';
	$tabla = $tabla.'<tr><td><h4>DETALLE</h4></td></tr>';
	$tabla = $tabla.'</table>';
	 
	 
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover">
			            <tr>
			                <td align="center">No Ordennn</td>
			                <td align="center">Articulo</td>
			                <td align="center">Cant.</td>
							<td align="center">Opciones</td>

			            </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
							<td align="left">'.$registro2['norden'].'</td>
							<td align="left">'.$registro2['descripdt'].'</td>
							<td align="center">'.$registro2['cant'].'</td>

							<td align="center"><a href="javascript:ConfirmTra('.$registro2['codt'].','.$registro2['codar'].','.$codsucx.','.$registro2['norden'].');"><img src="../recursos/confirm.png" data-toggle="tooltip" title="Confirmar Registro"></a></td>
						  </tr>';		
	}
        
    $tabla = $tabla.'</table>';
	$tabla=$tabla. '<a href="aa_confirmSuc.php"><img src="../recursos/salida.png" data-toggle="tooltip" title="Cerrar"> Cerrar</a>'.'  ';



    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>