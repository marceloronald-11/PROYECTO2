


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
    public function buscarUsuario($nombreUsuario){

        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM activos WHERE descripcion LIKE '%$nombreUsuario%' AND coddep='$coddepx' ");

  //      $sql = "SELECT * FROM activos WHERE descripcion LIKE '%$nombreUsuario%'";

    //   $resultado = mysqli_query($sql,$conexion);

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['descripcion'],
                             "cod_activo" => $row['cod_activo'],
                             "foto" => $row['foto'],
                             "observ" => $row['observ'],
                             "existencia" => $row['existencia']);
        }



        return $datos;
}




    public function buscarTipoh($tipo){
		
		if (!isset($_SESSION)) {@session_start();}
		$coddepx= $_SESSION['depto'];
		
		include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM activos WHERE descripcion LIKE '%$tipo%' AND coddep='$coddepx' ");
   //     $sql = "SELECT * FROM activos WHERE descripcion LIKE '%$tipo%'";

   //     $resultado = mysql_query($sql);

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['descripcion'],
							"umed" => $row['umed'],
							"codar" => $row['codar'],
							"pneto" => $row['pneto'],
							"pvp" => $row['pvp'],
							"codigo" => $row['codigo'],
							"codcla" => $row['codcla'],
							"codpv" => $row['codpv'],
							"stock" => $row['stockmin'],
							"observ" => $row['observart'],
                             "existe" => $row['existencia']);
        }
        return $datos;
		}	
	
	
	
	   public function buscarTip($nomm){
		   
		if (!isset($_SESSION)) {@session_start();}
		$coddepx= $_SESSION['depto'];
				   
 	    include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM personas WHERE nombre LIKE '%$nomm%' AND coddep='$coddepx' ");
//        $sql = "SELECT * FROM personas WHERE nombre LIKE '%$nomm%' ";

  //      $resultado = mysql_query($sql);

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nombre'],
                             "idper" => $row['id_per'],
                             "nombree" => $row['nombre'],
                             "ci" => $row['ci']);
        }
        return $datos;
		}	
	
	
		public function buscarEnc($nomm){
		   
		if (!isset($_SESSION)) {@session_start();}
		$coddepx= $_SESSION['depto'];
				   
 	    include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM personas WHERE nombre LIKE '%$nomm%' AND coddep='$coddepx' ");
//        $sql = "SELECT * FROM personas WHERE nombre LIKE '%$nomm%' ";

  //      $resultado = mysql_query($sql);

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nombre'],
                             "idper" => $row['id_per'],
                             "nombree" => $row['nombre'],
                             "ci" => $row['ci']);
        }
		$_SESSION['elper'] = $datos[0]['idper']; //accediendo al array asociativo id_per campo
        return $datos;
		}	

	
    public function buscarMerca($merca){
		
		if (!isset($_SESSION)) {@session_start();}
		$coddepx= $_SESSION['depto'];
		$idper=$_SESSION['elper'];
		//$idper=$_SESSION['elper']; 

		include('../php/conexion.php');
        $datos = array();
//		$resultado = mysqli_query($conexion,"SELECT * FROM activos WHERE descripcion LIKE '%$merca%' AND coddep='$coddepx' ");
		$resultado = mysqli_query($conexion,"SELECT * FROM activos  AS ac JOIN materialper AS mp ON 
		ac.codar=mp.codar WHERE ac.descripcion LIKE '%$merca%' AND ac.coddep='$coddepx' AND mp.id_per='$idper' ");

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['descripcion'],
							"umed" => $row['umed'],
							"codar" => $row['codar'],
							"pneto" => $row['pneto'],
							"pvp" => $row['pvp'],
							"codigo" => $row['codigo'],
							"codcla" => $row['codcla'],
							"codpv" => $row['codpv'],
							"stock" => $row['stockmin'],
							"observ" => $row['observart'],
							"saldo" => $row['saldo'],
                             "existencia" => $row['existencia']);
        }
        return $datos;
		}		
	
		public function buscarEncargado($nomm){
		   
		if (!isset($_SESSION)) {@session_start();}
		$coddepx= $_SESSION['depto'];
				   
 	    include('../php/conexion.php');
        $datos = array();
		$resultado = mysqli_query($conexion,"SELECT * FROM personas WHERE nombre LIKE '%$nomm%' AND coddep='$coddepx' ");

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['nombre'],
                             "idper" => $row['id_per'],
                             "nombree" => $row['nombre'],
                             "ci" => $row['ci']);
        }
		//$_SESSION['elper'] = $datos[0]['idper']; //accediendo al array asociativo id_per campo
        return $datos;
		}	

    public function buscarMercaderia($merca){
		
		if (!isset($_SESSION)) {@session_start();}
		$coddepx= $_SESSION['depto'];
		//$idper=$_SESSION['elper'];
		//$idper=$_SESSION['elper']; 

		include('../php/conexion.php');
        $datos = array();
//		$resultado = mysqli_query($conexion,"SELECT * FROM activos WHERE descripcion LIKE '%$merca%' AND coddep='$coddepx' ");
		$resultado = mysqli_query($conexion,"SELECT * FROM activos  WHERE descripcion LIKE '%$merca%' AND coddep='$coddepx' ");

        while ($row = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['descripcion'],
							"umed" => $row['umed'],
							"codar" => $row['codar'],
							"pneto" => $row['pneto'],
							"pvp" => $row['pvp'],
							"codigo" => $row['codigo'],
							"codcla" => $row['codcla'],
							"codpv" => $row['codpv'],
							"stock" => $row['stockmin'],
							"observ" => $row['observart'],
							"existencia" => $row['existencia']);
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
