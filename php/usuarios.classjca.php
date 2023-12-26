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
    public function buscarCliente($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM clientes WHERE nombre LIKE '%$nombreUsuario%' ");

  //      $sql = "SELECT * FROM activos WHERE descripcion LIKE '%$nombreUsuario%'";

    //   $resultado = mysqli_query($sql,$conexion);

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nombre'],
                             "idclii" => $row['idcli'],
                          //   "foto" => $row['foto'],
                           //  "umed" => $row['umed'],
                            // "pneto" => $row['pneto'],
                           //  "pvp" => $row['pvp'],

                         //    "observ" => $row['observ'],
                             "codigo" => $row['codigo']);
        }



        return $datos;
    }

    public function buscarNombre($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM solicita AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.detsolicitante LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['detsolicitante'],
                            "codarea3" => $row['codarea'],
                            "detarea3" => $row['detarea'],
                            "detcargo3" => $row['detcargo'],
                            "codsoli3" => $row['codsoli'],

                             "codcargo3" => $row['codcargo']);
        }

        return $datos;
    }

    public function buscarSolis($nombreUsuario){
        if (!isset($_SESSION)) {session_start();}
		include('../php/conexion.php');
        $datos = array();
		$resultado1 = mysqli_query($conexion,"SELECT * FROM solicita  WHERE detsolicitante LIKE '%$nombreUsuario%' ");
        while($reg = mysqli_fetch_array($resultado1)){
            $carea=$reg['codarea'];
            $ccargo=$reg['codcargo'];
            $dtnom=$reg['detsolicitante'];

        }
        // $_SESSION['codarease1'] = $carea;
        // $_SESSION['codcargose1'] = $ccargo;
        // $_SESSION['solicitta'] = $dtnom;

		$resultado = mysqli_query($conexion,"SELECT * FROM solicita AS so LEFT JOIN areas AS ar ON so.codarea=ar.codarea LEFT JOIN cargo AS ca ON so.codcargo=ca.codcargo WHERE so.detsolicitante LIKE '%$nombreUsuario%' ");


        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['detsolicitante'],
                            "codarea3" => $row['codarea'],
                            "detarea3" => $row['detarea'],
                            "detcargo3" => $row['detcargo'],
                            "codsoli3" => $row['codsoli'],
                            "codcargo3" => $row['codcargo']);
        }
        $_SESSION['codarease1'] = $datos[0]['codarea3'];
        $_SESSION['codcargose1'] = $datos[0]['codcargo3'];
        $_SESSION['nomsolicita'] = $datos[0]['value'];

        return $datos;
    }    
    public function buscarArticulo($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM repuesto WHERE concat(detrepuesto,codigo) LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['detrepuesto'],
                            "codigox" => $row['codigo'],
                             "codrepx" => $row['codrep'],
                             "umedx" => $row['umed'],
                              "costox" => $row['costo'],
                              "punitx" => $row['punit'],
                              "saldomx" => $row['saldomin'],
                             "saldox" => $row['saldo']);
        }

        return $datos;
    }

    public function buscarTecnico($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM tecnicos WHERE dettecnico LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['dettecnico'],
                            "codtecx" => $row['codtec'],
                             "horasusx" => $row['horasus'],
                             "minsusx" => $row['minsus'],
                             "telftecx" => $row['telftec']);
        }

        return $datos;
    }    

    public function buscarOte($nombreUsuario){
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM otes WHERE nroote LIKE '%$nombreUsuario%' ");

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $datos[] = array("value" => $row['nroote'],
                            "detotex" => $row['detote'],
                             "codotex" => $row['codote']);
        }

        return $datos;
    }
}
