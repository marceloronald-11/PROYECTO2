<?php
//if (!isset($_SESSION)) {session_start();}
//
//include('../php/conexion.php');
//if(isset($_SESSION['usuario'])==false or isset($_SESSION['id_area'])==false){
//	header('Location: ../php/index.php');
//}else{
//	if($_SESSION['id_area'] == 'usuario'){
//		header('Location:php/almacen.php');
//	}else{
//		$nombre = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'");
//		$nombre2 = mysqli_fetch_array($nombre);
//	}
//}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PLANTILLA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!--    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
-->   	<link rel="stylesheet" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css" />
   	<script src="../js/jquery.js"> </script>
   	<script type="text/javascript" src="../js/script/jqueryui.js"></script>    

<link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
<script src="../bootstrap4/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
-->


</head>

<body>
</br>
<div class="container"> <!--A-->
<header>
    <div class="row">
    	<div class="col-md-12 r1l1 col-xs-12">
    	<img src="../recursos/logintit.png" class="img-responsive" width="60px" height="60px" alt="Responsive image">
        </div>
    </div>
</header>

<div class="row"> <!--B-->
<div class="col-md-12 col-xs-12">
	
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
    
    
    
    
</div> <!--md12 fin -->
</div> <!--B-->

</div> <!-- FIN CONTAINER --->
<!--<script src="../bootstrap/js/bootstrap.min.js"></script>
-->
</body>
</html>
