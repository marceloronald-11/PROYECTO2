<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>PROVEEDORES</title>
<link href="../css/estiloo.css" rel="stylesheet">
<!-- <script src="../js/jquery.js"></script> -->
<script src="../js/jquery.js"> </script>
<script src="../js/myjava7.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <header>MODULO DE PROVEEDORES</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="335"><input type="text" placeholder="Busca Proveedor por: Nombre o Empresa" id="bs-prod"/></td>
         <!--   <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td> -->
            <td width="100"><button id="nuevo-producto" class="btn btn-warning">Nuevo</button></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar a PDF</a></td>
         <td width="100"><a href="../php/ventas.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> INICIO </a></td>

        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros"></div>
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
            <form id="formulario" class="formulario" onsubmit="return agregaRegistro();">
            <div class="modal-body">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required readonly id="id-prov" name="id-prov" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required readonly id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                    	<td>Nombre: </td>
                        <td><input type="text" required name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    <tr>
                    	<td>Carnet N°: </td>
                        <td><input type="text"  required="required" name="ci" id="ci"/></td>
                    </tr>  
                	<tr>
                    	<td>Celular/Telf: </td>
                        <td><input type="text"  required="required" name="cel" id="cel"/></td>
                    </tr>  
        
                    <tr>
                    	<td>Empresa: </td>
                        <td><input type="text"  required="required" name="empresa" id="empresa"/></td>
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
   	
	<script src="../bootstrap/js/bootstrap.min.js"></script>      

</body>
</html>
