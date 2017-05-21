<html>
<head>
	<title>Login</title>
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../js/funciones.js"></script>
  <script type="text/javascript" src="../js/BorrarCookies.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="../css/estilo.css"> -->
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
				<a class="navbar-brand" href="index.php">Inicio</a>
			</div>
			
      <form class="navbar-form navbar-left">
        <div class="form-group">
         
        </div>
             
      </form>
		</div>
	</nav>
	<div class="container">
	
 <div class="col-sm-4">
 
 </div>
  <div class="col-sm-4">
    <h4>Loguearse</h4>
  	<form class="form-signin" method='POST' onsubmit="Ingresar();return false;">
  		<table class="table">
  			
  			<tr>
  				<td>
  				
              <?php

              if(isset($_COOKIE['miMail']))
                    {
                    $cadena =  "<input type='email' id='correoLogin' required class='form-control' value=' ";
                    $cadena = $cadena. $_COOKIE['miMail'] ."'>";
                    
                    echo $cadena;
                   

                    }else
                      {
                      $cadena =  "<input type='email' id='correoLogin' class='form-control' placeholder='Correo' >";
                      echo $cadena;
                    }
           ?>

  				</td>
  			</tr>
  			<tr>
  				<td>
  				
        <?php
               if(isset($_COOKIE['miClave']))
                    {
                    $cadena =  "<input type='password'  id='claveLogin' class='form-control' maxlength='6' value=' ";
                    $cadena = $cadena. $_COOKIE['miClave'] ."'>";
                    
                    echo $cadena;
                   

                    }else
                      {
                      $cadena =  "<input type='password' id='claveLogin' class='form-control' placeholder='Clave' maxlength='6' >";
                      echo $cadena;
                    }
           ?>

  				</td>
  			</tr>
  			<tr>
  				<td>
  					<button type="submit" class="btn btn-success btn-block" >Ingresar</button>

  				</td>
  			</tr>
  
	</table>
</form>
	</div>
	 <div class="col-sm-4"></div>
	</div>
</body>
</html>