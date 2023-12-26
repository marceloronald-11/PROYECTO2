<?php

/**
 * Clase para manipular usuarios
 */
class Usuarios
{

    /**
     * Conectar a base de datos
     */
//   public function  __construct() {
//       $dbhost = 'localhost';
//        $dbuser = 'root';
//        $dbpass = 'marite';
//        $dbname = 'bbdactivos';
//
//       mysql_connect($dbhost, $dbuser, $dbpass);
//
//        mysql_select_db($dbname);
//   }
    /**
     * Seleccionar usuario a partir de un caracter en nombre o apellido
     *
     * @param string $nombreUsuario
     * @return array
     */
    public function buscarProd($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM repuesto WHERE detrepuesto LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['detrepuesto'],
                             "codigox" => $row['codigo'],
                             "codmdx" => $row['codmd'],

                             "umedx" => $row['umed'],
                             "npartex" => $row['nparte'],
                            "ubicacionx" => $row['ubicacion'],
                            "especificacionx" => $row['especificacion'],
                             "costox" => $row['costo'],
                             "saldox" => $row['saldo'],
                             "saldominx" => $row['saldomin']);
        }



        return $datos;
}



    public function buscarUsuario($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM usuarios WHERE nomb_usu LIKE '%$nombreUsuario%' ");

  //      $sql = "SELECT * FROM activos WHERE descripcion LIKE '%$nombreUsuario%'";

    //   $resultado = mysqli_query($sql,$conexion);

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['nomb_usu'],
                             "idusu" => $row['id_usu'],
                             "idarea" => $row['id_area']);
        }



        return $datos;
}




    public function buscarTipoh($tipo){
        $datos = array();

        $sql = "SELECT * FROM usuarios WHERE nomb_usu LIKE '%$tipo%'";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nomb_usu'],
                             "idusu" => $row['id_usu'],
                             "idarea" => $row['id_area']);
        }
        return $datos;
		}	
	
	
	
	   public function buscarTip($tipo){
        $datos = array();

        $sql = "SELECT * FROM bancos WHERE ncta LIKE '%$tipo%' ";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['ncta'],
                             "nbanco" => $row['nbanco'],
                             "idbco" => $row['idbco'],
                             "nombre" => $row['nomb_usu']);
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
