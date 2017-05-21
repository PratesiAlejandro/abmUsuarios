<?php

require_once ("usuario.php");

class Archivo{

 public static function Subir($mail)// $anteriorFoto)
 {

  $retorno["Exito"] = TRUE;

  $archivoTmp = $mail . ".jpg";//$_SESSION['usuario'][1] . ".jpg";//date("Ymd_His") . ".jpg";
  $destino = "../tmp/" . $archivoTmp;
  
  $tipoArchivo = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);

  if ($_FILES["archivo"]["size"] > 8000000){//800000) {
   $retorno["Exito"] = FALSE;
   $retorno["Mensaje"] = "El archivo es demasiado grande. Verifique!!!";
   return $retorno;
  }

   $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);

  if($esImagen === FALSE) {//NO ES UNA IMAGEN
   $retorno["Exito"] = FALSE;
   $retorno["Mensaje"] = "S&oacute;lo son permitidas IMAGENES.";
   return $retorno;
  }
  else {// ES UNA IMAGEN

   //SOLO PERMITO CIERTAS EXTENSIONES
   if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
    && $tipoArchivo != "png") {
    $retorno["Exito"] = FALSE;
    $retorno["Mensaje"] = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
    return $retorno;
   }
  }
  
  if (!move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {

   $retorno["Exito"] = FALSE;
   $retorno = "Ocurrio un error al subir el archivo. No pudo guardarse.";
   return $retorno;
  }
  else{
   
   $retorno = "Archivo subido exitosamente!!!"; 
  

   return $retorno;
  }
 }


 public static function Borrar($path)
 {
       unlink($path);
       $nombreSrc="";
     
    $client = new nusoap_client(self::$host . '?wsdl');  
     
    $user=array($_SESSION['usuario'][0], $_SESSION['usuario'][1], $_SESSION['usuario'][2],$nombreSrc);
       $client->call('CargarSrcFoto',array($user));

        if ($client->fault) {
         $retorno["Exito"] = FALSE;
          $retorno["Mensaje"] = '<h2>ERROR AL INVOCAR METODO:</h2>';
        } 
        else {
        $err = $client->getError();
        if ($err) {
         $retorno["Exito"] = FALSE;
         $retorno["Mensaje"] ='<h2>ERROR EN EL CLIENTE:</h2><pre>'.$err.'</pre>';
         } 
       } 
       $retorno["Exito"] = FALSE;
       $retorno["Mensaje"] =$user;

  return $retorno;   
 }

 public static function Mover($pathOrigen, $pathDestino)
 {
  return copy($pathOrigen, $pathDestino);
 }
}
?>