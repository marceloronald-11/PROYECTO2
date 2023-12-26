<?php
if (!isset($_SESSION)) {session_start();}

$nousuario=$_SESSION['nomb_usu'];
$idper=$_SESSION['id_per'];

require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
$objProducto = new Producto();
$re = $objProducto->getpersonas($idper);

		foreach($re as $usu):
			$fotito= $usu['foto'];
//			$id_usu= $usu['id_usu'];
//			$codde=$usu['coddep'];
		endforeach;


//PERSONAS
$pper = $objProducto->getpersonass();
//CLASIFICACION
//$aarea = $objProducto->getarea();
//estado
//$estado = $objProducto->getestado();
//compra
//$compra = $objProducto->getcompra();


// $foto = $objProducto->getById($id);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GyM</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava4.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>


</head>

<body>
    <header>MODULO DE USUARIOS</header>
    <section>
    <table border="0" align="center" width="70%">
    	<tr>
        	<td width="40%" align="left">Buscar :<input type="text" placeholder="Buscar Usuario" id="bs-prod"/></td>
            <td  width="20%"></td>
       <!-- <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td>-->
            <td width="20%" align="right"><button id="nuevo-producto" class="btn btn-primary btn-sm glyphicon glyphicon-user"> NUEVO</button> </td><td width="20%" align="right"> <a href="z_inicio1.php" class="btn btn-success btn-sm glyphicon glyphicon-home" role="button"> SALIR</a></td>
           <!-- <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>-->
        </tr>
    </table>
   
    </section>

    <div class="registros" id="agrega-registros" style="width:70%;"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    
    
    
    
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario de Asignaciones</b></h4>
            </div>
            <form id="formulario" class="formulario form-horizontal" onsubmit="return agregaRegistro();">
            <div class="modal-body">

<input type="text" required  id="id-prod" name="id-prod" readonly style="visibility:hidden; height:5px;"/>
            
				<div class="form-group">
        			<label class="control-label col-xs-3" for="pro">Proceso :</label>
                    <div class="col-xs-6">
        			<input type="text" class="form-control" id="pro" name="pro" readonly>
                    </div>
    			</div>                
                
				<div class = "form-group">
      			<label for = "usu" class="control-label col-xs-3 titi">ASIGNAR A :</label>
                <div class="col-xs-7" >
					<select name="iidper" id="iidper" class="form-control" >
                    <option value="0">Ninguno</option>
						<?php foreach($pper as $per):?>
						<option value="<?php echo $per['id_per']?>"><?php echo $per['nombre']?></option>
						<?php endforeach;?>
					</select>

   				</div>
                </div>                
                
				<div class="form-group">
        			<label class="control-label col-xs-3" for="nombre">Nombre :</label>
                    <div class="col-xs-6" >
        			<input type="text" class="form-control" id="nombre" name="nombre" required >
                    </div>
    			</div>                
				<div class="form-group">
        			<label class="control-label col-xs-3" for="usuario">Usuario :</label>
                    <div class="col-xs-6">
        			<input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
    			</div>                

				<div class="form-group">
        			<label class="control-label col-xs-3" for="pass">Password :</label>
                    <div class="col-xs-6">
        			<input type="text" class="form-control" id="password" name="password" required >
                    </div>
    			</div>                
            
				<div class="form-group">
        			<label class="control-label col-xs-3" for="pass">Acceso :</label>
                    <div class="col-xs-8">
        					<select required="required" name="tipo" id="tipo">
                        		<option value="admin">Administrador</option>
                                <option value="usuarios">Usuario</option>
                            </select>
                    </div>
    			</div>                
                
                <div id="mensaje"></div>
                
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      


</body>
</html>
