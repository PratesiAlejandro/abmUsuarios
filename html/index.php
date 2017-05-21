<?php 
require_once("../php/usuario.php");

if(!isset($_SESSION)) 
session_start(); 
?>
<html>
<head>
	<title>Index</title>
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
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      
      <?php
      	if (isset($_SESSION['usuario'])) 
		{
			echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span>". $_SESSION['usuario']->mail . "</a></li>";
      echo"<li><a href='javascript:deslogear();'><span class='glyphicon glyphicon-log-in'></span> Desloguearse</a></li>";
   	}
 	  ?>	
    </ul>
  </div>
</nav>
		<div class='container'> 
				<div class='row'>
					<div class='col-sm-3'></div>
				<div class='col-sm-5'>
	<?php 
	
		if(isset($_SESSION['usuario']) != true) 
		{
					
			echo "  <h4>Ingresar al sistema</h4>";
			echo "	<ul class='nav nav-pills nav-stacked' role='tablist'>";
			echo " <a class='btn btn-custom btn-lg btn-block' id='btnLogin' href='login.php' role='button'>Log in</a>";
			echo "	 <br>       ";
			echo "  <a class='btn btn-custom btn-lg btn-block' id='btnLogin' href='registro.html' role='button'>Crear Cuenta</a> ";
    		echo "	</ul>";
				
		}
			

 ?>	
 </div>
		<div class='col-sm-3'></div>
				</div>

				
</div>";




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