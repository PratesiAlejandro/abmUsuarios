<?php 
	session_start();
	require 'usuario.php';
	require 'productos.php';
	require 'archivo.php';


	$queHago = $_POST['queHago'];
	// echo "Que hago: " . $queHago; 

	switch ($queHago) 
	{
		case 'MostrarGrillaAdmin':
			
			$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();

              $tabla = "<div class='panel panel-primary'>
               <div class='panel-heading'>
                 Usuarios
    				
  				</div>
               <table class='table table-condensed' border='0'>
                <thead>
                  <tr>
                  
                    <th>Mail</th>
                    <th>Nombre</th>   
                    <th>Clave</th>
                     <th>Tipo</th>
                    <th>Usuario</th>
                     <th>DNI</th>
                      <th>Telefono</th>
                       <th>Importe</th>
                        <th>Descripcion</th>
                     
                    <th></th>
                    <th></th>
                  </tr>
                </thead>";

                foreach ($arrayDeUsuarios as $usuario) 
              {
                $tabla .= "<tr>
                   
                     <td>$usuario->mail</td>
                    <td>$usuario->nombre</td>
                    <td>$usuario->clave</td>
                    <td>$usuario->tipo</td>
                     <td>$usuario->usuario</td>
                     <td>$usuario->dni</td>
                      <td>$usuario->telefono</td>
                       <td>$usuario->importe</td>
                        <td>$usuario->descripcion</td>
                   
                    <td><button class='btn btn-danger btn-xs' onClick=Borrar($usuario->id)> <span class='glyphicon glyphicon-remove'></span></button></td>
                    <td><button class='btn btn-warning btn-xs' data-toggle='modal' data-target='#myModal' onClick=TraerUsuario($usuario->id)><span class='glyphicon glyphicon-pencil'></span></button></td>
                  </tr>";
              }
              $tabla .= " </table></div>"; 
              echo $tabla;
			break;


		case 'MostrarGrillaProductosVendedor':
		
			$arrayDeUsuarios = Productos::TraerProductos();

              $tabla = " <table class='table' border='1px solid black'>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Porcentaje</th>
                     <th>FechaVencimiento</th>
                  </tr>
                </thead>";

                foreach ($arrayDeUsuarios as $usuario) 
              {
                $tabla .= "<tr>
                    <td>$usuario->id</td>
                    <td>$usuario->nombre</td>
                    <td>$usuario->porcentaje</td>
                    <td>$usuario->fecha</td>
                     <td><button onClick=BorrarProducto($usuario->id)>Borrar</button></td>
                     <td><button onClick=ModificarProducto($usuario->id)>Modificar</button></td>
                  </tr>";
              }
              $tabla .= " </table>"; 
              echo $tabla;
			break;	

		case 'MostrarGrillaProductosComprador':
		
			$arrayDeUsuarios = Productos::TraerProductos();

              $tabla = " <table class='table' border='1px solid black'>
                <thead>
                  <tr>
                     <th>ID</th>
                    <th>Nombre</th>
                    <th>Porcentaje</th>
                    <th>Vencimiento</th>
                  </tr>
                </thead>";

                foreach ($arrayDeUsuarios as $usuario) 
              {
                $tabla .= "<tr>
                    <td>$usuario->id</td>
                    <td>$usuario->nombre</td>
                    <td>$usuario->porcentaje</td>
                     <td>$usuario->fecha</td>
                  </tr>";
              }
              $tabla .= " </table>"; 
              echo $tabla;
			break;	

		case 'agregarProducto':
			//echo "estoy en AGREGARPRODUCTO"; 
			//die();
			//echo "nombre: " . $nombre . "Clave: " . $clave; 
			//die();
			$nuevoDiv = "<h3>Agregando Producto</h3>
			 				Nombre: <input type='text' style='width: 200px; height: 30px;' id='nombreAgreg' placeholder='Producto'>
			 				Porcentaje: <input type='number' style='width: 200px; height: 30px;' name='points' min='0' max='100' id='porcAgreg' placeholder='Porcentaje'>	
			 				Fecha: <input type='text' class='datepicker' data-date-format='mm/dd/yyyy' style='width: 200px; height: 30px;' id='fechaAgreg' placeholder='dd/mm/yyyy' onclick='ValidarFecha()' >
			 				<button type='submit' onclick=InsertProducto()>Insertar Producto</button>";

   		    echo $nuevoDiv;
		

			break;

			case 'agregarProductoTxt':

			$nuevoDiv = "<h3>Agregando Producto</h3>
			 				Nombre: <input type='text' style='width: 200px; height: 30px;' id='nombreAgreg' placeholder='Producto'>
			 				Porcentaje: <input type='number' style='width: 200px; height: 30px;' name='points' min='0' max='100' id='porcAgreg' placeholder='Porcentaje'>	
			 				<button type='submit' onclick=InsertProductoTxt()>Insertar Producto</button>";


			  echo $nuevoDiv;

			break;

		case 'InsertarProducto':
			//echo "estoy en el nexo";
			$objUsuario = new Productos();
			$objUsuario->nombre = $_POST['nombre'];
			$objUsuario->porcentaje = $_POST['porcentaje'];
			$objUsuario->fecha = $_POST['fecha'];
			//var_dump($objUsuario); 
			$objUsuario->InsertarProducto();

			$objUsuario->GuardarProductosTxt();
			
			Productos::CrearTablaProductos();
			Productos::CrearTablaProductosVendedor();
			
		break;


		case 'agregar':
			
			$objUsuario = new Usuario();
			$objUsuario->nombre = $_POST['nombre'];
			$objUsuario->mail = $_POST['mail'];
			$objUsuario->clave = $_POST['clave'];
			$objUsuario->tipo = $_POST['tipo'];
			$objUsuario->foto = $_POST['foto'];
			
			$objUsuario->InsertarElUsuario();

			$objUsuario->GuardarTxt();

			Usuario::CrearTablaUsuarios();
			
			break;

			
		case 'ingresar':
				//echo "estoy en ingresar de admin"; 
				//die();
			   // $nombre = $_POST['nombre'];
				$mail = $_POST['mail'];
				$clave = $_POST['clave'];
			//	$combo = $_POST['valorCombo'];
				//$mail = isset($_POST['mail']) ? json_decode(json_encode($_POST['mail'])) : NULL;
				//$clave = isset($_POST['clave']) ? json_decode(json_encode($_POST['clave'])) : NULL;
				$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "Correo o contraseña incorrecta.";
				$retorno["Tipo"] = "";
				foreach ($arrayDeUsuarios as $usuario)
				{
					if ($usuario->mail == $mail && $usuario->clave == $clave)
					{
						$_SESSION['usuario'] = $usuario;
						//$_SESSION['combo'] = $combo;

						$retorno["Exito"] = TRUE;
						$retorno["Mensaje"] = "Bienvenido ". $usuario->mail;
						$retorno["Tipo"] = $usuario->tipo;
					//	$retorno["Combo"] = $_SESSION['combo'];
						break;
					}else
					{
						$retorno["Exito"] = FALSE;
				        $retorno["Mensaje"] = "Correo o contraseña incorrecta.";
				        break;
					}
				}
				echo json_encode($retorno);	
				break;	
		
		case 'borrar':
				$id = $_POST['id'];
			
				Usuario::BorrarUsuarioPorId($id);
				//Usuario::Borrar(new Usuario($mail,$nombre,$clave,$tipo,$foto)); 

				break;

		case 'borrarProducto':
				$id = $_POST['id'];

				Productos::BorrarProducto($id);
				break;

		case 'borrarProductoTxt':

				$porcentaje = $_POST['id'];  // porcentaje producto
				//$nombre = $_POST['nombre'];

				
				productos::BorrarProductosTxt($porcentaje);

				break;

		case 'traerUsuario':
				$id = $_POST['id'];
				//echo "estoy en traerUsuario de admin, id: " . $id; 
				//die();

				$usuarioBuscado = Usuario::TraerUnUsuario($id);
				//var_dump($usuarioBuscado);
				//die();

				$nuevoDiv = "<h3>Usuario a Modificar</h3>
							<input type='text' id='nombreModif' value='$usuarioBuscado->nombre'>
							<input type='text' id='mailModif' value='$usuarioBuscado->mail'>	
							<input type='text' id='claveModif' value='$usuarioBuscado->clave'>
							<input type='text' id='tipoModif' value='$usuarioBuscado->tipo'>
							<button onclick=Modificar($id)>Modificar</button>";

              echo $nuevoDiv;
              break;	

        case 'traerUsuarioParaEditarPerfil':
				// Modificar Perfil
        		$id = $_POST['id'];	

				$usuarioBuscado = Usuario::TraerUnUsuario($id);

				$nuevoDiv = "<div class='panel panel-info'>
				<div class='panel-heading'>
				<div class='panel-title'>
                    Datos personales
				</div>
				</div>
				<div class='panel-body'>
				   <form class='form-horizontal'>
				       <div class='form-group'>
  				       <label for='usuario' class='control-label col-sm-2'>Usuario: </label>
  				       <div class='col-sm-10'> 
    				   <input type='text' id='usuario' class='form-control input-sm' placeholder='Usuario de login' value='$usuarioBuscado->usuario'>
                       </div>
					   </div>
					     <div class='form-group'>
  				    <label for='clave' class='control-label col-sm-2'>Clave:</label>
  				    <div class='col-sm-10'> 
  				     <input type='text' id='clave' class='form-control input-sm' value='$usuarioBuscado->clave'>
  				     </div>
  				     </div>
		               <div class='form-group'>
  				       <label for='email' class='control-label col-sm-2' >Email:</label>
  				       <div class='col-sm-10'> 
    				   <input type='text' id='mail' class='form-control input-sm' value='$usuarioBuscado->mail'>
  				       </div>
  				       </div>
				     <div class='form-group'>
  				     <label for='nombre' class='control-label col-sm-2'>Nombre: </label>
  				     <div class='col-sm-10'> 
                     <input type='text' id='nombre' class='form-control input-sm' value='$usuarioBuscado->nombre'>
                     </div>
					 </div>
					
					<div class='form-group'>
  				    <label for='dni' class='control-label col-sm-2'>DNI: </label>
  				    <div class='col-sm-10'> 
   					<input type='text' id='dni' class='form-control input-sm' disabled placeholder='DNI' value='$usuarioBuscado->dni'>
                    </div>
					</div>
		          
  				     <div class='form-group'>
  				     <label for='tipo' class='control-label col-sm-2'>Tipo:</label>
  				     <div class='col-sm-10'> 
  				     <input type='text' id='tipo' class='form-control input-sm' disabled value='$usuarioBuscado->tipo'>
  				     </div>
                     </div>
                     <div class='form-group'>
  				     <label for='telefono' class='control-label col-sm-2'>Telefono:</label>
  				     <div class='col-sm-10'> 
  				     <input type='text' id='telefono' placeholder='Numero de contacto' class='form-control input-sm' value='$usuarioBuscado->telefono'>
  				     </div>
                     </div>
                     <div class='form-group'>
  				    <label for='importe' class='control-label col-sm-2'>Importe:</label>
  				    <div class='col-sm-10'> 
  				     <input type='text' id='importe' class='form-control input-sm' placeholder='$' value='$usuarioBuscado->importe'>
  				     </div>
  				     </div>
                     <div class='form-group'>
 					 <label for='comment' class='control-label col-sm-2'>Obs:</label>
 					 <div class='col-sm-10'> 
 					 <input type='text' class='form-control col-sm-10' rows='2' id='descripcion' value='$usuarioBuscado->descripcion'>
					 </div>
					 </div>
                
                    
            </form>
        </div>
        <div class='panel-footer'>
        <button class='btn btn-warning btn-sm' onclick=editarPerfil($id)>Modificar</button>
        </div>
            </div>";
              echo $nuevoDiv;

              break;	      

        case 'modificar':
				//echo "estoy en modificar de admin"; 
				//die();

				$objUsuario = new Usuario();
				$objUsuario->id = $_POST['id'];
				$objUsuario->nombre = $_POST['nombre'];
				$objUsuario->mail = $_POST['mail'];
				$objUsuario->clave = $_POST['clave'];
				$objUsuario->tipo = $_POST['tipo'];
				$objUsuario->usuario = $_POST['usuario'];
				$objUsuario->dni = $_POST['dni'];
				$objUsuario->telefono = $_POST['telefono'];
				$objUsuario->importe = $_POST['importe'];
				$objUsuario->descripcion = $_POST['descripcion'];

				//var_dump($objUsuario);

				$objUsuario->ModificarUsuario();
              break;	 

        case 'editarPerfil':
				echo "estoy en editarPerfil de admin"; 
				//die();

				$objUsuario = new Usuario();
				$objUsuario->id = $_POST['id'];
				$objUsuario->nombre = $_POST['nombre'];
				$objUsuario->usuario = $_POST['usuario'];
				$objUsuario->mail = $_POST['mail'];
				$objUsuario->clave = $_POST['clave'];
				$objUsuario->dni = $_POST['dni'];
				$objUsuario->tipo = $_POST['tipo'];
				$objUsuario->telefono = $_POST['telefono'];
				$objUsuario->importe = $_POST['importe'];
				$objUsuario->descripcion = $_POST['descripcion'];

				//var_dump($objUsuario);

				$objUsuario->ModificarUsuario();
              break;    

               case 'BorrarCookie':   

              //setCookie('miMail', '', time() - 1000);

              	$mail = $_POST['mail'];
				$nombre = $_POST['nombre'];
				$clave = $_POST['clave'];

			 // if(isset($_COOKIE["miMail"])){
			    setcookie("miMail", $mail, time()-60, '/');
			    //$retorno = "COOKIE BORRADA!";
			   //}
			   //if(isset($_COOKIE['nombre'])){
			    setcookie("nombre", $nombre, time()-60, '/');
			    setcookie("miClave", $clave, time()-60, '/');
			    $retorno = "COOKIE BORRADA!";

			    echo $retorno;
				//}
                break; 	

                case 'subirFoto':
		          $mail = $_POST['mail'];
		          $respuesta = Archivo::Subir($mail);//, "");

		          echo json_encode($respuesta);
		         break;	       		
	}

 ?>

