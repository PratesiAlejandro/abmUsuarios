<?php 
session_start();

	$_SESSION['usuario']=null;
	$_SESSION['combo']=null;

session_destroy();
//header("Location: /../html/index.html");

 ?>