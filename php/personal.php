<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Personal VENTAS</title>
<link href="../css/estiloo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava5.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <header>MODULO DEL PERSONAL</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="335"><input type="text" placeholder="Busca Personal por: Nombre o Cargo" id="bs-prod"/></td>
         <!--   <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td> -->
            <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar a PDF</a></td>
            <td width="100"><a href="../php/ventas.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> INICIO </a></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
        <!--<div id="salir"><a href="ventas.php" class="glyphicon glyphicon-home">...INICIO</a></div> -->
    </center>
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Formulario de Asignaciones</b></h4>
            </div>
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                    	<td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    <tr>
                    	<td>Carnet N°: </td>
                        <td><input type="text"  required="required" name="ci" id="ci"/></td>
                    </tr>  

                     <tr>
                   	<td>Cargo: </td>
                        <td><input type="text" required="required" name="cargo" id="cargo"/></td>
                    </tr>
        
                    <tr>
                    	<td>Area: </td>
                        <td><input type="text"  required="required" name="area" id="area"/></td>
                    </tr>                    
                    <tr>
                    	<td>Celular/Telf: </td>
                        <td><input type="text"  required="required" name="cel" id="cel"/></td>
                    </tr>  
                    <tr>
                    	<td>Direccion: </td>
                        <td><input type="text"  required="required" name="direccion" id="direccion"/></td>
                    </tr>                      

                    <tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
                    </tr>
                    
               
                    
                </table>
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      

</body>
</html>
