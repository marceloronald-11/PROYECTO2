<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include('../php/conexion.php');

$result1= mysql_query("SELECT * FROM codnu");
	while($nnota=mysql_fetch_array($result1)) 
    {
        $n_nota=$nnota['nnota'];
		
//		echo $n_nota;
    }
	
if (!isset($_SESSION)){
	session_start();
}
if(!isset($_SESSION['codnu'])) {
   $_SESSION['codnu'] = $n_nota;
   }
//echo $_SESSION['codnu'];
//$numnota=$_SESSION['codnu'];
//echo $numnota;




$result = mysql_query("SELECT * FROM personal");

if ( mysql_num_rows($result) > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
	while($row=mysql_fetch_array($result)) 
    {
        $combobit .=" <option value='".$row['id_per']."'>".$row['nombre']."</option>";
    }
}
else
{
    echo "No hubo resultados";
}
//$conex->close(); //cerramos la conexión
?>




<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda</title>
<link href="../css/estiloo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava_r.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <header>BUSQUEDA POR CLIENTES UTILIDAD</header>
   <div class="container"> 
    	<div class=" main row">
        	<div class="col-md-10"></div>
	      	<a href="../php/ventas.php" class="col-md-1 list-group-item active" ><span class="glyphicon glyphicon-home"></span> INICIO </a>
		</div>
    
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="335">Filtrar:<input type="text" placeholder="Buscar por nombre del cliente" id="bs-prod"/></td>
         <!--  <td><input type="date" id="bd-desde"/></td>
            <td>Hasta&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td><input type="date" id="bd-hasta"/></td> -->
           <!-- <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo</button></td> 
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td> -->
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
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr>
                    	<td width="150">Proceso: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                    <tr>
                    	<td width="100">Nota No: </td>
                        <td><input type="text"  readonly="readonly" id="nnota" name="nnota" value="<? echo  $_SESSION['codnu']; ?>"/></td> 
                    </tr>                    
                    
                    
                    
                	<tr>
                    	<td>Nombre: </td>
                        <td><input type="text" required="required" name="nombre" id="nombre" maxlength="100"/></td>
                    </tr>
                    <tr>
                    	<td>Tipo: </td>
                        <td><select required="required" name="tipo" id="tipo">
                        		<option value="almacenamiento">Almacenamiento</option>
                                <option value="accesorios">Accesorios</option>
                                <option value="computadoras">Computadoras</option>
                                <option value="hardware">Hardware</option>
                                <option value="electronica">Elecronica</option>
                                <option value="redes">Redes</option>
                                <option value="impresoras">Impresoras</option>
                                <option value="otros">Otros</option>
                            </select></td>
                    </tr>
                    <tr>
                    	<td>Precio Unitario: </td>
                        <td><input type="text" required="required" name="precio-uni" id="precio-uni"/></td>
                    </tr>
        
                    <tr>
                    	<td>Marca: </td>
                        <td><input type="text"  required="required" name="marca" id="marca"/></td>
                    </tr>                    
                    <tr>
                    	<td>Modelo: </td>
                        <td><input type="text"  required="required" name="modelo" id="modelo"/></td>
                    </tr>  
                    <tr>
                    	<td>Serial: </td>
                        <td><input type="text"  required="required" name="serial" id="serial"/></td>
                    </tr>                      
                    <tr>
                    	<td>Codigo: </td>
                        <td><input type="text"  required="required" name="codigo" id="codigo"/></td>
                    </tr>  
                    <tr>
                    	<td>Cantidad: </td>
                        <td><input type="text" readonly="readonly"  name="cant" id="saldo"/></td>
                    </tr>     
   
                    <tr>
                    	<td>Asignado a: </td>
                    	<td colspan="2">                    
                       <select name="persona">
					       <?php echo $combobit ;?>
   						</select>
                       </td>
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
                <input type="submit" value="Asignar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
      
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>
