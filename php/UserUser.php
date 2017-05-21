<?php 
require_once("../php/usuario.php");

if(!isset($_SESSION)) 
session_start(); 
?>
<html>
<head>
	<title>Usuario</title>
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../js/funciones.js"></script>
	<script type="text/javascript" src="../js/BorrarCookies.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="../css/estilo.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../css/estiloGrillas.css"> -->
  	<link rel="stylesheet" type="text/css" href="../css/login.css">
  	<link rel="stylesheet" type="text/css" media="all" href="../css/style.css">
  	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Usuario</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      
      <?php
      	if (isset($_SESSION['usuario'])) 
		{

        $id = $_SESSION["usuario"]->id;
        $tipo = $_SESSION['usuario']->tipo == "vendedor";

			  echo "<li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>". $_SESSION['usuario']->mail . "<span class='caret'></span></a>
              <ul class='dropdown-menu'>
              <li><a href='javascript:traerUsuarioParaEditarPerfil($id,$tipo);'>Editar Perfil</a></li>
          
              <li role='separator' class='divider'></li>
    
              <li><a href='javascript:deslogear();'><span class='glyphicon glyphicon-log-in'></span> Desloguearse</a></li>
             </ul>
             </li>";

    
   	}
 	  ?>	
    </ul>
  </div>
</nav>


					<div class='col-sm-4'>

  <?php 

          echo "<div id='grillaAdminModificar'></div>";

 ?> 

					</div>
				<div class='col-sm-4'>

        </div>
		    <div class='col-sm-4'></div>
			

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <!--   <p>Page www.apratesi.com.ar - 2017</p> -->
                <!-- <p>Powered by AP<strong><a href="" target="_blank">AP</a></strong></p> -->
            </div>
        </div>
    </div>
</footer>

</div>
	
	
	
</body>
</html>