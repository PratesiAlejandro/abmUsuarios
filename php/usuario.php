<?php
	include 'AccesoDatos.php';

	class Usuario 
	{
		public $id;
		public $nombre;
		public $usuario;
		public $mail;
		public $clave;
		public $dni;
		public $tipo;
		public $telefono;
		public $importe;
		public $descripcion;
		public $foto;

		 public function GetNombre()
	{
		return $this->nombre;
	}

		public static function TraerTodosLosUsuarios()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
		}

		public static function TraerUnUsuario($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from usuarios where usuarios.id = $id");
			$consulta->execute();
			$usuarioBuscado = $consulta->fetchObject('Usuario');
			return $usuarioBuscado;	
		}


		public function InsertarElUsuario()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,usuario,mail,clave,dni,tipo,telefono,importe,descripcion,foto) values('$this->nombre','$this->usuario','$this->mail','$this->clave','$this->dni','$this->tipo','$this->telefono','$this->importe','$this->descripcion','$this->foto')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		}

		public static function BorrarUsuarioPorId($id)
	 	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("
				delete 
				from usuarios 				
				WHERE id=:id");	
			$consulta->bindValue(':id',$id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();


		}

		public function ModificarUsuario()
	 	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("
				update usuarios 
				set nombre='$this->nombre',
					usuario='$this->usuario',
					mail='$this->mail',
					clave='$this->clave',
					dni='$this->dni',
					tipo='$this->tipo',
					telefono='$this->telefono',
					importe='$this->importe',
					descripcion='$this->descripcion'
				WHERE id='$this->id'");
			return $consulta->execute();
		}

	public function GuardarTxt()
	{
        $archivo=fopen("../archivos/usuarios.txt","a");//escribe y mantiene la informacion existente		
		//$ahora=date("Y-m-d H:i:s"); 
		$renglon=$this->mail."=>".$this->nombre."=>".$this->clave."=>".$this->tipo."=>".$this->foto."\r\n";

		fwrite($archivo,$renglon); 		 
		fclose($archivo);

		return true;
	}
	public static function CrearTablaUsuarios()
	{
		if(file_exists("../archivos/usuarios.txt"))
		{	
			$cadena=" <table border=1><th> Mail </th><th> Nombre </th><th> Clave </th><th> Tipo </th><th> Foto </th>";

			$archivo = fopen("../archivos/usuarios.txt","r");

			while (!feof($archivo)) {
				
				$archivoAuxiliar = fgets($archivo);

				$alumnos = explode("=>", $archivoAuxiliar);

				$alumnos[0] = trim($alumnos[0]);
				if($alumnos[0] != "")

					$cadena = $cadena."<tr> <td> ".$alumnos[0]."</td> <td> ".$alumnos[1]."</td><td>".$alumnos[2]."</td><td>".$alumnos[3]."</td><td> <img width=50px height=50px style=border-radius:50% src=".$alumnos[4]."></img></td></tr> "; 
			}

			$cadena = $cadena." </table>";
			fclose($archivo);

			$archivo=fopen("../archivos/TablaUsuarios.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
		else
		{
			$cadena = "No hay Usuarios";

			$archivo = fopen("../archivos/TablaUsuarios.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
	
	}



	}
?>