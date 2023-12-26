<?php

class Usuarios
{

public function buscarVentas($nombreUsuario){
//if (!isset($_SESSION)) {session_start();}
//$sucbx=$_SESSION['codsuc'];		
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM articulos WHERE concat(descripar,serie) LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['descripar'],
                             "codarx" => $row['codar'],
                             "codclax" => $row['codcla'],
                             "codpvx" => $row['codpv'],
                              "umedx" => $row['umed'],
                              "pvpx" => $row['pvp'],
                              "pnetox" => $row['pneto'],
                              "saldox" => $row['saldo'],
                              "observx" => $row['observar'],
                              "marcax" => $row['marca'],
                              "modelox" => $row['modelo'],
                              "seriex" => $row['serie'],
                             "fotoarx" => $row['fotoar']);
        }



        return $datos;
}	
	
    public function buscarProvee($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM proveedor WHERE nombrepv LIKE '%$nombreUsuario%' ");
        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['nombrepv'],
                             "ciclix" => $row['cipv'],
                             "direccx" => $row['direccpv'],
                             "codpvx" => $row['codpv']);
        }



        return $datos;
}
	
   public function buscarCliente($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombrecli LIKE '%$nombreUsuario%' ");
        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['nombrecli'],
                             "ciclix" => $row['cicli'],
                             "direccx" => $row['direcccli'],
                             "codclix" => $row['codcli']);
        }



        return $datos;
}	

  public function buscarVende($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nomb_usu LIKE '%$nombreUsuario%' ");
        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['nomb_usu'],
                             "id_usux" => $row['id_usu'],
                             "id_areax" => $row['id_area']);
        }



        return $datos;
}	

public function buscarProdu($nombreUsuario){
//if (!isset($_SESSION)) {session_start();}
//$sucbx=$_SESSION['codsuc'];		
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM articulos WHERE concat(descripar,serie) LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['descripar'],
                             "codarx" => $row['codar'],
                             "codclax" => $row['codcla'],
                             "codpvx" => $row['codpv'],
                              "umedx" => $row['umed'],
                              "pvpx" => $row['pvp'],
                              "pnetox" => $row['pneto'],
                              "saldox" => $row['saldo'],
                              "observx" => $row['observar'],
                              "marcax" => $row['marca'],
                              "modelox" => $row['modelo'],
                             "fotoarx" => $row['fotoar']);
        }



        return $datos;
}

public function buscarArtsuc($nombreUsuario){
if (!isset($_SESSION)) {session_start();}
$sucbx=$_SESSION['codsuc'];		
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM articulos AS ar LEFT JOIN articulossuc AS ar2 ON ar.codar=ar2.codar WHERE ar.descripar  LIKE '%$nombreUsuario%' AND ar2.codsuc='$sucbx' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['descripar'],
                             "codarx" => $row['codar'],
                             "codclax" => $row['codcla'],
                             "codpvx" => $row['codpv'],
                              "umedx" => $row['umed'],
                              "pvpx" => $row['pvp'],
                              "pnetox" => $row['pneto'],
                              "saldox" => $row['saldosuc'],
                             "fotoarx" => $row['fotoar']);
        }



        return $datos;
}


    /**
     * Agregar usuarios en la base de datos
     *
     * @param array $datos
     */
    public function agregarUsuario($datos){
        $sql = "INSERT INTO servicio (nombre_usuarios, apellido_usuarios,
                descripcion_usuarios, foto_usuarios) VALUES ('" . $datos['nombre_usuarios'] . "',
                '" . $datos['apellido_usuarios'] . "', '" . $datos['descripcion_usuarios'] . "',
                '" . $datos['foto_usuarios'] . "')";
        mysql_query($sql);
    }
}
