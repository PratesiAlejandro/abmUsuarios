<?php

require_once('../php/AccesoDatos.php');
class productos
{

	public $id;
	public $nombre;
	public $porcentaje;
	public $fecha;

	public function GetNombre()
	{
		return $this->nombre;
	}

	public function GetPorcentaje()
	{
		return $this->porcentaje;
	}

	public function GetFecha()
	{
		return $this->fecha;
	}


	 public function SetNom($value){
    	 $this->nombre=$value;
    }
     public function SetPorcentaje($value){
       $this->porcentaje=$value;
    }

      public function SetFecha($value){
       $this->fecha=$value;
    }

	
	public function __construct(){}


	// public static function InsertarProducto($Nombre,$porcentaje)
	// {
	// 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	// 	$consulta =$objetoAccesoDato->RetornarConsulta("insert into misproductos (nombre, porcentaje) values(:name,:porce)");
	// 	$consulta->bindValue(':name',$Nombre, PDO::PARAM_STR);
	// 	$consulta->bindValue(':porce', $porcentaje, PDO::PARAM_INT);
	// 	$consulta->execute();		
	// 	return $objetoAccesoDato->RetornarUltimoIdInsertado();
	// }

		public function InsertarProducto()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into misproductos (nombre, porcentaje,fecha) values('$this->nombre','$this->porcentaje','$this->fecha')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		}


	public static function BorrarProducto($ID)
	{
		
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("delete from misproductos WHERE id = :id");	
		$consulta->bindValue(':id',$ID, PDO::PARAM_INT);		
		$consulta->execute();

	}

	public static function TraerProductos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre, porcentaje,fecha from misproductos");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "productos");
		
	}

	public static function TraerUnProducto($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from misproductos where misproductos.id = $id");
			$consulta->execute();
			$usuarioBuscado = $consulta->fetchObject('productos');
			return $productoBuscado;	
		}

	public function GuardarProductosTxt()
	{
        $archivo=fopen("../archivos/productos.txt","a");//escribe y mantiene la informacion existente		
		//$ahora=date("Y-m-d H:i:s"); 
		$renglon=$this->nombre."=>".$this->porcentaje."\r\n";

		fwrite($archivo,$renglon); 		 
		fclose($archivo);

		return true;
	}

	public static function CrearTablaProductos()
	{
		if(file_exists("../archivos/productos.txt"))
		{	
			$cadena=" <table border=1><th> Nombre </th><th> Porcentaje </th>";

			$archivo = fopen("../archivos/productos.txt","r");

			while (!feof($archivo)) {
				
				$archivoAuxiliar = fgets($archivo);

				$alumnos = explode("=>", $archivoAuxiliar);

				$alumnos[0] = trim($alumnos[0]);
				if($alumnos[0] != "")

					$cadena = $cadena."<tr> <td> ".$alumnos[0]."</td> <td> ".$alumnos[1]."</td>"; 
			}

			$cadena = $cadena." </table>";
			fclose($archivo);

			$archivo=fopen("../archivos/TablaProducto.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
		else
		{
			$cadena = "No hay Productos";

			$archivo = fopen("../archivos/TablaProducto.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
	
	}

	public static function CrearTablaProductosVendedor()
	{
		if(file_exists("../archivos/productos.txt"))
		{	
			$cadena="<table border=1><th> Nombre </th><th> Porcentaje </th>";

			$archivo = fopen("../archivos/productos.txt","r");


			while (!feof($archivo)) {
				
				$archivoAuxiliar = fgets($archivo);

				$alumnos = explode("=>", $archivoAuxiliar);

				$alumnos[0] = trim($alumnos[0]);
				if($alumnos[0] != "")
					
					$cadena = $cadena."<tr><td>".$alumnos[0]."</td><td>".$alumnos[1]."</td><td><button class='btn btn-danger' onclick="."BorrarTxt("."'".$alumnos[0]."'".")".">Borrar</button></td></tr>"; 
					
			}

			$cadena = $cadena." </table>";
			
			fclose($archivo);

			$archivo=fopen("../archivos/TablaProductoVendedor.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
		else
		{
			$cadena = "No hay Productos";

			$archivo = fopen("../archivos/TablaProductoVendedor.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
	
	}


	public static function BorrarProductosTxt($p)
	{

     
	$arrPersonas = array();
		
		$a = fopen("../archivos/productos.txt", "r");
  
		
		while(!feof($a)){  //mientras no encuentre el fin del archivo o el ultimo renglon, sigue. Devuvel treu o false depende si llego o no
		
			$arr = explode("=>", fgets($a));
		
			if(count($arr) > 1){
				if($arr[0] == $p)
				{

					continue;  //lo saltea es decir no lo agrega al array.

				}
				//$persona = new Productos($arr[0],$arr[1]);

				$persona = new Productos();
				 $persona->SetNom($arr[0]);
                 $persona->SetPorcentaje($arr[1]);

				array_push($arrPersonas, $persona); //agrega esa persyona al array a lo ultimo del array.

			}

		}
		fclose($a);
		
		
		$a = fopen("../archivos/productos.txt", "w"); //aca se modifica el txt, aca queda el txt en blanco
		foreach ($arrPersonas as $aux)
		 {

			fwrite($a, $aux->GetNombre()."=>".$aux->GetPorcentaje()."\r\n");
		productos::CrearTablaProductosVendedor();
		productos::CrearTablaProductos();
		 }
		fclose($a);

	}

	
}